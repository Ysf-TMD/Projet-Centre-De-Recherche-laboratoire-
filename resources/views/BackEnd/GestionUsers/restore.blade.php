<x-app-layout>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header alert alert-success text-center h3">
                    <strong>
                        Modifier Utilisateur
                    </strong>
                </div>
                <div class="card-body">
                    <form class="form-group" action="{{route("admin.UpdateUser",$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nom D'utilisateur</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
                            @error("name")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address Email </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
                            @error("email")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mot De Passe</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="{{$user->password}}">
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="exampleInputPassword1" class="form-label">Modifier Image</label>
                            <img src="{{asset("storage/".$user->image)}}" alt=" Pas d'image pour l'instant" class="form-control my-2" name="image" >
                            <input type="hidden" name="old_image" value="{{$user->image}}">
                            <input type="file" class="form-control" id="exampleInputPassword1" name="imagefile" value="{{$user->image}}">
                            @error("image")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-group btn-outline-success shadow border-dark">
                                Modifier  Utilisateur
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle m-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                </svg>
                            </button>
                            <a href="{{url("/dashboard")}}" class="btn btn-group btn-outline-info shadow border-dark">
                                Annuler<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse-fill m-1" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h7.08a2 2 0 0 1 1.519.698l4.843 5.651a1 1 0 0 1 0 1.302L10.6 14.3a2 2 0 0 1-1.52.7H2a2 2 0 0 1-2-2V3zm9.854 2.854a.5.5 0 0 0-.708-.708L7 7.293 4.854 5.146a.5.5 0 1 0-.708.708L6.293 8l-2.147 2.146a.5.5 0 0 0 .708.708L7 8.707l2.146 2.147a.5.5 0 0 0 .708-.708L7.707 8l2.147-2.146z"/>
                                </svg>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="">
                <div class="">
                    <img src="{{asset("./images/Adminpannel/editepannel1.png")}}" alt="introuve" width="fit-content" class="rounded ">
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
