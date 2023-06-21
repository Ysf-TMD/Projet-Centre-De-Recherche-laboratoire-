@extends("BackEnd.AdminPannel")
@section("content") <div class=" m-3 ">
    <a href="{{route("AjouterEquipement")}}" class="btn btn-group text-light bg-success my-2 btn-outline-success">Ajouter Equipement</a>
</div>
    @if(count($equipements))
    @foreach($equipements as $eq)
        <div class="container col-md-8 mx-auto">

            <div class="card my-5 mx-auto ">
                <h5 class="card-header"> Nom D'article : <span class="text-primary h2"><strong>{{strtoupper( $eq->nom)}}</strong></span></h5>
                <div class="card-body">
                   <div class=" row ">

                           <div class="col-md-7">
                               <p class="card-text"><strong> Responsable d'Equipement</strong> : {{$eq->responsable}}</p>
                               <p class="card-text"><strong> Desponibilité</strong> : {{$eq->disponibiliter}}</p>
                               <p class="card-text"><strong> Guide D'utilisation</strong> :
                               @if($eq->guide)
                                   <div class="container ">
                                       <form action="{{route("TelechargerArticle",$eq->guide)}}" method="post" >
                                           @csrf
                                           <input type="hidden" name="chemain" value="{{$eq->guide}}">
                                           <button class="btn bg-primary btn-group-lg text-light">Telecharger le Guide  </button>
                                       </form>
                                   </div>
                               @else<span class="text-muted">Ouups ...! Pas de Document pour l'instant </span>@endif
                               </p>
                           </div>
                       <div class="col-md-4">
                           <div class="col-md-12 mx-auto h4 text-center rounded ">
                               <p> <strong>Image d'Equipement</strong></p>
                               <img src="{{asset("storage/$eq->imageEquipement")}}" alt="Erreur" class="img-fluid rounded " >
                           </div>
                       </div>
                   </div>
                   </div>
                <div class="card-footer bg-dark bg-gradient">
                    <div class="col-md-6 mx-auto  text-center  d-flex justify-content-center p-2">
                        <form action="{{route("SupprimerEquipement",$eq)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn-danger btn btn-group-sm mx-1"> Supprimer Equipement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="">
            <div class="container col-md-7 mx-auto my-5">

                <div class="alert alert-black bg-gradient text-center text-light shadow border fw-semibold border-2 border-dark">


                    la  Base De Donné est vide ... priere D'ajouter Un Equipement <br>
                    <hr>
                    <a href="{{route("AjouterEquipement")}}" class="btn btn-group text-light bg-success my-2 btn-outline-success">Ajouter Equipement</a>

                    <div class="my-5">
                        <img src="{{asset("storage/img_chercheur/bg_chercheur/db_vide.jpg")}}" alt="introuvable" class=" rounded  img-fluid col-md-12">
                    </div>
                </div>

            </div>

        </div>
    @endif


@endsection
