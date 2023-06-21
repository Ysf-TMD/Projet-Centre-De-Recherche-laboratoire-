@extends("BackEnd.AdminPannel")
@section("content")
   <div class="container bg-black    bg-gradient " >
       <div class=" " >
           <div class="  mt-4  ">
               <div class="row justify-content-center    ">
                   <div class=" col-md-6 rounded    text-black ">
                       <div class="   text-center alert alert-primary "><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                               <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                               <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                           </svg><strong>Ajouter Chercheur</strong></div>

                           <form action="{{route("chercheur.store")}}" method="post" enctype="multipart/form-data" class=" bg-light  p-3 my-2 rounded ">
                               @csrf
                               <div class="my-1">
                                   <label for="name">Entrer Le  Nom</label>
                                   <input type="text" name="nom" id="" class="form-control" placeholder="Nom...">
                                   @error("nom")
                                   <span class="text-danger">*{{$message}}</span>
                                   @enderror
                               </div>
                              <div class="my-1">
                                  <label for="name">Entrer Le  prenom</label>
                                  <input type="text" name="prenom" id="" class="form-control" placeholder="prenom...">
                                  @error("prenom")
                                  <span class="text-danger">*{{$message}}</span>
                                  @enderror
                              </div>
                               <div class="my-1">
                                   <label for="name">Entrer Le  Num Tele</label>
                                   <input type="text" name="tele" id="" class="form-control" placeholder="tele...">
                                   @error("tele")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="my-1">
                                   <label for="name">Entrer L'Email</label>
                                   <input type="email" name="email" id="" class="form-control" placeholder="email...">
                                   @error("email")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="my-1">
                                   <label for="name">Entrer La  Date de Naissance</label>
                                   <input type="date" name="dt_naissance" id="" class="form-control" >
                                   @error("dt_naissance")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="mt-1">
                                   <label for="name">Entrer Le  CIN</label>
                                   <input type="text" name="cin" id="" class="form-control" placeholder="CIN...">
                                   @error("cin")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>

                               <div class="mt-1">
                                   <label for="">Selectioner le Domaine Associé </label>
                                   <select name="DomaineChercheur" id="" class="form-select ">
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
                               <div class="mt-1">
                                   <label for="name">Ajouter Images </label>
                                   <input type="file" name="image" id="" class="form-control" >
                                   @error("image")
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="container  text-center my-3 " >
                                   <button type="submit" class="alert bg-primary  text-light btn-outline-primary col-md-5 shadow bg-gradient  btn  ">
                                       <strong>Ajouter</strong>
                                   </button>
                               </div>
                           </form>

                   </div>
                   <div class="col-md-4 ">
                       <div class="container text-center">
                           <a class="bg-primary text-light  btn btn-group btn-outline-primary p-2  shadow " href="{{route("chercheur.index")}}">Consulter la liste des Chercheurs</a>
                       </div>
                       <div class="container mt-4">
                           <img src="{{asset("storage/img_chercheur/bg_chercheur/bg_chercheur.png")}}" alt="" class="img-fluid">
                       </div>


                   </div>
               </div>
           </div>
       </div>

   </div>

@endsection
