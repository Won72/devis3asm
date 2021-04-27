<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="3ASM, structure d’aide et de maintien à domicile en Essonne. Aide et maintien à domicile pour personnes âgées, dépendantes, handicapées en Essonne.">
    <meta name="author" content="3ASM, Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Personnes âgées dépendantes Essonne | 3asm | France</title>

    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/style.css" rel="stylesheet">
</head>

<body>

    <?php
        include("header.php");
    ?>

    <main>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>DEVIS CENTRE POLYVALENT DE SOINS</h2>
                    <p class="lead">Veuillez saisir les informations afin de faire un devis.</p>
                </div>


                <!--Aside-->
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary-w">3ASM</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm no-border-w">
                                <div>
                                    <h6 class="my-0">Du lundi au vendredi de 9h à 12h30
                                        et de 13h30 à 17h</h6>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm no-border-w">
                                <div>
                                    <h6 class="my-0">PARIS</h6>
                                    <small class="text-muted">24 RUE GILBERT CESBRON 75017</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm no-border-w">
                                <div>
                                    <h6 class="my-0">PALAISEAU</h6>
                                    <small class="text-muted">5 AVENUE DU 1ER MAI 91120</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm no-border-w">
                                <div>
                                    <h6 class="my-0">RIS-ORANGIS</h6>
                                    <small class="text-muted">83 ROUTE DE GRIGNY 91130</small>
                                </div>

                            </li>

                        </ul>

                    </div>


                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Devis Centre Polyvalent de Soins</h4>
                        <?php
                            include("form.php");
                        ?>
                    </div>
                </div>
            </main>
        </div>


        <!-- FOOTER -->

        <?php
            include("footer.php");
        ?>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/form-validation.js"></script>
        <script src="js/jsform.js"></script>


</body>

</html>