<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Register Custom Post Type
function wke2014_vortrag_post_type() {

	$labels = array(
		'name'                => _x( 'Vorträge', 'Post Type General Name', 'wke2014' ),
		'singular_name'       => _x( 'Vortrag', 'Post Type Singular Name', 'wke2014' ),
		'menu_name'           => __( 'Vorträge', 'wke2014' ),
		'parent_item_colon'   => __( 'Parent Item:', 'wke2014' ),
		'all_items'           => __( 'Alle Vorträge', 'wke2014' ),
		'view_item'           => __( 'Vortrag ansehen', 'wke2014' ),
		'add_new_item'        => __( 'Neuer Vortrag', 'wke2014' ),
		'add_new'             => __( 'Neu', 'wke2014' ),
		'edit_item'           => __( 'Bearbeiten', 'wke2014' ),
		'update_item'         => __( 'Aktualisieren', 'wke2014' ),
		'search_items'        => __( 'Vortrag suchen', 'wke2014' ),
		'not_found'           => __( 'Vortrag nicht gefunden', 'wke2014' ),
		'not_found_in_trash'  => __( 'Vortrag nicht im Papierkorb gefunden', 'wke2014' ),
	);
	$args = array(
		'label'               => __( 'vortrag', 'wke2014' ),
		'description'		=> __( 'Erstellen und Verwalten von Vortragsinformationen', 'wke2014' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'		=> array( 'slug' => 'vortrag','with_front' => FALSE),
		'capability_type'     => 'page',
	);
	register_post_type( 'vortrag', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wke2014_vortrag_post_type', 0 );

function wke2014_vortrag_taxonomies() {
	$labels = array();
	$args = array(
		'labels'	=> $labels,
		'hierarchical'	=> true,
		'rewrite'	=> false,
	);
	register_taxonomy( 'vortrag_category', 'vortrag', $args );
}
add_action( 'init', 'wke2014_vortrag_taxonomies' );


/*
 * Metabox fuer weitere Vortragsinfo
 */


function wke2014_vortrag_metabox() {
    add_meta_box(
        'vortrag_metabox',
        __( 'Beschreibung des Vortrags', 'wke2014' ),
        'vortrag_metabox_content',
        'vortrag',
        'normal',
        'high'
    );
}
function vortrag_metabox_content( $post ) {
    global $defaultoptions;
    global $post;
    global $vortragszeiten;
    global $vortragsraeume;

	wp_nonce_field( plugin_basename( __FILE__ ), 'vortrag_metabox_content_nonce' );
	?>


	<?php 
	$kurztext = get_post_meta( $post->ID, 'vortrag_kurztext', true );
	fau_form_textarea('vortrag_kurztext', $kurztext, 'Kurzbeschreibung', 70, 3, '');

	$kurztext = get_post_meta( $post->ID, 'vortrag_text', true );
	fau_form_wpeditor('vortrag_text', $kurztext, 'Detaillierte Beschreibung', '', false);
	
	$name = get_post_meta( $post->ID, 'vortrag_referentname', true );
	fau_form_text('vortrag_referentname', $name, __('Referent (Vorname Nachname)','fau'));
		
		
	$url = get_post_meta( $post->ID, 'vortrag_referentlink', true );
	fau_form_text('vortrag_referentlink', $url, 'Link zur Seite des Referenten');
	
	
	$name = get_post_meta( $post->ID, 'vortrag_referentname2', true );	
	fau_form_text('vortrag_referentname2', $name, __('Zweiter Referent (Vorname Nachname)','fau'));
	
	$url = get_post_meta( $post->ID, 'vortrag_referentlink2', true );
	fau_form_text('vortrag_referentlink2', $url, 'Link zur Seite des zweiten Referenten');
	?>
	
	

	<p>
		<label for="vortrag_datum"><?php _e( "Datum", 'wke2014' ); ?>:</label>
		<br />
		<input class="datepicker" type="text" name="vortrag_datum"
		       id="vortrag_datum" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_datum', true ) ); ?>" size="30" />

	    <label for="vortrag_beginn"><?php _e( "Beginn", 'wke2014' ); ?>:</label>

	    <select name="vortrag_beginn"  id="vortrag_beginn">
		<?php
		    $active = esc_attr( get_post_meta( $post->ID, 'vortrag_beginn', true ) );
		    $saal = esc_attr( get_post_meta( $post->ID, 'vortrag_raum', true ) );
		    $liste = $vortragszeiten;


		    foreach($liste as $i => $value) {
                                        echo "\t\t\t\t";
                                        echo '<option value="'.$i.'"';
                                        if ( $i == $active ) {
                                            echo ' selected="selected"';
                                        }
                                        echo '>';
                                        if (!is_array($value)) {
                                            echo $value;
                                        } else {
                                            echo $i;
                                        }
                                        echo '</option>';
                                        echo "\n";
                                    }

		?>


	    </select>

	    <label for="vortrag_raum"><?php _e( "Hörsaal", 'wke2014' ); ?>:</label>

	    <select name="vortrag_raum"  id="vortrag_raum">
		<?php
		$liste = $vortragsraeume;


		    foreach($liste as $i => $value) {
                                        echo "\t\t\t\t";
                                        echo '<option value="'.$i.'"';
                                        if ( $i == $saal ) {
                                            echo ' selected="selected"';
                                        }
                                        echo '>';
                                        if (!is_array($value)) {
                                            echo $value;
                                        } else {
                                            echo $i;
                                        }
                                        echo '</option>';
                                        echo "\n";
                                    }

		?>

	    </select>
	</p>
	<?php 
	
	$url = get_post_meta( $post->ID, 'vortrag_aufzeichnung', true );
	fau_form_text('vortrag_aufzeichnung', $url, 'Geben Sie hier die Webadresse (URL) ein, die zur Aufzeichnung (Videportal) führt');
	
	$url = get_post_meta( $post->ID, 'vortrag_folien', true );
	fau_form_text('vortrag_folien', $url, 'Geben Sie hier die Webadresse (URL) ein, die zu Vortragsfolien zeigt');


}
add_action( 'add_meta_boxes', 'wke2014_vortrag_metabox' );


function vortrag_metabox_save( $post_id ) {
    if (  'vortrag'!= get_post_type()  ) {
	return;
    }


	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

	if ( !wp_verify_nonce( $_POST['vortrag_metabox_content_nonce'], plugin_basename( __FILE__ ) ) )
	return;

	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
		return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	}

	$url = $_POST['vortrag_aufzeichnung'];
	fau_save_standard('vortrag_aufzeichnung', $url, $post_id, 'url');
	
	$url = $_POST['vortrag_folien'];
	fau_save_standard('vortrag_folien', $url, $post_id, 'url');
	
	$url = $_POST['vortrag_referentlink'];
	fau_save_standard('vortrag_referentlink', $url, $post_id, 'url');
	
	$url = $_POST['vortrag_referentlink2'];
	fau_save_standard('vortrag_referentlink2', $url, $post_id, 'url');
		

	fau_save_standard('vortrag_kurztext',  $_POST['vortrag_kurztext'], $post_id, 'textarea');
	fau_save_standard('vortrag_text',  $_POST['vortrag_text'], $post_id, 'wpeditor');


	fau_save_standard('vortrag_referentname',  $_POST['vortrag_referentname'], $post_id, 'text');
	fau_save_standard('vortrag_referentname2',  $_POST['vortrag_referentname2'], $post_id, 'text');

	fau_save_standard('vortrag_datum',  $_POST['vortrag_datum'], $post_id, 'text');
	fau_save_standard('vortrag_beginn',  $_POST['vortrag_beginn'], $post_id, 'text');
	fau_save_standard('vortrag_raum',  $_POST['vortrag_raum'], $post_id, 'text');



}
add_action( 'save_post', 'vortrag_metabox_save' );



function vortrag_metabox_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['vortrag'] = array(
		0 => '',
		1 => __('Die Vortragsinformationen wurden aktualisiert. ', 'wke2014'),
		2 => __('Die Vortragsinformationen wurden aktualisiert.', 'wke2014'),
		3 => __('Vortragsinformationen wurden gel&ouml;scht.', 'wke2014'),
		6 => __('Vortragsinformationen wurden ver&ouml;ffentlicht.', 'wke2014'),
		7 => __('Vortragsinformationen wurden gespeichert.', 'wke2014'),
			);
	return $messages;
}
add_filter( 'post_updated_messages', 'vortrag_metabox_updated_messages' );



/* Shortcode Definition
 *
 */


function vortrag_shortcode( $atts ) {
    global $options;
    global $vortragszeiten;
    global $vortragsraeume;
	extract( shortcode_atts( array(
		'cat' => '',
		'num' => 35,
		'id'	=> '',
		'format'    => 'table',
		'showautor' => 1
	), $atts ) );
	$single = 0;
	$cat = sanitize_text_field($cat);
	$format = sanitize_text_field($format);
	$showautor = sanitize_text_field($showautor);
	if ((isset($id)) && ( strlen(trim($id))>0)) {

	    $args = array(
			'post_type' => 'vortrag',
			'posts_per_page' => $num,
			'p' => $id
		);
	    $single = 1;
	}elseif ((isset($cat)) && ( strlen(trim($cat))>0)) {
	    $args = array(
			'post_type' => 'vortrag',
			'posts_per_page' => $num,
			'orderby'   =>  'title',
			'order'   => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'vortrag_category',
					'field' => 'slug',
					'terms' => $cat
				    )
			)
		);

	} else {
	    $args = array(
			'post_type' => 'vortrag'
	    );
	}

	$links = new WP_Query( $args );
		if( $links->have_posts() ) {
		    $i=0;
		    $out = '';

		    if (isset($format) && ($format=='table') && ($single==0)) {
				$out .= '
				    <table class="vortragstabelle">
				      <thead>
				     <tr>
				     <th scope="col" class="titel">Titel</th>
					 <th scope="col" class="kurztext">Kurzbeschreibung</th>
					 <th scope="col" class="referent">Referent</th>
				     </tr>
				    </thead>
				    <tbody>
				';
		    }

		    while ($links->have_posts() && ($i<$num) ) {
			$links->the_post();
			$i++;

			    $post_id = $links->post->ID;
			    $title = get_the_title();



			    $vortrag_kurztext = get_post_meta( $post_id, 'vortrag_kurztext', true );
			    $vortrag_text = get_post_meta( $post_id, 'vortrag_text', true );
			    $vortrag_referentname = get_post_meta( $post_id, 'vortrag_referentname', true );
			    $vortrag_referentname2 = get_post_meta( $post_id, 'vortrag_referentname2', true );
			    $vortrag_referentlink = get_post_meta( $post_id, 'vortrag_referentlink', true );
			    $vortrag_referentlink2 = get_post_meta( $post_id, 'vortrag_referentlink2', true );
			    $vortrag_datum = get_post_meta( $post_id, 'vortrag_datum', true );
			    $vortrag_beginn = get_post_meta( $post_id, 'vortrag_beginn', true );
			    $vortrag_raum = get_post_meta( $post_id, 'vortrag_raum', true );
			    $vortrag_aufzeichnung = get_post_meta( $post_id, 'vortrag_aufzeichnung', true );
			    $vortrag_folien = get_post_meta( $post_id, 'vortrag_folien', true );

			    $dtstart = '';
			    $dtstamp = '';
			    $datumset = 0;
			    if (preg_match("/\//",$vortrag_datum) ) {
				$datum = preg_split("/\//", $vortrag_datum);

				$dtstart = $datum[2]."-".$datum[0]."-".$datum[1];
				if ((isset($vortrag_beginn)) && (intval($vortrag_beginn)>0)) {
				  $dtstamp = $datum[2].$datum[0].$datum[1].'T'.$vortrag_beginn.'00';
				} else {
				    $dtstamp = $datum[2].$datum[0].$datum[1];
				}
				$datumset = 1;
			    } else {
				$datum = array("-","-","-");
			    }

			    if (isset($id) && isset($format) &&($format=='short')) {
					$out .= ''
						. '<span class="titel">'
						.$title
						. '</span><br /><span class="referent">(';
					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '<a href="'.$vortrag_referentlink.'" title="'.$vortrag_referentname.'">';
					}
					$out .= $vortrag_referentname;
					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '</a>';
					}
					
					if ((isset($vortrag_referentname2)) && (strlen(trim($vortrag_referentname2))>0)) {
					    $out .= ', ';
					    if (isset($vortrag_referentlink2)&& (strlen(trim($vortrag_referentlink2))>0)) {
						$out .= '<a href="'.$vortrag_referentlink2.'" title="'.$vortrag_referentname2.'">';
					    }
					    $out .= $vortrag_referentname2;
					    if (isset($vortrag_referentlink2)&& (strlen(trim($vortrag_referentlink2))>0)) {
						$out .= '</a>';
					    }
					}
					$out .= ')</span>';
					
					
			    } elseif (isset($format) && ($format=='table') && ($single==0)) {
				    $out .= "<tr class=\"vortrag\">\n";
				    $out .= '<th scope="row">'.$title.'</th>';
				    $out .= '<td>'.$vortrag_kurztext.'</td>';
				    if (isset($vortrag_referentname)) {
					    $out .= '<td>';
					    if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
						$out .= '<a href="'.$vortrag_referentlink.'" title="'.$vortrag_referentname.'">';
					    }
					    $out .= $vortrag_referentname;

					    if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
						$out .= '</a>';
					    }
					    
					   if ((isset($vortrag_referentname2)) && (strlen(trim($vortrag_referentname2))>0)) {
						$out .= ', ';
						if (isset($vortrag_referentlink2)&& (strlen(trim($vortrag_referentlink2))>0)) {
						    $out .= '<a href="'.$vortrag_referentlink2.'" title="'.$vortrag_referentname2.'">';
						}
						$out .= $vortrag_referentname2;

						if (isset($vortrag_referentlink2)&& (strlen(trim($vortrag_referentlink2))>0)) {
						    $out .= '</a>';
						}
					    }
					    
					    $out .= '</td>';
					}
				    $out .= "</tr>\n";
			    } else {


			      $out .= '<section class="shortcode vortrag vevent" id="post-'.$post_id.'" >';
			      $out .= "\n";
				    $out .=  '<header class="titel">';

				    $out .= '<h2 class="summary">'.$title.'</h2>';

				    if ((isset($vortrag_referentname)) && ($showautor==1)) {
					$out .= '<p><span class="autor">';
					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '<a href="'.$vortrag_referentlink.'">';
					}
					$out .= $vortrag_referentname;

					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '</a>';
					}
					$out .= '</span>';
					
					if ((isset($vortrag_referentname2)) && (strlen(trim($vortrag_referentname2))>0)) {
					    $out .= ', <span class="autor">';
					    if (isset($vortrag_referentlink2) && (strlen(trim($vortrag_referentlink2))>0)) {
						$out .= '<a href="'.$vortrag_referentlink2.'">';
					    }
					    $out .= $vortrag_referentname2;

					    if (isset($vortrag_referentlink2)&& (strlen(trim($vortrag_referentlink2))>0)) {
						$out .= '</a>';
					    }
					    $out .= '</span>';
					}
					$out .= '</p>';
				    }

				    $raumstring = $vortragsraeume[$vortrag_raum];
				    if ($datumset==1) {
					    $out .= '<ul class="termin">';
					    $out .= '<li class="date dtstart" title="'.$dtstart.'">Datum: '.$datum[1].'.'.$datum[0].'.'.$datum[2].'</span></li>';
					    $out .= '<li class="zeit">Beginn: <span class="dtstamp" title="'.$dtstamp.'">'.$vortrag_beginn.'</span> Uhr</li>';
					    $out .= '<li class="ort">Ort: <span class="location">'.$raumstring.'</span></li>';
					    $out .= '</ul>';
				    }


				    $out .= '</header>';
				    $out .= "\n";




				 $out .= '<div class="vortrag_daten">';
				  $out .= "\n";
				     $out .= '<article class="post-entry"><p>';
				     $out .= "\n";

				     if (isset($vortrag_kurztext)) {
					    $out .= '<p class="kurzbeschreibung">';
					     $out .=  $vortrag_kurztext;
					     $out .= '</p>';
					}

					if (isset($vortrag_text)) {

					    $out .= '<p class="detailbeschreibung">';
					     $out .=  $vortrag_text;
					     $out .= '</p>';
					}

				     $out .= "</article>\n";

				     if ( (isset($vortrag_aufzeichnung) && (strlen(trim($vortrag_aufzeichnung))>0))
					     || (isset($vortrag_folien) && (strlen(trim($vortrag_folien))>0)) )  {
					 $out .= '<footer>';
					  $out .= '<ul class="medien">';
					 if (isset($vortrag_aufzeichnung) && (strlen(trim($vortrag_aufzeichnung))>0))  {
					     $out .= '<li class="video"><a href="'.$vortrag_aufzeichnung.'">Videoaufzeichnung</a></li>';
					  }
					  if (isset($vortrag_folien) && (strlen(trim($vortrag_folien))>0)) {
					     $out .= '<li class="folien"><a href="'.$vortrag_folien.'">Vortragsfolien</a></li>';
					  }
					  $out .= '</ul>';
					 $out .= '</footer>';

				     }



				  $out .= "</div>\n";
			      $out .= "</section>\n";
			    }
			    }
			    if (isset($format) && ($format=='table') && ($single==0)) {
				$out .= '</table>';
			    }




		    wp_reset_postdata();

		} else {
			$out = '<section class="shortcode vortrag"><p>';
			$out .= __('Es konnten keine Vortragsinformationen gefunden werden.', 'wke2014');
			$out .= "</p></section>\n";
		}
	return $out;
}
add_shortcode( 'vortrag', 'vortrag_shortcode' );


