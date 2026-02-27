<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KVWHMDP8');</script>
		<!-- End Google Tag Manager -->

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVWHMDP8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php do_action( 'wp_body_open' ); ?>
	<div class="site" id="page">

		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

				<nav class="navbar navbar-expand-xl navbar-dark bg-primary">

							<!-- Your site title as branding in the menu -->
							<?php if ( ! has_custom_logo() ) { ?>

								<?php if ( is_front_page() && is_home() ) : ?>

									<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

								<?php else : ?>

									<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

								<?php endif; ?>


							<?php } else {
								the_custom_logo();
							} ?><!-- end custom logo -->

							<button id="opener" type="button" class="navbar-toggle">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

						<!-- The WordPress Menu goes here -->
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => '',
							)
						);
						?>
						<?php do_action( 'wpml_add_language_selector' ); ?>
						<a target="_blank" href="http://kongress.kreuzbern.ch/default.aspx" data-redirect-url="http://kongress.kreuzbern.ch/default.aspx" data-default-url="#collapse1" class="button button__blue button__booking button__desktop d-none d-md-none d-lg-none d-xl-block" data-hover="dropdown"><?php esc_html_e( 'RESERVATION', 'kongresszentrum-kreuz' ); ?></a>
						<?php get_template_part( 'template-parts/menu-mobile' ); ?>

				</nav><!-- .site-navigation -->

			</div><!-- #wrapper-navbar end -->
