@extends("master")
@section("content")
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mt-3">
                <h2>Register</h2>
                <ol>
                    <li><a >Home</a></li>
                    <li>Créer un Compte</li>
                </ol>
            </div>

        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container">
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-6">

                    <form action="{{url("/RegisterUser/add")}}" method="post" role="form" class="form-group shadow p-4 rounded " >
                        @csrf
                        <div class="text-center h3 ">
                            <i class="icofont-ui-edit "> Créer Un Compte </i>
                        </div>
                        <div class="form-group ">
                            <div class=" form-group d-flex">
                                <i class="icofont-user m-3"></i>
                                <input type="text" class="form-control" name="nom" id="" placeholder="Entrer le nom  "   />
                            </div>
                            <div class=" form-group d-flex">
                                <i class="icofont-user m-3"></i>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer le prenom "/>
                            </div>

                            <div class=" form-group d-flex ">
                                <i class="icofont-email m-3"></i>
                                <input type="email" class="form-control" name="email" id="" placeholder="Your Email" />
                            </div>
                            <div class=" form-group  d-flex">
                                <i class="icofont-ui-password m-3"></i>
                                <input type="password" class="form-control" name="password" id="" placeholder=" Entrer mot de passe "  />
                            </div>
                            <div class=" form-group d-flex">
                                <i class="icofont-ui-password m-3"></i>
                                <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirmer votre mot de passe  "  />
                            </div>
                            <div class=" form-group d-flex">
                                <i class="icofont-ui-cell-phone m-3"></i>
                                <input type="text" class="form-control" name="tele" id="" placeholder="Entrer votre Numéro  " />
                            </div>
                        </div>

                        <div class="mb-3">
{{--                            <div class="loading">Loading</div>--}}
{{--                            <div class="error-message"></div>--}}
{{--                            <div class="sent-message">Your message has been sent. Thank you!</div>--}}
                        </div>
                        <div class="text-center"><button type="submit" class="bg-success bg-gradient btn btn-group text-light btn-outline-success">Ajouter Utilisateur</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>
@endsection
