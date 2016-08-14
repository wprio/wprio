<?php
/**
 * The template for displaying Meetups CPT Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div class="container wordcamps internal">	
		<main id="main-content" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php the_field( 'titulo-archive-meetups', 'options' ); ?></h1>

				<div class="entry-content">
					<?php
						the_field( 'descricao-archive-meetups', 'options' );
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<?php
				$args = new WP_query(
				    array(
				        'post_type'         => 'meetups', // cpt
				        'posts_per_page'    => -1,
				        'paged'             => $paged
				    )
				);
			?>			

			<?php if ( $args->have_posts() ): ?>
				<hr />
				<section class="events">
					<h2>ÚLTIMAS EDIÇÕES DO MEETUP CARIOCA</h2>
					<?php while ( $args->have_posts() ) : $args->the_post(); ?>	
						<div class="col-xs-6 col-sm-4">
							<?php 
								if ( has_post_thumbnail() ) {
									echo '<a href="'.get_the_permalink().'">';
									the_post_thumbnail('partners-thumb');
									echo '</a>';
								}
							?>	
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>		
					<?php endwhile; ?>
				</section>

			<?php endif; wp_reset_postdata(); ?>
		</main><!-- #main -->
	</div>

<?php
get_footer();
