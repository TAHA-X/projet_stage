<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-globe-asia-australia"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Haouta</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link">
            <i class="bi bi-person"></i>
            <span>Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-people"></i>
            <span>users</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.users.index')}}">Afficher</a>
                <a class="collapse-item" href="{{route('admin.users.create')}}">Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contrats"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-book"></i>
            <span>contrats</span>
        </a>
        <div id="contrats" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{route('admin.contrats.index')}}>Afficher</a>
                <a class="collapse-item" href={{route('admin.contrats.create')}}>Ajouter</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-basket"></i>
            <span>categories</span>
        </a>
        <div id="categories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{route('admin.categories.index')}}>Afficher</a>
                <a class="collapse-item" href={{route('admin.categories.create')}}>Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produits"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-cart"></i>
            <span>produits</span>
        </a>
        <div id="produits" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{route('admin.produits.index')}}>Afficher</a>
                <a class="collapse-item" href={{route('admin.produits.create')}}>Ajouter</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="bi bi-card-checklist"></i>
            <span>Points</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="bi bi-calendar-event"></i>
            <span>Invitations</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>