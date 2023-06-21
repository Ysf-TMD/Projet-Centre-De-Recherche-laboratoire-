<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{route("home")}}"><span>Gestion <small>De </small> </span> Recherches</a></h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{route("home")}}">Home</a></li>
                <li><a href="{{route("domaines")}}">Domaines De Recherche</a></li>
                <li><a href="{{route("chercheurs")}}">Chercheurs</a></li>
                <li><a href="{{route("stagiaires")}}">Stagiaires</a></li>
                <li><a href="{{route("equipements")}}">Equipement Laboratoire</a></li>
                <li><a href="{{route("reclamation")}}">Reclamation</a></li>

                <li>
                    <div class=" col-md-12 text-center ">

                        @guest
                            <a href="{{route("loginUser")}}" class="text-primary"><i class="icofont-user">Se connecter</i></a>
                        @endguest
                        @auth
                                <a href="{{route("logoutUser")}}" class="text-success h1  "><i class="icofont-logout">Se Deconnecter</i></a>
                        @endauth
                    </div>
                </li>
            </ul>
        </nav>

    </div>
</header>
