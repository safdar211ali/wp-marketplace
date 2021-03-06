<?php
/* Template Name: Mainpage */
?>
<?php

get_header();
?>
<div class="hidden-lg hidden-md  top-marg">
</div>
<div class="container " >
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class=" main_cats section-title text-center">
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
                        <?php if ($category_obj->slug == 'steelpricelist') {
                            $url = site_url('/' . $category_obj->slug);
                        } elseif ($category_obj->slug == 'yarnpricelist') {
                            $url = site_url('/' . $category_obj->slug);
                        }elseif ($category_obj->slug == 'goldsilver') {
                            $url = site_url('/' . $category_obj->slug);
                        } elseif ($category_obj->slug == 'oil') {
                            $url = site_url('/' . $category_obj->slug);
                        }elseif ($category_obj->slug == 'fertilizers-pesticides') {
                            $url = site_url('/' . $category_obj->slug);
                        }elseif ($category_obj->slug == 'users-products') {
                            $url = site_url('/' . $category_obj->slug);
                        }elseif ($category_obj->slug == 'currencyrates') {
                            $url = 'http://www.forex.pk/open_market_rates.asp';
                        } elseif ($category_obj->slug == 'stockexchange') {
                            $url = 'http://www.psx.com.pk/';
                            } else {
                            $url = site_url('/product_category/' . $category_obj->slug);
                        }
                        ?>


                        <?php if ($category_obj->slug == 'stockexchange'){ ?>
                        <a onclick="window.open('<?php echo $url; ?>', '_blank','width=1000px,height=500px');">
                            <?php }elseif ($category_obj->slug == 'currencyrates'){ ?>
                            <a class="currency" onclick="window.open('<?php echo $url; ?>', '_blank','width=1000px,height=500px,scrollbars=yes');">
                                <?php }else{
                                ?>
                                <a href="<?php echo $url; ?>">
                                    <?php
                                    }
                                    ?>
                                    <?php $cattitle = get_field('cattitle', 'product_category_' . $category_obj->term_id); ?>

                                    <button type="button" class="btn btn-default">
                                        <div style="font-family:'Noto Nastaliq Urdu Draft';font-size: 18px;margin-bottom: 10px;" class="portfolio-details "><?php echo $cattitle; ?></div>
                                        <div class="portfolio-details ">
                                            <?php echo $category_obj->name; ?>
                                        </div>

                                        <?php $result = get_field('catimg', 'product_category_' . $category_obj->term_id); ?>
                                        <img src=" <?php echo $result[url]; ?>" width="170" height="130" alt="...">
                                    </button>

                                </a>
                    </div>
                    <?php

                }

                ?>


            </div><!-- /.row -->
        </div>
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>

    </div>

</div>


<?php
get_footer();
?>

