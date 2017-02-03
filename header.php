<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php if(is_home() || is_front_page()){ bloginfo('name'); ?> | <?php bloginfo('description'); }else{ wp_title(''); ?> | <?php bloginfo('name'); } ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-ipad-retina.png" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,700,800" rel="stylesheet">

	<!-- Memphis font -->
	<script type="text/javascript" src="http://fast.fonts.net/jsapi/2cc1f66a-61d9-44d7-9b16-40e651bd3c09.js"></script>
	<!-- Raleway font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500" rel="stylesheet">

	<!-- Bugherd -->
	<script type='text/javascript'>
	(function (d, t) {
	  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	  bh.type = 'text/javascript';
	  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=ycsonruxkwu2a38exism0a';
	  s.parentNode.insertBefore(bh, s);
	  })(document, 'script');
	</script>

	<?php wp_head(); ?>
</head>
<body <?php echo body_class(); ?>>
<!-- <div id="mobileMenu" class="mobile">
	<div class="">
		<div class="close">CLOSE</div>
		<?php $defaults = array(
				'theme_location'  => 'main-nav',
				'menu'            => 'main-nav',
				'container'       => 'nav',
				'container_class' => '',
				'container_id'    => 'mainNav',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			); wp_nav_menu( $defaults ); ?>
	</div>
</div> -->

<div id="sayHello" class="cf">
	<div class="container">
		<div class="row">
			<div class="sh">
				<div class="title">Say Hello!</div>
				<div class="columns-4 loc">
					<div class=""><!-- gutter -->
						<strong>Brooklyn Studio</strong><br>
						67 West Street, Suite 403<br>
						Brooklyn, New York 11222<br>
					</div>
				</div>
				<div class="columns-4 loc">
					<div class=""><!-- gutter -->
						<strong>Charleston Studio</strong><br>
						609 Tennessee Ave.<br>
						Charleston, West Virginia 25302<br>
			 
					</div>
				</div>
				<div class="columns-4 loc">
					<div class=""><!-- gutter -->
						304.45.6374<br>
						<strong><a href="mailto:hello@meshfresh.com">hello@meshfresh.com</a></strong><br>
						<a href="<?php echo bloginfo('url'); ?>/say-hello">Get involved with MESH</a>
					</div>
				</div>
			</div>
		</div>
		<div id="sayHello-caret"></div>
	</div>
</div> 
<div id="siteWrap">
<header <?php if (is_page_template('templates/tpl-frontpage-alt.php') || is_page_template('page-work-macy.php')){ echo 'class="new"';} elseif (is_page_template('template-work-new.php')||is_page_template('template-people-new.php')){ echo 'class="fixed"';} else{}//remove this when page is live?> >
	<div class="container">
		<div class="gateway-nav">
					<div class="say-hello <?php if(is_page(2622) || is_page('say-hello2') || is_page('say-hello')){ echo "active"; } ?>">
						Say Hello
					</div>
						<?php $defaults = array(
							'theme_location'  => 'social-nav',
							'menu'            => 'social-nav',
							'container'       => 'nav',
							'container_class' => '',
							'container_id'    => 'social',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '<span class="sr-only">',
							'link_after'      => '</span>',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						); wp_nav_menu( $defaults ); ?>
				
				</div>
		<div class="row">
		<div class="columns-12"><!-- gutter cf -->
					<div id="logo">
						<a href="<?php echo bloginfo('url'); ?>">
							<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129.09 129.09">
							  <defs>
							    <style>
							      .cls-1 {
							        fill: #fff;
							      }
							    </style>
							  </defs>
							  <title>mesh_logo</title>
							  <circle class="cls-1" cx="64.14" cy="64.09" r="58"/>
							  <path d="M645.24,383.87h-.81v1.51h.81c.76,0,1-.29,1-.76s-.21-.76-1-.76m-6.07,1.83c0,1.24.38,1.87,1.21,1.87s1.21-.63,1.21-1.87-.38-1.87-1.21-1.87-1.21.63-1.21,1.87m-21.06-1.8h-.68v3.6h.68c1.16,0,1.43-.85,1.43-1.8s-.27-1.8-1.43-1.8m-7.43,0H610v3.6h.67c1.16,0,1.43-.85,1.43-1.8s-.27-1.8-1.43-1.8m-9.76.16-.62,2.3h1.23l-.59-2.3ZM572,383.89h-.67v3.6H572c1.16,0,1.43-.85,1.43-1.8s-.27-1.8-1.43-1.8m96.07-4.25H568.17v-2h99.89Zm-2.76-5.26h-5.88v-13.3H651.1v13.3h-5.88V343.6h5.88v12.28h8.31V343.6h5.88Zm-37.17-23c0,4.65,13.13,5,13.13,14.63,0,5.29-3.62,8.78-9.81,8.78-4.77,0-8.49-2.6-10.06-8.66l5.8-1.24c.68,3.71,2.81,5,4.56,5a3.46,3.46,0,0,0,3.62-3.67c0-5.8-13.13-5.88-13.13-14.5,0-5.29,3.16-8.61,9.25-8.61a9.15,9.15,0,0,1,9.46,7.46l-5.29,1.53c-1-2.9-2.26-4.14-4.31-4.14a3,3,0,0,0-3.24,3.37m-9.39,23H602.2V343.6h16.12v5.2H608.08v7.08h7.8v5.2h-7.8v8.1h10.66Zm-21,0h-5V350.17h-.08l-6.27,24.22H582l-6.27-24.22h-.09v24.22h-5V343.6h8.23l5.33,20.21h.08l5.33-20.21h8.23ZM570.3,383h1.75c1.4,0,2.37.78,2.38,2.65s-1,2.65-2.38,2.65H570.3Zm5,0h3.51v.85h-2.5v1.26h1.81V386h-1.81v1.48h2.58v.85h-3.59Zm4.16,4.12.84-.37a1.22,1.22,0,0,0,1.15.83c.51,0,.9-.19.9-.71,0-1-2.73-.84-2.73-2.47A1.54,1.54,0,0,1,581.3,383a1.93,1.93,0,0,1,1.87,1.2l-.92.29a1,1,0,0,0-.95-.69c-.44,0-.76.18-.76.59,0,.91,2.73.72,2.73,2.44,0,1.09-.68,1.63-1.86,1.63a2.1,2.1,0,0,1-2-1.25m4.8-4.12h1v5.3h-1Zm1.92,2.73c0-1.35.51-2.8,2.21-2.8a1.87,1.87,0,0,1,1.92,1.35l-.94.25a1.06,1.06,0,0,0-1.06-.75c-.75,0-1.12.75-1.12,1.92s.42,1.82,1.12,1.82a1,1,0,0,0,1.11-1h-1v-.85h2v2.68h-.73v-.54a1.66,1.66,0,0,1-1.38.62c-1.44,0-2.11-1.14-2.11-2.64m5.26-2.73h1.06l2.09,3.61h0V383h1v5.3h-1l-2.17-3.77h0v3.77h-1Zm7.33,5.3,1.53-5.31h1.26l1.5,5.31h-1l-.29-1.14h-1.67l-.32,1.14Zm5-5.3h1.06l2.08,3.61h0V383h1v5.3h-1l-2.17-3.77h0v3.77h-1Zm5.24,0h1.75c1.4,0,2.37.78,2.38,2.65s-1,2.65-2.38,2.65H609Zm7.43,0h1.75c1.4,0,2.37.78,2.38,2.65s-1,2.65-2.38,2.65h-1.75Zm5,0h3.51v.85h-2.5v1.26h1.81V386H622.4v1.48H625v.85h-3.59Zm4.08,0h1l.94,3.91h0l1-3.91h1l-1.4,5.3h-1.13Zm4.63,0h3.51v.85h-2.5v1.26h1.81V386h-1.81v1.48h2.58v.85H630.1Zm4.37,0h1v4.45h2.3v.85h-3.32Zm3.69,2.65c0-1.73.78-2.72,2.22-2.72s2.23,1,2.23,2.72-.78,2.72-2.23,2.72-2.22-1-2.22-2.72m5.27-2.65h1.94c1.14,0,1.87.48,1.87,1.58s-.73,1.58-1.87,1.58h-.92v2.14h-1Zm4.55,0h1.42l1,3.7h0l1-3.7h1.44v5.3H652v-4.17h0l-1.19,4.17H650l-1.17-4.17h0v4.17H648Zm6.08,0h3.51v.85h-2.5v1.26h1.81V386h-1.81v1.48h2.58v.85H654Zm4.38,0h1.06l2.09,3.61h0V383h1v5.3h-1l-2.17-3.77h0v3.77h-1Zm4.83,0H667v.85h-1.39v4.46h-1v-4.46h-1.39ZM683,365.46A64.54,64.54,0,1,0,618.41,430,64.54,64.54,0,0,0,683,365.46" transform="translate(-553.86 -300.91)"/>
							</svg>
						</a>
					</div>			
				<div class="sidr-nav">			
					<div class="sidr-close">CLOSE</div>
				<?php $defaults = array(
						'theme_location'  => 'main-nav',
						'menu'            => 'main-nav',
						'container'       => 'nav',
						'container_class' => '',
						'container_id'    => 'mainNav',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					); wp_nav_menu( $defaults ); ?>
				</div>
				<div id="menuTrigger" class="mobile sidr-trigger">
					Menu
				</div>
				
			</div>
		</div>
	</div>
</header>
