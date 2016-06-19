<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php
                $queried_object = get_queried_object();
                $parent = 'parent';
                $category_ID = $queried_object->term_id;
                //code cut here
                $post_type = 'product';
                $tax = 'product_category';

                $args = array('hierarchical' => 1, 'show_option_none' => '', 'hide_empty' => 0, 'parent' =>
                    $category_ID, 'taxonomy' => 'product_category', 'orderby' => 'name', 'order' => 'ASC');

                $subcats = get_categories($args);
                if ($subcats) {
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
                } else {

//                    $args = array('hierarchical' => 1, 'show_option_none' => '', 'hide_empty' => 0, 'parent' =>
//                        $_SESSION["id"], 'taxonomy' => 'product_category', 'orderby' => 'name', 'order' => 'ASC');

                    $subcats = get_categories(array('post_type'=>'product','taxonomy' => 'product_category'));

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
                        <th>City</th>
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
                            <td><?php $wp_term_object = get_the_terms(get_the_ID(), 'product_category')[0];
                                echo $wp_term_object->name; ?></td>
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


                //                code cut here

                ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
