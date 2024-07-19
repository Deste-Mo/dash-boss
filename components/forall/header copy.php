<!-- <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="max-width: 30%; height: 100%; z-index: 500;">
    <a href="/" class="d-flex align-items-center justify-content-center text-white text-decoration-none">
        <img src="assets/images/logo/logo.png" alt="" style="width:200px;">
    </a>
    <ul class="nav nav-pills flex mb-auto" style="width: 100%;">
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/home?home=active" class="nav-link text-white <?php if (isset($_GET["home"])) echo 'active'; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-home p-3"></i>
                </svg>
                Home
            </a>
        </li>
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/members?membre=active"
                class="nav-link text-white <?php if (isset($_GET["membre"])) echo 'active'; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-users p-3"></i>
                </svg>
                Membres
            </a>
        </li>
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/projets?projet=active"
                class="nav-link text-white <?php if (isset($_GET["projet"])) echo 'active'; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-spinner p-3"></i>
                </svg>
                Projets
            </a>
        </li>
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/notification?notification=active"
                class="nav-link text-white <?php if (isset($_GET["notification"])) echo 'active'; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-bell p-3"></i>
                </svg>
                Notification<span class="bg-danger p-2 text-light text-center rounded-5 m-2"><?= countComment($conn)['count'] ?></span>
            </a>
        </li>
    </ul>
</div> -->

    <!-- sidebar -->
    <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
      <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
      <div class="list-group rounded-0">
        <a href="/home?home=active" class="nav nav-pills flex mb-auto list-group-item list-group-item-action active border-0 d-flex align-items-center">
          <span>
            <i class="fa fa-home p-3"></i>
          </span>
          <span class="ml-2">Dashboard</span>
        </a>
        <a href="/members?membre=active" class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 align-items-center">
          <span class="bi bi-box"></span>
          <span class="ml-2">Membres</span>
        </a>

        <button class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#sale-collapse">
          <div>
            <span class="bi bi-cart-dash"></span>
            <span class="ml-2">Sales</span>
          </div>
          <span class="bi bi-chevron-down small"></span>
        </button>
        <div class="collapse" id="sale-collapse" data-parent="#sidebar">
          <div class="list-group">
            <a href="#" class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 pl-5">Customers</a>
            <a href="#" class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 pl-5">Sale Orders</a>
          </div>
        </div>

        <button class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#purchase-collapse">
          <div>
            <span class="bi bi-cart-plus"></span>
            <span class="ml-2">Purchase</span>
          </div>
          <span class="bi bi-chevron-down small"></span>
        </button>
        <div class="collapse" id="purchase-collapse" data-parent="#sidebar">
          <div class="list-group">
            <a href="#" class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 pl-5">Sellers</a>
            <a href="#" class="nav nav-pills flex mb-auto list-group-item list-group-item-action border-0 pl-5">Purchase Orders</a>
          </div>
        </div>
      </div>
    </div>

    <!-- overlay to close sidebar on small screens -->
    <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>