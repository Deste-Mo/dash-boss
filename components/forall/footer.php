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
  
  document.addEventListener('DOMContentLoaded', function () {
    var toggleButton = document.getElementById('btn-1');
    var icon = document.getElementById('icon-toggle');
    
    toggleButton.addEventListener('click', function () {
        // Vérifie si le sous-menu est visible ou non
        if (document.getElementById('submenu3').classList.contains('show')) {
            // Si le sous-menu est visible, change l'icône en fa-angle-right
            icon.classList.remove('fa-angle-down');
            icon.classList.add('fa-angle-right');
        } else {
            // Si le sous-menu est caché, change l'icône en fa-angle-down
            icon.classList.remove('fa-angle-right');
            icon.classList.add('fa-angle-down');
        }
    });
  });

</script>

