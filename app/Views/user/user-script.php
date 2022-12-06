<script>
    $(document).ready(function() {
        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            showConfirm(event.currentTarget);

        })
    });

    function showConfirm(e) {

        Swal.fire({
            title: 'Xóa tài khoản',
            html: "<p> <b>" + $(e).data('name') + " sẽ bị xóa !</b></p> <p>Bạn chắc chắn với thao tác này?</p>",
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
            console.log(e);
            let reload_url = $(e).data('return-url');
            let target = $('#user-list');
            reloadCityList(reload_url, target);
            Swal.fire(
                'Deleted!',
                response.message,
                'success'
            );

        }).fail(function(response) {
            Swal.fire(
                'Error',
                response.responseJSON.message,
                'error'
            )
        });
    }

    function reloadCityList(url, target) {
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
</script>