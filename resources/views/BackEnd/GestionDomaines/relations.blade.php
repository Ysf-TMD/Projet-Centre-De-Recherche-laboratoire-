@extends("BackEnd.AdminPannel")
@section("content")
    <div class="container py-4 ">
        <div class="container-fluid ">
            <div class="text-light text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-card-checklist mx-2 " viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                </svg>
                <span class="text-light h3 ">
                    <strong>
                        Voici la liste Du Chercheurs Liés
                    </strong>
                </span>

                <div class="d-flex">
                    <div class="container-fluid text-end">
                        <a class=" btn-success  btn btn-sm  p-2" href="{{route("domaines.index")}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row row-cols-1 row-cols-md-3 row-cols-auto g-4 justify-content-center">
         @if(count($chercheurs))
                @foreach($chercheurs as $chercheur)
                    <div class="col">
                        <div class="card shadow">
                            <img src="{{asset("storage/$chercheur->image")}}" class="card-img-top " alt="pas d'image Insérer " height="400hv">

                            <div class="card-body bg-black bg-gradient  text-light">
                                <h5 class="card-title text-center fw-semibold">
                                    {{$chercheur->nom}} || {{$chercheur->prenom}}
                                </h5>
                                <hr>
                                <p class="card-text">
                                <p><strong>tele : </strong><span class="text-primary"> {{$chercheur->tele}}</span></p>
                                <p><strong>CIN : </strong><span class="text-primary"> {{$chercheur->cin}}</span></p>
                                <p><strong>Domaine de recherche  : </strong><span class="text-primary"> {{$chercheur->DomaineChercheur}}</span></p>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else--}}
                <div class="">
                    <div class="">
                        <div class="alert alert-black bg-gradient text-center text-light shadow border fw-semibold border-2 border-dark">
                            la  Base De Donné est vide ... priere D'ajouter Un Domaine
                            <div class="my-5">
                                <img src="{{asset("storage/img_chercheur/bg_chercheur/db_vide.jpg")}}" alt="introuvable" class=" rounded img-fluid">
                            </div>
                        </div>

                    </div>

                </div>

            @endif


        </div>
    </div>

@endsection
