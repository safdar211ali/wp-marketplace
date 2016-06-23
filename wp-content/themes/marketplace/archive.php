<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php
//                when all posts of all cities are fetched
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
<!--                     when all posts are fetched-->
                    <div class="form-group">
                    <p>List of <span style="color: #337AB7;"><?php echo get_term($category_ID)->name;?></span></p>

                        <select id="optlist" class="form-control"   onchange="location = this.options[this.selectedIndex].value;">
                            <option value="">Select City شہر منتخب کریں</option>
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
        //  when all posts of a city subcategory are fetched fetched
                    $queried_obj = get_queried_object();
                    $parent_cat_ID = $queried_obj->parent;
                    $args = array(

                        'hierarchical' => 1,

                        'show_option_none' => '',

                        'hide_empty' => 0,

                        'parent' => $parent_cat_ID,

                        'taxonomy' => 'product_category'

                    );

                    $subcats = get_categories($args);

                    ?>

                    <div class="form-group">
                        <p>List of <span style="color: #337AB7;"><?php echo get_term( $parent_cat_ID )->name;?></span> in <span style="color: #337AB7;"><?php echo $queried_obj->name ?></span></p>

                        <select id="optlist2" class="form-control"
                                onchange="location = this.options[this.selectedIndex].value;">
                            <option value="">Select City شہر منتخب کریں</option>
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
