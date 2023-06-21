@extends("master")
@section("content")
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mt-3">
                <h2>Page D'authentification</h2>
                <ol>
                    <li><a >Home</a></li>
                    <li>Login</li>
                </ol>
            </div>

        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container">
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-6">

                    <form action="{{route("LoginUserFront")}}" method="post"  class="form-group rounded shadow p-4">
                        @csrf
                        <div class="text-center h3 m-3">

                            <i class="icofont-user ">S'authentifier</i>
                        </div>
                        @error("email")
                        <div class="container text-center">
                            <span class="text-danger text-center mt-2"> *** {{$message}} ***</span>
                        </div>

                        <hr>
                        @enderror
                        <div class="form-group ">
                            <div class=" form-group d-flex">
                                <i class="icofont-ui-email m-3"></i>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />

                            </div>
                            <div class=" form-group d-flex">
                                <i class="icofont-ui-password m-3"></i>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your password" data-rule="password" data-msg="Please enter a valid password" />

                            </div>

                        </div>
                        <div class="mb-3">

                        <div class="text-center">

                                <button type="submit" class="my-2 btn btn-group bbtn-md bg-success text-light btn-outline-sucess">S'authentifier</button>
                            <br>
                            <a href="{{route("RegisterUser")}}" class="text-primary "><u>Créer Un Compte</u> </a>
                        </div>

                    </form>

                </div>


            </div>

        </div>
    </section>
@endsection
