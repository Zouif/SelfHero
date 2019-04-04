<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mladen Ruzicic">

    <title>SelfHeroes</title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/StyleOnepage.css')}}">
</head>


<body>
<!-- Navigacija -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">NKII</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Header -->
<header class="banner">
    <div class="container">
        <div class="col-lg-12">
            <img class="img-responsive center-block"
                 src="https://api-assets.clashofclans.com/badges/200/m44uEqux13r-GkmdXdko2y7fil8p0S57uwKJJbHVZnc.png"/>
            <div class="intro-text">
                <span class="naslov text-center">SelfHeroes</span>

                <p class="tekst text-center">Ton histoire / Tes choix / Ton héros</p>


            </div>


        </div>

        <div class="row"> <!-- dugmici, social -->
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="https://clashofclans.com/clans/clan?clanTag=8GPQG0JC" class="btn btn-lg btn-outline">
                    <i class="fa fa-shield"></i> ClashOfClans
                </a>

                <a href="https://www.freecodecamp.com/cedevita" class="btn btn-lg btn-outline">
                    <i class="fa fa-fire fa-fw"></i> Code Camp
                </a>

                <a href="https://www.facebook.com/mladenruzicic" class="btn btn-lg btn-outline">
                    <i class="fa fa-facebook"></i> Facebook
                </a>

            </div>
        </div>

    </div><!-- /.container -->
</header>

<!-- About -->
<section id="about">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>About</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <img src="https://cdn.moldovacrestina.md/2016/09/shutterstock_110989019.jpg" class="img-responsive" alt="">
            </div>
            <div class="col-lg-6">
                <p><strong>NKII</strong><br>
                    <small>stands for "Najjaci klan idje ikad", founded 2015.</small><br></p>

                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 55%">
                        <span class="sr-only">55% Complete (success)</span>55% achieved
                    </div>
                    <div class="progress-bar progress-bar-info" style="width: 45%">
                        <span class="sr-only">45% Complete (warning)</span>45% to go
                    </div>
                </div>




                <p><strong>Clash of Clans</strong> is a superb game, freemium or otherwise, with more nuance than most give it credit for. That's why it's passed the test of time since its launch and still has an active community devotedly constructing elaborate fortresses in the hope of becoming invincible.</p>
                <p>Clash of Clans is thus a simple game, but that’s more of a strength than a weakness. It’s simple enough to provide quick, painless matches on an iPhone in an idle moment, and there are enough different units to choose from in the battle mode to make playing against other players endlessly rewarding.</p>
                <p>Best of all, the option to fight against NPC goblins gives Clash of Clans a small edge over similar strategy games that rely almost entirely on player-versus-player combat.</p>
            </div>
        </div>

    </div><!-- /.container -->
</section>

<!-- Portfolio -->
<section id="portfolio">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Nos meilleurs histoires</h2>
                <hr class="star-primary">
            </div>
        </div>


        <div class="row">

            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="https://www.400coups.ch/images/detailed/51/strahd.jpg" alt="Portfolio 1">
                </a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="https://static1.squarespace.com/static/52a68ca9e4b06a3e88b1260e/t/54eb81e0e4b0c31341bc3014/1424720355113/" alt="Portfolio 2">
                </a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/51CBGBT8ghL.jpg" alt="Portfolio 3">
                </a>
            </div>

            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/91mv3QQMNSL.jpg" alt="Portfolio 4">
                </a>
            </div>
            <br>





        </div>



    </div><!-- /.container -->
</section>



<!-- Contact -->
<section id="contact">
    <div class="container center-block">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Nos prix</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div id="pricing-table" class="clear center-block">
            <div class="plan">
                <h3>Noob<span>0€</span></h3>
                <a class="signup" href="">Sign up</a>
                <ul>
                    <li><b>1</b> Histoire a la fois</li>
                    <li><b>1</b> Sauvegarde</li>
                </ul>
            </div>
            <div class="plan" id="most-popular">
                <h3>Barroudeur<span>1,50€/m</span></h3>
                <a class="signup" href="">Sign up</a>
                <ul>
                    <li><b>5</b> Histoire a la fois</li>
                    <li><b>5</b> Sauvegarde</li>
                </ul>
            </div>
            <div class="plan">
                <h3>Grand guerrier<span>3€/m</span></h3>
                <a class="signup" href="">Sign up</a>
                <ul>
                    <li><b>Illimité</b> Histoire a la fois</li>
                    <li><b>Illimité</b> Sauvegarde</li>
                </ul>
            </div>
        </div>

    </div><!-- /.container -->
</section>



<footer>
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <p>11761 <small>Total Points</small> 31 <small>Wars Won</small> War Frequency: <u>Always</u></p>
            </div>

        </div>
    </div> <!-- ./container -->
</footer>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
