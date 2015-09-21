<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Certificados - WordCamp RJ 2015</title>
</head>
<body>
	<form action="submit.php" method="get">
		<label for="certificate-email">Digite seu e-mail:</label>
		<input id="certificate-email" type="email" placeholder="seuemail@email.com">
		<button type="submit">Gerar meu certificado!</button>
	</form>
</body>
</html>

<?php
/*
 * Template: Certificado
 */

get_header(); ?>
<div class="container">
	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>

					<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							<?php odin_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>

					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="entry-image">
							<?php the_post_thumbnail( 'entry-large' ); ?>
						</figure>
					<?php endif; ?>
				</header><!-- .entry-header -->

				<?php if ( is_search() ) : ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				<?php else : ?>
					<div class="entry-content">
						<?php
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
							?>
					</div><!-- .entry-content -->
				<?php endif; ?>

				<footer class="entry-meta">
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
						<span class="cat-links"><?php echo __( 'Posted in:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) ); ?></span>
					<?php endif; ?>
					<?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'odin' ) . ' ', ', ', '</span>' ); ?>
					<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'odin' ), __( '1 Comment', 'odin' ), __( '% Comments', 'odin' ) ); ?></span>
					<?php endif; ?>
				</footer>
			</article><!-- #post-## -->
		<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- .container -->
<?php get_footer(); ?>