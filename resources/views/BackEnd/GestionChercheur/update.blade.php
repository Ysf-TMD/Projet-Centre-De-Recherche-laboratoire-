@extends("BackEnd.AdminPannel")
@section("content")
   <div class="container py-4" >
       <div class="container " >
           <div class="  mt-4 ">
               <div class="container d-flex  ">
                   <div class="card col-md-6 shadow">
                       <div class="card-header text-center bg-success bg-opacity-75 bg-gradient">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                               <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                               <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                           </svg>
                           <strong>Modifier  Chercheur</strong></div>
                       <div class="card-body ">
                           <form action="{{route("chercheur.update",$chercheur)}}" method="post" enctype="multipart/form-data">
                               @method("PUT")
                               @csrf
                               <div class="my-1">
                                   <label for="name">Modifier Le  Nom</label>
                                   <input type="text" name="nom" id="" class="form-control" value="{{$chercheur->nom}}">
                                   @error("nom")
                                   <span class="text-danger">*{{$message}}</span>
                                   @enderror
                               </div>
                              <div class="my-1">
                                  <label for="name">Modifier Le  prenom</label>
                                  <input type="text" name="prenom" id="" class="form-control" value="{{$chercheur->prenom}}">
                                  @error("prenom")
                                  <span class="text-danger">*{{$message}}</span>
                                  @enderror
                              </div>
                               <div class="my-1">
                                   <label for="name">Modifier Le  Num Tele</label>
                                   <input type="text" name="tele" id="" class="form-control" value="{{$chercheur->tele}}">
                                   @error("tele")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="my-1">
                                   <label for="name">Modifier L'Email</label>
                                   <input type="email" name="email" id="" class="form-control" value="{{$chercheur->email}}">
                                   @error("email")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="my-1">
                                   <label for="name">Modifier La  Date de Naissance</label>
                                   <input type="date" name="dt_naissance" id="" class="form-control" value="{{$chercheur->dt_naissance}}">
                                   @error("dt_naissance")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="mt-1">
                                   <label for="name">Entrer Le  CIN</label>
                                   <input type="text" name="cin" id="" class="form-control" value="{{$chercheur->cin}}">
                                   @error("cin")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="mt-1">
                                   <label for="">Selectioner le Domaine Associé </label>
                                   <select name="DomaineChercheur" id="" class="form-select ">
                                       <option value="{{$chercheur->DomaineChercheur}}" selected >Ancienne Valeur : {{$chercheur->DomaineChercheur}}</option>
                                       <option value="indifinit" >Indefinit</option>
                                       <option value="Biologie Moléculaire">Biologie Moléculaire</option>
                                       <option value="Culture In Vitro">Culture In Vitro</option>
                                       <option value="Culture de Champignons">Culture de Champignons</option>
                                       <option value="Parasitologie">Parasitologie</option>
                                       <option value="Séquensage D'ADN">Séquensage D'ADN</option>
                                       <option value="Cultures En Serres">Cultures En Serres</option>
                                   </select>
                                   @error("DomaineChercheur")
                                   <span class="text-muted">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="mt-3">
                                   <label for="name">Modifier Images </label> <br>
                                   <hr>
                                   <div class="container text-center">
                                       <img src="{{asset("storage/$chercheur->image")}}" alt="Pas d'image" class="img-fluid rounded my-3">
                                   </div>
                                   <input type="file" name="image" id="" class="form-control" value="{{$chercheur->image}}" >
                                   <input type="hidden" name="oldImage" value="{{$chercheur->image}}">
                                   @error("image")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="container text-center my-3 " >
                                   <button type="submit" class=" bg-success btn-group btn  ">
                                       <strong>Modifier</strong>
                                   </button>
                               </div>
                           </form>
                       </div>
                   </div>
                   <div class="col-md-6 text-center">
                       <div class="container ">
                           <a class="bg-primary text-light  btn btn-group btn-outline-primary p-2  shadow " href="{{route("chercheur.index")}}">Consulter la liste des Chercheurs</a>
                       </div>
                       <div class="container mt-4 ">
                           <img src="{{asset("storage/$chercheur->image")}}" alt="" class="img-fluid rounded shadow ">
                       </div>


                   </div>
               </div>
           </div>
       </div>

   </div>

@endsection
