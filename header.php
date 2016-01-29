<?php
global $options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><?php } ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head();   ?>
</head>

<body <?php body_class(); ?>>  <!-- begin: body -->
  <div class="page_margins">  <!-- begin: page_margins -->
    <div id="seite" class="page">  <!-- begin: seite -->
      <header><div id="kopf">  <!-- begin: kopf -->


	    <div id="logo">
		    <p>
		    <?php if (! is_front_page() ) { ?>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo $options['default_text_title_home_backlink']; ?>" rel="home" class="logo">
		    <?php } ?>
		    <img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
		<?php
		if ( ! is_front_page()) { ?> </a>  <?php } ?>
		    </p>

	    </div>
	    <?php if ( is_active_sidebar( 'headerbox-area' ) ) {
		dynamic_sidebar( 'headerbox-area' );
	     } elseif (isset($options['headerbox-datum']) && isset($options['headerbox-title'])) { ?>
		 <div id="header-box">
		    <div class="wrapper">
			<p class="datum"><?php echo $options['headerbox-datum']; ?></p>
			<p class="titel"><?php echo $options['headerbox-title']; ?></p>
		    </div>
		</div>
	    <?php } ?>
	    <?php get_search_form(); ?>

	    <div id="titel">
		    <h1>
				<?php if ( is_day() ) : ?>
					<?php printf( __( '%s', 'wke2014' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( '%s', 'wke2014' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wke2014' ) ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( '%s', 'wke2014' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wke2014' ) ) . '</span>' ); ?>
				<?php else : ?>
					<?php wke2014_contenttitle(); ?>
				<?php endif; ?>
			</h1>
	    </div>




	    <div id="breadcrumb">
		    <h2>Sie befinden sich hier: </h2>
			    <p>
				<?php if (function_exists('wke2014_breadcrumbs')) wke2014_breadcrumbs(); ?>
			    </p>
	    </div>
	    <div id="sprungmarken">
	      <h2>Sprungmarken</h2>
	      <ul>
			<li class="first"><a href="#content">Zum Inhalt</a><span class="skip">. </span></li>
			<li><a href="#navigation">Zur Navigation</a><span class="skip">. </span></li>
			<li class="last"><a href="#footer">Nach unten</a><span class="skip">. </span></li>
	      </ul>
	    </div>
	    <?php if ( has_nav_menu( 'targetmenue' ) ) { ?>
		<nav id="zielgruppen-menue" class="zielgruppen-menue" role="navigation">
		    <?php wp_nav_menu( array( 'theme_location' => 'targetmenue', 'fallback_cb' => '', 'depth' => 1 ) );?>
		</nav><!-- #target-navigation -->
	     <?php } ?>
		 <?php if ($options['aktiv-slider']==1) { ?>
	    <div id="headerimgs">
		<div id="control" class="btn"></div>
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	    </div>
	     <?php } ?>
	</div></header>  <!-- end: kopf -->
      	<hr id="nachkopf" />
		<div id="main">  <!-- begin: main -->
      		<div id="menu">  <!-- begin: menu -->
		        <div id="bereichsmenu">
		         	<h2><a name="bereichsmenumarke" id="bereichsmenumarke">Navigation</a></h2>

			    <?php
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu( array( 'container' => 'ul',  'menu_class'  => 'menu',
					'menu_id'         => 'navigation',  'theme_location' => 'primary', 'walker'  => '' ));
                                } else { ?>

                                        <ul id="navigation" class="menu">
                                            <?php  wp_page_menu( array(
                                        'sort_column' => 'menu_order, post_title',
                                        'echo'        => 1,
                                        'show_home'   => 1 ) ); ?>
                                        </ul>

                                <?php  } ?>


		        </div>
			<?php if ( is_active_sidebar( 'kurzinfo-area' ) ) {
			    dynamic_sidebar( 'kurzinfo-area' );
			 } ?>
		</div>  <!-- end: menu -->

		<?php get_sidebar(); ?>


	    	<div id="content">  <!-- begin: content -->



