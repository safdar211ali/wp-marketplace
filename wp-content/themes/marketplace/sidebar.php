
<div class="panel panel-primary">
    <div class="panel-heading">Menu</div>

<div class="list-group">
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
            <?php echo $category_obj->name; ?>
        </a>
        <?php
    }
    ?>
</div>
    </div>





<div class="panel panel-primary">
    <div class="bg-primary">For Weather Enter City</div>
    <div class="panel-body">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div id="widget-area" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- .widget-area -->
        <?php endif; ?>
    </div>

</div>








