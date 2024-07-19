<script src="js/ajax/jquery-3.7.1.min.js"></script>
<script src="js/sidebars.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(() => {
  $('#open-sidebar').click(() => {
    $('#sidebar').addClass('active');
    $('#sidebar-overlay').removeClass('d-none');
  });

  $('#sidebar-overlay').click(() => {
    $('#sidebar').removeClass('active');
    $('#sidebar-overlay').addClass('d-none');
  });
});
</script>
