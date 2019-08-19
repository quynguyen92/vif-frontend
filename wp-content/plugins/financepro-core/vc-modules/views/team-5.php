<?php
$thumb_size = 'rdtheme-size4';
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
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="owl-wrap rt-owl-nav-2 rt-team-slider-five <?php echo esc_attr( $slider_nav_class );?><?php echo esc_attr( $slider_dot_class );?>">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							$id = get_the_ID();
							$fin_team_designation = get_post_meta( $id, 'fin_team_designation', true );
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
						<div class="vc-item-wrap">
							<div class="vc-item">
								<a href="<?php the_permalink(); ?>">
									<?php echo wp_kses_post( $thumbnail ); ?>
								</a>
								<div class="vc-overly">
									<?php if ( !empty( $team_socials ) ): ?>
										<ul>
										<?php foreach ( $team_socials as $fin_team_social_key => $fin_team_social_value ) { ?>
											<?php if ( !empty( $fin_team_social_value ) ) { ?>
											<li><a target="_blank" href="<?php echo esc_attr( $fin_team_social_value );?>"><i class="fa <?php echo esc_attr( RDTheme::$team_social_fields[$fin_team_social_key]['icon'] );?>"></i></a></li>
											<?php } ?>
										<?php } ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							<div class="vc-team-meta">
							<h3 class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<?php if ( $designation_display == 'true' ): ?>
								<div class="designation"><?php echo esc_html( $fin_team_designation );?></div>
							<?php endif; ?>
							</div>
						</div>
					<?php endwhile;?>
				<?php } else { ?>
				<div class="vc-item-wrap">
				<?php esc_html_e( 'No Team Member Found' , 'financepro-core' ); ?>
				</div>
				<?php } ?>
				<?php $wp_query = $temp;?>
			</div>
		</div>
	</div>
</div>