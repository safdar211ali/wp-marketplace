<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php
                $queried_object = get_queried_object();
                $parent = 'parent';
                $category_ID = $queried_object->term_id;



                if ($queried_object->$parent === 0) {
                    // get_template_part( 'parentcategory' );
                    $post_type = 'product';
                    $tax = 'product_category';

                    $args = array('hierarchical' => 1, 'show_option_none' => '', 'hide_empty' => 0, 'parent' =>
                        $category_ID, 'taxonomy' => 'product_category', 'orderby' => 'name', 'order' => 'ASC');

                    $subcats = get_categories($args);
                    ?>


                    <script type="text/javascript">
                        jQuery(function ($) {
                            var opts = $('#optlist option').map(function () {
                                return [[this.value, $(this).text()]];
                            });

                            $('#someinput').keyup(function () {
                                var rxp = new RegExp($('#someinput').val(), 'i');
                                var optlist = $('#optlist').empty();
                                opts.each(function () {
                                    if (rxp.test(this[1])) {
                                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                                        $("select").attr("size", function () {
                                            return this.options.length;
                                        });
                                    }
                                });
                            });
                        });
                    </script>

                    <div class="form-group">
                        <input id="someinput" class="form-control" placeholder="Search A City">
                    </div>

                    <select multiple id="optlist" class="form-control" name="forma"
                            onchange="location = this.options[this.selectedIndex].value;">
                        <?php
                        foreach ($subcats as $cats) {
                            ?>
                            <?php $url = site_url('/product_category/' . $cats->slug); ?>

                            <option value="<?php echo $url ?>"><?php echo $cats->name ?></option>
                            <?php
                        }
                        ?>

                    </select>

                <?php
                //   getting posts title
                global $wpdb;
                $sql ="SELECT *  FROM wp_posts
INNER JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
INNER JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
WHERE (wp_term_taxonomy.term_id =  $category_ID
AND wp_term_taxonomy.taxonomy = 'product_category'
AND wp_posts.post_type = 'product'
AND wp_posts.post_status = 'publish')";
                //                $sql="SELECT DISTINCT post_title FROM wp_posts WHERE post_type='product' ";

                $posts = $wpdb->get_results($sql);
                print_r( $posts);
                print("<ul>");
                foreach ($posts as $post) {
                $url = site_url('/product_category/' . $post->post_title);
                    ?>
                <li><a href="<?php echo $url ?>"><?php echo $post->post_title ?></a></li>
                        <?php
                }
                print("</ul>");
                //   end getting posts title
                } else
                if ($queried_object->$parent !== 0) {

                if (count(get_term_children($queried_object->term_id, 'product_category')) == 0) {
                // Start the Loop.
                ?>

                    <table class="table table-bordered table-hover">
                        <thead style="color: #337AB7;font-weight: bold;">
                        <tr>
                            <td>Item Name</td>
                            <td>Min Rate</td>
                            <td>Max Rate</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while (have_posts()) : the_post();
                            ?>

                            <tr>
                                <td><?php echo the_title(); ?></td>
                                <td><?php echo the_field('MinRate'); ?></td>
                                <td><?php echo the_field('MaxRate'); ?></td>
                            </tr>


                            <?php
                            // End the loop.
                        endwhile;
                        ?>
                        </tbody>
                    </table>
                    <?php
                }

//
//                    $post_type = ' product';
//                    $tax = 'product_category';
//
//                    $args = array('hierarchical' => 1, 'show_option_none' => '', 'hide_empty' => 0, 'parent' => $category_ID, 'taxonomy' => 'product_category', 'orderby' => 'name', 'order' => 'ASC');
//
//                    $subcats = get_categories($args);
//
//                foreach ($subcats as $cats) {
//                    ?>
                    <!--                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">-->
                    <!--                        --><?php //$url = site_url('/product_category/' . $cats->slug); ?>
                    <!---->
                    <!--                        <a href="--><?php //echo $url; ?><!--">-->
                    <!--                            <button type="button"-->
                    <!--                                    class="btn btn-default text-center mybtn mybtncolor"> --><?php //echo $cats->name ?><!--</button>-->
                    <!--                            <a>-->
                    <!---->
                    <!--                    </div>-->
                    <!--                    --><?php
//                }
                }
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
