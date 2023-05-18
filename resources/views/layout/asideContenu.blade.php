@if(auth()->user()->level_id==1) 
   <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link">
            <i class="bi bi-person"></i>
            <span>Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#points"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-cart"></i>
            <span>points</span>
        </a>
        <div id="points" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{route('admin.points.index')}}>Afficher</a>
                <a class="collapse-item" href={{route('admin.points.create')}}>Ajouter</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#systems"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-cart"></i>
            <span>systemes de fidélité</span>
        </a>
        <div id="systems" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{route('admin.systems.index')}}>Afficher</a>
                <a class="collapse-item" href={{route('admin.systems.create')}}>Ajouter</a>
            </div>
        </div>
    </li>

@else
    <li class="nav-item active">
        <a class="nav-link">
            <i class="bi bi-person"></i>
            <span>Partenaire</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-people"></i>
            <span>clients</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('responsable.users.index')}}">Afficher</a>
                <a class="collapse-item" href="{{route('responsable.users.create')}}">Ajouter</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produits"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-cart"></i>
            <span>produits</span>
        </a>
        <div id="produits" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{route('responsable.produits.index')}}>Afficher</a>
                <a class="collapse-item" href={{route('responsable.produits.create')}}>Ajouter</a>
            </div>
        </div>
    </li>
@endif 