	<?php
/**
 * WKE2014 Theme Optionen
 *
 * @source http://github.com/RRZE-Webteam/WKE2014
 * @creator xwolf
 * @version 1.0
 * @licence GPL
 */
	
	

require( get_template_directory() . '/inc/constants.php' );
$options = get_option('wke2014_theme_options');
$options = wke2014_compatibility($options);

// ** bw 2012-08-12 wordpress reverse proxy x-forwarded-for ip fix ** //
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $xffaddrs = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
  $_SERVER['REMOTE_ADDR'] = $xffaddrs[0];
}    

      

if ( ! isset( $content_width ) )   $content_width = $defaultoptions['content-width'];
require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'after_setup_theme', 'wke2014_setup' );

if ( ! function_exists( 'wke2014_setup' ) ):
function wke2014_setup() {
     global $defaultoptions;
     global $options;
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();
        // This theme uses post thumbnails
        add_theme_support( 'post-thumbnails' );
        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );
               
  
        $args = array(
            'width'         => 0,
            'height'        => 0,
            'default-image' => $defaultoptions['logo'],
            'uploads'       => true,
            'random-default' => false,                      
            'flex-height' => true,
            'flex-width' => true,
	    'header-text'   => false,
            'suggested-height' => $defaultoptions['logo-height'],
            'suggested-width' => $defaultoptions['logo-width'],
            'max-width' => 350,           
        );
       add_theme_support( 'custom-header', $args );
               
       $args = array(
	    'default-color' => $defaultoptions['background-header-color'],
	    'default-image' => $defaultoptions['background-header-image'],
	    'background_repeat'	=> 'repeat-x',
	    'background_position_x'  => 'left',
	    'background_position_y'  => 'bottom',
	    'wp-head-callback'       => 'wke2014_custom_background_cb',	
	);
       
	/**
	 * wke2014 custom background callback.
	 *
	 */
	function wke2014_custom_background_cb() {
                 global $defaultoptions;
                 global $options;
	        // $background is the saved custom image, or the default image.
	        $background = set_url_scheme( get_background_image() );
	
	        // $color is the saved custom color.
	        // A default has to be specified in style.css. It will not be printed here.
	        $color = get_theme_mod( 'background_color' );
	
	        if ( ! $background && ! $color )
	                return;
                        
	        $style = $color ? "background-color: #$color;" : '';
	
	        if ( $background ) {
                        $image = " background-image: url('$background');";
                       
                       
	                $repeat = get_theme_mod( 'background_repeat', 'repeat-x' );
	                if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
	                        $repeat = 'repeat-x';
	                $repeat = " background-repeat: $repeat;";
	
	                $positionx = get_theme_mod( 'background_position_x', 'left' );
	                if ( ! in_array( $positionx, array( 'center', 'right', 'left' ) ) )
	                        $positionx = 'left';
	                $positiony = get_theme_mod( 'background_position_y', 'bottom' );
	                if ( ! in_array( $positiony, array( 'top', 'bottom' ) ) )
	                        $positiony = 'bottom';
			
	                $position = " background-position: $positionx $positiony;";
	
	                $attachment = get_theme_mod( 'background_attachment', 'scroll' );
	                if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
	                        $attachment = 'scroll';
	                $attachment = " background-attachment: $attachment;";
	
	                $style .= $image . $repeat . $position . $attachment;
	        } 
		
	    
	    echo '<style type="text/css" id="custom-background-css">';
	    echo '.header { '.trim( $style ).' } ';
	    echo '</style>';
	}       
       
	add_theme_support( 'custom-background', $args );
       
	if ( function_exists( 'add_theme_support' ) ) {
	    add_theme_support( 'post-thumbnails' );
	    set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
	}

	if ( function_exists( 'add_image_size' ) ) { 
	    add_image_size( 'teaser-thumb', $options['teaser-thumbnail_width'], $options['teaser-thumbnail_height'], $options['teaser-thumbnail_crop'] ); //300 pixels wide (and unlimited height)
	}
	
        
        // Make theme available for translation
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain('wke2014', get_template_directory() . '/languages');
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if ( is_readable( $locale_file ) )
                require_once( $locale_file );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
                'primary' => __( 'Hauptnavigation', 'wke2014' ),
                'targetmenu' => __( 'Linkmenu', 'wke2014' ),
                'tecmenu' => __( 'Technische Navigation (Kontakt, Impressum, etc)', 'wke2014' ),
        ) );


       if ($options['login_errors']==0) {
        /** Abschalten von Fehlermeldungen auf der Loginseite */      
           add_filter('login_errors', create_function('$a', "return null;"));
       }        
        /** Entfernen der Wordpressversionsnr im Header */
        remove_action('wp_head', 'wp_generator');
	
	/* Zulassen von Shortcodes in Widgets */
	add_filter('widget_text', 'do_shortcode');
}
endif;

require( get_template_directory() . '/inc/widgets.php' );

function wke2014_scripts() {
    global $options;
    global $defaultoptions;


    wp_enqueue_script(
		'layoutjs',
		$defaultoptions['src-layoutjs'],
		array('jquery'),
                $defaultoptions['js-version']
	);
 
    if (is_singular() && ($options['aktiv-commentreplylink']==1) && get_option( 'thread_comments' )) {        
            wp_enqueue_script(
		'comment-reply',
		$defaultoptions['src-comment-reply'],
		false,
                $defaultoptions['js-version']
	);  
     }        
   
                   
}
add_action('wp_enqueue_scripts', 'wke2014_scripts');

function wke2014_avatar ($avatar_defaults) {
    global $defaultoptions;
    $myavatar =  $defaultoptions['src-default-avatar']; 
    $avatar_defaults[$myavatar] = "wke2014";
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'wke2014_avatar' );

/* Refuse spam-comments on media */
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

	


function wke2014_compatibility ($oldoptions) {
    global $defaultoptions;
   
    if (!is_array($oldoptions)) {
	$oldoptions = array();
    }
    $newoptions = array_merge($defaultoptions,$oldoptions);	
   

    return $newoptions;
}

if ( ! function_exists( 'get_wke2014_options' ) ) :
/*
 * Erstes Bild aus einem Artikel auslesen, wenn dies vorhanden ist
 */
function get_wke2014_options( $field ){
    global $defaultoptions;	    
    if (!isset($field)) {
	$field = 'wke2014_theme_options';
    }
    $orig = get_option($field);
    if (!is_array($orig)) {
        $orig=array();
    }
    $alloptions = array_merge( $defaultoptions, $orig  );	
    return $alloptions;
}
endif;



/*
 * Adds optional styles in header
 */
function wke2014_add_basemod_styles() {
    global $options;
    if ($options['aktiv-basemod_siegel'])  {
	wp_enqueue_style( 'basemod_siegel', $options['src-basemod-siegel'] );
    }
    if (isset($options['basemods_colors']))  {
	wp_enqueue_style( 'basemod_colors', get_template_directory_uri() . '/css/'.$options['basemods_colors'] );
    }
    
}
add_action( 'wp_enqueue_scripts', 'wke2014_add_basemod_styles' );

/*
 * Breadcrumb
 */

function wke2014_breadcrumbs() {
  global $defaultoptions;
  $delimiter = '<img width="20" height="9" alt=" &raquo; " src="img/breadcrumbarrow.gif">';
  $home = __( 'Startseite', 'wke2014' ); // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 

    global $post;
    $homeLink = home_url('/');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . __( 'Artikel der Kategorie ', 'wke2014' ). '"' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') ) ? '' : $cat_parents;
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && !is_search() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') ) ? '' : $cat_parents;
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . __( 'Suche nach ', 'wke2014' ).'"' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . __( 'Artikel mit Schlagwort ', 'wke2014' ). '"' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . __( 'Artikel von ', 'wke2014' ). $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . '404' . $after;
    }
 /*
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'wke2014') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 */
  }
}


function wke2014_excerpt_length( $length ) {
	global $defaultoptions;
        return $defaultoptions['teaser_maxlength'];
}
add_filter( 'excerpt_length', 'wke2014_excerpt_length' );

function wke2014_continue_reading_link() {
        return ' <a class="nobr" title="'.strip_tags(get_the_title()).'" href="'. get_permalink() . '">' . __( 'Weiterlesen <span class="meta-nav">&rarr;</span>', 'wke2014' ) . '</a>';
}

function wke2014_auto_excerpt_more( $more ) {
        return ' &hellip;' . wke2014_continue_reading_link();
}
add_filter( 'excerpt_more', 'wke2014_auto_excerpt_more' );


function wke2014_custom_excerpt_more( $output ) {
       if ( has_excerpt() && ! is_attachment() ) {      
                $output .= wke2014_continue_reading_link();
        }
        return $output;
}
add_filter( 'get_the_excerpt', 'wke2014_custom_excerpt_more' );



function wke2014_remove_gallery_css( $css ) {
        return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'wke2014_remove_gallery_css' );


if ( ! function_exists( 'wke2014_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function wke2014_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        global $defaultoptions;
        global $options;         
        
        switch ( $comment->comment_type ) :
                case '' :
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-details">
                    
                <div class="comment-author vcard">
                    <?php if ($options['aktiv-avatar']==1) {
                        echo '<div class="avatar">';
                        echo get_avatar( $comment, 48, $defaultoptions['src-default-avatar']); 
                        echo '</div>';   
                    } 
                    printf( __( '%s <span class="says">meinte am</span>', 'wke2014' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); 
                    ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Der Kommentar wartet auf die Freischaltung.', 'wke2014' ); ?></em>
                        <br />
                <?php endif; ?>

                <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                   <?php
                          /* translators: 1: date, 2: time */
                       printf( __( '%1$s um %2$s', 'wke2014' ), get_comment_date(),  get_comment_time() ); ?></a> Folgendes:<?php edit_comment_link( __( '(Edit)', 'wke2014' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
                </div>

                <div class="comment-body"><?php comment_text(); ?></div>
                <?php if ($options['aktiv-commentreplylink']) { ?>
                <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>                       
                </div> <!-- .reply -->
                <?php } ?>


        </div><!-- #comment-##  -->

        <?php
                        break;
                case 'pingback'  :
                case 'trackback' :
        ?>
        <li class="post pingback">
                <p><?php _e( 'Pingback:', 'wke2014' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'wke2014'), ' ' ); ?></p>
        <?php
                        break;
        endswitch;
}
endif;



function wke2014_remove_recent_comments_style() {
        global $wp_widget_factory;
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'wke2014_remove_recent_comments_style' );



if ( ! function_exists( 'wke2014_post_teaser' ) ) :
/**
 * Erstellung eines Artikelteasers
 */
function wke2014_post_teaser($titleup = 1, $showdatebox = 1, $showdateline = 0, $teaserlength = 200, $thumbfallback = 1, $usefloating = 0) {
  global $options;
  global $post;
   
  $sizeclass='';
  $leftbox = '';
  
  if (($showdatebox>0)  && ($showdatebox<5)) {
       $sizeclass = 'ym-column withthumb';      
       // Generate Thumb/Pic or Video first to find out which class we need
       
     
	    $leftbox .=  '<div class="infoimage">';	    
	    $sizeclass = 'ym-column withthumb'; 
	    $thumbnailcode = '';	
	    $firstpic = '';
	    $firstvideo = '';
	    if (has_post_thumbnail()) {
		$thumbnailcode = get_the_post_thumbnail($post->ID, 'teaser-thumb');
	    }
		   
		$firstpic = get_wke2014_firstpicture();
		$firstvideo = get_wke2014_firstvideo();
		$fallbackimg = '<img src="'.$options['src-teaser-thumbnail_default'].'" alt="">';
		if ($showdatebox==1) {
		    if (!isset($output)) { $output = $thumbnailcode;}
		    if (!isset($output)) { $output = $firstpic;}
		    if ((!isset($output)) && (isset($firstvideo))) { $output = $firstvideo; $sizeclass = 'ym-column withvideo'; }		    
		    if (!isset($output)) { $output = $fallbackimg;}		    
		    if ((isset($output)) && ( strlen(trim($output))<10 )) {$output = $fallbackimg;}		    
		} elseif ($showdatebox==2) {
		    if (!isset($output)) { $output = $firstpic;}
		    if (!isset($output)) { $output = $thumbnailcode;}
		    if ((!isset($output)) && (isset($firstvideo))) { $output = $firstvideo; $sizeclass = 'ym-column withvideo'; }		    
		    if (!isset($output)) { $output = $fallbackimg;}		    
		    if ((isset($output)) && ( strlen(trim($output))<10 )) {$output = $fallbackimg;}			    		    
		} elseif ($showdatebox==3) {
		    if ((!isset($output)) && (isset($firstvideo))) { $output = $firstvideo; $sizeclass = 'ym-column withvideo'; }		     		    
		    if (!isset($output)) { $output = $thumbnailcode;}
		    if (!isset($output)) { $output = $firstpic;}
		    if (!isset($output)) { $output = $fallbackimg;}
		    if ((isset($output)) && ( strlen(trim($output))<10 )) {$output = $fallbackimg;}		    
		    
		} elseif ($showdatebox==4) {
		    if ((!isset($output)) && (isset($firstvideo))) { $output = $firstvideo; $sizeclass = 'ym-column withvideo'; }		    
		    if (!isset($output)) { $output = $firstpic;}
		    if (!isset($output)) { $output = $thumbnailcode;}
		    if (!isset($output)) { $output = $fallbackimg;}
		    if ((isset($output)) && ( strlen(trim($output))<10 )) {$output = $fallbackimg;}
		} else {
		    $output = $fallbackimg; 
		}	
	   
    	    
	    $leftbox .= $output;
	    $leftbox .=  '</div>'; 
  } else {
       $sizeclass = 'ym-column';
  }
  if ($usefloating==1) {
      $sizeclass .= " usefloating";
  }
  ?> 
  <div <?php post_class($sizeclass); ?> id="post-<?php the_ID(); ?>" >
    <?php 
        
     if ($titleup==1) { ?>
        <div class="post-title ym-cbox"><h2>          
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
	</h2></div>       
       <div class="ym-column"> 
     <?php }	
   /* 0 = Datebox, 
	 * 1 = Thumbnail (or: first picture, first video, fallback picture),
	 * 2 = First picture (or: thumbnail, first video, fallback picture),
	 * 3 = First video (or: thumbnail, first picture, fallback picture),
	 * 4 = First video (or: first picture, thumbnail, fallback picture),
	 * 5 = Nothing */
     
    if ($showdatebox<5) { 
	echo '<div class="post-info ym-col1"><div class="ym-cbox">';
	if ($showdatebox==0) {		 
	      $num_comments = get_comments_number();           
	      if (($num_comments>0) || ( $options['zeige_commentbubble_null'])) { 
		echo '<div class="commentbubble">'; 	
		    if ($num_comments>0) {
		       comments_popup_link( '0<span class="skip"> Kommentar</span>', '1<span class="skip"> Kommentar</span>', '%<span class="skip"> Kommentare</span>', 'comments-link', '%<span class="skip"> Kommentare</span>');           
		    } else {
			// Wenn der Zeitraum abgelaufen ist UND keine Kommentare gegeben waren, dann
			// liefert die Funktion keinen Link, sondern nur den Text . Daher dieser
			// Woraround:
			$link = get_comments_link();
			echo '<a href="'.$link.'">0<span class="skip"> Kommentar</span></a>';
		  }
		 echo '</div>'; 
	       }
	       ?>
	       <div class="cal-icon">
			<span class="day"><?php the_time('j.'); ?></span>
			<span class="month"><?php the_time('m.'); ?></span>
			<span class="year"><?php the_time('Y'); ?></span>
		</div>

		<?php    
            } else {	
                echo $leftbox;
            } 
            echo '</div></div>';
            echo '<div class="post-entry ym-col3">';
            echo '<div class="ym-cbox';
            if ($usefloating==0) { echo ' ym-clearfix'; }
            echo '">';	
	} else {
	     echo '<div class="post-entry ym-cbox">';
	}
	if ($titleup==0) { ?>       
	    <div class="post-title"><h2>          
	        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
	          <?php the_title(); ?>
                </a>
	    </h2></div>
	 <?php }
	   
	 if (($showdatebox!=0) && ($showdateline==1)) { ?>
	    <p class="pubdateinfo"><?php wke2014_post_pubdateinfo(0); ?></p>	  	  
	 <?php }
	   
	 echo get_wke2014_custom_excerpt($teaserlength); ?>     
	 <?php if ($showdatebox<5) {	?>  
            </div>    	
            <div class="ym-ie-clearing">&nbsp;</div>	
	<?php } ?>
    </div>
    
    <?php if ($titleup==1) { echo '</div>'; }       
    echo '</div>'; 

}
endif;

if ( ! function_exists( 'wke2014_post_datumsbox' ) ) :
/**
 * Erstellung der Datumsbox
 */
function wke2014_post_datumsbox() {
    global $options;
    echo '<div class="post-info">';
          $num_comments = get_comments_number();           
          if (($num_comments>0) || ( $options['zeige_commentbubble_null'])) { ?>
         <div class="commentbubble"> 
            <?php 
                if ($num_comments>0) {
                   comments_popup_link( '0<span class="skip"> Kommentar</span>', '1<span class="skip"> Kommentar</span>', '%<span class="skip"> Kommentare</span>', 'comments-link', '%<span class="skip"> Kommentare</span>');           
                } else {
                    // Wenn der Zeitraum abgelaufen ist UND keine Kommentare gegeben waren, dann
                    // liefert die Funktion keinen Link, sondern nur den Text . Daher dieser
                    // Woraround:
                    $link = get_comments_link();
                    echo '<a href="'.$link.'">0<span class="skip"> Kommentar</span></a>';
              }
            ?>
          </div> 
          <?php } ?>

              <div class="cal-icon">
                <span class="day"><?php the_time('j.'); ?></span>
                <span class="month"><?php the_time('m.'); ?></span>
                <span class="year"><?php the_time('Y'); ?></span>
            </div>
          <?php   
     
         
    echo '</div>';
    
    
}
endif;

if ( ! function_exists( 'wke2014_keywords' ) ) :
/**
 * Fusszeile unter Artikeln: Ver&ouml;ffentlichungsdatum
 */
function wke2014_keywords($maxlength = 140, $maxwords = 15 ) {
    global $options;
   
    $csv_tags = '';
    $tags = '';
    if ($options['aktiv-autokeywords']) {   

	$posttags = get_tags(array('number'=> $maxwords, 'orderby' => 'count', 'order'=> 'DESC'));
	$tags = '';
	    if (isset($posttags)) {
		foreach($posttags as $tag) {
		    $csv_tags .= $tag->name . ',';
		}	
		$tags = substr( $csv_tags,0,-2);
	    }
	if ((isset($options['meta-keywords'])) && (strlen(trim($options['meta-keywords']))>1 )) {
	    $tags = $options['meta-keywords'].', '.$tags;
	}
    } else {
	if ((isset($options['meta-keywords'])) && (strlen(trim($options['meta-keywords']))>1 )) {
	    $tags = $options['meta-keywords'];
	}	
    }
    if ((isset($tags)) && (strlen(trim($tags))>2 )) {
	if (strlen(trim($tags))>$maxlength) {
	    $tags = substr($tags,0,strpos($tags,",",$maxlength));
	}	
	echo '	<meta name="keywords" value="'.$tags.'">';
    }
   
}
endif;

if ( ! function_exists( 'wke2014_post_pubdateinfo' ) ) :
/**
 * Fusszeile unter Artikeln: Ver&ouml;ffentlichungsdatum
 */
function wke2014_post_pubdateinfo($withtext = 1) {
    if ($withtext==1) {
	echo '<span class="meta-prep">';
        echo __('Ver&ouml;ffentlicht am', 'wke2014' );
	echo '</span> ';
    }
    printf('%1$s',
                sprintf( '<span class="entry-date">%1$s</span>',
                        get_the_date()
                )
        );
}
endif;

if ( ! function_exists( 'wke2014_post_autorinfo' ) ) :
/**
 * Fusszeile unter Artikeln: Autorinfo
 */
function wke2014_post_autorinfo() {
        printf( __( ' <span class="meta-prep-author">von</span> %1$s ', 'wke2014' ),               
                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span> ',
                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        sprintf( esc_attr__( 'Artikel von %s', 'wke2014' ), get_the_author() ),
                        get_the_author()
                )
        );
}
endif;

if ( ! function_exists( 'wke2014_post_taxonominfo' ) ) :
/**
 * Fusszeile unter Artikeln: Taxonomie
 */
function wke2014_post_taxonominfo() {
         $tag_list = get_the_tag_list( '', ', ' );
        if ( $tag_list ) {
                $posted_in = __( 'unter %1$s und tagged %2$s. <br>Hier der permanente <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Link</a> zu diesem Artikel.', 'wke2014' );
        } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
                $posted_in = __( 'unter %1$s. <br><a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permanenter Link</a> zu diesem Artikel.', 'wke2014' );
        } else {
                $posted_in = __( '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permanenter Link</a> zu diesem Artikel.', 'wke2014' );
        }
        // Prints the string, replacing the placeholders.
        printf(
                $posted_in,
                get_the_category_list( ', ' ),
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
        );
}
endif;

// this function initializes the iframe elements 
// maybe wont work on multisite installations. please use plugins instead.
function wke2014_change_mce_options($initArray) {
    $ext = 'iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
    if ( isset( $initArray['extended_valid_elements'] ) ) {
        $initArray['extended_valid_elements'] .= ',' . $ext;
    } else {
        $initArray['extended_valid_elements'] = $ext;
    }
    // maybe; set tiny paramter verify_html
    $initArray['verify_html'] = false;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'wke2014_change_mce_options');

