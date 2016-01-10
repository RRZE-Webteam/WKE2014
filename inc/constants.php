<?php
/**
 * WKE2014  Constants
 *
 **/

$defaultoptions = array(
    'js-version'                    => '1.1',
    'default-color'		    => 'e6e6e6',
    'thumbnail-width'		    => 624,
    'thumbnail-height'		    => 9999,
    'content-width'                 => 625,


    'bannerlink-width'		    => 180,
	/* Max width for Logos and Images in Sidebar */
    'bannerlink-height'		    => 360,
	/* Max height for Logos and Images in Sidebar */

    'src_basemod_zusatzinfo'	    => '/css/basemod_zusatzinfo.css',
    'aktiv-basemod_zusatzinfo'	    => 1,
    'src_basemod_links'		    => '/css/basemod_links.css',
    'aktiv-basemod_links'	    => 1,
    'src_basemod_sidebar'	    => '/css/basemod_sidebar.css',
    'aktiv-basemod_sidebar'	    => 1,
    'src_basemod_blau'		    => '/css/basemod_blau.css',
    'aktiv-basemod_blau'	    => 1,
    'src_socialmediabuttons'	    => '/css/basemod_socialmediaicons.css',
    'aktiv-socialmediabuttons'	    => 1,
    'aktiv-autoren'                 => 1,
    'aktiv-commentreplylink'        => 0,
    'default_comment_notes_before'  => '<p class="comment-notes">'.__( 'Deine E-Mail-Adresse wird nicht ver&ouml;ffentlicht. Erforderliche Felder sind markiert <span class="required">*</span>', 'wke2014' ). '</p>',
    'disclaimer_post'               => '',

    'logo'			    => get_template_directory_uri() . '/images/wke_logo_2014_gruen.png',
    'logo_gruen'		    => get_template_directory_uri() . '/images/wke_logo_2014_gruen.png',
    'logo_blau'			    => get_template_directory_uri() . '/images/wke_logo_200x124.png',
    'logo-width'		    => 200,
    'logo-height'		    => 124,
    'background-header-color'	    => 'ffffff',
    'background-header-image'	    => '',

    'login_errors'		    => 0,
    'src-breadcrumb-image'	    => get_template_directory_uri() .'/images/breadcrumbarrow.gif',
    'src-teaser-thumbnail_default'  => '',


    'category-teaser'			    => 1,
    'category-num-article-fullwidth'	    => 10,
    'category-num-article-halfwidth'	    => 0,

    'category-teaser-maxlength'		    => 500,
    'category-teaser-titleup'		    => 1, /* Titles up */
    'category-teaser-datebox'		    => 0,
	/*
	 * 1 = Thumbnail (or: first picture, first video, fallback picture),
	 * 2 = First picture (or: thumbnail, first video, fallback picture),
	 * 3 = First video (or: thumbnail, first picture, fallback picture),
	 * 4 = First video (or: first picture, thumbnail, fallback picture),
	 * 5 = Nothing */
    'category-teaser-floating'		    => 0,
    'category-teaser-dateline'		    => 0, /* 1 = show Date on line up of the text if no datebox */
    'category-teaser-maxlength-halfwidth'   => 200,
    'category-teaser-titleup-halfwidth'	    => 1, /* Titles up */
    'category-teaser-datebox-halfwidth'	    => 1,
    'category-teaser-floating-halfwidth'    => 1,
    'category-teaser-dateline-halfwidth'    => 0, /* 1 = show Date on line up of the text if no datebox */

    'num-article-startpage-fullwidth'       => 1,
    'num-article-startpage-halfwidth'       => 4,
    'teaser-thumbnail_width'		    => 120,
    'teaser-thumbnail_height'		    => 120,
    'teaser-thumbnail_crop'		    => 0,
    'src-teaser-thumbnail_default'	    => get_template_directory_uri() .'/images/default-teaserthumb.gif',
    'teaser-thumbnail_fallback'		    => 1,
    'teaser-title-maxlength'        => 50,
    'teaser-subtitle'               => __( 'Topthema', 'wke2014' ),
    'teaser-title-words'            => 7,

    'teaser_maxlength'              => 500,
    'teaser-titleup'		    => 1, /* Titles up */
    'teaser-datebox'		    => 0,
    'teaser-floating'		    => 0,
    'teaser-dateline'		    => 0, /* 1 = show Date on line up of the text if no datebox */
    'teaser-maxlength-halfwidth'   => 200,
    'teaser-titleup-halfwidth'	    => 1, /* Titles up */
    'teaser-datebox-halfwidth'	    => 1,
    'teaser-floating-halfwidth'	    => 1,
    'teaser-dateline-halfwidth'    => 0, /* 1 = show Date on line up of the text if no datebox */

    'headerbox-datum'		    => '20.03.<br />+ 21.03.',
    'headerbox-title'		    => 'Webkongress <br /> Erlangen <span class="jahr">2014</span>',
    'text-startseite'		    =>  __( 'Startseite', 'wke2014' ),
    'default_text_title_home_backlink'	=>  __( 'Zur&uuml;ck zur Startseite', 'wke2014' ),

    'default_footerlink_key'	    => 'Fakultaeten',

    'aktiv-buttons'			=> 1,
    'aktiv-anmeldebutton'		=> 1,
    'url-anmeldebutton'			=> 'http://de.amiando.com/wke2014.html',
    'title-anmeldebutton'		=> 'Tickets kaufen',
    'color-anmeldebutton'		=> 'gruen',

    'aktiv-cfpbutton'			=> 1,
    'url-cfpbutton'			=> '/programm/vortragsvorschlag-einreichen-call-for-paper/',
    'title-cfpbutton'			=> 'Vortrag einreichen',
    'color-cfpbutton'			=> 'gelb',

    'aktiv-slider'			=> 1,
    'yt-alternativeembed'           => 1,
        /* YouTube Videos ueber eigenen Embedcode gestalten und an youtbe-nocookie lenken */
    'yt-norel'			 => 1,
	/* Keine weiteren Videos vorschlagen */
    'yt-content-width'              => 665,
    'yt-content-height'             => 500,
    'aktiv-opengraph'                   => false,

);

/* Vortragszeiten */

  $vortragszeiten = array(
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
$vortragsraeume = array(
			"" => __('Noch in Planung', 'wke2014'),
			"H11" => __('Hörsaal 11 (500 Plätze)', 'wke2014'),
			"H12" => __('Hörsaal 12 (176 Plätze)', 'wke2014'),
			"H13" => __('Hörsaal 13 (121 Plätze)', 'wke2014'),
			"Heinrich Lades Halle" => __('Heinrich Lades Halle', 'wke2014'),

		    );

/*
 * Liste Social Media
 */
$default_socialmedia_liste = array(
    'delicious' => array(
	'name' => 'Delicious',
	'content'  => '',
	'active' => 0,
    ),
    'diaspora' => array(
	'name' => 'Diaspora',
	'content'  => '',
	'active' => 0,
    ),
    'facebook' => array(
	'name' => 'Facebook',
	'content'  => 'https://www.facebook.com/pages/Webkongress-Erlangen',
	'active' => 1,
    ),
    'twitter' => array(
	'name' => 'Twitter',
	'content'  => 'https://twitter.com/#!/wke',
	'active' => 1,
    ),
    'gplus' => array(
	'name' => 'Google Plus',
	'content'  => '',
	'active' => 1,
    ),
    'flattr' => array(
	'name' => 'Flattr',
	'content'  => '',
	'active' => 0,
    ),
    'flickr' => array(
	'name' => 'Flickr',
	'content'  => 'http://flickr.com/photos/tags/wke2010/',
	'active' => 0,
    ),

    'identica' => array(
	'name' => 'Identica',
	'content'  => '',
	'active' => 0,
    ),
    'itunes' => array(
	'name' => 'iTunes',
	'content'  => '',
	'active' => 0,
    ),
    'skype' => array(
	'name' => 'Skype',
	'content'  => '',
	'active' => 0,
    ),

    'youtube' => array(
	'name' => 'YouTube',
	'content'  => '',
	'active' => 1,
    ),
    'xing' => array(
	'name' => 'Xing',
	'content'  => '',
	'active' => 0,
    ),
    'tumblr' => array(
	'name' => 'Tumblr',
	'content'  => '',
	'active' => 1,
    ),
    'github' => array(
	'name' => 'GitHub',
	'content'  => '',
	'active' => 0,
    ),
    'appnet' => array(
	'name' => 'App.Net',
	'content'  => '',
	'active' => 0,
    ),
    'feed' => array(
	'name' => 'RSS Feed',
	'content'  => get_bloginfo( 'rss2_url' ),
	'active' => 1,
    ),
);

/*
 * Linkliste fuer Footer und Widgets
 */
 $default_footerlink_liste = array(
     __( 'Fakultaeten', 'wke2014' )  => array(
        'title' => __( 'Friedrich-Alexander-Universit&auml;t Erlangen-N&uuml;rnberg', 'wke2014' ),
        'url'   => 'http://www.fau.de',
        'sublist'   => array(
            __('Philosophische Fakult&auml;t und Fachbereich Theologie', 'wke2014' ) => 'http://www.phil.faude/',
            __('Rechts- und Wirtschaftswissenschaftliche Fakult&auml;t', 'wke2014' ) => 'http://www.rw.fau.de/',
            __('Medizinische Fakult&auml;t', 'wke2014' ) => 'http://www.med.fau.de/',
            __('Naturwissenschaftliche Fakult&auml;t', 'wke2014' ) => 'http://www.natfak.fau.de/',
            __('Technische Fakult&auml;t', 'wke2014' ) => 'http://www.techfak.fau.de/',

        )
     ),
     __( 'RRZE', 'wke2014' )  => array(
        'title' => __( 'Regioanles Rechenzentrum Erlangen', 'wke2014' ),
        'url'   => 'http://www.rrze.fau.de',
        'sublist'   => array(

            __('Service-Theke', 'wke2014' ) => 'http://www.rrze.fau.de/hilfe/service-theke',
            __('Informationszentrum Innenstadt', 'wke2014' ) => 'http://www.izi.rrze.fau.de/',
            __('Informationszentrum N&uuml;rnberg', 'wke2014' ) => 'http://www.zzn.rrze.fau.de/',
            __('Informationszentrum Halbmondstrasse', 'wke2014' ) => 'http://www.izh.rrze.fau.de/',

	    __('Blogdienst', 'wke2014' ) => 'http://blogs.fau.de/',
	    __('Videoportal', 'wke2014' ) => 'http://video.fau.de/',
	    __('IDM', 'wke2014' ) => 'https://www.idm.fau.de/',
	    __('Aktuelle Meldungen', 'wke2014' ) => 'http://blogs.fau.de/rrze/',


        )
     ),
);



/*
 * Definition welche Konstanten als Optionen im Backend geaendert werden koennen
 */


$setoptions = array(
   'wke2014_theme_options'   => array(

       'design'   => array(
           'tabtitle'   => __('Design', 'wke2014'),
           'fields' => array(



              'aktiv-basemod_sidebar' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Sidebar', 'wke2014'),
                  'label'   => __( 'Sidebar rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_sidebar'],
              ),
	      'aktiv-basemod_zusatzinfo' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Zusatzinfo', 'wke2014'),
                  'label'   => __( 'Zusatzinfo anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_zusatzinfo'],
              ),
	      'aktiv-basemod_links' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Linkicons', 'wke2014'),
                  'label'   => __( 'Automatische Linkicons aktivieren','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_links'],
              ),
	        'aktiv-basemod_blau' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Blaues Logo', 'wke2014'),
                  'label'   => __( 'Logo im blauen Stil aktivieren','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_blau'],
              ),
	      'headerbox-datum' => array(
                  'type'    => 'html',
                  'title'   => __( 'Datumsangabe', 'wke2014'),
                  'label'   => __( 'Datum des Kongresses in Box rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['headerbox-datum'],
              ),
	      'headerbox-title' => array(
                  'type'    => 'html',
                  'title'   => __( 'Titel', 'wke2014'),
                  'label'   => __( 'Subtitel in Box rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['headerbox-title'],
              ),
	      'text-startseite' => array(
                  'type'    => 'text',
                  'title'   => __( 'Name Startseite', 'wke2014'),
                  'label'   => __( 'Name der Startseite f&uuml;r die Brotkr&uuml;melnavigation','wke2014' ),
                  'default' => $defaultoptions['text-startseite'],
              ),
	      'aktiv-autoren' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Autoren anzeigen', 'wke2014' ),
                  'label'   => __( 'Bei der Anzeige von Artikeln den Autoren anzeigen und verlinken.', 'wke2014' ),
                  'default' => $defaultoptions['aktiv-autoren'],
              ),
	       'aktiv-slider' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Slider', 'wke2014' ),
                  'label'   => __( 'Bilder im Kopfteil animieren', 'wke2014' ),
                  'default' => $defaultoptions['aktiv-slider'],
              ),
	     'buttons'  => array(
		      'type'    => 'section',
		      'title'   => __( 'Anmeldebuttons', 'wke2014' ),
		  ),
	       'aktiv-buttons' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Buttons anzeigen', 'wke2014' ),
                  'label'   => __( 'Rechts oberhalb der Sidebar Anmeldebuttons zeigen', 'wke2014' ),
                  'default' => $defaultoptions['aktiv-buttons'],
		   'parent'  => 'buttons'
              ),
	      'aktiv-anmeldebutton' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Anmeldebutton', 'wke2014' ),
                  'label'   => __( 'Button f&uuml;r eine Anmeldung', 'wke2014' ),
                  'default' => $defaultoptions['aktiv-anmeldebutton'],
		  'parent'  => 'buttons'
              ),
	       'url-anmeldebutton' => array(
                  'type'    => 'url',
                  'title'   => __( 'URL', 'wke2014' ),
                  'label'   => __( 'Ziel des Anmeldebuttons', 'wke2014' ),
                  'default' => $defaultoptions['url-anmeldebutton'],
		  'parent'  => 'buttons'
              ),
	       'title-anmeldebutton' => array(
                  'type'    => 'text',
                  'title'   => __( 'Linktitel', 'wke2014' ),
                  'label'   => __( 'Titeltext des Anmeldebuttons', 'wke2014' ),
                  'default' => $defaultoptions['title-anmeldebutton'],
		  'parent'  => 'buttons'
              ),
	       'color-anmeldebutton' => array(
                  'type'    => 'select',
                  'title'   => __( 'Farbe', 'wke2014' ),
                  'label'   => __( 'Hintergrundfarbe des Anmeldebuttons', 'wke2014' ),
                  'default' => $defaultoptions['color-anmeldebutton'],
		  'liste'   =>  array(
				'grau' => __("Grau","piratenkleider"),
				'gelb' => __("Gelb","piratenkleider"),
				'gruen' => __("Gr&uuml;n","piratenkleider"),
				'blau' => __("Blau","piratenkleider"),
				),
		  'parent'  => 'buttons'
              ),
	       'aktiv-cfpbutton' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Anmeldebutton', 'wke2014' ),
                  'label'   => __( 'Aktiviere einen weiteren Buttons', 'wke2014' ),
                  'default' => $defaultoptions['aktiv-cfpbutton'],
		  'parent'  => 'buttons'
              ),
	       'url-cfpbutton' => array(
                  'type'    => 'url',
                  'title'   => __( 'URL', 'wke2014' ),
                  'label'   => __( 'Ziel eines weiteren Buttons', 'wke2014' ),
                  'default' => $defaultoptions['url-cfpbutton'],
		  'parent'  => 'buttons'
              ),
	       'title-cfpbutton' => array(
                  'type'    => 'text',
                  'title'   => __( 'Linktitel', 'wke2014' ),
                  'label'   => __( 'Titeltext eines weiteren Buttons', 'wke2014' ),
                  'default' => $defaultoptions['title-cfpbutton'],
		  'parent'  => 'buttons'
              ),
	       'color-cfpbutton' => array(
                  'type'    => 'select',
                  'title'   => __( 'Farbe', 'wke2014' ),
                  'label'   => __( 'Hintergrundfarbe eines weiteren Buttons', 'wke2014' ),
                  'default' => $defaultoptions['color-cfpbutton'],
		  'liste'   =>  array(
				'grau' => __("Grau","piratenkleider"),
				'gelb' => __("Gelb","piratenkleider"),
				'gruen' => __("Gr&uuml;n","piratenkleider"),
				'blau' => __("Blau","piratenkleider"),
				),
		  'parent'  => 'buttons'
              ),





           )
       ),
       'startseite' => array(
	   'tabtitle'   => __('Startseite', 'wke2014'),
           'fields' => array(

		'teaser-title-maxlength' => array(
		      'type'    => 'number',
		      'title'   => __( 'Textl&auml;nge', 'wke2014' ),
		      'label'   => __( 'Maximale Textl&auml;nge des Titels im Teaser.', 'wke2014' ),
		      'default' => $defaultoptions['teaser-title-maxlength'],
		  ),
		 'teaser-title-words' => array(
		      'type'    => 'number',
		      'title'   => __( 'Wortzahl', 'wke2014' ),
		      'label'   => __( 'Zahl der Worte im Teaser; Die maximale Textl&auml;nge begrenzt diesen Wert jedoch.', 'wke2014' ),
		      'default' => $defaultoptions['teaser-title-words'],
		  ),

		'auszuege'  => array(
		      'type'    => 'section',
		      'title'   => __( 'Gestaltung Textausz&uuml;ge', 'wke2014' ),
		  ),
		    'num-article-startpage-fullwidth' => array(
		      'type'    => 'number',
		      'title'   => __( 'Beitr&auml;ge &uuml;ber ganze Breite', 'wke2014' ),
		      'label'   => __( 'Zahl der Beitr&auml;ge, die &uuml;ber die gesamte Inhaltsbreite gehen.', 'wke2014' ),
		      'default' => $defaultoptions['num-article-startpage-fullwidth'],
			'parent'  => 'auszuege'
		  ),
		  'num-article-startpage-halfwidth' => array(
		      'type'    => 'select',
		      'title'   => __( 'Beitr&auml;ge &uuml;ber halbe Breite', 'wke2014' ),
		      'label'   => __( 'Zahl der Beitr&auml;ge, die in Spalten mit je zwei Beitr&auml;gen nebeneinander, angezeigt werden.', 'wke2014' ),
		      'liste'   => array(0 => 0, 2 => 2, 4 => 4, 6 => 6, 8 => 8),
		      'default' => $defaultoptions['num-article-startpage-halfwidth'],
		      'parent'  => 'auszuege'
		  ),


		 'teaser_maxlength' => array(
		      'type'    => 'number',
		      'title'   => __( 'L&auml;nge des Teasertextes (Artikelauszug)', 'wke2014' ),
		      'label'   => __( 'Maximale Textl&auml;nge f&uuml;r Artikelausz&uuml;ge auf der Startseite.', 'wke2014' ),
		      'default' => $defaultoptions['teaser_maxlength'],
		     'parent'  => 'auszuege'
		  ),
		  'teaser-titleup' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Titel oben', 'wke2014' ),
		      'label'   => __( 'Titel &uuml;ber Logo/Datumsbox und Text', 'wke2014' ),
		      'default' => $defaultoptions['teaser-titleup'],
		      'parent'  => 'auszuege'
		  ),
		  'teaser-datebox' => array(
		      'type'    => 'select',
		      'title'   => __( 'Symbolbild/Datumsbox', 'wke2014' ),
		      'label'   => __( 'Links des Textauszuges das Datum, das Artikelbild, ein Bild des Artikels oder ein verlinktes Video anzeigen; Abhängig vom Inhalt des Artikels.', 'wke2014' ),
		      'default' => $defaultoptions['teaser-datebox'],
		      'liste'   =>  array(
				    1 => __("Reihenfolge: Artikelbild, erstes Bild, erstes Video oder Ersatzbild zeigen","wke2014"),
				    2 => __("Reihenfolge: Erstes Bild, Artikelbild, erstes Video oder Ersatzbild zeigen","wke2014"),
				    3 => __("Reihenfolge: Erstes Video, Artikelbild, erstes Bild oder Ersatzbild zeigen","wke2014"),
				    4 => __("Reihenfolge: Erstes Video, erstes Bild, Artikelbild oder Ersatzbild zeigen","wke2014"),
				    5 => __("Nichts anzeigen","wke2014")),
		      'parent'  => 'auszuege'
		  ),
		  'teaser-floating' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Flie&szlig;ender Text', 'wke2014' ),
		      'label'   => __( 'Text umflie&szlig;t das Bild', 'wke2014' ),
		      'default' => $defaultoptions['teaser-floating'],
		      'parent'  => 'auszuege'
		  ),
		   'teaser-dateline' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Datumszeile', 'wke2014' ),
		      'label'   => __( 'Datumszeile vor dem Text, falls keine Datumsbox angezeigt wird', 'wke2014' ),
		      'default' => $defaultoptions['teaser-dateline'],
		      'parent'  => 'auszuege'
		  ),

		    'teaser-maxlength-halfwidth' => array(
		      'type'    => 'number',
		      'title'   => __( 'L&auml;nge des Teasertextes', 'wke2014' ),
		      'label'   => __( 'Maximale Textl&auml;nge f&uuml;r Artikelausz&uuml;ge (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
		      'default' => $defaultoptions['teaser-maxlength-halfwidth'],
		    'parent'  => 'auszuege'
		  ),
		 'teaser-titleup-halfwidth' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Titel oben', 'wke2014' ),
		      'label'   => __( 'Titel &uuml;ber Logo/Datumsbox und Text (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
		      'default' => $defaultoptions['teaser-titleup-halfwidth'],
		      'parent'  => 'auszuege'
		  ),
		  'teaser-datebox-halfwidth' => array(
		      'type'    => 'select',
		      'title'   => __( 'Symbolbild/Datumsbox', 'wke2014' ),
		      'label'   => __( 'Links des Textauszuges das Datum, das Artikelbild, ein Bild des Artikels oder ein verlinktes Video anzeigen; Abhängig vom Inhalt des Artikels. (Bei Beitr&auml;gen &uuml;ber halbe Breite)', 'wke2014' ),
		      'default' => $defaultoptions['teaser-datebox-halfwidth'],
		      'liste'   =>  array(
				    1 => __("Reihenfolge: Artikelbild, erstes Bild, erstes Video oder Ersatzbild zeigen","wke2014"),
				    2 => __("Reihenfolge: Erstes Bild, Artikelbild, erstes Video oder Ersatzbild zeigen","wke2014"),
				    3 => __("Reihenfolge: Erstes Video, Artikelbild, erstes Bild oder Ersatzbild zeigen","wke2014"),
				    4 => __("Reihenfolge: Erstes Video, erstes Bild, Artikelbild oder Ersatzbild zeigen","wke2014"),
				    5 => __("Nichts anzeigen","wke2014")),

		      'parent'  => 'auszuege'
		  ),
		  'teaser-floating-halfwidth' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Flie&szlig;ender Text', 'wke2014' ),
		      'label'   => __( 'Text umflie&szlig;t das Bild (Bei Beitr&auml;gen &uuml;ber halbe Breite)', 'wke2014' ),
		      'default' => $defaultoptions['teaser-floating-halfwidth'],
		      'parent'  => 'auszuege'
		  ),

		   'teaser-dateline-halfwidth' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Datumszeile', 'wke2014' ),
		      'label'   => __( 'Datumszeile vor dem Text, falls keine Datumsbox angezeigt wird (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
		      'default' => $defaultoptions['teaser-dateline-halfwidth'],
		      'parent'  => 'auszuege'
		  ),
	     ),

       ),
       'Indexseiten'   => array(
           'tabtitle'   => __('Indexseiten', 'wke2014'),
           'fields' => array(

	'category'  => array(
                  'type'    => 'section',
                  'title'   => __( 'Indexseiten (Kategorien, Tags und andere)', 'wke2014' ),
              ),




	    'category-num-article-fullwidth' => array(
                  'type'    => 'number',
                  'title'   => __( 'Beitr&auml;ge &uuml;ber ganze Breite', 'wke2014' ),
                  'label'   => __( 'Zahl der Beitr&auml;ge, die &uuml;ber die gesamte Inhaltsbreite gehen.', 'wke2014' ),
                  'default' => $defaultoptions['category-num-article-fullwidth'],
		'parent'  => 'category'
              ),
              'category-num-article-halfwidth' => array(
                  'type'    => 'select',
                  'title'   => __( 'Beitr&auml;ge &uuml;ber halbe Breite', 'wke2014' ),
                  'label'   => __( 'Zahl der Beitr&auml;ge, die in Spalten mit je zwei Beitr&auml;gen nebeneinander, angezeigt werden.', 'wke2014' ),
                  'liste'   => array(0 => 0, 2 => 2, 4 => 4, 6 => 6, 8 => 8, 10=>10, 12=>12, 14=>14, 16=>16),
                  'default' => $defaultoptions['category-num-article-halfwidth'],
		  'parent'  => 'category'
              ),
	    'category-teaser-maxlength' => array(
                  'type'    => 'number',
                  'title'   => __( 'L&auml;nge des Teasertextes (Artikelauszug)', 'wke2014' ),
                  'label'   => __( 'Maximale Textl&auml;nge f&uuml;r Artikelausz&uuml;ge', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-maxlength'],
		'parent'  => 'category'
              ),
             'category-teaser-titleup' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Titel oben', 'wke2014' ),
                  'label'   => __( 'Titel &uuml;ber Logo/Datumsbox und Text', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-titleup'],
                  'parent'  => 'category'
              ),
              'category-teaser-datebox' => array(
                  'type'    => 'select',
                  'title'   => __( 'Symbolbild/Datumsbox', 'wke2014' ),
                  'label'   => __( 'Links des Textauszuges das Datum, das Artikelbild, ein Bild des Artikels oder ein verlinktes Video anzeigen; Abhängig vom Inhalt des Artikels.', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-datebox'],
		  'liste'   =>  array(
				1 => __("Reihenfolge: Artikelbild, erstes Bild, erstes Video oder Ersatzbild zeigen","wke2014"),
				2 => __("Reihenfolge: Erstes Bild, Artikelbild, erstes Video oder Ersatzbild zeigen","wke2014"),
				3 => __("Reihenfolge: Erstes Video, Artikelbild, erstes Bild oder Ersatzbild zeigen","wke2014"),
				4 => __("Reihenfolge: Erstes Video, erstes Bild, Artikelbild oder Ersatzbild zeigen","wke2014"),
				5 => __("Nichts anzeigen","wke2014")),

                  'parent'  => 'category'
              ),
	      'category-teaser-floating' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Flie&szlig;ender Text', 'wke2014' ),
                  'label'   => __( 'Text umflie&szlig;t das Bild', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-floating'],
                  'parent'  => 'category'
              ),

               'category-teaser-dateline' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Datumszeile', 'wke2014' ),
                  'label'   => __( 'Datumszeile vor dem Text, falls keine Datumsbox angezeigt wird', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-dateline'],
                  'parent'  => 'category'
              ),

                'category-teaser-maxlength-halfwidth' => array(
                  'type'    => 'number',
                  'title'   => __( 'L&auml;nge des Teasertextes', 'wke2014' ),
                  'label'   => __( 'Maximale Textl&auml;nge f&uuml;r Artikelausz&uuml;ge (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-maxlength-halfwidth'],
		'parent'  => 'category'
              ),
             'category-teaser-titleup-halfwidth' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Titel oben', 'wke2014' ),
                  'label'   => __( 'Titel &uuml;ber Logo/Datumsbox und Text (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-titleup-halfwidth'],
                  'parent'  => 'category'
              ),
              'category-teaser-datebox-halfwidth' => array(
                  'type'    => 'select',
                  'title'   => __( 'Symbolbild/Datumsbox', 'wke2014' ),
                  'label'   => __( 'Links des Textauszuges das Datum, das Artikelbild, ein Bild des Artikels oder ein verlinktes Video anzeigen; Abhängig vom Inhalt des Artikels. (Bei Beitr&auml;gen &uuml;ber halbe Breite)', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-datebox-halfwidth'],
		  'liste'   =>  array(
				1 => __("Reihenfolge: Artikelbild, erstes Bild, erstes Video oder Ersatzbild zeigen","wke2014"),
				2 => __("Reihenfolge: Erstes Bild, Artikelbild, erstes Video oder Ersatzbild zeigen","wke2014"),
				3 => __("Reihenfolge: Erstes Video, Artikelbild, erstes Bild oder Ersatzbild zeigen","wke2014"),
				4 => __("Reihenfolge: Erstes Video, erstes Bild, Artikelbild oder Ersatzbild zeigen","wke2014"),
				5 => __("Nichts anzeigen","wke2014")),

                  'parent'  => 'category'
              ),
	       'category-teaser-floating-halfwidth' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Flie&szlig;ender Text', 'wke2014' ),
                  'label'   => __( 'Text umflie&szlig;t das Bild (Bei Beitr&auml;gen &uuml;ber halbe Breite)', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-floating-halfwidth'],
                  'parent'  => 'category'
              ),
               'category-teaser-dateline-halfwidth' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Datumszeile', 'wke2014' ),
                  'label'   => __( 'Datumszeile vor dem Text, falls keine Datumsbox angezeigt wird (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
                  'default' => $defaultoptions['category-teaser-dateline-halfwidth'],
                  'parent'  => 'category'
              ),








          )
       ),




        'socialmedia'   => array(
           'tabtitle'   => __('Social Media', 'wke2014'),
           'fields' => array(

              'aktiv-socialmediabuttons' => array(
		'type'    => 'bool',
		      'title'   => __( 'Buttons aktivieren', 'wke2014' ),
		      'label'   => __( 'Social Media Buttons auf der Website einblenden', 'wke2014' ),
		      'default' => $defaultoptions['aktiv-socialmediabuttons'],
              ),
	      'sm-list'  => array(
		  'type'    => 'urlchecklist',
		  'title'   => __( 'Social Media Plattformen', 'wke2014' ),
		  'liste'   => $default_socialmedia_liste,
	      ),

           
          )
       ),

        'advanced'   => array(
           'tabtitle'   => __('Erweitert', 'wke2014'),
           'fields' => array(

              'meta-verify-v1' => array(
                  'type'    => 'text',
                  'title'   => __( 'Google Verify', 'wke2014' ),
                  'label'   => __( 'Optionale Texteingabe zur Identifizierung über Meta-Angaben für Google Webmaster Tools.', 'wke2014' ),
              ),  
	      'aktiv-opengraph' => array(
		'type'    => 'bool',
		      'title'   => __( 'OpenGraph aktivieren', 'wke2014' ),
		      'label'   => __( 'OpenGraph Metaangaben durch das Thema erstellen lassen; Deaktivieren, wenn dies ein Plugin wie wpSEO machen soll.', 'wke2014' ),
		      'default' => $defaultoptions['aktiv-opengraph'],
              ),
           
          )
       ),

       
       

       


   )
);




?>
