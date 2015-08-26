<?php get_header(); ?>

	<?php $destaque = get_field( 'destaque-home', 'options' ); ?>
	<?php if ( $destaque ) : ?>
	<section class="welcome-banner">
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
	</section><!-- .header-caption -->
	<?php endif; ?>

	<div class="container">
		<?php
			$events_args = array( 'post_type' => 'wordcamps', 'edit_posts_per_page' => 1 );
			$events = new WP_Query( $events_args );
			if ( $events->have_posts() ) :
		?>
		<section class="next-event">
			<!-- events loop -->
			<?php while ( $events->have_posts() ) : $events->the_post(); ?>
			<article class="event">
				<figure class="event-image">
					<?php the_post_thumbnail( 'entry-thumb' ); ?>
				</figure>
				<div class="event-content">
					<h3 class="event-title"><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-default">Saiba mais desse evento</a>
				</div>
			</article><!-- .event -->
			<?php endwhile; ?>
		</section><!-- .next-event -->
		<?php endif; ?>
		
		<?php
			$meetups_args = array( 'post_type' => 'meetups', 'edit_posts_per_page' => 1 );
			$meetups = new WP_Query( $meetups_args );
			if ( $meetups->have_posts() ) :
		?>
		<section class="last-meetup">
			<?php while ( $meetups->have_posts() ) : $meetups->the_post(); ?>
			<article class="meetup">
				<figure class="meetup-image">
					<?php the_post_thumbnail( 'entry-thumb' ); ?>
				</figure>
				<div class="meetup-content">
					<h3 class="meetup-title"><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-default">Saiba mais desse evento</a>
				</div>
			</article>

			<?php if ( have_rows( 'palestras-meetup' ) ) : ?>
			<div class="slides">
				<h3>Procurando os slides desse encontro?</h3>

				<div class="slides-container">
					<?php while ( have_rows( 'palestras-meetup' ) ) : ?>
					<div class="slide">
						<figure class="slide-image">
							<?php the_sub_field( 'imagem-capa-meetup' ); ?>
						</figure>
						<h4 class="slide-title"><?php the_sub_field( 'titulo-meetup' ); ?></h4>
					</div>
					<?php endwhile; ?>
				</div>
			</div><!--.slides -->
			<?php endif; ?>

			<?php endwhile; ?>
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
					<a href="<?php the_sub_field( 'link-parceiro', 'options' ); ?>" title="<?php the_sub_field( 'nome-parceiro', 'options' ); ?>">
					<img src="<?php echo $partner_logo['url']; ?>" alt="<?php the_sub_field( 'nome-parceiro', 'options' ); ?>">
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>

			<p>Quer colaborar com a Comunidade WordPress Carioca?</p>
		</section><!-- .partners -->
		<?php endif; ?>

		<section class="contact-area">
			<div class="contact-wrapper">
				<div class="blog">
					<h2>Direto do blog</h2>

					<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<article class="blog-entry">
						<figure class="blog-entry-image">
							<?php the_post_thumbnail( 'entry-thumb' ); ?>
						</figure>
						<h3 class="blog-entry-title"><?php the_title(); ?></h3>
						<p class="blog-entry-excerpt"><?php the_excerpt(); ?></p>
						<a class="btn btn-default" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Leia esse artigo completo</a>
					</article><!-- .blog-entry -->
					<?php endwhile; else : ?>
					<p>Desculpe, mas nenhum post foi encontrado. :(</p>
					<?php endif; ?>
				</div><!-- .blog -->

				<div class="contact">
					<h2>Nossas Redes</h2>
					<ul class="social-medias">
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Google +</a></li>
						<li><a href="#">Instagram</a></li>
						<li><a href="#">Meetup</a></li>
						<li><a href="#">GitHub</a></li>
						<li><a href="#">YouTube</a></li>
					</ul><!-- .social-medias -->

					<h2>Fale com a comunidade</h2>
					<!-- formulario -->
				</div><!-- .contact -->
			</div><!-- .contact-wrapper -->
		</section><!-- .contact-area -->
	</div><!-- .container -->

<?php get_footer(); ?>