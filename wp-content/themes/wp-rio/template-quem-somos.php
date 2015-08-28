<?php
/* Template Name: Quem Somos */
get_header(); ?>

	<div class="container internal">	
		<main id="main-content" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );
				endwhile;
				//wp_reset_postdata();
			?>
			<?php 
				$team = get_field('equipe', $post->ID);
				if ( $team ):
			?>
					<hr />
					<section class="players">
						<h2>Escala&ccedil;&atilde;o do time WP-Rio</h2>
						<?php
							foreach ( $team as $post ) : setup_postdata( $post );
						?>		<div class="row">
									<div class="col-md-4">
										<?php echo get_field($post->ID, 'foto-perfil'); ?>
									</div>
									<div class="col-md-8">
										<h3 class="post-title">
											<?php echo get_field($post->ID, 'nome-pessoa'); ?>
										</h3>

										<p>
											<?php echo get_field($post->ID, 'descricao'); ?>
										</p>
									</div>
								</div>
						<?php
								
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
