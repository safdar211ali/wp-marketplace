<?php get_header(); ?>
	<div id="primary" class="container content-area">
	<div class="row" id="content" class="site-content" role="main">
	<div class="col-md-10">
	<div class="row">
		<div class="section-title text-center">
			<h3>Search Result</h3>

		</div>
	</div>
	<div class="row">


    
	<?php
    while ( have_posts() ) : the_post();
	
		//Content includes shortcode (only remove if you are calling it directly in your template)
		the_content();
		
	endwhile;
	
	//Reset postdata (avoid potential conflicts)
	wp_reset_postdata();
	?>
	</div><!-- /.row -->
	</div>
		<div class="col-md-2">
			<?php get_sidebar() ?>
		</div>

	</div>
	</div>

<?php get_footer(); ?>