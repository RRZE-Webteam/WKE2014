<?php



/*
 * Hilfereiche Funktionen für die Custom Fields
 */

if ( ! function_exists( 'fau_form_textarea' ) ) :
    function fau_form_textarea($name= '', $prevalue = '', $labeltext = '', $cols=60, $rows=5, $howtotext = '') {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo "<p>\n";
	    echo '	<label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label></p>\n";
	    echo '	<textarea name="'.$name.'" id="'.$name.'" rows="'.$rows.'" cols="'.$cols.'">'.$prevalue.'</textarea>';

	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_textarea() - Name oder Label fehlt.', 'fau');
	}
    }
endif;
if ( ! function_exists( 'fau_form_wpeditor' ) ) :
    function fau_form_wpeditor($name= '', $prevalue = '', $labeltext = '', $howtotext = '', $small = true) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo "<p>\n";
	    echo '	<label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label></p>\n";
	    if ($small==true) {
		wp_editor( $prevalue, $name, array('teeny' => true, 'textarea_rows' => 5, 'media_buttons' => false) );
	    } else {
		wp_editor( $prevalue, $name );
	    }
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_wpeditor() - Name oder Label fehlt.', 'fau');
	}
    }
endif;
if ( ! function_exists( 'fau_form_text' ) ) :
    function fau_form_text($name= '', $prevalue = '', $labeltext = '', $howtotext = '', $placeholder='', $size = 0) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo "<p>\n";
	    echo '	<label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label><br />\n";
	     
	    echo '	<input type="text" ';
	   if (intval($size)>0) {
	       echo ' size="'.$size.'"';
	    } else {
		echo ' class="large-text"';
	    }
	    echo ' name="'.$name.'" id="'.$name.'" value="'.$prevalue.'"';
	    if (strlen(trim($placeholder))) {
		echo ' placeholder="'.$placeholder.'"';
	    }
	  
	    echo " />\n";
	    echo "</p>\n";
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_text() - Name oder Label fehlt.', 'fau');
	}
    }
endif;
if ( ! function_exists( 'fau_form_email' ) ) :
    function fau_form_email($name= '', $prevalue = '', $labeltext = '', $howtotext = '', $placeholder='', $size = 0) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo "<p>\n";
	    echo '	<label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label><br />\n";
	     
	    echo '	<input type="email" ';
	   if (intval($size)>0) {
	       echo ' size="'.$size.'"';
	    } else {
		echo ' class="large-text"';
	    }
	    echo ' name="'.$name.'" id="'.$name.'" value="'.$prevalue.'"';
	    if (strlen(trim($placeholder))) {
		echo ' placeholder="'.$placeholder.'"';
	    }
	  
	    echo " />\n";
	    echo "</p>\n";
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_email() - Name oder Label fehlt.', 'fau');
	}
    }
endif;
if ( ! function_exists( 'fau_form_number' ) ) :
    function fau_form_number($name= '', $prevalue = '', $labeltext = '', $howtotext = '', $min = 0, $max = 0, $step=1) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo "<p>\n";
	    echo '	<label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label><br />\n";
	     
	    echo '	<input type="number" ';
	   
	    echo 'name="'.$name.'" id="'.$name.'" value="'.$prevalue.'"';
	    if ($min>0) {
		echo ' min="'.$min.'"';
	    }
	    if ($max>0) {
		echo ' max="'.$max.'"';
	    }
	     if ($step>1) {
		echo ' step="'.$step.'"';
	    }
	  
	    echo " />\n";
	    echo "</p>\n";
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_number() - Name oder Label fehlt.', 'fau');
	}
    }
endif;

if ( ! function_exists( 'fau_form_url' ) ) :
    function fau_form_url($name= '', $prevalue = '', $labeltext = '', $howtotext = '', $placeholder='http://', $size = 0) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo "<p>\n";
	    echo '	<label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label><br />\n";
	    echo '	<input type="url" class="large-text" name="'.$name.'" id="'.$name.'" value="'.$prevalue.'"';
	    if (strlen(trim($placeholder))) {
		echo ' placeholder="'.$placeholder.'"';
	    }
	    if (intval($size)>0) {
		echo ' length="'.$size.'"';
	    }
	    echo " />\n";
	    echo "</p>\n";
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_url() - Name oder Label fehlt.', 'fau');
	}
    }
endif;    

if ( ! function_exists( 'fau_form_onoff' ) ) :
    function fau_form_onoff($name= '', $prevalue = 0, $labeltext = '',  $howtotext = '' ) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  { ?>
	    <div class="schalter">
		<select class="onoff" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		    <option value="0" <?php selected(0,$prevalue);?>>Aus</option>
		    <option value="1" <?php selected(1,$prevalue);?>>An</option>
		</select>
		<label for="<?php echo $name; ?>">
		    <?php echo $labeltext; ?>
		</label>
	    </div>
	    <?php 
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_onoff() - Name oder Label fehlt.', 'fau');
	}
    }
endif;    
    
if ( ! function_exists( 'fau_form_select' ) ) :
    function fau_form_select($name= '', $liste = array(), $prevalue, $labeltext = '',  $howtotext = '', $showempty=1, $emptytext = '' ) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	$emptytext = fau_san( $emptytext );

	if (is_array($liste) && isset($name) &&  isset($labeltext))  { ?>
	    <div class="liste">
		<p><label for="<?php echo $name; ?>">
		    <?php echo $labeltext; ?>
		    </label></p>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		<?php 
		if ($showempty==1) { 
		    echo '<option value="">';
		    if (!empty($emptytext)) {
			echo $emptytext;
		    } else {
			_e('Keine Auswahl','fau');
		    }
		    echo '</option>';
		}

		foreach($liste as $entry => $value){  ?>
		    <option value="<?php echo $entry; ?>" <?php selected($entry,$prevalue);?>><?php echo $value; ?></option>
		<?php } ?>	
		</select>

	    </div>
	    <?php 
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_select() - Array, Name oder Label fehlt.', 'fau');
	}
    }
endif;    
    
if ( ! function_exists( 'fau_form_multiselect' ) ) :  
    function fau_form_multiselect($name= '', $liste = array(), $prevalues = array(), $labeltext = '',  $howtotext = '', $showempty=1, $emptytext = '' ) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	$emptytext = fau_san( $emptytext );

	if (is_array($liste) && isset($name) &&  isset($labeltext))  { ?>
	    <div class="liste">
		<p><label for="<?php echo $name; ?>">
		    <?php echo $labeltext; ?>
		    </label></p>
		    <select size="5" multiple="1" name="<?php echo $name; ?>[]" id="<?php echo $name; ?>">
		<?php 
		if ($showempty==1) { 
		    echo '<option value="">';
		    if (!empty($emptytext)) {
			echo $emptytext;
		    } else {
			_e('Keine Auswahl','fau');
		    }
		    echo '</option>';
		}

		foreach($liste as $entry => $value){  
		    echo '<option value="'.$entry.'"';
		    if (is_array($prevalues)) {
			foreach($prevalues as $pnum){
			    if ($entry==$pnum)
				echo ' selected="selected"';
			}
		    }
		    echo '>';		
		    echo $value;
		    echo '</option>';

		} ?>	
		</select>

	    </div>
	    <?php 
	    if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	} else {
	    echo _('Ungültiger Aufruf von fau_form_multiselect() - Array, Name oder Label fehlt.', 'fau');
	}
    }
endif;    
   


if ( ! function_exists( 'fau_form_image' ) ) :
    function fau_form_image($name= '', $preimageid = 0, $labeltext = '',  $howtotext = '', $width=300, $height=200 ) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {
	    echo '<p><label for="'.$name.'">';
	    echo $labeltext;
	    echo "</label></p>\n";

	    echo '<div class="uploader">';
	    
	    $image = '';
	    $imagehtml = '';
	    if (isset($preimageid) && ($preimageid>0)) {
		$image = wp_get_attachment_image_src($preimageid, 'full'); 
		if (isset($image)) {
		    $imagehtml = '<img class="image_show_'.$name.'" src="'.$image[0].'" width="'.$width.'" height="'.$height.'" alt="">';
		}
	    }

	    echo '<div class="previewimage showimg_'.$name.'">';
	    if (!empty($imagehtml)) {  
		echo $imagehtml;
	    } 
	    echo "</div>\n"; ?>		

	    <input type="hidden" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo sanitize_key( $preimageid ) ; ?>" />
	    

	    <input class="button" name="image_button_<?php echo $name; ?>" id="image_button_<?php echo $name; ?>" value="<?php _e('Bild auswählen', 'fau'); ?>" />
	    <small><a href="#" class="image_remove_<?php echo $name; ?>"><?php _e( "Entfernen", 'fau' );?></a></small>
	    <br><p class="howto"><?php echo $howtotext; ?>	      
	    </p><script>
	    jQuery(document).ready(function() {
		jQuery('#image_button_<?php echo $name; ?>').click(function()  {
		    wp.media.editor.send.attachment = function(props, attachment) {
			jQuery('#<?php echo $name; ?>').val(attachment.id);
			htmlshow = "<img src=\""+attachment.url + "\" width=\"<?php echo $width;?>\" height=\"<?php echo $height;?>\">";  					   
			jQuery('.showimg_<?php echo $name; ?>').html(htmlshow);

		    }
		    wp.media.editor.open(this);
		    return false;
		});
	    });
	    jQuery(document).ready(function() {
		jQuery('.image_remove_<?php echo $name; ?>').click(function()   {
			jQuery('#<?php echo $name; ?>').val('');
			jQuery('.showimg_<?php echo $name; ?>').html('<?php _e('Kein Bild ausgewählt.', 'fau'); ?>');
			return false;
		});
	    });
	   </script> 		    	    
	   </div>
	   <?php 
	
	} else {
	    echo _('Ungültiger Aufruf von fau_form_image() - Name oder Label fehlt.', 'fau');
	}
    }
 endif;
    




if ( ! function_exists( 'fau_form_link' ) ) :
    function fau_form_link($name= '', $pretitle ='', $preurl ='' , $labeltext = '',  $howtotext = '', $withtitle = true ) {
	$name = fau_san( $name );
	$labeltext = fau_san( $labeltext );
	if (isset($name) &&  isset($labeltext))  {	    
	    wp_enqueue_script( 'wp-link' );
	    echo '<div class="linkeingabe">';
	    $rand = rand();
	    echo '<h2 class="label">'.$labeltext.'</h2>';
	     if (strlen(trim($howtotext))) {
		echo '<p class="howto">';
		echo $howtotext;
		echo "</p>\n";
	    }
	    echo '<div class="linkauswahl" id="container_'.$rand.'">';
	    if ($withtitle) {
		echo "<p>\n";
		echo '<label for="title_'.$rand.'_'.$name.'">'.__('Titel','fau');   
		echo "</label><br />\n";
		echo '<input type="text" class="large-text" name="'.$name.'_title" id="title_'.$rand.'_'.$name.'" value="'.$pretitle.'" placeholder="'.__('Nutze Titel der verlinkten Seite','fau').'">';
		echo "</p>\n";	  
	    }
	    echo "<p>\n";
	    echo '<label for="url_'.$rand.'_'.$name.'">'.__('URL','fau');  
	    echo "</label><br />\n";
	    echo '<input type="url" class="large-text" name="'.$name.'_url" id="url_'.$rand.'_'.$name.'" value="'.$preurl.'" placeholder="https://">';
	    echo "</p>";
	    echo '<p><input class="button link_button_'.$name.'" name="link_button_'.$name.'" id="link_button_'.$name.'" type="button" value="'.__('Wähle Link','fau').'"></p>';
	    echo "</div>\n";
	   
	    ?>
	  <script>
	      var link_btn_<?php echo $name ?> = (function ($) {
		  var link_val_container = $('#url_<?php echo $rand ?>_<?php echo $name ?>');
		  var title_val_container = $('#title_<?php echo $rand ?>_<?php echo $name ?>');

		  function _init() {
		      $('.link_button_<?php echo $name ?>').on('click', function (event) {
			  wpActiveEditor = true;
			  wpLink.open();

			  wpLink.textarea = $(link_val_container);

			  _addLinkListeners();
			  return false;
		      });
		  }

		  function _addLinkListeners() {
		      $('body').on('click', '#wp-link-submit', function (event) {
			  var linkAtts = wpLink.getAttrs();

			  $(link_val_container).val(linkAtts.href);
			  $(title_val_container).val(linkAtts.title);

			  _removeLinkListeners(event);
			  return false;
		      });

		      $('body').on('click', '#wp-link-cancel, #wp-link-close', function (event) {
			  _removeLinkListeners(event);
			  return false;
		      });

		  }

		  function _removeLinkListeners(event) {
		      wpLink.textarea = $(link_val_container);
		      wpLink.close();

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		      event.stopPropagation();
		  }

		  return {
		      init: _init,
		  };

	      })(jQuery);

	      jQuery(document).ready(function ($) {

		  link_btn_<?php echo $name ?>.init();

	      });
	  </script> 		    	    
	  <?php
	 echo "</div>\n";

	 
	} else {
	    echo _('Ungültiger Aufruf von fau_form_link() - Name oder Label fehlt.', 'fau');
	}
    }
 endif;


if ( ! function_exists( 'fau_save_standard' ) ) :  
    function fau_save_standard($name, $val, $post_id, $type='text') {
	if (isset($name) && isset($post_id) && isset($type)) {
	    
	    if ($type == 'url') {
		 $newval = ( isset( $val ) ? esc_url( $val ) : 0 );		
	    } elseif ($type == 'email') {
		 $newval = ( isset( $val ) ? sanitize_email( $val ) : 0 );	
	    } elseif ($type == 'text') {
		 $newval = ( isset( $val ) ? sanitize_text_field( $val ) : 0 );	
	    } elseif ($type == 'textarea') {
		 $newval =  ( isset( $val ) ? esc_textarea( $val ) : 0 );				 
	     } elseif ($type == 'wpeditor') {
		 $newval =  $val;			 
	    } else {
		 $newval = ( isset( $val ) ? sanitize_text_field( $val ) : 0 );
	    }
	    $oldval =  get_post_meta( $post_id, $name, true );	  
	    if (!empty($newval)) {
		update_post_meta( $post_id, $name, $newval );
	    } elseif ($oldval) {
		delete_post_meta( $post_id, $name, $oldval );	
	    } 

	    
	} else {
	    return false;
	}
    
    }

 endif;    



if ( ! function_exists( 'fau_san' ) ) :  
    function fau_san($s){
	return filter_var(trim($s), FILTER_SANITIZE_STRING);
    }
endif;    


if ( ! function_exists( 'fau_get_image_attributs' ) ) :
    function fau_get_image_attributs($id=0) {
        $precopyright = __('Bild:','fau').' ';
        if ($id==0) return;
        
        $meta = get_post_meta( $id );
        if (!isset($meta)) {
         return;
        }
        $result = array();
	if (isset($meta['_wp_attachment_image_alt'][0])) {
	    $result['alt'] = trim(strip_tags($meta['_wp_attachment_image_alt'][0]));
	} else {
	    $result['alt'] = "";
	}       
        if (isset($meta['_wp_attachment_metadata']) && is_array($meta['_wp_attachment_metadata'])) {        
         $data = unserialize($meta['_wp_attachment_metadata'][0]);
         if (isset($data['image_meta']) && is_array($data['image_meta']) && isset($data['image_meta']['copyright'])) {
                $result['copyright'] = trim(strip_tags($data['image_meta']['copyright']));
         }
        }
        $attachment = get_post($id);
        $result['beschriftung'] = $result['beschreibung'] = $result['title'] = '';
        if (isset($attachment) ) {
	    if (isset($attachment->post_excerpt)) {
		$result['beschriftung'] = trim(strip_tags( $attachment->post_excerpt ));
	    }
	    if (isset($attachment->post_content)) {
		$result['beschreibung'] = trim(strip_tags( $attachment->post_content ));
	    }        
	    if (isset($attachment->post_title)) {
		 $result['title'] = trim(strip_tags( $attachment->post_title )); // Finally, use the title
	    }   
        }
        
        $displayinfo = $result['beschriftung'];
        if (empty($displayinfo) && !empty($result['copyright'])) $displayinfo = $precopyright.$result['copyright'];
        if (empty($displayinfo)) $displayinfo = $result['alt'];
        $result['credits'] = $displayinfo;
        return $result;
                
    }
endif;
