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
                    <strong class="">
                        Voici la liste De Chercheurs Ajouté
                    </strong>
                </span>

                <div class="d-flex">
                    <div class="container text-start  ">
                        @if($message = \Illuminate\Support\Facades\Session::get("msg"))
                            <div class=" mt-3 bg-succes">
                                Félicitation : {{$message}}
                            </div>
                        @endif
                    </div>
                    <div class="container-fluid text-end">
                        <a class=" bg-primary text-light my-2  border border-2 border-dark shadow btn btn-group  p-2" href="{{route("chercheur.create")}}">Ajouter Chercheur</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-auto row-cols-md-3 g-3 justify-content-center">
            @if(count($chercheurs))
                @foreach($chercheurs as $chercheur)
                    <div class="col">
                        <div class="card shadow" >
                            <img src="{{asset("storage/$chercheur->image")}}" class="card-img-top " alt="pas d'image Insérer " >

                            <div class="card-body bg-black bg-gradient  text-light" style="height:50vh">
                                <h5 class="card-title text-center fw-semibold">
                                    {{$chercheur->nom}} {{$chercheur->prenom}}
                                </h5>
                                <hr>
                                <p class="card-text">
                                <p><strong>Email : </strong><span class="text-primary"> {{$chercheur->email}}</span></p>
                                <p><strong>tele : </strong>{{$chercheur->tele}}</p>
                                <p><strong>CIN : </strong>{{$chercheur->cin}}</p>
                                <p><strong>DomaineChercheur : </strong>{{$chercheur->DomaineChercheur}}</p>
                                <p><strong>Ajouté : </strong>{{$chercheur->created_at->diffForHumans()}}</p>
                                </p>
                            </div>
                            <div class="card-footer bg-dark bg-gradient ">
                                <div class="col-md-12 row  row-cols-auto g-3 justify-content-center">
                                    <form action="">
                                        <a class=" bg-warning text-black btn p-2 rounded badge" href="{{route("chercheur.edit",$chercheur)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            Modifier Chercheur</a>
                                    </form>

                                    <form action="{{route("AjouterRecherche",$chercheur)}}" method="post">
                                        @csrf
                                        <button class=" bg-primary  btn p-2 rounded badge " >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-square-fill my-auto" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                            Ajouter Recherche
                                        </button>
                                    </form>
                                        <form action="{{route("listerRecherches",$chercheur)}}" method="post">
                                            @csrf
                                            <button class=" bg-info text-black btn p-2 rounded badge" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-card-checklist  " viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                                </svg>

                                                Lister les Recherches
                                            </button>
                                        </form>
                                    <form action="{{route("chercheur.destroy",$chercheur)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="bg-danger text-black btn  rounded badge" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-trash3 m-1" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </form>

                                </div>

























                               {{-- <div class=" justify-content-center">
                                    <div class=" text-center">
                                        <form action="{{route("AjouterRecherche",$chercheur)}}" method="post">
                                            @csrf
                                            <button class=" bg-primary text-right mx-1 border border-2 btn-sm btn btn-group btn-sm" >
                                                Ajouter Recherche
                                            </button>
                                        </form>

                                    </div>
                                    <div class="text-center ">
                                        <a class=" bg-warning border border-2 mx-1 btn btn-group  p-1" href="{{route("chercheur.edit",$chercheur)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square m-1" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            Modifier</a>
                                    </div>
                                    <div class=" text-center">
                                        <form action="{{route("listerRecherches",$chercheur)}}" method="post">
                                            @csrf
                                            <button class=" bg-info opacity-50 mx-1 border border-2 btn btn-group  p-1" >
                                                Lister les Recherches
                                            </button>
                                        </form>

                                    </div>
                                    <div class=" text-center">
                                        <form action="{{route("chercheur.destroy",$chercheur)}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="alert bg-danger mx-1 border border-2 btn btn-group  p-1" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3 m-1" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                                Supprimer
                                            </button>
                                        </form>

                                    </div>
                                </div>--}}

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="">
                    <div class="">
                        <div class="alert alert-black bg-gradient text-center text-light shadow border fw-semibold border-2 border-dark">
                            la  Base De Donné est vide ... priere D'ajouter Un Chercheur
                            <div class="my-5">
                                <img src="{{asset("storage/img_chercheur/bg_chercheur/db_vide.jpg")}}" alt="introuvable" class=" rounded  rounded-5  shadow border border-2 border-light col-md-12">
                            </div>
                        </div>

                    </div>

                </div>

            @endif


        </div>
    </div>

@endsection
