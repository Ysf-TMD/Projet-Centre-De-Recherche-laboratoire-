@extends("master")
@section("content")
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Les Chercheurs </h2>

            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container text-center">
            <div class="section-title" data-aos="fade-up">
                <h2>Notre  <strong>Equipe</strong></h2>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                @if(count($chercheurs))
                        @foreach($chercheurs as $chercheur)
                            <div class="col">
                                <div class="member " data-aos="fade-up">
                                <div class="member-img">
                                    <img src="{{asset("storage/$chercheur->image")}}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info col-md-12 ">
                                    <h4 class="text-center">{{$chercheur->nom}} {{$chercheur->prenom}}</h4>
                                    <div class="container ">
                                        <span><strong class="">Email :</strong>{{$chercheur->email}}</span>
                                        <span ><strong>Domaine De Recherche :</strong>{{$chercheur->DomaineChercheur}}</span>
                                        <span><strong>Tele : </strong>{{$chercheur->tele}}</span>
                                        <span class="text-center">

                                            <form action="{{route("liste_recherches_chercheur",$chercheur)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-light btn-sm rounded rounded-5  btn-outline-success  border-2 border-dark my-2">Voire Recherches</button>
                                            </form>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            </div>
                        @endforeach
            </div>
        </div>
        @else
            <div class="section-title col-md-12" data-aos="fade-up">
                <h2>Les Memebres D'equipe Ne Sont Pas Enregistrer Pour Le Moment </h2>
            </div>
        @endif

    </section>
@endsection
