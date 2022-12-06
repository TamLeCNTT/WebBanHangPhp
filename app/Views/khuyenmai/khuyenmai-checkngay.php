<script>
    $(document).ready(function() {
        $('#themkhuyenmai').click(function(event) {
            var $km_batdau = $('input[name="khuyenmai_bd"').val();
            var $km_ketthuc = $('input[name="khuyenmai_kt"').val();
            if ($km_batdau > $km_ketthuc) {
                alert("Ngày bắt đầu không được lớn hơn ngày kết thúc! vui lòng chọn lại")
                event.preventDefault();

            }
        })
    });
</script>