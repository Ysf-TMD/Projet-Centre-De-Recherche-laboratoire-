@extends("master")
@section("content")
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mt-2">
                <h2>Les Chercheurs Liés au Domaine </h2>

            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container text-center">
            <div class="section-title" data-aos="fade-up">
                <h2>Liste De  <strong>Chercheurs</strong></h2>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                @if(count($chercheurs))
                        @foreach($chercheurs as $chercheur)
                            <div class="col">
                                <div class="member " data-aos="fade-up">
                                <div class="member-img">
                                    <img src="{{asset("storage/$chercheur->image")}}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info text-start ">
                                    <h4>{{$chercheur->nom}} {{$chercheur->prenom}}</h4>
                                    <div class="container ">
                                        <span><strong>Email :</strong>{{$chercheur->email}}</span>
                                        <span ><strong>Domaine De Recherche :</strong>{{$chercheur->DomaineChercheur}}</span>
                                        <span><strong>Tele : </strong>{{$chercheur->tele}}</span>
                                        {{--<span><strong>Recherches Associés</strong>{{$chercheur->tele}}</span>--}}
                                    </div>

                                </div>
                            </div>
                            </div>
                        @endforeach
            </div>
        </div>
        @else
            <div class="section-title col-md-12" data-aos="fade-up">
                <h2>Ce Domaine Ne posséde pas des chercheurs </h2>
            </div>
        @endif

    </section>
@endsection
