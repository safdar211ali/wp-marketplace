<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Market Rates</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/freelancer.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/chosen.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
<?php wp_head(); ?>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>">Market Rates</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
               <?php $c_user = wp_get_current_user();?>

                <?php if($c_user->user_login !=null):?>
                <?php if(is_home()):?>
                <li class="page-scroll">
                    <a href="/wp/dashboard">Dashboard</a>
                </li>
                <?php endif;?>
                <?php endif;?>
                <?php if(!is_home()):?>
                <li class="page-scroll">
                    <a href="<?php echo get_home_url(); ?>">Home Page</a>

                </li>
                <?php endif;?>
                <li class="page-scroll">
                    <a href="/wp/about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="/wp/contact">Contact</a>
                </li>
                <?php if($c_user->user_login !=null):?>
                <li class="page-scroll">
                    <a href="/wp/wp-login.php?action=logout&redirect_to=/wp">
                        <span class="glyphicon glyphicon-log-out">Logout</span>
                    </a>
                </li>
                <?php endif;?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <?php
    echo do_shortcode('[print_responsive_slider_plus_lightbox]');

?>
<!--    --><?php //wp_nav_menu(); ?>

<!--<div id="carousel-example" class="carousel slide" data-ride="carousel">-->
<!--    <ol class="carousel-indicators">-->
<!--        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>-->
<!--        <li data-target="#carousel-example" data-slide-to="1"></li>-->
<!--        <li data-target="#carousel-example" data-slide-to="2"></li>-->
<!--    </ol>-->
<!---->
<!--    <div class="carousel-inner">-->
<!--        <div class="item active">-->
<!--            <a href="#"><img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/carousel/1.jpg" /></a>-->
<!--            <div class="carousel-caption">-->
<!--                <h3>خانپور </h3>-->
<!--                <p>اشیاء کے نئے ریٹ دیکھیں۔</p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <a href="#"><img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/carousel/2.jpg" /></a>-->
<!--            <div class="carousel-caption">-->
<!--                <h3>خانپور </h3>-->
<!--                <p>اشیاء کے نئے ریٹ دیکھیں۔</p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <a href="#"><img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/carousel/3.jpg" /></a>-->
<!--            <div class="carousel-caption">-->
<!--                <h3>خانپور </h3>-->
<!--                <p>اشیاء کے نئے ریٹ دیکھیں۔</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <a class="left carousel-control" href="#carousel-example" data-slide="prev">-->
<!--        <span class="glyphicon glyphicon-chevron-left"></span>-->
<!--    </a>-->
<!--    <a class="right carousel-control" href="#carousel-example" data-slide="next">-->
<!--        <span class="glyphicon glyphicon-chevron-right"></span>-->
<!--    </a>-->
<!--</div>-->
</header>


<!-- Portfolio Grid Section -->
