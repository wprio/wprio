<?php get_header(); ?>
	<div class="container">
		<header class="blog-header">
			<h1>Blog da comunidade carioca de WordPress</h1>
			<p>Blog para falar das novidades do CMS mais lindão do mundo e tudo o que rola sobre a Comunidade da Cidade Maravilhosa que sabe tudo e mais um pouco de WordPress.<strong>Assine o nosso blog e fique por dentro de todos os eventos da comunidade WP-Rio.</strong></p>
		</header><!-- .blog-header -->
		
		<section class="blog-entries">
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<article class="entry">
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<span class="entry-meta">
						Publicado por <?php the_author(); ?>
						em <?php the_date(); ?> na categoria <?php the_category(', '); ?>
					</span>
					<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry-image">
						<?php the_post_thumbnail( 'entry-large' ); ?>
					</figure>
					<?php endif; ?>
					<?php the_excerpt(); ?>
					<a class="entry-comments" href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
				</article>
			<?php endwhile; else : ?>
				<p>Desculpe, mas ainda não há posts neste blog! :(</p>
			<?php endif; ?>
		</section><!-- .blog-entries -->
	</div><!-- .container -->
<?php get_footer(); ?>