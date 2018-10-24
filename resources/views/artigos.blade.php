<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/laravel-blog-logo.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/blog.css')}}">
</head>

<body>
    <!-- START NAV -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                        <img src="{{asset('images/laravel-blog-logo.png')}}" alt="Logo">
                    </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a href="" class="navbar-item is-active">
                        Todos artigos
                    </a>
                    @if (Auth::check())                 
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Nome usuário
                            </a>
                            <div class="navbar-dropdown">                            
                                <a href="/criar-artigo" class="navbar-item">
                                    Criar artigo
                                </a>
                                <hr class="navbar-divider">
                                <div class="navbar-item">
                                    <a href="/logout">
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="navbar-item is-active">
                            Acesse sua conta
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <div class="container" style="margin-top: 20rem;">
        <!-- START ARTICLE FEED -->        
            <section class="articles">
                @foreach($artigos as $artigo)
                    <div class="column is-8 is-offset-2">                
                        <div class="card article">
                            @if ($artigo->author->id == Auth::id())
                                <div class="card-header" style="box-shadow:unset;padding: 10px;">
                                    <a href="/artigo/editar/{{$artigo->slug}}" class="button" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                                    <a href="/artigo/remover/{{$artigo->slug}}" class="button"><i class="fa fa-remove"></i></a>
                                </div>
                            @endif
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-center">
                                        <img src="http://www.radfaces.com/images/avatars/daria-morgendorffer.jpg" class="author-image" alt="Placeholder image">
                                    </div>
                                    <div class="media-content has-text-centered">
                                        <img src="{{ Storage::disk('public')->url($artigo->image_location) }}" width="300" height="300"/>   
                                        <p class="title article-title"><a href="/artigo/{{ $artigo->slug }}" style="color: #363636;">{{ $artigo->title }}</a></p>
                                        <p class="subtitle is-6 article-subtitle">
                                            <a>{{ $artigo->author->name }}</a> em {{ $artigo->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="content article-body">
                                    <p>{{ $artigo->text }}</p>
                                </div>
                            </div>
                        </div>           
                    </div>
                @endforeach
            </section>
        <!-- END ARTICLE FEED -->
    </div>
</body>

</html>