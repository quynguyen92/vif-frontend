<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 2.0
 */

$thumb_size = 'rdtheme-size2';
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
$slider_dots_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-post-vc-section-3 owl-wrap rt-owl-nav-3 <?php echo esc_attr( $slider_dots_class );?>">
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
		$content = get_the_content();
		$content = apply_filters( 'the_content', $content );
		$content = wp_trim_words( $content, $count );
		$thumbnail = false;
		if ( has_post_thumbnail() ){
			$thumbnail = get_the_post_thumbnail( null, $thumb_size, array( 'class' => 'img-responsive' ) );
		}
		else {
			if ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
				$thumbnail = '<img class="img-responsive attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370X270.jpg" alt="'.get_the_title().'">';
			}
		}
		$rdtheme_time_html = sprintf( '<span>%s <br/>%s <br/>%s </span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
		$rdtheme_time_html = apply_filters( 'rdtheme_single_time', $rdtheme_time_html );

		$comments_count = wp_count_comments( $id );
		$message =  $comments_count->approved ;
		
		$rdtheme_comments_number = number_format_i18n( get_comments_number() );
		$rdtheme_comments_html = $rdtheme_comments_number < 2 ? esc_html__( 'Comment' , 'financepro' ) : esc_html__( 'Comments' , 'financepro' );
		$rdtheme_comments_html = '('. $rdtheme_comments_number . ') ' . $rdtheme_comments_html;
	?>
	<div class="rtin-single-post">
		<div class="media">
			<div class="pull-left">
				<a href="<?php the_permalink(); ?>">
					<?php echo wp_kses_post( $thumbnail ); ?>
					<?php echo wp_kses_post( $rdtheme_time_html ); ?>
					<i class="fa fa-plus"></i>
				</a>
			</div>
			<div class="media-body">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><?php echo wp_kses_post( $content ); ?></p>
				<p class="date"><?php the_author_posts_link(); ?> / <?php if ( $showcomment == 'true' ) { ?><?php echo esc_html( $rdtheme_comments_html );?><?php } ?></p>
			</div>
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