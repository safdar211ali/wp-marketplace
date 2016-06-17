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
                    if ($subcats ) {
                        ?>

                        <div class="form-group">


                            <select id="optlist" class="form-control" name="forma"
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

                        </div>
                        <?php
                    }
                        ?>
                    <!--   getting posts title-->
                    <table class="table table-bordered table-hover" id="table1">
                        <thead style="color: #337AB7;font-weight: bold;">
                        <tr>
                            <th>Item Name</th>
                            <th>Min Rate</th>
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

                    <!--  end getting posts title-->

                <?php

                } else
                if ($queried_object->$parent !== 0) {

                if (count(get_term_children($queried_object->term_id, 'product_category')) == 0) {
                // Start the Loop.
                ?>

                    <table class="table table-bordered table-hover" id="table2">
                        <thead style="color: #337AB7;font-weight: bold;">
                        <tr>
                            <th>Item Name</th>
                            <th>Min Rate</th>
                            <th>Max Rate</th>
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
