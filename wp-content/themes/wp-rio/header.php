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
</head>
<body  <?php body_class(); ?>>
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
    </header><!-- .main-header -->