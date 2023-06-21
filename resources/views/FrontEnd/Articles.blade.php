@extends("master")
@section("content")
    <section id="breadcrumbs" class="breadcrumbs shadow">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center ">
                <h2><strong>Articles</strong></h2>
                <ol>
                    <li><a >Domaine</a></li>
                    <li>Articles</li>
                </ol>
            </div>

        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container">

            <div class="row justify-content-center">
                @foreach($articles as $article)
                    <div class="col-lg-8 entries ">

                        <article class="entry" data-aos="fade-up">

                            <h2 class="entry-title">
                                <a ><strong> {{$article->Nom_article}}</strong></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>

                                    <li class="d-flex align-items-center"> Ajouté le : <i class="icofont-wall-clock"></i> <a ><time datetime="2020-01-01">{{$article->created_at}}</time></a></li><li class="d-flex align-items-center"></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {{$article->description}}
                                </p>
                                <div class="read-more">
                                       @if($article->piece_joint)
                                        <form action="{{route("FrontTelechargerArticle",$article)}}" method="post">
                                            @csrf
                                            <button class="btn btn-group-md bg-success text-light btn-outline-success" >Telecharger Article </button>
                                        </form>
                                    @else
                                           <h6 class="text-muted ">Article Non Disponible Pour Telecharger</h6>
                                    @endif
                                </div>
                            </div>

                        </article>

                    </div>

                @endforeach
            </div>

        </div>
    </section>
@endsection





