<nav class="sb-topnav navbar navbar-expand navbar-dark bg-black bg-gradient">

    <button class="btn btn-link btn-sm order-1 order-lg-0 bg-gradient m-3 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" >Panneau d'Admin : {{Auth::user()->name}}</a>
    <!-- Sidebar Toggle-->


    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{route("reclamations")}}" method="post">
@csrf
        <button class=" text-light btn" type="submit">
            Reclamations {{--({{count($reclamations)}})--}}
        </button>
    </form>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-light"></i>{{Auth::user()->name}}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route("admin.logout")}}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
