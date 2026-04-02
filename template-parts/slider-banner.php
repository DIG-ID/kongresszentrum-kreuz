<section class="slider-banner-wrapper">
	<div class="swiper slider-banner-container">
		<div class="swiper-wrapper">
			<?php
			$slider_banner_badge = get_field( 'banner_badge' );
			$slider_banner_args = array(
				'post_type' => 'seminare_rooms',
				'nopaging'  => true,
				'order'     => 'ASC',
			);
			$slider_banner_query = new WP_Query( $slider_banner_args );
			$slide_index = 0;
			if ( $slider_banner_query->have_posts() ) :
				while ( $slider_banner_query->have_posts() ) :
					$slider_banner_query->the_post();
					$img_attr = $slide_index === 0
						? array( 'fetchpriority' => 'high', 'loading' => 'eager' )
						: array();
					$slide_index++;
					?>
					<article class="slider-banner swiper-slide">
						<?php the_post_thumbnail( 'banner-slider', $img_attr ); ?>
						<div class="slider-banner__content d-none d-sm-none d-md-none d-lg-none d-xl-flex">
							<div class="slider-banner__inner-content">
								<h2 class="slider-banner__title"><?php the_title(); ?></h2>

								<p class="slider-banner__info">
									<span class="capacity"><?php esc_html_e( 'Capacity:', 'kongresszentrum-kreuz' ); ?> <?php the_field( 'seminare_room_capacity' ); ?></span>
									<span class="size"><?php esc_html_e( 'Room Size:', 'kongresszentrum-kreuz' ); ?> <?php the_field( 'seminare_room_room_size' ); ?></span>
								</p>

								<p class="slider-banner__description">
									<?php the_field( 'seminare_room_slider_description' ); ?>
								</p>
							</div>
							<a href="<?php the_permalink(); ?>" class="slider-banner__btn "><?php esc_html_e( 'Details', 'kongresszentrum-kreuz' ); ?></a>

						</div>
					</article>
					<?php
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
		<?php if ( $slider_banner_badge ) :
			echo '<a class="slider-banner__badge" href="' . get_field( 'banner_badge_link' ) . '" target="_blank">' . wp_get_attachment_image( $slider_banner_badge, 'full' ) . '</a>';
		endif; ?>
		<a href="http://kongress.kreuzbern.ch/default.aspx" target="_blank" class="button button__blue button__booking button__booking--mobile"><?php esc_html_e( 'Reservation', 'kongresszentrum-kreuz' ); ?></a>
	</div>

</section>
