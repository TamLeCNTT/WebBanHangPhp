<script type='text/javascript'>
    var userimage = document.querySelector("#userimage");
    var overlay = document.querySelector(".overlay");
    var cross = document.querySelector(".overlay .fa-close");
    var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });
    userimage.addEventListener('click', function() {
        overlay.classList.remove('d-none');
    });


    cross.addEventListener('click', function() {
        overlay.classList.add('d-none');
    });
</script>