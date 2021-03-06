<?php get_header();    
  global $options;    
     if ( is_active_sidebar( 'inhaltsinfo-area' ) ) { 
    	 dynamic_sidebar( 'inhaltsinfo-area' ); 
    }  
 ?>    
    

	
<?php if ( have_posts() ) while ( have_posts() ) : the_post();         
	 $custom_fields = get_post_custom();
	?>    


 
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	              
            
          
            
          <div class="post-entry">
            <?php the_content(); ?>
          </div>
            
			
          <div class="post-meta"><p>
               <?php 
                wke2014_post_pubdateinfo();    
                if ($options['aktiv-autoren']) wke2014_post_autorinfo();             
                 wke2014_post_taxonominfo();  
                ?>                  
              </p>
          </div>
	  
	  <div><?php edit_post_link( __( 'Bearbeiten', 'wke2014' ), '', '' ); ?></div>
        </div>
	 
	<div class="post-nav">
		<ul>
		<?php 
		 previous_post_link('<li class="back">&#9664; %link</li>', '%title'); 
		 next_post_link('<li class="forward">%link &#9654;</li>', '%title'); 
		 ?>
		</ul>
	  </div>        
        <hr>

        <div class="post-comments" id="comments">
          <?php comments_template( '', true ); ?>
        </div>

        <div class="post-nav">
            
           <?php if (has_filter( 'related_posts_by_category')) { ?>   
          <h3><?php _e("Weitere Artikel in diesem Themenkreis:", 'wke2014'); ?></h3>
          <ul class="related">
            <?php do_action(
            'related_posts_by_category',
            array(
            'orderby' => 'post_date',
            'order' => 'DESC',
            'limit' => 5,
            'echo' => true,
            'before' => '<li>',
            'inside' => '',
            'outside' => '',
            'after' => '</li>',
            'rel' => 'follow',
            'type' => 'post',
            'image' => array(1, 1),
            'message' => 'Keine Treffer'
            )
            ) ?>
          </ul>
          <?php } ?>
        </div>

       
  <?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>