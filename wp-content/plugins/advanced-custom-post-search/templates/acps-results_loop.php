<?php
//New results loop
$acps_results = new WP_Query( $this->acps_args );

$search = ( isset($this->acps_args['s']) ) ? true : false ;

//Standard loop
if( $acps_results->have_posts() ): ?>

<?php $acps_result_label = ($acps_results->post_count > 1) ? 'Results' : 'Result'; ?>

<header class="page-header">
    <?php if( $search ): ?>
      <h1 class="page-title"><?php printf( __( '%s Search %s for: %s', 'acps' ), $acps_results->post_count, $acps_result_label, $this->acps_args['s'] ); ?></h1>
    <?php else: ?>
        <h1 class="page-title"><?php _e('Search Results','acps');?></h1>
    <?php endif; ?>
</header>
    <table class="table table-bordered table-hover">
    <thead style="color: #337AB7;font-weight: bold;">
    <tr>
        <td>Item Name</td>
        <td>Min Rate</td>
        <td>Max Rate</td>

    </tr>
    </thead>
    <tbody>
<?php while( $acps_results->have_posts() ) : $acps_results->the_post(); ?>
    
                <tr>
                    <td><?php echo the_title(); ?></td>
                    <td><?php echo the_field('MinRate'); ?></td>
                    <td><?php echo the_field('MaxRate'); ?></td>
                 
                </tr>



    <?php
    endwhile;
    ?>

        </tbody>
        </table>
    <?php
    else:
    ?>


    <header class="page-header">
        <h1 class="page-title"><?php _e( 'Nothing Found', 'acps' ); ?></h1>
    </header>
    
    <div class="page-content">
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'acps' ); ?></p>
        <?php echo do_shortcode('[acps id="'.$this->acps_form_id.'"]'); ?>
    </div>

<?php
endif;
?>





