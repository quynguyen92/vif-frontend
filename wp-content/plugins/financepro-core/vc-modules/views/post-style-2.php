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

global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
?>
<div class="rt-post-vc-section-2 owl-wrap rt-owl-nav-1 <?php echo esc_attr( $slider_nav_class );?>">	
	<div class="section-title-content row">     
		<?php if ( $showtitle == 'true' ){ ?>
			<div class="section-title">
			<h2 class="section-title-holder" style="color:<?php echo esc_attr( $section_title_color ); ?>;"><?php echo wp_kses_post( $title );?></h2>
			</div>
			<div class="clear"></div>
		<?php } ?>
	</div>
	<div class="owl-theme owl-carousel rt-owl-carousel row" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post();?>
			<?php
				$id = get_the_ID();
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, $count );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_870X429.jpg" alt="'.get_the_title().'">';
					}
				}

				$rdtheme_date = sprintf( '<span class="date">%s<br>%s<br>%s</span>', get_the_time( 'M' ), get_the_time( 'd' ), get_the_time( 'Y' ) );
			?>
			<div class="rtin-single-post">
				<div class="rtin-item-image">
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_kses_post( $thumbnail ); ?>
					</a>					
					<?php if ( $showdate == 'true' ) { ?>
					<?php echo wp_kses_post( $rdtheme_date ); ?>
					<?php } ?>
				</div>
				<div class="rtin-item-info">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			</div>			
		<?php endwhile;?>
	<?php } else { ?>
		<div class="rtin-single-news">
			<?php esc_html_e( 'No Post Found' , 'financepro-core' ); ?>
		</div>
	<?php } ?>
	<?php $wp_query = $temp; wp_reset_postdata(); ?>
	</div>
</div>