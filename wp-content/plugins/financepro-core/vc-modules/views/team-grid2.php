<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size4';
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'fin_team',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
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
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
?>
<div class="rt-team-grid-2">				
	<div class="row auto-clear">
		<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$id = get_the_ID();
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, $content_limit );
				$team_designation = get_post_meta( $id, 'fin_team_designation', true );
				$team_socials = get_post_meta( $id, 'fin_team_socials', true );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x522.jpg" alt="'.get_the_title().'">';
					}
				}
			?>				
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="rtin-single-team">
				<div class="rtin-item-image pull-left">
					<?php echo wp_kses_post( $thumbnail ); ?>
					<span class="rtin-plus-icon"><a href="<?php the_permalink(); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
				</div>
				<div class="rtin-item-content media-body">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>								
					<?php if ( $designation_display == 'true' ){ ?>
						<span class="position"><?php echo esc_html( $team_designation ); ?></span>					
					<?php } ?>                                
					<p><?php echo esc_html($content); ?></p>
					<?php if ( !empty( $team_socials ) ){ ?>
					<ul class="social-icons">
					<?php foreach ( $team_socials as $fin_team_social_key => $fin_team_social_value ) { ?>
						<?php if ( !empty( $fin_team_social_value ) ) { ?>
						<li><a target="_blank" href="<?php echo esc_attr( $fin_team_social_value );?>"><i class="fa <?php echo esc_attr( RDTheme::$team_social_fields[$fin_team_social_key]['icon'] );?>"></i></a></li>
						<?php } ?>
					<?php } ?>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>		
		<?php endwhile;?>
		<?php if ( $show_pagination == 'true' ) { ?>			
			<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
		<?php } ?>		
		<?php } else { ?>
			<div class="rtin-single-team">
				<?php esc_html_e( 'No Team Found' , 'financepro-core' ); ?>
			</div>
		<?php } ?>
		<?php $wp_query = $temp;?>
	</div>
</div>