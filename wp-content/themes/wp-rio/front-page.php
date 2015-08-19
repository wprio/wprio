<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>WP Rio</title>
	<?php wp_head(); ?>
</head>
<body>
	<header class="main-header">
		<nav class="main-nav">
			<a id="logo" href="<?php echo home_url( '/' ); ?>" title="Ir para Home">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="Logo WP Rio">
			</a>
			<ul class="menu">
				<li class="menu-item"><a href="#">WordPress</a></li>
				<li class="menu-item"><a href="#">Meetups</a></li>
				<li class="menu-item"><a href="#">WordCamps</a></li>

				<!-- float invertido, ordem inversa -->
				<li class="menu-item"><a href="#">Contato</a></li>
				<li class="menu-item"><a href="#">Blog</a></li>
				<li class="menu-item"><a href="#">Comunidade</a></li>
			</ul><!-- .menu -->
		</nav><!-- .main-nav -->

		<div class="header-caption">
			Lorem ipsum dolor sit amet, consectetur adipisicing.
			<a class="header-button" href="#">Leia o nosso manifesto</a>
		</div><!-- .header-caption -->
	</header><!-- .main-header -->

	<section class="main-section">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
		Error commodi omnis porro, expedita quia velit.</p>
	</section><!-- .main-section -->

	<section class="contact-area">
		<div class="blog">
			<h3>Direto do blog</h3>
			<article class="blog-entry">
				<figure class="blog-entry-image"></figure>
				<h4 class="blog-entry-title">O juíz apita e começa a partida</h4>
				<p class="blog-entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, ratione.</p>
				<a class="blog-entry-link" href="#">Leia esse artigo completo</a>
			</article><!-- .blog-entry -->
		</div><!-- .blog -->

		<div class="contact">
			<h3>Nossas Redes</h3>
			<ul class="social-medias">
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Twitter</a></li>
				<li><a href="#">Google +</a></li>
				<li><a href="#">Instagram</a></li>
				<li><a href="#">Meetup</a></li>
				<li><a href="#">GitHub</a></li>
				<li><a href="#">YouTube</a></li>
			</ul><!-- .social-medias -->

			<h3>Fale com a comunidade</h3>
			<!-- formulario -->
		</div><!-- .contact -->
	</section><!-- .contact-area -->

	<footer class="main-footer">
		<span class="copyright">Comunidade WordPress Rio de Janeiro &copy;</span>
		<span class="credits">Código é poesia</span>
	</footer><!-- .main-footer -->

	<?php wp_footer(); ?>
</body>
</html>