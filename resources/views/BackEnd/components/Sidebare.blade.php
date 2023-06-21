<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Gestion D'admines</div>
                    <a class="nav-link" href="{{route("dashboard")}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Page d'Admin
                    </a>
                    <div class="sb-sidenav-menu-heading">Gestion Chercheurs</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#chercheur" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Chercheur
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="chercheur" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route("chercheur.create")}}">Ajouter Chercheur</a>
                            <a class="nav-link" href="{{route("chercheur.index")}}">Lister les Chercheurs </a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Gestion Stagaiaires</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Stagiaires
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route("stagiaires.create")}}">Ajouter Stagiaires</a>
                            <a class="nav-link" href="{{route("stagiaires.index")}}">Lister les Stagiaires</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Gestion Domaines</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#domaine" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Domaines De recherches
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="domaine" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route("domaines.create")}}">Ajouter Domaine</a>
                            <a class="nav-link" href="{{route("domaines.index")}}">Lister les Domaines</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Gestion d'Equipement</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#equipement" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Gestion d'Equipement De Laboratoire
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="equipement" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route("AjouterEquipement")}}">Ajouter Equipement</a>
                            <a class="nav-link" href="{{route("ListerEquipements")}}">Lister les Equipements</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">
                        {{--*****--}}
                    </div>

                    </div>



            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as: {{Auth::user()->name}}</div>
                Projet Réaliser Par TMD YouSSeF
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main class="bg-black bg-gradient ">
            @yield("content")
        </main>
        <footer class="p-4 bg-dark ">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-center small">
                    <div class=" text-center text-light">Copyright &copy;Youssef Tamda 2023 </div>
                </div>
            </div>
        </footer>
    </div>
</div>
