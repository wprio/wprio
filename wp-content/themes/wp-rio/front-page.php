<?php get_header(); ?>
	<section class="welcome-banner">
		<?php $destaque = get_field( 'destaque-home', 'options' ); ?>
		<?php if ( $destaque ) : ?>
		<div class="banner-caption">
			<div class="banner-container">
				<div class="banner-wrapper">
					<?php the_field( 'texto-destaque-home', 'options' ); ?>
					
					<?php if ( get_field( 'botao-destaque-home', 'options' ) ) : ?>
					<a class="btn btn-primary btn-lg btn-banner" href="<?php the_field( 'link-botao-home', 'options' ); ?>">
						<?php the_field( 'texto-botao-home', 'options' ); ?>
					</a>
					<?php endif; ?>
				</div><!-- .banner-wrapper -->
			</div><!-- .banner-container -->
		</div><!-- .banner-caption -->
		<?php endif; ?>
	</section><!-- .header-caption -->

	<div class="container">
		<?php
			$events = get_field( 'objeto-proximo-evento', 'options' ); 
			if ( $events && get_field( 'exibir-proximo-evento', 'options' ) ) :
		?>
		<section class="next-event">
			<h2><?php the_field( 'titulo-proximo-evento', 'options' ); ?></h2>
			
			<?php foreach ( $events as $post ) : setup_postdata( $post ); ?>
			<article class="event">
				<div class="row">
					<figure class="event-image">
						<?php the_post_thumbnail( 'entry-thumb' ); ?>
					</figure>
					<div class="event-content">
						<h3 class="event-title"><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-default">Saiba mais desse evento</a>
					</div>
				</div>
			</article><!-- .event -->
			<?php endforeach; wp_reset_postdata(); ?>
		</section><!-- .next-event -->
		<?php endif; ?>
		
		<?php
			$meetups = get_field( 'objeto-evento-passado', 'options' ); 
			if ( $meetups && get_field( 'exibir-evento-passado', 'options' ) ) :
		?>
		<section class="last-meetup">
			<h2><?php the_field( 'titulo-evento-passado', 'options' ); ?></h2>

			<?php foreach ( $meetups as $post ) : setup_postdata( $post ); ?>
			<article class="meetup">
				<div class="row">
					<figure class="meetup-image">
						<?php the_post_thumbnail( 'entry-thumb' ); ?>
					</figure>
					<div class="meetup-content">
						<h3 class="meetup-title"><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-default">Saiba mais desse evento</a>
					</div>
				</div>

				<?php
					$slides = get_field( 'objeto-evento-passado', 'options' ); 
					if ( $slides && get_field( 'exibir-slides', 'options' ) ) :
				?>
				<div class="slides">
					<h3><?php the_field( 'titulo-slides', 'options' ); ?></h3>

					<div class="row">
						<?php foreach ( $slides as $post ) : setup_postdata( $post ); ?>
						<a href="<?php the_field( 'link-slide' ); ?>">
						<div class="slide">
							<?php if ( has_post_thumbnail() ) : ?>
							<figure class="slide-image">
								<?php the_post_thumbnail( 'entry-thumb' ); ?>
							</figure>
							<?php endif; ?>
							<h4 class="slide-title"><?php the_title(); ?></h4>
						</div>
						</a>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
				</div><!--.slides -->
				<?php endif; ?>
			</article>
			<?php endforeach; wp_reset_postdata(); ?>
		</section><!-- .last-meetup -->
		<?php endif; ?>
		
		<?php if ( the_sub_field( 'area-de-parceiros', 'options' ) ) : ?>
		<section class="partners">
			<h2>Parceiros da comunidade</h2>

			<?php if ( have_rows( 'parceiros', 'options' ) ) : ?>
			<ul class="partners-list">
				<?php while ( have_rows( 'parceiros', 'options' ) ) : the_row(); ?>
					<?php
						$partner_logo = wp_get_attachment_image_src( get_sub_field( 'logo-parceiro', 'options' ), 'partner-thumb' );
					?>
				<li class="partner">
					<a href="<?php the_sub_field( 'link-parceiro', 'options' ); ?>">
					<img src="<?php echo $partner_logo['url']; ?>">
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>

			<p>Quer colaborar com a Comunidade WordPress Carioca?</p>
		</section><!-- .partners -->
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
		<section class="blog-area">
			<h2>Direto do blog</h2>

			<div class="row">
				<?php while( have_posts() ) : the_post(); ?>
				<article class="blog-entry">
					<?php if ( has_post_thumbnail() ) : ?>
					<figure class="blog-entry-image">
						<?php the_post_thumbnail( 'entry-thumb' ); ?>
					</figure>
					<?php endif; ?>
					<h3 class="blog-entry-title"><?php the_title(); ?></h3>
					<p class="blog-entry-excerpt"><?php the_excerpt(); ?></p>
					<a class="btn btn-default" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Leia esse artigo completo</a>
				</article><!-- .blog-entry -->
				<?php endwhile; ?>
			</div>
		</section><!-- .blog-area -->
		<?php endif; ?>
	</div><!-- .container -->

<?php get_footer(); ?>