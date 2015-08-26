<?php
/**
 * Template Name: Template Meetups
 * The Template for displaying all meetups
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<section class="full-banner">
		<?php if ( has_post_thumbnail() ) : ?>
		
		<?php endif; ?>
	</section><!-- .header-caption -->

	<div class="container wordcamps internal">	
		<main id="main-content" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );
				endwhile;
			?>
			<?php 
				$wordcamps = new WP_Query(['post_type' => 'meetups']);
				if ( $wordcamps->have_posts() ):
			?>
					<hr />
					<section class="events">
						<h2>ÚLTIMOS EDIÇÕES DO MEETUP CARIOCA</h2>
						<?php
							
							while ( $wordcamps->have_posts() ) : $wordcamps->the_post();
						?>
							<div class="col-md-4">
							<?php 
								if ( has_post_thumbnail() ) {
									echo '<a href="<?php the_permalink(); ?>">';
									the_post_thumbnail('partners-thumb');
									echo '</a>';
								}
							?>	
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>

						<?php
							endwhile;
						?>
					</section>
			<?php
				endif;
			?>
		</main><!-- #main -->
	</div>

<?php
get_footer();
