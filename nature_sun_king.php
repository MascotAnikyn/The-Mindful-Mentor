<?php

// Creating an instance of The Mindful Mentor Class
class TheMindfulMentor {
	// Constructor Function
	public function __construct(){
		
		$this->wp_hooks();
	}
	
	// Register WordPress Hooks
	public function wp_hooks(){
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'widgets_init', array( $this, 'widget_init' ) );
		add_action( 'init', array( $this, 'custom_post_types' ) );
		add_action( 'init', array( $this, 'custom_taxonomies' ) );
		add_action( 'wp_head', array( $this, 'google_analytics_tracking' ) );
		add_action( 'wp_footer', array( $this, 'custom_js' ) );
		add_action( 'wp_footer', array( $this, 'custom_css' ) );
		add_filter( 'the_content', array( $this, 'the_content_filter' ) );
		add_filter( 'template_include', array( $this, 'template_loader' ) );
		add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length' ) );
		add_filter( 'excerpt_more', array( $this, 'custom_excerpt_more' ) );
		add_filter( 'uploads_use_yearmonth_folders', array( $this, 'yearmonth_upload_folders' ) );
		add_filter( 'wp_page_menu_args', array( $this, 'page_menu_args' ) );
		add_filter( 'pre_comment_approved', array( $this, 'pre_comment_approved' ) );
		add_filter( 'get_search_form', array( $this, 'search_form' ) );
	}
 
	// Enqueue Styles
	public function enqueue_styles() {
		// enqueue style sheet
		wp_enqueue_style( 'the-mindful-mentor-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,700', array(), '1.0' );
	}
 
	// Enqueue Scripts
	public function enqueue_scripts() {
		// register/enqueue your script
		wp_register_script( 'the-mindful-mentor-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
		wp_enqueue_script( 'the-mindful-mentor-scripts' );
	}
 
	// Enqueue Admin Scripts
	public function admin_enqueue_scripts() {
		// register/enqueue your admin scripts
		wp_register_script( 'the-mindful-mentor-admin-scripts', get_template_directory_uri() . '/js/admin-scripts.js', array( 'jquery' ) );
		wp_enqueue_script( 'the-mindful-mentor-admin-scripts' );
	}
 
	// Admin Init Function
	public function admin_init() {
		// add admin actions here
		add_editor_style( 'css/editor-styles.css' );
	}
	
	// Theme Setup Function
	public function theme_setup() {
		// add theme support for features
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
	}
	
	// Widget Init Function
	public function widget_init() {
		// register sidebars
		register_sidebar( array (
			'name' => __( 'Main Sidebar', 'the-mindful-mentor' ),
			'id' => 'main-sidebar',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'the-mindful-mentor' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	
	// Custom Post Types
	public function custom_post_types() {
		// register custom post types
	}
	
	// Custom Taxonomies
	public function custom_taxonomies() {
		// register custom taxonomies
	}
	
	// Google Analytics Tracking
	public function google_analytics_tracking() {
		// insert Google Analytics tracking code
	}
	
	// Custom JavaScript
	public function custom_js() {
		// insert custom JavaScript
	}
	
	// Custom CSS
	public function custom_css() {
		// insert custom CSS
	}
	
	// The Content Filter
	public function the_content_filter( $content ) {
		// filter the content
		return $content;
	}
	
	// Template Loader
	public function template_loader( $template ) {
		// template loader
		return $template;
	}
	
	// Custom Excerpt Length
	public function custom_excerpt_length( $length ) {
		// custom excerpt length
		return 30;
	}
	
	// Custom Excerpt More
	public function custom_excerpt_more( $more ) {
		// custom excerpt more
		return '...';
	}
	
	// Year Month Upload Folders
	public function yearmonth_upload_folders( $bool ) {
		// return true/false for using year/month upload folders
		return true;
	}
	
	// Page Menu Args
	public function page_menu_args( $args ) {
		// page menu args
		$args['show_home'] = true;
		return $args;
	}
	
	// Pre Comment Approved
	public function pre_comment_approved( $approved ) {
		// pre comment approved
		return $approved;
	}
	
	// Search Form
	public function search_form( $form ) {
		// search form
		$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
			<input type="search" class="search-field" placeholder="' . esc_attr__( 'Search', 'the-mindful-mentor' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr__( 'Search for:', 'the-mindful-mentor' ) . '" />
			<input type="submit" class="search-submit" value="' . esc_attr__( 'Go', 'the-mindful-mentor' ) . '" />
		</form>';
		
		return $form;
	}
}

// Initialize TheMindfulMentor class
$theMindfulMentor = new TheMindfulMentor();

?>