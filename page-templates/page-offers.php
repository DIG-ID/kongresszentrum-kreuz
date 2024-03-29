<?php
/**
 * Template Name: Offers Page Template
 *
 * The template for displaying all content of the offers page.
 */

get_header(); ?>
	<?php do_action( 'wrapper_open' ); ?>
		<div class="col-12 px-15">
			<h1 class="page-title">
				<?php the_title(); ?>
			</h1>
		</div>
		<?php do_action( 'before_main_content' ); ?>
			<div class="row">
				<?php
				$offers_query_args = array(
					'post_type' => 'offers',
					'nopaging'  => true,
					'order'     => 'ASC',
				);
				$offers_query = new WP_Query( $offers_query_args );
				if ( $offers_query->have_posts() ) :
					while ( $offers_query->have_posts() ) :
						$offers_query->the_post();
						?>
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 px-15">
							<article class="main-block">
								<?php
								$offers_gallery = get_field( 'offers_gallery' );
								if ( $offers_gallery ) :
									?>
									<div class="swiper-container-block-slider">
										<div class="swiper-wrapper">
											<?php foreach ( $offers_gallery as $gallery_img ) : ?>
												<a href="<?php echo esc_url( get_permalink() ); ?>" class="swiper-slide">
													<?php echo wp_get_attachment_image( $gallery_img, 'main-block-thumbnail' ); ?>
												</a>
											<?php endforeach; ?>
										</div>
										<div class="swiper-button-prev swiper-button__banquets"></div>
										<div class="swiper-button-next swiper-button__banquets"></div>
									</div>
									<?php
								endif;
								?>
								<div class="main-block__content">
									<h2 class="main-block__title"><?php the_title(); ?></h2>
									<p class="main-block__text"><?php the_field( 'offer_small_description' ); ?></p>
									<div class="main-block__btn--wrapper">
										<a href="<?php the_permalink(); ?>" class="main-block__btn "><?php esc_html_e( 'Details', 'kongresszentrum-kreuz' ); ?></a>
										<a href="mailto:<?php the_field( 'offer_send_request_link' ); ?>" target="_blank" class="main-block__btn main-block__btn--dark"><?php esc_html_e( 'Anfrage Senden', 'kongresszentrum-kreuz' ); ?></a>
									</div>
								</div>
							</article>
						</div>
						<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div><!-- .row -->
		<?php do_action( 'after_main_content' ); ?>

		<?php do_action( 'before_main_sidebar' ); ?>
			<?php get_template_part( 'template-parts/sidebar-blocks' ); ?>
		<?php do_action( 'after_main_sidebar' ); ?>

	<?php do_action( 'wrapper_close' ); ?>

<?php get_footer();
