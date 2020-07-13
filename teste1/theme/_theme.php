<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>houpa! - Teste</title>

    <link rel="stylesheet" href="<?= package("/bootstrap/dist/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?= package("/@fortawesome/fontawesome-free/css/all.min.css"); ?>" />
    <link rel="stylesheet" href="<?= asset("/css/style.css"); ?>" />
</head>

<body>

    <!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Navbar fixa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarCollapse" style="">
            <form class="form-inline mt-2 mt-md-0 ml-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Pesquisa" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
    </nav> -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand link-highlight" href="<?= $router->route("web.home"); ?>">
                <i class="fas fa-tshirt"></i> InovaWear.
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMobile" aria-controls="navMobile" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMobile">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?= $router->route("web.home"); ?>" class="nav-link mr-3" type="submit">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $router->route("web.showForm"); ?>" class="btn btn-outline-light" type="submit">Novo produto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $v->section("content"); ?>

    <footer class="bg-dark">
        <div class="container text-light">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0"><i class="fas fa-tshirt"></i> InovaWear. | a marca feita para quem quer se vestir bem</h6>
                </div>
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <a href="https://www.instagram.com/houpa.app" title="Instagram" target="blank" class="text-light">
                        <i class="fab fa-instagram mr-4"></i>
                    </a>
                    <a href="https://www.facebook.com/houpaapp" title="Facebook" target="blank" class="text-light">
                        <i class="fab fa-facebook mr-4"></i>
                    </a>
                    <a href="https://twitter.com/houpaapp" title="Twitter" target="blank" class="text-light">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= package("/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?= package("/popper.js/dist/popper.min.js"); ?>"></script>
    <script src="<?= package("/@fortawesome/fontawesome-free/js/all.min.js"); ?>"></script>
    <script src="<?= package("/sweetalert/dist/sweetalert.min.js"); ?>"></script>
    <script src="<?= package("/jquery-mask-plugin/dist/jquery.mask.min.js"); ?>"></script>
    <script src="<?= package("/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <?= $v->section("js"); ?>
</body>

</html>