<?php


/* Content-Slider */

function contentSlider($atts) {

	// Attributes
	extract( shortcode_atts(
		array(
			"type" => '',
			"anzahl" => '',
			"kategorie" => '',
			'orderby'   => 'rand',
		), $atts, 'content-slider' )
	);
	$type = sanitize_text_field($type);
	$orderby = sanitize_text_field($orderby);
	$kategorie = sanitize_text_field($kategorie);
	$anzahl = sanitize_text_field($anzahl);
	// Code
	$args = array(
		'post_type'			=> $type,
		'posts_per_page'	=> $anzahl,
		'category_name'		=> $kategorie,
		'orderby'   => $orderby	    );
	$the_query = new WP_Query( $args );
	$output = '';
	if ( $the_query->have_posts() ) :
		$output = '<div class="flexslider">';
		$output .= '<ul class="slides">';
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$id = get_the_ID();
			$output .= '<li>';
			$output .= '<h2>' . get_the_title() . '</h2>';
			if (has_post_thumbnail()) {
				$output .= get_the_post_thumbnail($id,'teaser-thumb',array('class'	=> 'attachment-teaser-thumb'));
			}
			else {
				$output .= '<div class="infoimage" style="width:120px;float:left;margin-right:10px;">' . get_wke2014_firstpicture() . '</div>';
			}
			$output .=  get_wke2014_custom_excerpt($length = 200, $continuenextline = 1, $removeyoutube = 1);
			$output .= '</li>';
		endwhile;
		$output .= '</ul>';
		$output .= '</div>';
	endif;
	wp_reset_postdata();


	wp_enqueue_style( 'basemod_flexslider', get_template_directory_uri() . '/css/basemod_flexslider.css');
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.2.0', true);
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js', array(), false, true);
	return $output;

}

add_shortcode( 'content-slider', 'contentSlider' );
