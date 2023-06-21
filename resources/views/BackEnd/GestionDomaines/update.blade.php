@extends("BackEnd.AdminPannel")
@section("content")
    <div class="container py-4" >
        <div class="container " >
            <div class="  mt-4 ">
                <div class="row   ">
                    <div class=" col-md-6 mx-auto  ">
                        <div class="card-header alert text-light rounded  text-center bg-success bg-opacity-75 bg-gradient">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            <strong>Modifier  Domaine</strong></div>
                        <div class=" ">
                            <form action="{{route("domaines.update",$domaine)}}" method="post" enctype="multipart/form-data" class="bg-light text-black p-3 rounded">
                                @method("PUT")
                                @csrf
                                <div class="my-1">
                                    <label for="name"><strong>Modifier Le  Nom</strong></label>
                                    <input type="text" name="nom" id="" class="form-control" value="{{$domaine->nom}}">
                                    @error("nom")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label for="name">Modifier la Description</label>
                                    <textarea name="description" id="" cols="20" rows="5" class="form-control" placeholder="ajouter description ...">{{$domaine->description}}</textarea>
                                    @error("description")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mt-1">
                                    <label for="">Selectioner le Genre de votre Domaine </label>
                                    <select name="genre" id="" class="form-select "   >
                                        <option value="{{$domaine->genre}}"  selected>Valeur Anciénne  : {{$domaine->genre}}</option>
                                        <option value="indifinit"  >indifinit</option>
                                        <option value="Biologie Moléculaire" >Biologie Moléculaire</option>
                                        <option value="Culture In Vitro" >Culture In Vitro</option>
                                        <option value="Culture de Champignons">Culture de Champignons</option>
                                        <option value="Parasitologie">Parasitologie</option>
                                        <option value="Séquensage D'ADN">Séquensage D'ADN</option>
                                        <option value="Cultures En Serres">Cultures En Serres</option>
                                    </select>
                                    @error("genre")
                                    <span class="text-muted">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="name">Modifier Image </label>
                                    <img src="{{asset("storage/$domaine->image")}}" alt="Pas d'image" class=" rounded img-fluid shadow ">
                                    <input type="file" name="image" id="" class="form-control mt-4" " >
                                    <input type="hidden" name="oldImage" value="{{$domaine->image}}">
                                    @error("image")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="container text-center my-3 " >
                                    <button type="submit" class=" bg-success btn  ">
                                        <strong>Modifier</strong>
                                    </button>
                                    <a href="{{route("domaines.index")}}" class="btn btn-outline-primary ">
                                        <strong>annuler</strong>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
