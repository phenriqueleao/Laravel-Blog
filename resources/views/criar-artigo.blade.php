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
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Nome usuário
                        </a>
                        <div class="navbar-dropdown">
                            <a href="criar-artigo" class="navbar-item">
                                Criar artigo
                            </a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">
                                <a href="/logout">Logout</a>
                            </div>
                        </div>
                    </div>
                    <a href="/login" class="navbar-item is-active">
                        Acesse sua conta
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <div style="margin-top: 20rem;">
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <h2 class="has-text-centered is-size-2">Crie seu artigo</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-content">
                            <div class="content">
                                <div class="field">
                                    <div class="control">
                                        <label for="titulo">Imagem:</label>
                                        <div class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" type="file" name="image" onchange="pegarNomeArquivo(this);">
                                                <span class="file-cta">
                                                <span class="file-icon">
                                                    <i class="fa fa-upload"></i>
                                                </span>
                                                <span class="file-label">
                                                    Escolha um arquivo
                                                </span>
                                                </span>
                                                <span class="file-name" id="file" style="max-width: 100%;">
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="titulo">Título:</label>
                                        <input class="input" type="text" name="title" placeholder="Título do artigo">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="texto">Texto:</label>
                                        <textarea class="textarea" id="texto" name="text" placeholder="Escreva aqui o texto do seu artigo"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%;text-align: center;">
                            <button class="button is-success is-medium" type="submit" style="margin: 20px;">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        function pegarNomeArquivo(arquivoRecebido){
            var arquivo = arquivoRecebido.files[0];
            var nomeArquivo = arquivo.name;
            document.getElementById('file').innerText = nomeArquivo;
        }
    </script>
</body>

</html>