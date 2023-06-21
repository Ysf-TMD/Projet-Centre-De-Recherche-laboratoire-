@extends("master")
@section("content")
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Reclamation</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>reclamation</li>
                    </ol>
                </div>

            </div>
        </section>
        <section id="contact" class="contact">
            <div class="container">

                <div class="row justify-content-center" data-aos="fade-up">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>ICARDA ... <br>INRA...</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>ResponsableInra@example.com<br>ResponsableLabo@example.com</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-phone"></i>
                                    <h4>appel:</h4>
                                    <p>+212 6...<br>+212 6...</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="{{route("addReclamation")}}" method="post" role="form" class="form-group p-4 rounded shadow">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nom" class="form-control" id="name" placeholder="Entrer le Nom"  />
                                    @error("nom")
                                        <span class="text-danger mt-2">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrer l'Email" />
                                    @error("email")
                                    <span class="text-danger mt-2">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="sujet"  placeholder="sujet" />
                                @error("sujet")
                                <span class="text-danger mt-2">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="5"  placeholder="Description de soucis ..."></textarea>
                                @error("nom")
                                <span class="text-danger mt-2">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="text-center"><button type="submit" class="btn btn-group btn-outline-success bg-success text-light">Envoyer Reclamation</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection
