@extends("master")
@section("content")
    <!-- ======= Notice ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Voici les Equipements De Laboratoire</h2>
                <ol>
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li>Equipement</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Notice -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">

            <div class="row">
                @if(count($equipements))
                    <div class="section-title text-center container" data-aos="fade-up">
                        <h2>Les Equipements Utilisées Au sein Du laboratoire </h2>
                    </div>
                    @foreach($equipements as $eq)

                        <div class="col-lg-4 mt-2" data-aos="fade-up">
                            <div class="testimonial-item">
                                <div class="container " height="500px">
                                    <img src="{{asset("storage/$eq->imageEquipement")}}" class="img-fluid rounded rounded-5 " alt=""  >
                                </div>
                                <h3>{{$eq->nom}} </h3>
                                <h4>Genre : {{$eq->genre}} </h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i><br>

                                    <span><strong>disponibliter </strong> : {{$eq->disponibiliter }}</span><br>
                                    <span><strong>date d'achat </strong> : {{$eq->dt_achat}}</span><br>
                                    <span><strong>Responsable </strong> : {{$eq->responsable}}</span><br>
                                    <span><strong>Guide d'utilisation : </strong> </span>
                                <hr>
                             <div class="container text-center">
                                 @if($eq->guide)
                                     <form action="{{route("FrontTelechargerEquipement",$eq)}}" method="post">
                                         @csrf
                                         <div class="col-md-12 ">
                                             <button type="submit"  class="btn-group btn-sm  text-center text-light btn-outline-primary bg-primary">Telecharger</button>
                                         </div>

                                     </form>
                                 @else
                                     <div class="text-muted">Document non disponible </div>
                                 @endif
                             </div>

                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="section-title text-center container" data-aos="fade-up">
                        <h2>Aucun Equipement N'est Enregistrer Pour Le Moment </h2>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->

@endsection
