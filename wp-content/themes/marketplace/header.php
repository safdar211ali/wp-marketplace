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
<!--    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">-->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

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
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="margin-top: 0;" class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" width="180" height="80" alt="no logo found."></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>


                <?php $c_user = wp_get_current_user(); ?>

                <?php if ($c_user->user_login != null): ?>
                    <?php if (is_home()): ?>
                        <li class="">
                            <a href="/wp/dashboard">Dashboard<br><i style="margin-left: 30px;" class="fa fa-cogs fa-2x" aria-hidden="true"></i></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!is_home()): ?>
                    <li class="">
                        <a href="<?php echo get_home_url(); ?>">Home Page<br><i style="margin-left: 30px;" class="fa fa-home fa-2x" aria-hidden="true"></i></a>


                    </li>
                <?php endif; ?>
                <li class="">
                    <a href="/wp/about">About<br><i style="margin-left: 20px;" class="fa fa-user fa-2x" aria-hidden="true"></i></a>
                </li>
                <li class="">
                    <a href="/wp/contact">Contact<br><i style="margin-left: 20px;" class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
                <?php if ($c_user->user_login != null): ?>
                    <li class="">
                        <a href="/wp/wp-login.php?action=logout&redirect_to=/wp">
                            Logout<br><i style="margin-left: 20px;" class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="hidden-sm hidden-xs">
        <?php
        echo do_shortcode('[print_responsive_slider_plus_lightbox]');

        ?>


    </div>
<!--<div style="width: 370px;" class="pull-right">-->
<!--    <script>-->
<!--        (function() {-->
<!--            var cx = '001796411992584455474:vzxvdunmk-g';-->
<!--            var gcse = document.createElement('script');-->
<!--            gcse.type = 'text/javascript';-->
<!--            gcse.async = true;-->
<!--            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;-->
<!--            var s = document.getElementsByTagName('script')[0];-->
<!--            s.parentNode.insertBefore(gcse, s);-->
<!--        })();-->
<!--    </script>-->
<!--    <gcse:search></gcse:search>-->
<!--</div>-->

</header>


<!-- Portfolio Grid Section -->
