@extends("BackEnd.AdminPannel")
@section("content")
    <div class="container py-4" >
        <div class="container  " >
            <div class="  mt-4 ">
                <div class="row ">
                    <div class=" col-md-6 shadow  ">
                        <div class="card-header text-center rounded  alert alert-primary bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill-add text-black" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                            </svg><strong class="text-black">Ajouter Domaine</strong></div>

                            <form action="{{route("domaines.store")}}" method="post" enctype="multipart/form-data" class="bg-light text-dark p-3 rounded" >
                                @csrf
                                <div class="my-1">
                                    <label for="name">Entrer Le  Nom</label>
                                    <input type="text" name="nom" id="" class="form-control" placeholder="Nom...">
                                    @error("nom")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label for="name">Ajouter Une Description</label>
                                    <textarea name="description" id="" cols="20" rows="5" class="form-control" placeholder="ajouter description ..."></textarea>
                                    @error("description")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mt-1">
                                    <label for="">Selectioner le Genre de votre Domaine </label>
                                    <select name="genre" id="" class="form-select ">
                                        <option value="indifinit">Indefinit</option>
                                        <option value="Biologie Moléculaire">Biologie Moléculaire</option>
                                        <option value="Culture In Vitro">Culture In Vitro</option>
                                        <option value="Culture de Champignons">Culture de Champignons</option>
                                        <option value="Parasitologie">Parasitologie</option>
                                        <option value="Séquensage D'ADN">Séquensage D'ADN</option>
                                        <option value="Cultures En Serres">Cultures En Serres</option>
                                    </select>
                                    @error("genre")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mt-1">
                                    <label for="name">Ajouter Images </label>
                                    <input type="file" name="image" id="" class="form-control" >
                                    @error("image")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="container text-center my-3 " >
                                    <button type="submit" class="text-light btn-primary btn-sm   btn  ">
                                        <strong>Ajouter</strong>
                                    </button>
                                    <a class=" btn-outline-primary btn-sm   btn  " href="{{route("domaines.index")}}">   <strong>Annuler</strong></a>

                                </div>
                            </form>

                    </div>
                    <div class="col-md-6 ">
                        <div class="container text-center">
                            <a class="bg-primary text-light  btn btn-group btn-outline-primary p-2  shadow " href="{{route("domaines.index")}}">Consulter la liste des Domaines</a>
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
