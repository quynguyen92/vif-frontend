<?php
$thumb_size = 'rdtheme-size11';
$thumb_size2 = 'rdtheme-size11';
$args = array(
	'post_type'      => 'fin_team',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_team_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}
$query = new WP_Query( $args );
$count1 = $count2 = 1;
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-team-slider-six">
	<div class="rtin-team-slider-holder">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-9 no-pad-mob">
			<!-- Tab panes -->
			<div class="tab-content" id="product-1">
				<?php if ( $showtitle == 'true' ){ ?>
				<div class="section-title-content">
					<div class="section-title">
						<h2 class="section-title-holder" style="color:<?php echo esc_attr( $section_title_color ); ?>;"><?php echo wp_kses_post( $title );?></h2>
					</div>
					<div class="clear"></div>
				</div>
				<?php } ?>
				<?php if ( $query->have_posts() ) { ?>
				<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
					$id = get_the_ID();
					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = wp_trim_words( $content, $content_limit );
					$team_designation = get_post_meta( $id, 'fin_team_designation', true );
					$team_socials = get_post_meta( $id, 'fin_team_socials', true );
					$thumbnail = false;
					if ( has_post_thumbnail() ){
						$thumbnail = get_the_post_thumbnail( null, $thumb_size );
					}
					else {
						if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
						}
						elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
							$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_400x400.jpg" alt="'.get_the_title().'">';
						}
					}
				?>
				<div class="single-team product-gallery-img-<?php echo esc_attr( $count1 ); ?> <?php if ( $count1 == 1 ) { echo 'active'; } ?>">
					<div class="media">
						<div class="pull-left">
							<a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
						</div>
						<div class="media-body">
							<h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
							<?php if ( $designation_display == 'true' ) { ?>
							<p class="designation"><?php echo esc_html( $team_designation );?></p>
							<?php } ?>
							<p><?php echo esc_html($content); ?></p>
							<div class="social-media-area">
								<ul>
								<?php foreach ( $team_socials as $fin_team_social_key => $fin_team_social_value ) { ?>
									<?php if ( !empty( $fin_team_social_value ) ) { ?>
									<li><a target="_blank" href="<?php echo esc_attr( $fin_team_social_value );?>"><i class="fa <?php echo esc_attr( RDTheme::$team_social_fields[$fin_team_social_key]['icon'] );?>"></i></a></li>
									<?php } ?>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>				
				<?php $count1++; endwhile;?>
				<?php } else { ?>
				<div class="vc-item-wrap">
				<?php esc_html_e( 'No Team Member Found' , 'financepro-core' ); ?>
				</div>
				<?php } ?>				
				<?php wp_reset_postdata();?>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
			<div class="team-thumb-area">
				<!-- Nav tabs -->
				<div class="single-product-tab">
					<div class="vertical-slider-container">
						<img src="<?php echo RDTHEME_IMG_URL; ?>/arrow-up.png" id="prev" class="vertical-slider-nav vertical-slider-nav-up" alt="" />
						<div class="slideshow member-slideshow cycle-slideshow" data-cycle-fx="carousel" data-cycle-timeout="0" data-cycle-next="#next" data-cycle-prev="#prev" data-cycle-carousel-visible="3" data-cycle-carousel-vertical=true data-allow-wrap="false" data-cycle-log="false">
						<?php if ( $query->have_posts() ) { ?>
						<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
							$thumbnail_url = false;
							if ( has_post_thumbnail() ){
								$thumbnail_url = get_the_post_thumbnail_url( null, $thumb_size2 );
							}
							else {
								if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
									$thumbnail_url = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
								}
								elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
									$thumbnail_url = RDTHEME_IMG_URL.'noimage_400x400.jpg" alt="'.get_the_title().'">';
								}
							}
						?>
						<img src="<?php echo esc_attr( $thumbnail_url ); ?>" data-id="<?php echo esc_attr( $count2 ); ?>" alt="<?php the_title(); ?>">
						<?php $count2++; endwhile;?>
						<?php } else { ?>
						<div class="vc-item-wrap">
						<?php esc_html_e( 'No Team Member Found' , 'financepro-core' ); ?>
						</div>
						<?php } ?>
						<?php wp_reset_postdata();?>
						</div>
						<img src="<?php echo RDTHEME_IMG_URL; ?>/arrow-down.png" id="next" class="vertical-slider-nav vertical-slider-nav-down" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>