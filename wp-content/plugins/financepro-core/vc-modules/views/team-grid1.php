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
<div>
	<div class="row auto-clear rt-team-grid-1">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php
			$id = get_the_id();
			$team_designation = get_post_meta( $id, 'fin_team_designation', true );
			$team_socials = get_post_meta( $id, 'fin_team_socials', true );
		?>
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="rtin-single-team">
				<div class="rtin-item-image">
					<?php the_post_thumbnail( $thumb_size );?>
					<a class="plus-icon" href="<?php the_permalink();?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				<div class="rtin-item-content">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( $designation_display ): ?>
						<span class="rtin-position"><?php echo esc_html( $team_designation ); ?></span>
					<?php endif; ?>
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
		<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
		<?php } else { ?>
			<div class="rtin-single-team">
				<?php esc_html_e( 'No Team Found' , 'financepro-core' ); ?>
			</div>
		<?php } ?>
	</div>
	<?php $wp_query = $temp;?>
</div>