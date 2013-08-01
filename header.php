<?php
global $options;
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>  <!-- begin: body -->
  <div class="page_margins">  <!-- begin: page_margins --> 
    <div id="seite" class="page">  <!-- begin: seite -->
      <a name="seitenmarke" id="seitenmarke"></a>
      
      <header><div id="kopf">  <!-- begin: kopf -->   
		  	<div id="logo">
                						
				<?php if ( ! is_home() ) { ?>
				    <a href="<?php echo home_url( '/' ); ?>" title="<?php echo $options['default_text_title_home_backlink']; ?>" rel="home" class="logo">
				<?php } ?>                                                             
                                <h1><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>"></h1>
                            <?php                                
                            if ( ! is_home() ) { ?> </a>  <?php } ?>
				
				
			</div>
			<div id="titel">	 	
        			<h1><?php the_title(); ?></h1> 
			</div>       

			<?php get_search_form(); ?>
		 
        <div id="breadcrumb">
          	<h2>Sie befinden sich hier: </h2>
		  	<p>			    
			    <?php if (function_exists('wke2014_breadcrumbs')) wke2014_breadcrumbs(); ?>
			</p>
        </div>               
        <div id="sprungmarken">
          <h2>Sprungmarken</h2>
          <ul>
	            <li class="first"><a href="#contentmarke">Zum Inhalt springen</a><span class="skip">. </span></li>
				<li><a href="#bereichsmenumarke">Zur Navigation springen</a><span class="skip">. </span></li>		
				<li class="last"><a href="#hilfemarke">Zu den allgemeinen Informationen springen</a><span class="skip">. </span></li>            
          </ul>
        </div>
	<?php if ( has_nav_menu( 'targetmenue' ) ) { ?>
	    <nav id="zielgruppen-menue" class="zielgruppen-menue" role="navigation">
		<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'wke2014' ); ?>"><?php _e( 'Skip to content', 'wke2014' ); ?></a>
		<?php wp_nav_menu( array( 'theme_location' => 'targetmenue', 'fallback_cb' => '', 'depth' => 1 ) );?>
	    </nav><!-- #target-navigation -->
         <?php } ?> 	  
	  
	  </div></header>  <!-- end: kopf -->
      	<hr id="nachkopf" />  
		<div id="main">  <!-- begin: main -->
      		<div id="menu">  <!-- begin: menu -->	  
		        <div id="bereichsmenu">
		         	<h2><a name="bereichsmenumarke" id="bereichsmenumarke">Navigation</a></h2>      
				  
			    <?php 
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'walker'  => new My_Walker_Nav_Menu()) );      
                                } else { ?>
                                    <div class="menu-header">
                                        <ul id="menu-mainmenu" class="menu">      
                                            <?php  wp_page_menu( array(
                                        'sort_column' => 'menu_order, post_title',
                                        'echo'        => 1,
                                        'show_home'   => 1 ) ); ?>          
                                        </ul>
                                    </div>
                                <?php  } ?>
				
				
		        </div>
			<?php if ( is_active_sidebar( 'kurzinfo-area' ) ) { 
			    dynamic_sidebar( 'kurzinfo-area' ); 
			 } ?>
		</div>  <!-- end: menu -->
		<?php if ( is_active_sidebar( 'sidebar-area' ) ) { 
		    dynamic_sidebar( 'sidebar-area' ); 
		} ?>
		             
	    	<div id="content">  <!-- begin: content -->
	        <a name="contentmarke" id="contentmarke"></a>       
    
    

	    