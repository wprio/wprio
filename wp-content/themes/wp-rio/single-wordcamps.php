<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div class="container wordcamps internal single">	
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

					$slides = get_field('slides-palestras');

					if ($slides):
						echo "<hr />";
						echo "<section class=\"events\"><h2>Acesse todos os slides desse WordCamp</h2>";
						foreach( $slides as $slide ):
							echo "<div class='col-md-4'>";
								if ( has_post_thumbnail() ) {
									echo get_the_post_thumbnail($slide->ID, 'partners-thumb');
									
								}
								$link_slide = get_field('link-slide', $slide->ID);
								echo "<h3><a href='".$link_slide."' target='_blank'>".get_the_title($slide->ID)."</a></h3>";
							echo "</div></section>";
						endforeach;
					endif;
					
				

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</main><!-- #main -->

	</div>

<?php
get_footer();
?>