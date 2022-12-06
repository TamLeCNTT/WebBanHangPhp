<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-user', function(event) {
            event.preventDefault();
            showConfirm(event.currentTarget);
        })
    });

    function showConfirm(e) {
        console.log(e);
        Swal.fire({
            title: 'Are you sure?',
            html: "<p>Delete <b>" + $(e).data('name') + "</b></p> <p>You won't be able to revert this!</p>",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#3085d6',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                ajaxDelete(e);
            }
        });
    }

    function ajaxDelete(e) {
        var url = $(e).prop('href');
        var id = $(e).data('id');
        $.ajax({
            method: "POST",
            url: url,
            data: {
                id: id
            }
        }).done(function(response) {
            let reload_url = $(e).data('return-url');
            let target = $('#user-list');
            reloadWardList(reload_url, target);
            Swal.fire(
                'Deleted!',
                response.message,
                'success'
            );

        }).fail(function(response) { // nếu thất bại
            Swal.fire(
                'Error',
                response.responseJSON.message,
                'error'
            )
        });
    }

    // hàm load lại danh sách sau khi xoá
    function reloadWardList(url, target) {
        $.ajax({
            method: 'GET',
            url: url
        }).done(function(response) {
            $(target).html(response.data);
        }).fail(function() {
            Swal.fire(
                'Error',
                'Unable to reload the Ward list. Try again.',
                'error'
            )
        });
    }

    // Show Modal dialog xác nhận xoá
    function showModalConfirm(e) {
        var deleteModal = new bootstrap.Modal($('#confirmDeleteModal'), {
            keyboard: false
        });

        // pass các ID và Return URL qua form trong Modal
        // lấy url trong thẻ <a> gán vào action của form
        let url = $(e).prop('href');
        $("#deleteForm").prop('action', url);

        // lấy thuộc tính data-id="" trong thẻ <a> gán vào hidden input trên form trong modal
        $("#ward-id").val($(e).data('id'));
        $("#return-url").val($(e).data('return-url'));
        let msg = 'Are you sure you want to delete ' + $(e).data('name') + '?';
        $("#delete-message").text(msg);

        deleteModal.show();

    }
</script>