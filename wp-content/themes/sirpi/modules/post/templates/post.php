<?php
	$post_style = sirpi_get_single_post_style( get_the_ID() );

	$template_args['ID'] = get_the_ID();
	$template_args['Post_Style'] = $post_style; ?>

	<!-- Primary -->
	<section id="primary" class="<?php echo esc_attr( sirpi_get_primary_classes() ); ?>">
	<?php
	    do_action( 'sirpi_before_single_post_content_wrap' );

	    if( have_posts() ) {
	        while( have_posts() ) {
	            the_post();?>
	            <!-- #post-<?php the_ID(); ?> -->
	            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	                <?php echo sirpi_get_template_part( 'post', 'templates/'.$post_style.'/post', '', $template_args ); ?>
	            </article><!-- #post-<?php the_ID(); ?> --><?php
	        }
	    }

	    do_action( 'sirpi_after_single_post_content_wrap', $template_args['ID'] );?>
	</section><!-- Primary End -->
	<?php sirpi_template_part( 'sidebar', 'templates/sidebar' ); ?>