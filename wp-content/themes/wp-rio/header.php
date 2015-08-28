<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="9Ms0xe7SDf46KRJFPVCpyZpXu_MBKedoBR8Quf1bPzc" />
</head>
<body <?php body_class(); ?>>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-66888786-1', 'auto');
      ga('send', 'pageview');

    </script>
    <nav class="main-nav">
        <a id="logo" href="<?php echo home_url( '/' ); ?>" title="Ir para Home">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="Logo WP Rio">
        </a>
        <?php
            if ( has_nav_menu( 'main-menu' ) ) :
                $defaults = array(
                    'theme_location'  => 'main-menu',
                    'container'       => false,
                    'menu_class'      => 'menu',
                    'depth'           => 1,
                );

                wp_nav_menu( $defaults );

            else :
        ?>
            <ul class="menu">
                <li class="menu-item"><a href="<?php echo admin_url( 'nav-menus.php' ); ?>">Adicione um menu</a></li>
            </ul>
        <?php endif; ?>
    </nav><!-- .main-nav -->

    <?php if ( ! is_front_page() ) : ?>
    <div class="context-banner"></div>
    <?php endif; ?>