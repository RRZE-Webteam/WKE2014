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
		'public'              => true,
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
 
	wp_nonce_field( plugin_basename( __FILE__ ), 'vortrag_metabox_content_nonce' );
	?>
	
	<p>
		<label for="vortrag_kurztext"><?php _e( "Kurzbeschreibung", 'wke2014' ); ?>:</label>
		<br />
		<textarea class="widefat" name="vortrag_kurztext" cols="70" rows="3" id="vortrag_kurztext" /><?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_kurztext', true ) ); ?></textarea>
	</p>
	<p>
		<label for="vortrag_text"><?php _e( "Detaillierte Beschreibung", 'wke2014' ); ?>:</label>
		<br />
		<textarea class="widefat" name="vortrag_text" cols="70" rows="6" id="vortrag_text" /><?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_text', true ) ); ?></textarea>
	</p>
	<p>
		<label for="vortrag_referentname"><?php _e( "Referent (Vorname Nachname)", 'wke2014' ); ?>:</label>
		<br />
		<input class="widefat" type="text" name="vortrag_referentname"
		       id="vortrag_referentname" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_referentname', true ) ); ?>" size="30" />
	</p>
	<p>
		<label for="vortrag_referentlink"><?php _e( "Link zur Seite mit dem Autor", 'wke2014' ); ?>:</label>
		<br />
		<input  type="text" name="vortrag_referentlink"
			id="vortrag_referentlink" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_referentlink', true ) ); ?>" size="30" />
		<button class="link-btn"><?php _e( "Link einfügen", 'wke2014' ); ?></button>
	</p>	

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
		    $liste = array(
			"" => __('Noch in Planung', 'wke2014'),
			"9" => __('9 Uhr', 'wke2014'),
			"10" => __('10 Uhr', 'wke2014'),
			"11" => __('11 Uhr', 'wke2014'),
			"12" => __('12 Uhr', 'wke2014'),
			"13" => __('13 Uhr', 'wke2014'),
			"14" => __('14 Uhr', 'wke2014'),
			"15" => __('15 Uhr', 'wke2014'),
			"16" => __('16 Uhr', 'wke2014'),
			"17" => __('17 Uhr', 'wke2014'),
			"20" => __('20 Uhr', 'wke2014'),
			
		    );
		
		
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
		<option value="">Noch in Planung</option>
		<option value="Hörsaal 11" <?php if ($saal == "H11") echo 'selected="selected"'; ?>>Hörsaal 11 (500 Plätze)</option>
		<option value="Hörsaal 12" <?php if ($saal == "H12") echo 'selected="selected"'; ?>>Hörsaal 12 (176 Plätze)</option>
		<option value="Hörsaal 13" <?php if ($saal == "H13") echo 'selected="selected"'; ?>>Hörsaal 13 (121 Plätze)</option>
		<option value="Heinrich Lades Halle" <?php if ($saal == "Heinrich Lades Halle") echo 'selected="selected"'; ?>>Abendveranstaltung: Heinrich Lades Halle</option>
	    </select> 
	</p>
	

					
						
						
	
	<p>
		<label for="vortrag_aufzeichnung"><?php _e( "Geben Sie hier die Webadresse (URL) ein, die zur Aufzeichnung (Videportal) führt", 'wke2014' ); ?>:</label>
		<br />
		<input class="url" type="text" name="vortrag_aufzeichnung"
		       id="vortrag_aufzeichnung" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_aufzeichnung', true ) ); ?>" size="30" />
	</p>
	<p>
		<label for="vortrag_folien"><?php _e( "Geben Sie hier die Webadresse (URL) ein, die zu Vortragsfolien zeigt.", 'wke2014' ); ?>:</label>
		<br />
		<input class="url" type="text" name="vortrag_folien"
		       id="vortrag_folien" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vortrag_folien', true ) ); ?>" size="30" />
	</p>
	
	
	
	<?php 
	
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
	if (filter_var($url, FILTER_VALIDATE_URL)) {
	    update_post_meta( $post_id, 'vortrag_aufzeichnung', $url );
	}
	$url = $_POST['vortrag_folien'];
	if (filter_var($url, FILTER_VALIDATE_URL)) {
	    update_post_meta( $post_id, 'vortrag_folien', $url );
	}
	$url = $_POST['vortrag_referentlink'];
	if (filter_var($url, FILTER_VALIDATE_URL)) {
	    update_post_meta( $post_id, 'vortrag_referentlink', $url );
	}
	
	
	
	if( isset( $_POST[ 'vortrag_text' ] ) ) {
	    update_post_meta( $post_id, 'vortrag_text', sanitize_text_field( $_POST[ 'vortrag_text' ] ) );
	}
	if( isset( $_POST[ 'vortrag_kurztext' ] ) ) {
	    update_post_meta( $post_id, 'vortrag_kurztext', sanitize_text_field( $_POST[ 'vortrag_kurztext' ] ) );
	}
	if( isset( $_POST[ 'vortrag_referentname' ] ) ) {
	    update_post_meta( $post_id, 'vortrag_referentname', sanitize_text_field( $_POST[ 'vortrag_referentname' ] ) );
	}
	if( isset( $_POST[ 'vortrag_datum' ] ) ) {
	    update_post_meta( $post_id, 'vortrag_datum', sanitize_text_field( $_POST[ 'vortrag_datum' ] ) );
	}
	if( isset( $_POST[ 'vortrag_beginn' ] ) ) {
	    update_post_meta( $post_id, 'vortrag_beginn', sanitize_text_field( $_POST[ 'vortrag_beginn' ] ) );
	}
	if( isset( $_POST[ 'vortrag_raum' ] ) ) {
	    update_post_meta( $post_id, 'vortrag_raum', sanitize_text_field( $_POST[ 'vortrag_raum' ] ) );
	}
	
    
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
	extract( shortcode_atts( array(
		'cat' => '',
		'num' => 30,
		'id'	=> '',
		'format'    => 'table'
	), $atts ) );
	$single = 0;
	$cat = sanitize_text_field($cat);
	$format = sanitize_text_field($format);
	if ((isset($id)) && ( strlen(trim($id))>0)) { 
	
	    $args = array(
			'post_type' => 'vortrag',
			'p' => $id
		);
	    $single = 1;
	}elseif ((isset($cat)) && ( strlen(trim($cat))>0)) {
	    $args = array(
			'post_type' => 'vortrag',
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
				    <table>
				      <thead>
				     <tr>
				     <th>Titel</th>
					 <th>Kurzbeschreibung</th>
					 <th>Referent</th>
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
			    $vortrag_referentlink = get_post_meta( $post_id, 'vortrag_referentlink', true );
			    $vortrag_datum = get_post_meta( $post_id, 'vortrag_datum', true );
			    $vortrag_beginn = get_post_meta( $post_id, 'vortrag_beginn', true );
			    $vortrag_raum = get_post_meta( $post_id, 'vortrag_raum', true );
			    $vortrag_aufzeichnung = get_post_meta( $post_id, 'vortrag_aufzeichnung', true );
			    $vortrag_folien = get_post_meta( $post_id, 'vortrag_folien', true );
			    
			    $dtstart = '';
			    $dtstamp = '';
			    
			    if (preg_match("/\//",$vortrag_datum) ) {
				$datum = preg_split("/\//", $vortrag_datum);

				$dtstart = $datum[2]."-".$datum[0]."-".$datum[1];
				if ((isset($vortrag_beginn)) && (intval($vortrag_beginn)>0)) {
				  $dtstamp = $datum[2].$datum[0].$datum[1].'T'.$vortrag_beginn.'00';
				} else {
				    $dtstamp = $datum[2].$datum[0].$datum[1];
				}  
			    } else {
				$datum = array("-","-","-");
			    }
			    
		            if (isset($format) && ($format=='table') && ($single==0)) {		
				$out .= "<tr>\n";
				$out .= '<th>'.$title.'</th>';
				$out .= '<td>'.$vortrag_kurztext.'</td>';
				if (isset($vortrag_referentname)) {
					$out .= '<td>';
					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '<a href="'.$vortrag_referentlink.'">';
					}
					$out .= $vortrag_referentname;

					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '</a>';
					}
					$out .= '</td>';
				    }
				$out .= "</tr>\n";
			    } else {	
				
		
			      $out .= '<section class="shortcode vortrag vevent" id="post-'.$post_id.'" >';
			      $out .= "\n";
				    $out .=  '<header class="titel ym-cbox">';
				 
				    $out .= '<h2 class="summary">'.$title.'</h2>';
				    
				    if (isset($vortrag_referentname)) {
					$out .= '<p class="autor">';
					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '<a href="'.$vortrag_referentlink.'">';
					}
					$out .= $vortrag_referentname;

					if (isset($vortrag_referentlink)&& (strlen(trim($vortrag_referentlink))>0)) {
					    $out .= '</a>';
					}
					$out .= '</p>';
				    }
				    
				    if (isset($vortrag_datum)) {
					    $out .= '<ul class="termin">';
					    $out .= '<li class="date dtstart" title="'.$dtstart.'">Datum: '.$datum[1].'.'.$datum[0].'.'.$datum[2].'</span></li>'; 
					    $out .= '<li class="zeit">Beginn: <span class="dtstamp" title="'.$dtstamp.'">'.$vortrag_beginn.'</span> Uhr</li>'; 
					    $out .= '<li class="ort">Ort: <span class="location">'.$vortrag_raum.'</span></li>'; 
					    $out .= '</ul>';
				    }
				    
				    
				    $out .= '</header>';  
				    $out .= "\n";
				
				     
				     
				     
				 $out .= '<div class="ym-column">';
				  $out .= "\n";
				     $out .= '<article class="post-entry ym-cbox"><p>';
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

?>