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
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="9Ms0xe7SDf46KRJFPVCpyZpXu_MBKedoBR8Quf1bPzc" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?>>
    <nav class="main-nav">
        <a id="logo" href="<?php echo home_url( '/' ); ?>" title="Ir para Home">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="Logo WP Rio">
        </a>
        <button type="button" class="menu-toggle navbar-toggle collapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
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
