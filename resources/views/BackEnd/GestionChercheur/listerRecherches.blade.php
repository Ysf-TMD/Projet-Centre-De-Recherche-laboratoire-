@extends("BackEnd.AdminPannel")
@section("content")
    @if(count($recherches))
        @foreach($recherches as $recherche)

            <div class="container mx-auto">
                <div class="card my-5 mx-auto ">
                    <h5 class="card-header"> Nom De Document : <span class="text-primary h2">{{$recherche->Nom_recherche}}<strong></strong></span></h5>
                    <div class="card-body">
                        <h5 class="card-title"><strong>Chercheur Associé : </strong>{{$chercheur->nom}}  {{$chercheur->prenom}}</h5>
                        <p class="card-text"><strong> Etat D'avancement</strong> : {{$recherche->etat}}</p>
                        <p class="card-text"><strong> Document </strong> :
                        @if($recherche->documents)
                            <div class="container ">
                                <form action="{{route("TelechargerRecherche",$recherche)}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="chemain" value="{{$recherche->documents}}">
                                    <button class="btn bg-primary btn-group-lg text-light">Telecharger Document </button>
                                </form>
                            </div>
                        @else<span class="text-muted">Ouups ...! Pas de Document pour l'instant </span>
                        @endif
                        </p>

                    </div>
                    <div class="card-footer bg-dark bg-gradient">
                        <div class="col-md-6 mx-auto  text-center  d-flex justify-content-center p-2">
                            <form action="{{route("SupprimerDocument",$recherche)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn-danger btn btn-group-sm mx-1"> Supprimer Article</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="container text-center mt-5">
            <h1 class="text-light">Pas de Recherches pour l'Instant</h1>
            <a href="{{route("chercheur.index")}}" class="btn btn-md text-light  btn-group bg-success">retour</a>
        </div>
    @endif


@endsection
