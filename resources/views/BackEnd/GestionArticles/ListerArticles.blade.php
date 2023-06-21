@extends("BackEnd.AdminPannel")
@section("content")
    <div class="container text-center">
        <a  href="{{route("domaines.index")}}" class="btn-md btn-success btn-outline-success btn text-light mt-3">Retour</a>
    </div>
    @foreach($articles as $article)
    @foreach($domaine as $dmn)
        <div class="container col-md-8 mx-auto">
            <div class="card my-5 mx-auto ">
                <h5 class="card-header"> Nom D'article : <span class="text-primary h2"><strong>{{strtoupper( $article->Nom_article)}}</strong></span></h5>
                <div class="card-body">
                    <h5 class="card-title"><strong>Nom de Votre Domaine </strong> : {{$dmn->nom}}</h5>
                    <p class="card-text"><strong> Description</strong> : {{$article->description}}</p>
                    <p class="card-text"><strong> Piece_Joint</strong> :
                    @if($article->piece_joint)
                            <div class="container ">
                                <form action="{{route("TelechargerArticle",$article)}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="chemain" value="{{$article->piece_joint}}">
                                    <button class="btn bg-primary btn-group-lg text-light">Telecharger article </button>
                                </form>
                            </div>
                    @else<span class="text-muted">Ouups ...! Pas de Document pour l'instant </span>@endif
                        </p>

                </div>
                <div class="card-footer bg-dark bg-gradient">
                    <div class="col-md-6 mx-auto  text-center  d-flex justify-content-center p-2">
                        <form action="{{route("SupprimerArticle",$article)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn-danger btn btn-group-sm mx-1"> Supprimer Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endforeach
@endsection
