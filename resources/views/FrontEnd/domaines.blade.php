@extends("master")
@section("content")
    <!-- ======= Notice ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mt-3">
                <h2> Liste De Domaines</h2>
                <ol>
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li>Domaines</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Notice -->

    <!-- ======= Domaines Section  ======= -->

    <section id="blog" class="blog">
        <div class="container">
            <div class="row">

                <div class="col-md-7 entries">
                    @if(count($domaines))
                        @foreach($domaines as $domaine)
                    <article class="entry" data-aos="fade-up">

                        <div class="entry-img">
                            <img src="{{asset("storage/$domaine->image")}}" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a >Nom de Domaine : {{$domaine->nom}}</a> <br>
                            <hr>
                            <a class=" h6"> <strong>Genre</strong>: {{$domaine->genre}}</a>
                        </h2>
                        <div class="entry-content">
                            <p>
                                <strong>Description : </strong> <br>{{$domaine->description}}
                            </p>
                            <div class="container d-flex justify-content-end m-2">

                                <div class=" mx-1">
                                    <form action="{{route("FrontrelationDomaine",$domaine)}}" method="post">
                                        @csrf
                                        <button  class="text-light btn btn-primary ">Chercheurs Associés</button>
                                    </form>

                                </div>
                                <div class="read-more mx-1">
                                    <a href="{{route("listerArticles",$domaine->id)}}" class="btn">Articles Associés</a>
                                </div>
                            </div>
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01"> Ajouté le : {{$domaine->created_at}}</time></li>
                            </ul>
                        </div>

                    </article>
                        @endforeach
                    @else
                        <div class="section-title" data-aos="fade-up">
                            <h2>Ouups ...! Les Domaines  Ne Sont Pas Enregistrer Pour Le Moment :) </h2>

                        </div>
                    @endif
                </div>

                    <div class="col-md-5">
                        <div class="sidebar" data-aos="fade-left">
                            <!-- End sidebar search formn-->

                            <hr>

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="{{route("domaines")}}">ALL <span>({{$all}})</span></a></li>
                                    <li><a href="{{route("Categories","Biologie Moléculaire")}}">Biologie Moléculaire <span>({{$bm}})</span></a></li>
                                    <li><a href="{{route("Categories","Culture In Vitro")}}">Culture In Vitro <span>({{$civ}})</span></a></li>
                                    <li><a href="{{route("Categories","Parasitologie")}}">Parasitologie<span>({{$para}})</span></a></li>
                                    <li><a href="{{route("Categories","Séquensage D'ADN")}}">Séquensage D'ADN <span>({{$seq}})</span></a></li>
                                    <li><a href="{{route("Categories","Cultures Sur Champs ")}}">Cultures Sur Champs  <span>({{$champs}})</span></a></li>
                                    <li><a href="{{route("Categories","Cultures En Serres ")}}">Cultures En Serres <span>({{$serres}})</span></a></li>
                                    <li><a href="{{route("Categories","Indefinit")}}">Indefinit<span>({{$Indefinit}})</span></a></li>
                                </ul>
                            </div>
                            <hr>
                            <nav class="nav-menu d-none d-lg-block ">
                                <ul>
                                    <li class="drop-down ">
                                        <a class="btn-outline"><strong class="h4 text-center"> Trie Par</strong> </a>
                                        <ul>
                                            <li><a href="{{route("TrierDomaine","latest")}}"><strong>Dernier Ajouté</strong> </a></li>
                                            <li><a href="{{route("TrierDomaine","recent")}}"><strong>Premier Ajouté</strong> </a></li>
                                            <li><a href="{{route("TrierDomaine","Nom")}}"><strong>Nom De Domaine</strong></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <hr><!-- End sidebar categories-->
                        </div>
                        <!-- End sidebar -->
                    </div>
            </div>

        </div>
    </section>
    <!-- End Domaines Section -->
@endsection





