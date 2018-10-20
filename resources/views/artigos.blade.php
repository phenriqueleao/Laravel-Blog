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
                    <a class="navbar-item is-active">
                        Home
                    </a>
                    <a class="navbar-item">
                        Examples
                    </a>
                    <a class="navbar-item">
                        Features
                    </a>
                    <a class="navbar-item">
                        Team
                    </a>
                    <a class="navbar-item">
                        Archives
                    </a>
                    <a class="navbar-item">
                        Help
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Nome usuário
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                Minhas postagens
                            </a>
                            <a class="navbar-item">
                                Perfil
                            </a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">
                                Logout
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <div class="container" style="margin-top: 20rem;">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-center">
                                <img src="http://www.radfaces.com/images/avatars/daria-morgendorffer.jpg" class="author-image" alt="Placeholder image">
                            </div>
                            <div class="media-content has-text-centered">
                                <p class="title article-title"><a href="#" style="color: #363636;">Sapien eget mi proin sed</a></p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a href="#">Fldariaávia</a> on February 17, 2018
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Accumsan lacus vel facilisis volutpat est velit egestas. Sapien eget mi proin sed. Sit amet mattis vulputate enim...
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-center">
                                <img src="http://www.radfaces.com/images/avatars/angela-chase.jpg" class="author-image" alt="Placeholder image">
                            </div>
                            <div class="media-content has-text-centered">
                                <p class="title article-title"><a href="#" style="color: #363636;">Cras tincidunt lobortis feugiat vivamus.</a></p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a href="#">Angela</a> on October 7, 2017
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Accumsan lacus vel facilisis volutpat est velit egestas. Sapien eget mi proin sed. Sit amet mattis vulputate enim...
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->
        </section>
        <!-- END ARTICLE FEED -->
    </div>
</body>

</html>