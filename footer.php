		<footer id="footer-wrapper">
			<div class="container">
				<div class="row justify-content-between align-items-start">

					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 px-15 footer-block">
						<?php echo wp_kses_post( wpautop( get_theme_mod( 'block-2' ) ) ); ?>
						<?php echo wp_kses_post( wpautop( get_theme_mod( 'block-3' ) ) ); ?>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 px-15 footer-block">
						<?php echo wp_kses_post( wpautop( get_theme_mod( 'block-4' ) ) ); ?>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 px-15 footer-block">
						<img src="<?php echo get_template_directory_uri() . '/src/images/Ibex-BRONZE_rgb.jpg'; ?>" alt="logo" style="max-width:180px;height:auto;object-fit:cover;">
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 px-15 footer-block text-center text-lg-end">
						<img src="<?php echo get_template_directory_uri() . '/src/images/Swisstainable_3_leading_RGB.png'; ?>" alt="logo" style="max-width:100px;height:auto;object-fit:cover;">
					</div>
				</div><!-- row end -->
				<div class="row justify-content-center">
					<div class="col-1">
						<div class="scrollToTop">
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" class="svg-inline--fa fa-chevron-up fa-w-14 back-to-top" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#fff" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
						</div>
					</div>
				</div>
			</div><!-- container end -->
		</footer><!-- wrapper end -->

		</div><!-- #page we need this extra closing tag here -->
		<?php wp_footer(); ?>
	</body>

</html>
