@extends("master")
@section("content")
    <!-- ======= Notice ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mt-3">
                <h2>Liste Des Stagiaires</h2>
                <ol>
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li>Stagiaires</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Notice -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">
            @if(count($stagiaires))
                <div class="section-title text-center col-md-12" data-aos="fade-up">
                    <h2>Les Stagiaires   Enregistrés Pour Le Moment </h2>
                </div>
            <div class="row row-cols-1 justify-content-center row-cols-md-3 g-4">
                    @foreach($stagiaires as $stg)
                    <div class="col">
                        <div class="col-lg-12 mt-2" data-aos="fade-up">
                            <div class="testimonial-item">
                                <img src="{{asset("storage/img_chercheur/default.jpg")}}" class="testimonial-img" alt="">
                                <h3>{{$stg->nom}} {{$stg->prenom}}</h3>
                                <h4>stagiaire</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i><br>
                                    <span><strong>Email</strong> : {{$stg->email}}</span><br>
                                    <span><strong>Tele</strong> : {{$stg->tele}}</span><br>
                                    <span><strong>CIN</strong> : {{$stg->cin}}</span><br>
                                    <span><strong>Entré le</strong> le : {{$stg->created_at}}</span><br>
                                    <span><strong>Periode de Stage</strong> : {{$stg->periode_de_stage}} Mois</span><br>
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="section-title text-center container" data-aos="fade-up">
                        <h2>Les Stagiaires  Ne  Sont Pas Enregistrer Pour Le Moment </h2>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->

@endsection


{{--<div class="row">
    @if(count($stagiaires))
        <div class="section-title text-center container" data-aos="fade-up">
            <h2>Les Stagiaires   Enregistrés Pour Le Moment </h2>
        </div>
        @foreach($stagiaires as $stg)

            <div class="col-lg-4 mt-2" data-aos="fade-up">
                <div class="testimonial-item">
                    <img src="{{asset("storage/img_chercheur/default.jpg")}}" class="testimonial-img" alt="">
                    <h3>{{$stg->nom}} {{$stg->prenom}}</h3>
                    <h4>stagiaire</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i><br>
                        <span><strong>Email</strong> : {{$stg->email}}</span><br>
                        <span><strong>Tele</strong> : {{$stg->tele}}</span><br>
                        <span><strong>CIN</strong> : {{$stg->cin}}</span><br>
                        <span><strong>Entré le</strong> le : {{$stg->created_at}}</span><br>
                        <span><strong>Periode de Stage</strong> : {{$stg->periode_de_stage}} Mois</span><br>
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
            </div>
        @endforeach
        @else
        <div class="section-title text-center container" data-aos="fade-up">
            <h2>Les Stagiaires  Ne  Sont Pas Enregistrer Pour Le Moment </h2>
        </div>
    @endif
</div>--}}
