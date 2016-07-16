<?php get_header(); ?>
	<div class="container">
		<?php if( get_field('boolean-blog','options')) {
		echo '<header class="blog-header">';
			$titulo = get_field('titulo-blog','options');
			if (!empty($titulo)){
				echo '<h1>' . $titulo . '</h1>';
			}
			$texto = get_field('descricao-blog','options');
			if (!empty($texto)){
				echo $texto;
			}
		echo '</header>';
		} ?>
		<section class="blog-entries">
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<article class="entry">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<span class="entry-meta">
						Publicado por <?php the_author(); ?>
						em <?php the_date(); ?> na categoria <?php the_category(', '); ?>
					</span>
					<picture>
						<a href="<?php the_permalink(); ?>">
		        			<?php if( has_post_thumbnail() ) the_post_thumbnail( 'entry-large', array( 'class' => 'entry-image' ) ); ?>
		        		</a>
		        	</picture>
					<?php the_excerpt(); ?>
					<a class="entry-comments" href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
				</article>
			<?php endwhile; else : ?>
				<p>Desculpe, mas ainda não há posts neste blog! :(</p>
			<?php endif; ?>
		</section><!-- .blog-entries -->
	</div><!-- .container -->
<?php get_footer(); ?>