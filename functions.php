<?php
	add_action( 'after_setup_theme', 'theme_setup' );
	
	function theme_setup(){
		load_theme_textdomain( 'federalescrow', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		
		add_image_size( 'fe_headshot', 300, 340, true ); // (cropped)
		
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 640;
			register_nav_menus(
				array( 'main-menu' => __( 'Main Menu', 'federalescrow' ) )
			);
	}

	add_action( 'wp_enqueue_scripts', 'load_scripts' );
	
	function load_scripts(){
		wp_enqueue_script( 'jquery' );
	}
	
	add_filter( 'the_title', 'fe_title' );
	
	function fe_title( $title ) {
		if ( $title == '' ) {
			return '&rarr;';
		} else {
			return $title;
		}
	}

	add_filter( 'wp_title', 'fe_filter_wp_title' );
	
	function fe_filter_wp_title( $title ){
		return $title . esc_attr( get_bloginfo( 'name' ) );
	}

	add_action( 'widgets_init', 'fe_widgets_init' );
	
	function fe_widgets_init(){
		register_sidebar( array (
			'name' => __( 'Sidebar Widget Area', 'federalescrow' ),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</li>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}