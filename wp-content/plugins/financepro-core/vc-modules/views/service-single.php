<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( $id == '' ){
	return;
}
$thumb_size = 'rdtheme-size2';
$class = vc_shortcode_custom_css_class( $css );

$args = array(
	'post_type' => 'fin_service',
	'p' 		=> $id,
);

$query = new WP_Query( $args );
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
$col_class = "col-lg-12 col-md-12 col-sm-12 col-xs-12";

?>
<div class="<?php echo esc_attr( $class );?>">
	<div class="rt-service-layout-2 service-single">
		<div class="row auto-clear">
		<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) : the_post();?>
			<?php
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, 10 );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x270.jpg" alt="'.get_the_title().'">';
					}
				}
			?>
			<div class="<?php echo esc_attr( $col_class ); ?>">
				<div class="rtin-single-feature-slide">
					<div class="rtin-feature-slide-img">
						<a href="<?php the_permalink(); ?>">
							<?php echo wp_kses_post( $thumbnail ); ?>
						</a>
					</div>
					<div class="rtin-feature-slide-content">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html($content); ?></p>
						<a class="button btn-flat" href="<?php the_permalink(); ?>"><?php esc_html_e( 'READ MORE' , 'financepro-core' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						<a class="feature-icon" href="<?php the_permalink(); ?>">
							<i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
							<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
			<?php endwhile;?>			
		<?php } ?>
		<?php $wp_query = $temp;?>
		</div>
	</div>
</div>