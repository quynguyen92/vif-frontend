<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size7';
$args = array(
	'posts_per_page' => $slider_item_number,
	'ignore_sticky_posts' => 1,
	'cat'       => $cat,
	'orderby'		 => $orderby,
	'order'			 => $order,
	);
	
$query = new WP_Query( $args );
// Pagination fix
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;

$slider_dots_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-post-vc-section-1 owl-wrap rt-owl-nav-3 <?php echo esc_attr( $slider_dots_class );?>">
	<?php if ( $showtitle == 'true' ){ ?>
	<div class="section-title-content">
		<div class="section-title">
			<h2 class="section-title-holder" style="color:<?php echo esc_attr( $section_title_color ); ?>;"><?php echo wp_kses_post( $title );?></h2>
		</div>
		<div class="owl-custom-nav owl-nav">
			<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="owl-custom-nav-bar"></div>
		<div class="clear"></div>
	</div>
	<?php } ?>
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post();?>
			<?php
				$id = get_the_ID();
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size, array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="img-responsive attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_870X429.jpg" alt="'.get_the_title().'">';
					}
				}

				$comments_count = wp_count_comments( $id );
				$message =  $comments_count->approved ;
			?>
			<div class="rtin-single-post">
				<div class="rtin-item-image">
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_kses_post( $thumbnail ); ?>
					</a>
					<?php if ( $showdate == 'true' ) { ?>
					<span class="date"><?php echo get_the_date( 'd / m / Y' ); ?></span>
					<?php } ?>
				</div>
				<div class="rtin-item-info">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if ( $showcomment == 'true' ) { ?>
					<span class="comments"><i class="fa fa-comments-o" aria-hidden="true"></i>
						<?php esc_html_e( 'Comments' , 'financepro-core' ); ?>: <?php echo esc_html ( $message ); ?>
					</span>
					<?php } ?>
				</div>
			</div>
		<?php endwhile;?>
	<?php } else { ?>
		<div class="rtin-single-post">
			<?php esc_html_e( 'No Post Found' , 'financepro-core' ); ?>
		</div>
	<?php } ?>
	<?php $wp_query = $temp; wp_reset_postdata(); ?>
	</div>
</div>