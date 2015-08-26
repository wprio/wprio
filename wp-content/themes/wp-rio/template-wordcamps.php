<?php
/**
 * Template Name: Template Wordcamps
 * The Template for displaying all wordcamps
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<section class="full-banner">
		<?php if ( has_post_thumbnail() ) : ?>
		
		<?php endif; ?>
	</section><!-- .header-caption -->

	<div class="container internal">	
		<main id="main-content" class="site-main" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					
				endwhile;
			?>
		</main><!-- #main -->
	</div>

<?php
get_footer();
