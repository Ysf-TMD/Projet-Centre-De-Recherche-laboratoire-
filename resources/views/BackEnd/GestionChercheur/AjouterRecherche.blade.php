@extends("BackEnd.AdminPannel")
@section("content")
   <div class="container py-4" >
       <div class="container " >
           <div class="  mt-4 ">
               <div class="container d-flex  ">
                   <div class="card col-md-6 shadow">
                       <div class="card-header text-center alert alert-primary bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                               <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                               <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                           </svg><strong>Ajouter Recherche</strong></div>
                       <div class="card-body ">
                           <form action="{{route("EnregistrerRecherche",$chercheur)}}" method="post" enctype="multipart/form-data">
                               @csrf
                               <div class="my-1">
                                   <label for="name">Entrer Le  Nom De Recherche</label>
                                   <input type="text" name="Nom_recherche" id="" class="form-control" placeholder="Nom...">
                                   @error("Nom_recherche")
                                   <span class="text-danger">*{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="my-4">
                                   <label for="name">Selection l'Etat de recherche</label>
                                   <br>
                                   <p>En Cour : <input type="radio" name="etat" value="En Cour" id="" class="" ></p>
                                   <p>Finalisé : <input type="radio" name="etat" value="Finalisé" id="" class="" ></p>
                                   <p>Pas  Encore : <input type="radio" name="etat" value="Pas Encore " id="" class="" selected ></p>
                                   @error("etat")
                                   <span class="text-danger">*{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="mt-1">
                                   <label for="name">Ajouter Document </label>
                                   <input type="file" name="documents" id="" class="form-control" >
                                   @error("documents")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="container text-center my-3 " >
                                   <button type="submit" class="alert bg-primary col-md-5 shadow bg-gradient  btn  ">
                                       <strong>Ajouter Recherche</strong>
                                   </button>
                               </div>
                           </form>
                       </div>
                   </div>
                   <div class="col-md-6 ">
                       <div class="container text-center">
                           <a class="bg-primary text-light  btn btn-group btn-outline-primary p-2  shadow " href="{{route("chercheur.index")}}">Consulter la liste des Chercheurs</a>
                       </div>
                       <div class="container mt-4">
                           <img src="{{asset("storage/img_chercheur/bg_chercheur/bg_chercheur.png")}}" alt="" width="600vw">
                       </div>


                   </div>
               </div>
           </div>
       </div>

   </div>

@endsection
