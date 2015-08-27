<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<footer class="main-footer">
	<div class="container">
	    <span class="copyright">Comunidade WordPress Rio de Janeiro &copy;</span>
	    <span class="credits">
	    	Código é poesia
	    	<?php
	    		$social = get_field( 'social-icons', 'options' );
	    		if ( have_rows( 'social-icons', 'options' ) ) :
	    	?>
	    	<ul class="social-medias">
	    		<?php while ( have_rows( 'social-icons', 'options' ) ) : the_row(); ?>
				<li><a href="<?php the_sub_field( 'link-icon', 'options' ); ?>"><?php the_sub_field( 'icon-class-footer', 'options' ); ?></a></li>
				<?php endwhile; ?>
			</ul><!-- .social-medias -->
			<?php endif; ?>
	    </span>
    </div><!-- .container -->
</footer><!-- .main-footer -->

    <?php wp_footer(); ?>
</body>
</html>