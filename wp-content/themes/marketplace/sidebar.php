<?php if (!is_home() && !is_page('mainpage') && !is_page('contact')) : ?>
<div class="panel panel-primary">
    <div class="panel-heading"><i class="fa fa-windows" aria-hidden="true"></i>
        Menu
    </div>

    <div class="list-group ">
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
       

            <?php if ($category_obj->slug == 'steelpricelist') {
                $url = site_url('/' . $category_obj->slug);
            } elseif ($category_obj->slug == 'yarnpricelist') {
                $url = site_url('/' . $category_obj->slug);
            } elseif ($category_obj->slug == 'goldsilver') {
                $url = site_url('/' . $category_obj->slug);
            } elseif ($category_obj->slug == 'users-products') {
                $url = site_url('/' . $category_obj->slug);
            } elseif ($category_obj->slug == 'currencyrates') {
                $url = 'http://www.forex.pk/open_market_rates.asp';
            } elseif ($category_obj->slug == 'stockexchange') {
                $url = 'http://www.psx.com.pk/';
            } else {
                $url = site_url('/product_category/' . $category_obj->slug);
            }
            ?>




            <?php if ($category_obj->slug == 'stockexchange'){ ?>
            <a href="" onclick="window.open('<?php echo $url; ?>', '_blank','width=1000px,height=500px');"
               class="list-group-item">
                <?php }elseif ($category_obj->slug == 'currencyrates'){ ?>
                <a href=""
                   onclick="window.open('<?php echo $url; ?>', '_blank','width=1000px,height=500px,scrollbars=yes');"
                   class="list-group-item">
                    <?php }else{
                    ?>
                    <a href="<?php echo $url; ?>" class="list-group-item">
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <?php $result = get_field('catimg', 'product_category_' . $category_obj->term_id); ?>
                                <img src=" <?php echo $result[url]; ?>" class="img-responsive" alt="..." width="100" height="100">
                            </div>
                            <div class="col-md-8" style="padding-top: 20px;">
                                <?php echo $category_obj->name; ?>
                            </div>
                        </div>

                    </a>
          
                <?php

                }
                ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <div id="widget-area" class="widget-area" role="complementary">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>










