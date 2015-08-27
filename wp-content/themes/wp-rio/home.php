<?php get_header(); ?>
	<div class="container">
	<h1>Blog da comunidade carioca de WordPress</h1>
	<p>Blog para falar das novidades do CMS mais lindão do mundo e tudo o que rola sobre a Comunidade da Cidade Maravilhosa que sabe tudo e mais um pouco de WordPress.<strong>Assine o nosso blog e fique por dentro de todos os eventos da comunidade WP-Rio.</strong></p>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php if ( has_post_thumbnail() ) : ?>
			<figure class="entry-image">
				<?php the_post_thumbnail( 'entry-large' ); ?>
			</figure>
			<?php endif; ?>
			<p class="entry-excerpt"><?php the_excerpt(); ?></p>
		</article>
	<?php endwhile; else : ?>
	<p>Desculpe, mas ainda não há posts neste blog! :(</p>
	<?php endif; ?>
	</div>
<?php get_footer(); ?>