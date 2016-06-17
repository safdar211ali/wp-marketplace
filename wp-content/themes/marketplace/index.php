<?php
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="section-title text-center">
                    <h3>Main Categories</h3>

                </div>
            </div>
            <?php
            

            ?>

            <div class="row">

                <?php
                global $wpdb;

                $sql = "SELECT * 
       FROM $wpdb->term_taxonomy wtaxanomy
       INNER JOIN $wpdb->terms ON wtaxanomy.term_id = $wpdb->terms.term_id
       WHERE wtaxanomy.taxonomy =  'product_category'
       AND wtaxanomy.parent =0";

                $categories_array = $wpdb->get_results($sql);

                foreach ($categories_array as $category_obj) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-center mybtn">
                     <?php     $url = site_url( '/product_category/'.$category_obj->slug );?>

                        <a href="<?php echo $url; ?>">
                        <button type="button" class="btn btn-default">
                            <?php   $result = get_field('catimg', 'product_category_' . $category_obj->term_id );?>
                            <img src=" <?php echo $result[url];?>" class="img-responsive" alt="...">
                            </button>
                        <div class="portfolio-details ">
                            <?php echo $category_obj->name; ?>
                        </div>
                        </a>
                    </div>
                    <?php

                }

                ?>


            </div><!-- /.row -->
        </div>
        <div class="col-md-2">
            <?php get_sidebar() ?>
        </div>

    </div>
</div>


<?php
get_footer();
?>
