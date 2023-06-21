@extends("BackEnd.AdminPannel")
@section("content")
    <div class="container text-center ">
        <a  href="{{route("admin.pannel")}}" class="btn-md btn-success btn-outline-success btn text-light mt-3">Retour</a>
    </div>
   @if(count($reclamations))
       @foreach($reclamations as $reclamation)
           <div class="container col-md-8 mx-auto">
               <div class="card my-5 mx-auto ">
                   <h5 class="card-header"> Nom D'Expiditeur : <span class="text-primary h2"><strong>{{strtoupper( $reclamation->nom)}}</strong></span></h5>
                   <div class="card-body">
                       <h5 class="card-title"><strong>Email D'expiditeur  </strong> : {{$reclamation->email}}</h5>
                       <h5 class="card-title"><strong>Sujet  </strong> : {{$reclamation->nom}}</h5>
                       <p class="card-text"><strong> Description</strong> : {{$reclamation->description}}</p>
                       <p class="card-text"><strong> Ajouter le </strong> : {{$reclamation->created_at}}</p>
                       </p>
                   </div>
                   <div class="card-footer bg-dark bg-gradient">
                       <div class="col-md-6 mx-auto  text-center  d-flex justify-content-center p-2">
                           <form action="{{route("SupprimerReclamation",$reclamation)}}" method="post">
                               @csrf
                               @method("DELETE")
                               <button type="submit" class="btn-danger btn btn-group-sm mx-1"> Supprimer Reclamation</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       @endforeach
   @else

    <div class="container text-center text-light">
        <strong>Pas De Reclamations Pour Le Moment ....!!!</strong>
    </div>
   @endif
@endsection
