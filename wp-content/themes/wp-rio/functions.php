<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Roboto Font Family
	wp_enqueue_style( 'roboto-family', '//fonts.googleapis.com/css?family=Roboto:300,300italic,400,400italic,500,500italic,700,700italic', array(), null, 'all' );

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// General scripts.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		// Bootstrap.
		wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

		// Main jQuery.
		wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	} else {
		// Grunt main file with Bootstrap, FitVids and others libs.
		wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );
	}

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}

// Register Custom Post Type
function cpt_wordcamps() {

	$labels = array(
		'name'                => _x( 'WordCamps', 'text_domain' ),
		'singular_name'       => _x( 'WordCamp', 'text_domain' ),
		'menu_name'           => __( 'WordCamps', 'text_domain' ),
		'name_admin_bar'      => __( 'WordCamps', 'text_domain' ),
		'parent_item_colon'   => __( 'WordCamp Pai', 'text_domain' ),
		'all_items'           => __( 'Todos os WordCamp', 'text_domain' ),
		'add_new_item'        => __( 'Adicionar novo WordCamp', 'text_domain' ),
		'add_new'             => __( 'Adicionar novo', 'text_domain' ),
		'new_item'            => __( 'Adicionar novo', 'text_domain' ),
		'edit_item'           => __( 'Editar WordCamp', 'text_domain' ),
		'update_item'         => __( 'Atualizar WordCamp', 'text_domain' ),
		'view_item'           => __( 'Ver WordCamp', 'text_domain' ),
		'search_items'        => __( 'Buscar WordCamp', 'text_domain' ),
		'not_found'           => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'  => __( 'Não Encontrado na Lixeira', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Post Type', 'text_domain' ),
		'description'         => __( 'Postagens sobre os WordCamp', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'taxonomies'          => array( ),
		'menu_icon'			  => 'dashicons-wordpress',
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'wordcamps', $args );

}
add_action( 'init', 'cpt_wordcamps', 0 );

function cpt_meetups() {

	$labels = array(
		'name'                => _x( 'Meetups', 'text_domain' ),
		'singular_name'       => _x( 'Meetup', 'text_domain' ),
		'menu_name'           => __( 'Meetups', 'text_domain' ),
		'name_admin_bar'      => __( 'Meetups', 'text_domain' ),
		'parent_item_colon'   => __( 'Meetup Pai', 'text_domain' ),
		'all_items'           => __( 'Todos os Meetups', 'text_domain' ),
		'add_new_item'        => __( 'Adicionar novo Meetup', 'text_domain' ),
		'add_new'             => __( 'Adicionar novo', 'text_domain' ),
		'new_item'            => __( 'Adicionar novo', 'text_domain' ),
		'edit_item'           => __( 'Editar Meetup', 'text_domain' ),
		'update_item'         => __( 'Atualizar Meetup', 'text_domain' ),
		'view_item'           => __( 'Ver Meetup', 'text_domain' ),
		'search_items'        => __( 'Buscar Meetup', 'text_domain' ),
		'not_found'           => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'  => __( 'Não Encontrado na Lixeira', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Post Type', 'text_domain' ),
		'description'         => __( 'Postagens sobre os Meetups', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'taxonomies'          => array( ),
		'menu_icon'			  => 'dashicons-wordpress-alt',
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'meetups', $args );

}
add_action( 'init', 'cpt_meetups', 0 );

// Register Custom Taxonomy
function taxonomy_cidades_wordcamp() {

	$labels = array(
		'name'                       => _x( 'Cidades', 'Taxonomy General Name', 'wp-rio-locale' ),
		'singular_name'              => _x( 'Cidade', 'Taxonomy Singular Name', 'wp-rio-locale' ),
		'menu_name'                  => __( 'Cidades', 'wp-rio-locale' ),
		'all_items'                  => __( 'Todas as Cidades', 'wp-rio-locale' ),
		'parent_item'                => __( 'Cidade Pai', 'wp-rio-locale' ),
		'parent_item_colon'          => __( 'Cidade Pai:', 'wp-rio-locale' ),
		'new_item_name'              => __( 'Nova Cidade', 'wp-rio-locale' ),
		'add_new_item'               => __( 'Adicionar Cidade', 'wp-rio-locale' ),
		'edit_item'                  => __( 'Editar Cidade', 'wp-rio-locale' ),
		'update_item'                => __( 'Atualizar Cidade', 'wp-rio-locale' ),
		'view_item'                  => __( 'Ver Cidade', 'wp-rio-locale' ),
		'separate_items_with_commas' => __( 'Separar cidades por vírgulas', 'wp-rio-locale' ),
		'add_or_remove_items'        => __( 'Adicionar ou Remover Cidades', 'wp-rio-locale' ),
		'choose_from_most_used'      => __( 'Escolher as mais usadas', 'wp-rio-locale' ),
		'popular_items'              => __( 'Cidades Populares', 'wp-rio-locale' ),
		'search_items'               => __( 'Buscar Cidades', 'wp-rio-locale' ),
		'not_found'                  => __( 'Não Encontrado', 'wp-rio-locale' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'cidades', array( 'meetups','wordcamps' ), $args );

}
add_action( 'init', 'taxonomy_cidades_wordcamp', 0 );

// Chamadas do ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

if( function_exists('register_field_group') ){
	register_field_group(array (
		'key' => 'group_55d545658bc53',
		'title' => 'Meetups',
		'fields' => array (
			array (
				'key' => 'field_55d545663c3f3',
				'label' => 'Local',
				'name' => 'local-meetup',
				'prefix' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_55d545663c7db',
				'label' => 'Link do site oficial',
				'name' => 'link-meetup',
				'prefix' => '',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
			),
			array (
				'key' => 'field_55d545663c853',
				'label' => 'Palestras',
				'name' => 'palestras-meetup',
				'prefix' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'min' => '',
				'max' => '',
				'layout' => 'row',
				'button_label' => 'Adicionar Nova Palestra',
				'sub_fields' => array (
					array (
						'key' => 'field_55d54567d1208',
						'label' => 'Imagem de Capa',
						'name' => 'imagem-capa-meetup',
						'prefix' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'return_format' => 'id',
						'preview_size' => 'full',
						'library' => 'uploadedTo',
					),
					array (
						'key' => 'field_55d54567d1684',
						'label' => 'Link',
						'name' => 'link-palestra-meetup',
						'prefix' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
					),
					array (
						'key' => 'field_55d54567d16ff',
						'label' => 'Título',
						'name' => 'titulo-meetup',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_55d54567d17d0',
						'label' => 'Descrição',
						'name' => 'descricao-meetup',
						'prefix' => '',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'meetups',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	register_field_group(array (
		'key' => 'group_55d546478739d',
		'title' => 'Quem Somos',
		'fields' => array (
			array (
				'key' => 'field_55d546fa6796e',
				'label' => 'Equipe',
				'name' => 'equipe',
				'prefix' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'min' => '',
				'max' => '',
				'layout' => 'row',
				'button_label' => 'Adicionar Linha',
				'sub_fields' => array (
					array (
						'key' => 'field_55d5470a6796f',
						'label' => 'Nome',
						'name' => 'nome-pessoa',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_55d5473c67970',
						'label' => 'Foto Perfil',
						'name' => 'foto-perfil',
						'prefix' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_55d5478b67971',
						'label' => 'Descrição',
						'name' => 'descricao',
						'prefix' => '',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
					),
					array (
						'key' => 'field_55d547f667972',
						'label' => 'Ícones Sociais',
						'name' => 'ícones-sociais',
						'prefix' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'min' => '',
						'max' => '',
						'layout' => 'row',
						'button_label' => 'Adicionar Linha',
						'sub_fields' => array (
							array (
								'key' => 'field_55d5481367973',
								'label' => 'Classe do ícone',
								'name' => 'classe-icone',
								'prefix' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
								'readonly' => 0,
								'disabled' => 0,
							),
							array (
								'key' => 'field_55d5484367974',
								'label' => 'Link da Rede',
								'name' => 'link-rede',
								'prefix' => '',
								'type' => 'url',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
							),
						),
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-quem-somos.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	register_field_group(array (
		'key' => 'group_55d53f4acc7a6',
		'title' => 'Rodapé',
		'fields' => array (
			array (
				'key' => 'field_55d541b66741a',
				'label' => 'Exibir ícones sociais',
				'name' => 'show-icons',
				'prefix' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_55d53f5172fd4',
				'label' => 'Ícones Sociais',
				'name' => 'social-icons',
				'prefix' => '',
				'type' => 'repeater',
				'instructions' => 'Adicionar a classe do glyphicon do Bootstrap - <a href="http://getbootstrap.com/components/#glyphicons" target="_blank">http://getbootstrap.com/components/#glyphicons</a>',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_55d541b66741a',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'min' => '',
				'max' => '',
				'layout' => 'row',
				'button_label' => 'Adicionar Novo',
				'sub_fields' => array (
					array (
						'key' => 'field_55d53fdb9c517',
						'label' => 'Classe do ícone',
						'name' => 'icon-class',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_55d540539c518',
						'label' => 'Link',
						'name' => 'link-icon',
						'prefix' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	register_field_group(array (
		'key' => 'group_55d54a251c30f',
		'title' => 'Texto do Archive Meetup',
		'fields' => array (
			array (
				'key' => 'field_55d54a4803200',
				'label' => 'Título',
				'name' => 'titulo-archive-meetups',
				'prefix' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_55d54a5703201',
				'label' => 'Descrição',
				'name' => 'descricao-archive-meetups',
				'prefix' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	register_field_group(array (
		'key' => 'group_55d54a74bcb52',
		'title' => 'Texto do Archive WordCamps',
		'fields' => array (
			array (
				'key' => 'field_55d54a74d3561',
				'label' => 'Título',
				'name' => 'titulo-archive-wordcamps',
				'prefix' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_55d54a74d3610',
				'label' => 'Descrição',
				'name' => 'descricao-archive-wordcamps',
				'prefix' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	register_field_group(array (
		'key' => 'group_55d54382149e9',
		'title' => 'WordCamps',
		'fields' => array (
			array (
				'key' => 'field_55d5443f42885',
				'label' => 'Local',
				'name' => 'local-wordcamp',
				'prefix' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_55d5444e42886',
				'label' => 'Link do site oficial',
				'name' => 'link-wordcamp',
				'prefix' => '',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
			),
			array (
				'key' => 'field_55d544a942887',
				'label' => 'Palestras',
				'name' => 'palestras-wordcamp',
				'prefix' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'min' => '',
				'max' => '',
				'layout' => 'row',
				'button_label' => 'Adicionar Nova Palestra',
				'sub_fields' => array (
					array (
						'key' => 'field_55d544c142888',
						'label' => 'Imagem de Capa',
						'name' => 'imagem-wordcamp',
						'prefix' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'return_format' => 'id',
						'preview_size' => 'full',
						'library' => 'uploadedTo',
					),
					array (
						'key' => 'field_55d544cf42889',
						'label' => 'Link',
						'name' => 'link-wordcamp',
						'prefix' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
					),
					array (
						'key' => 'field_55d544da4288a',
						'label' => 'Título',
						'name' => 'titulo-wordcamp',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_55d544e34288b',
						'label' => 'Descrição',
						'name' => 'descricao-wordcamp',
						'prefix' => '',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'column_width' => '',
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'wordcamps',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));
}

define( 'ACF_LITE' , true );