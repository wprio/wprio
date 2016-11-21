<?php
/**
 * Template Name: Template Comunidade
 * The Template for displaying all meetups
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div class="container internal">	
		<main id="main-content" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );
				endwhile;
			?>
			<?php 
				global $wpdb;
				$query = "SELECT ID, user_nicename from $wpdb->users ORDER BY user_nicename";
				$author_ids = $wpdb->get_results($query);
				if ( $author_ids ):
			?>
					<hr />
					<section class="players">
						<h2>Escala&ccedil;&atilde;o do time WP-Rio</h2>
						<?php
							
							foreach($author_ids as $author) :
								
								$curauth = get_userdata($author->ID);
								
								if($curauth->user_level > 0 || $curauth->user_login == 'admin') :
									$user_link = get_author_posts_url($curauth->ID);
									$avatar = 'wavatar';

						?>		<div class="row">

									<div class="col-sm-4">
										<?php echo get_avatar($curauth->user_email, '224', $avatar); ?>
									</div>
									<div class="col-sm-8">
										<h3 class="post-title"><?php echo $curauth->display_name; ?></h3>

										<p><?php echo $curauth->description; ?></p>
									</div>
								</div>
						<?php
								endif;
							endforeach;
						?>
					</section>
			<?php
				endif;
			?>
		</main><!-- #main -->
	</div>

<?php
get_footer();
