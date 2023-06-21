<x-app-layout>

    <div class="py-12">
        <div class="container-fluid d-flex  justify-content-center">
            <div class="col-md-8   m-1">
                @if($message = \Illuminate\Support\Facades\Session::get("msg"))
                    <div class="alert alert-success">{{$message}}</div>
                @endif
                <div class="container">
                    @if(count($users)!=null)
                        <table class="table text-light bg-dark rounded bg-gradient " >
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th >Nom</th>
                                <th >Email</th>
                                <th >Image </th>
                                <th >Ajouté le :  </th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($number = 1)

                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$number++}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->image)
                                            <img src="{{asset("storage/".$user->image)}}" alt="Image Non trouvé" width=100 class="rounded shadow text-center ">
                                            @else
                                            <div class="text-danger">Pas de photos pour ce Utilisateur</div>
                                        @endif
                                    </td>
                                    <td>@if($user->created_at != null )
                                            {{$user->created_at->diffForHumans()}}
                                        @else
                                            <div class="text-danger">date non determiner</div>
                                        @endif

                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="">
                            {{$users->links()}}
                        </div>
                </div>
                @else
                    <div class="alert alert-danger h3">
                        il n'existe pas d'utilisateur
                    </div>
                @endif
            </div>
            @error($errors->any())
            <ul>
                @foreach($errors->all() as $err)
                    <div class="alert alert-danger">{{$err}}</div>
                @endforeach
            </ul>
            @enderror
           {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header alert alert-primary text-center h3">
                        <strong>
                            Ajouter Utilisateur
                        </strong>
                    </div>
                    <div class="card-body">
                        <form class="form-group" action="{{route("admin.AddUser")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nom D'utilisateur</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                @error("name")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address Email </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                @error("email")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mot De Passe</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="password">
                                @error("password")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Ajouter Image</label>
                                <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                                @error("image")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="container text-center">
                                <button type="submit" class="btn btn-group btn-outline-primary shadow border-dark">
                                    Enregistrer Utilisateur
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle m-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>--}}
        </div>


    </div>
</x-app-layout>
