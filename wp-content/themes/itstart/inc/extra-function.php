<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ItStart
 */

if ( ! function_exists( 'itstart_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function itstart_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'itstart' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'itstart' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'itstart_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function itstart_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'itstart' ) );
		if ( $categories_list && itstart_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'itstart' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'itstart' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'itstart' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'itstart' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'itstart' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function itstart_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'itstart_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'itstart_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so itstart_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so itstart_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in itstart_categorized_blog.
 */
function itstart_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'itstart_categories' );
}
add_action( 'edit_category', 'itstart_category_transient_flusher' );
add_action( 'save_post',     'itstart_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('itstart_sticky_menu')):
    function itstart_sticky_menu()
    {
        $is_sticky = get_theme_mod('hide_show_sticky','1');

        if ($is_sticky == '1'):
            return 'is-sticky-on';
        else:
            return 'not-sticky';
        endif;
    }
endif;




function itstart_google_font() {
    $fonts_url = '';
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
	 $Source_Sans_Pro = _x( 'on', 'Source+Sans+Pro font: on or off', 'itstart' );
  $poppins = _x( 'on', 'Poppins font: on or off', 'itstart' );
   
	$font_families = array();
	
	if ( 'off' !== $Source_Sans_Pro ) {
    $font_families[] = 'Source Sans Pro:wght@200;300;400;600;700;900';
  }
  
	if ( 'off' !== $poppins ) {
    $font_families[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
  }
	
	$font_families = array_unique( $font_families);
    
	$query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode( 'latin,latin-ext' ),
  );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
    return esc_url_raw( $fonts_url );
}

function itstart_scripts_styles() {
    wp_enqueue_style( 'itstart-fonts', itstart_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'itstart_scripts_styles' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function itstart_breadcrumbs_style() {
	get_template_part('./parts/division/element','breadcrumb');			
}



// ItStart Excerpt Read More
if ( ! function_exists( 'itstart_execerpt_link' ) ) :
function itstart_execerpt_link() {
	$enable_post_btn = get_theme_mod( 'enable_post_btn');
	$read_btn_txt = get_theme_mod( 'read_btn_txt','Read More');
	if ( $enable_post_btn == '1' ) { 
	?>
	<a href="<?php echo esc_url(get_permalink());?>" class="more-link "><?php echo esc_html($read_btn_txt); ?></a>
<?php } 
	} 
endif;

// Custom excerpt length
function itstart_custom_excerpt_length( $length ) {
	 $itstart_post_excerpt = get_theme_mod('itstart_post_excerpt','30');
    if( $itstart_post_excerpt == 1000 ) {
        return 9999;
    }
    return esc_html( $itstart_post_excerpt );
}
add_filter( 'excerpt_length', 'itstart_custom_excerpt_length', 999 );



// excerpt more
function itstart_excerpt_more( $more ) {
	return get_theme_mod('itstart_blog_excerpt_more','&hellip;');;
}
add_filter( 'excerpt_more', 'itstart_excerpt_more' );


/**
 * ItStart Header Widget Area First
 */
function itstart_header_widget_area_first() {
	$itstart_header_widget_first = 'itstart-header-widget-left';
	if ( is_active_sidebar( $itstart_header_widget_first ) ){ 
		dynamic_sidebar( 'itstart-header-widget-left' );
	} elseif ( current_user_can( 'edit_theme_options' ) ) {

			$itstart_sidebar_name = themes_get_sidebar_name_by_id( $itstart_header_widget_first );
			?>
			<div class='widget widget_none'>
				<h4 class='widget-title'><?php echo esc_html( $itstart_sidebar_name ); ?></h4>
				<p>
					<?php if ( is_customize_preview() ) { ?>
						<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $itstart_header_widget_first ); ?>">
					<?php } else { ?>
						<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
					<?php } ?>
						<?php esc_html_e( 'Please assign a widget here.', 'itstart' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
}


/**
 * ItStart Header Widget Area Second
 */
function itstart_header_widget_area_second() {
	$itstart_header_widget_first = 'itstart-header-widget-right';
	if ( is_active_sidebar( $itstart_header_widget_first ) ){ 
		dynamic_sidebar( 'itstart-header-widget-right' );
} elseif ( current_user_can( 'edit_theme_options' ) ) {

		$itstart_sidebar_name = themes_get_sidebar_name_by_id( $itstart_header_widget_first );
		?>
		<div class='widget widget_none'>
			<h4 class='widget-title'><?php echo esc_html( $itstart_sidebar_name ); ?></h4>
			<p>
				<?php if ( is_customize_preview() ) { ?>
					<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $itstart_header_widget_first ); ?>">
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
				<?php } ?>
					<?php esc_html_e( 'Please assign a widget here.', 'itstart' ); ?>
				</a>
			</p>
		</div>
		<?php
	}
}
?>