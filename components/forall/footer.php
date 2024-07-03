<script src="../js/ajax/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function () {
        $('.messageContainer').addClass('d-none');
        $('.taskContainer').addClass('d-none');
        setInterval(() => {
            $('#headerDiv').load(location.href + ' #headerDiv');
            // $('#allMessage').load(location.href + ' #allMessage');
        }, 10000);
    });
</script>
</body>

</html>