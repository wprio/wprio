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
				
				if ( have_rows('equipe') ):
			?>
					<hr />
					<section class="players">
						<h2>Escala&ccedil;&atilde;o do time WP-Rio</h2>
						<?php
							while( have_rows('equipe') ): the_row();
						?>		<div class="row">
									<div class="col-sm-4">
										<?php 
											$image_url = wp_get_attachment_image_src( get_sub_field('foto-perfil'), 'full' );
											echo "<img src='".$image_url[0]."' title='".get_sub_field('nome-pessoa')."' alt='".get_sub_field('nome-pessoa')."' />";
										?>
									</div>
									<div class="col-sm-8">
										<h3 class="post-title">
											<?php the_sub_field('nome-pessoa'); ?>
										</h3>

										<p>
											<?php the_sub_field('descricao'); ?>
										</p>
										<?php 
											if( have_rows('ícones-sociais') ): ?>
												<ul class="equipe-social">
												<?php 
													while( have_rows('ícones-sociais') ): the_row(); ?>
													<li><a href="<?php the_sub_field( 'link-rede' ); ?>" target="_blank" rel="external"><?php the_sub_field( 'classe-icone' ); ?></a></li>
												<?php 
													endwhile; 
												?>
												</ul>
											<?php endif; //if( get_sub_field('items') ): ?>
									</div>
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
