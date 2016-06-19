<?php if (!is_home()) :?>
<div class="panel panel-primary">
    <div class="panel-heading">Menu</div>

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
            <?php $url = site_url('/product_category/' . $category_obj->slug); ?>
            <a href="<?php echo $url; ?>" class="list-group-item">
                <div class="row">
                    <div class="col-md-4">
                        <?php $result = get_field('catimg', 'product_category_' . $category_obj->term_id); ?>
                        <img src=" <?php echo $result[url]; ?>" class="img-responsive"
                             alt="...">
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


<!--<div class="panel panel-primary">-->
<!--    <div class="bg-primary">For Weather Enter City</div>-->
<!--    <div class="panel-body">-->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->







