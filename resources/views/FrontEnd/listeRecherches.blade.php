@extends("master")
@section("content")
    <!-- ======= Notice ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-3 ">

            <div class="d-flex justify-content-between align-items-center">
                <h2> Liste De Recherches</h2>
                <ol>
                    <li><a href="{{route("home")}}">Domaine</a></li>
                    <li>Liste domaines d'un chercheur</li>
                </ol>
            </div>

        </div>
    </section>


    <section id="blog" class="blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 justify-content-center ">
                    @if(count($recherches))
                        @foreach($recherches as $recherche)
                    <article class="entry" data-aos="fade-up">

                        <div class="entry-img">

                        </div>
                        <h2 class="entry-title">
                            <a >Nom du Recherche : {{$recherche->Nom_recherche}}</a> <br>
                            <hr>
                            <a class=" h6"> <strong>Etat</strong>: {{$recherche->etat}}</a>
                        </h2>
                        <hr>
                        <div class="entry-content ">
                            <p>
                                <strong>Chercheur Responsable : </strong> {{$chercheur->nom}} {{$chercheur->prenom}}
                            </p>
                            <div class="container d-flex justify-content-end m-2">
                                @if($recherche->documents)
                                    <div class=" mx-1">
                                        <form action="{{route("TelechargerRechercheFront",$recherche)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="chemain" value="{{$recherche->documents}}">
                                            <button  class="text-light btn btn-primary ">TelechargerDocument</button>
                                        </form>
                                    </div>
                                @else
                                    <div class=""><span class="text-muted">Document non disponible</span> </div>
                                @endif
                            </div>
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01"> Ajouté le : {{$recherche->created_at}}</time></li>
                            </ul>
                        </div>

                    </article>
                        @endforeach
                    @else
                        <div class="section-title" data-aos="fade-up">
                            <h2>Ouups ...! Les Recherches Sont pas Disponibles Pour le moment:) </h2>
                            <a href="{{route("chercheurs")}}" class="bg-success btn btn-sm text-light ">Retour</a>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Domaines Section -->
@endsection





