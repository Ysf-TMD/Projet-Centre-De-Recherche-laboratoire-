@extends("BackEnd.AdminPannel")
@section("content")
    <div class="container py-4" >
        <div class="container " >
            <div class="  mt-4 ">
                <div class="row justify-content-center  ">
                    <div class=" col-md-6 shadow">
                        <div class="card-header rounded  text-center alert alert-primary bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                            </svg><strong>Ajouter Equipement</strong></div>
                        <div class="card-body ">
                            <form action="{{route("EnregistrerEquipement")}}" method="post" enctype="multipart/form-data" class="bg-light p-3 text-dark rounded ">
                                @csrf

                                <div class="my-1">
                                    <label for="name">Ajouter Le  Nom d'Equipement</label>
                                    <input type="text" name="nom" id="" class="form-control" placeholder="Nom...">
                                    @error("nom")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="my-1">
                                    <label for="name">Disponibilité :  </label>
                                    <div class="container d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="disponibiliter" id="inlineRadio1" value="oui">
                                            <label class="form-check-label" for="inlineRadio1">Oui</label>
                                        </div><div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="disponibiliter" id="inlineRadio1" value="non">
                                            <label class="form-check-label" for="inlineRadio1">Non</label>
                                        </div>
                                    </div>
                                    @error("disponibiliter")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="my-1">
                                    <label for="name">Ajouter La Date D'achat</label>
                                    <input type="date" name="dt_achat" id="" class="form-control" >
                                    @error("dt_achat")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-1">
                                    <label for="name">Ajouter Le Responsable de Materiel </label>
                                    <input type="text" name="responsable" id="" class="form-control" placeholder="Mr (Mme)..." >
                                    @error("responsable")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <label for="name">Ajouter Le Guide D'utilisation </label>
                                    <input type="file" name="guide" id="" class="form-control" >
                                    @error("guide")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <label for="name">Ajouter Image d'Equipement </label>
                                    <input type="file" name="imageEquipement" id="" class="form-control" >
                                    @error("imageEquipement")
                                    <span class="text-danger">*{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="container text-center my-3 " >
                                    <button type="submit" class=" bg-primary btn  text-light">
                                        <strong>Ajouter Equipement</strong>
                                    </button>
                                    <a class="   btn btn-outline-primary" href="{{route("ListerEquipements")}}">Annuler</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="container text-center">
                            <a class="bg-primary text-light  btn btn-group btn-outline-primary p-2  shadow " href="{{route("ListerEquipements")}}">Consulter la liste des Equipements</a>
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
