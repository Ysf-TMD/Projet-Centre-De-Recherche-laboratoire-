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
                        Voici la liste De Stagiaires Ajouté
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
                        <a class="btn btn-success text-light" href="{{route("stagiaires.create")}}">Ajouter Stagiaires</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row row-cols-1 row-cols-auto row-cols-md-4 g-4 justify-content-center">

            @if(count($stagiaires))
                @foreach($stagiaires as $stagiaire)
                    <div class="card mb-3 bg-primary bg-opacity-25 text-light bg-gradien mx-1" >
                        <div class="row  ">
                            <div class=" ">
                                <div class="card-body " >
                                    <h5 class=" text-center  "><strong>  {{$stagiaire->nom}} {{$stagiaire->prenom}}</strong></h5>
                                    <hr>
                                    <p class="card-text text-start">
                                    <p><strong>Email : </strong><span class="text-light"> {{$stagiaire->email}}</span></p>
                                    <p><strong>tele : </strong>{{$stagiaire->tele}}</p>
                                    <p><strong>CIN : </strong>{{$stagiaire->cin}}</p>
                                    <p><strong>Data De Naissance  : </strong>{{$stagiaire->dt_naissance }}</p>
                                    <p><strong>Période de Stage  : </strong>{{$stagiaire->periode_de_stage }} Mois</p>
                                    <p><strong>Ajouté le  : </strong>{{$stagiaire->created_at}}</p>


                                    </p>
                                </div>
                                <hr>
                                <div class="p-3 row row-cols-auto justify-content-evenly    rounded ">
                                    <div class="container">
                                        <a class="btn bg-warning badge text-black    p-1" href="{{route("stagiaires.edit",$stagiaire)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square " viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            Modifier
                                        </a>
                                    </div>
                                    <div class="container">
                                        <form action="{{route("stagiaires.destroy",$stagiaire)}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class=" btn bg-danger badge text-black   p-1" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3 " viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>












                                    {{--<div class=" row row-cols-2 justify-content-center  ">
                                        <div class="container">
                                            <a class="btn bg-warning badge text-black   p-1" href="{{route("stagiaires.edit",$stagiaire)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square " viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                Modifier
                                            </a>
                                        </div>
                                      <div class="container">
                                          <form action="{{route("stagiaires.destroy",$stagiaire)}}" method="post">
                                              @csrf
                                              @method("DELETE")
                                              <button class=" btn bg-danger badge text-black   p-1" >
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
                    </div>
                @endforeach
            @else
                <div class="">
                    <div class="">
                        <div class="alert alert-black bg-gradient text-center text-light shadow border fw-semibold border-2 border-dark">
                            la  Base De Donné est vide ... priere D'ajouter Un stagiaire
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

























{{--

 <div class="col">
                        <div class="card shadow">
                            <img src="{{asset("storage/$stagiaires->image")}}" class="card-img-top " alt="pas d'image Insérer " height="400hv">

                            <div class="card-body bg-black bg-gradient  text-light">
                                <h5 class="card-title text-center fw-semibold">
                                    {{$stagiaires->nom}} {{$stagiaires->prenom}}
                                </h5>
                                <hr>
                                <p class="card-text">
                                <p><strong>Email : </strong><span class="text-primary"> {{$stagiaires->email}}</span></p>
                                <p><strong>tele : </strong>{{$stagiaires->tele}}</p>
                                <p><strong>CIN : </strong>{{$stagiaires->cin}}</p>
                                <p><strong>Ajouté : </strong>{{$stagiaires->created_at->diffForHumans()}}</p>
                                </p>
                            </div>
                            <div class="card-footer bg-black bg-gradient ">
                                <div class="justify-content-center d-flex ">
                                    {{-- <div class=" ">
                                         <a class=" alert alert-dark btn btn-group border border-2 mx-1 p-1 btn-outline-info" href="{{route("chercheur.create")}}">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill m-1" viewBox="0 0 16 16">
                                                 <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                 <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                             </svg>
                                             Afficher </a>
                                     </div>--}}

