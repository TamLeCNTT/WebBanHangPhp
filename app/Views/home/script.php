<script>
    $(document).ready(function() {
        var page = 2;
        var page_sanpham = 3;


        $('#them').click(function() {
            $.ajax({
                url: "/ajax",
                type: "GET",
                data: {
                    current_page: page,
                },
                success: function(data) {
                    $('#noidung').append(data);
                },
                error: function() {
                    alert("Không tải được")
                },
            });
            page = page + 1;
        });


        $('#them1').click(function() {
            $.ajax({
                url: "/ajax_sanpham",
                type: "GET",
                data: {
                    current_page: page_sanpham,
                },
                success: function(data) {
                    $('#noidungsanpham').append(data);
                },
                error: function() {
                    alert("Không tải được")
                },
            });
            page_sanpham = page_sanpham + 1;
        });
    });
</script>