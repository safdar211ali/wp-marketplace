<?php
/* Template Name: Dashboard */
?>
<?php get_header(); ?>
    <div class="hidden-lg hidden-md  top-marg">
    </div>
    <div class=" main_cats section-title text-center">
        <h3>Dashboard</h3>

    </div>

    <div class="container ">
        <p class="text-center">
            <?php $c_user = wp_get_current_user(); ?>
            <?php if ($c_user->user_login != null): ?>
                <a href="/wp/wp-login.php?action=logout&redirect_to=/wp">
                    <span class="glyphicon glyphicon-log-out btn btn-primary">Logout</span>
                </a>
            <?php endif; ?>
            <a href="/wp">
                <span class="glyphicon glyphicon-menu-left btn btn-primary">HomePage</span>
            </a>
        </p>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-2">
                <a href="/wp/frontuserdatamachinery">

                    <button type="button" class="btn btn-default">
                        <div class="portfolio-details ">
                            Manage Agricultural Machinery
                        </div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/users/machinery.png" alt="machinery"
                             width="170" height="130">
                    </button>

                </a>
            </div>
            <div class="col-md-2">
                <a href="/wp/frontuserland">

                    <button type="button" class="btn btn-default">
                        <div class="portfolio-details ">
                            Manage Agricultural Land
                        </div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/users/land.png" alt="agri land"
                             width="170" height="130">
                    </button>

                </a>
            </div>
            <div class="col-md-2">
                <a href="/wp/frontuserfruitfarm">

                    <button type="button" class="btn btn-default">
                        <div class="portfolio-details ">
                            Manage Fruit Farm
                        </div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/users/fruit.png" alt="fruit farm"
                             width="170" height="130">
                    </button>

                </a>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
<?php get_footer(); ?>