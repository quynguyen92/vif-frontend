<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size10';
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
	'post_type'      => 'fin_portfolio',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
	'orderby'		 => $orderby,
	'order'			 => $order,
);

$query = new WP_Query( $args );

$posts = get_posts( $args );

$gallery = array();
$cats    = array();

foreach ( $posts as $post ) {
    $terms = get_the_terms( $post, 'fin_portfolio_category' );
    $terms_html = '';
	
	if ( $terms ) {
		foreach ( $terms as $term ) {
			$terms_html .= ' ' . $term->slug;
			if ( !isset( $cats[$term->slug] ) ) {
				$cats[$term->slug] = $term->name;
			}
		}
	}
	$gallery[] = array(
		'cats'  => $terms_html,
	);
}

$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$temp     = $wp_query;
$wp_query   = NULL;
$wp_query   = $query;
?>
<div class="rt-portfolio-layout-5 pfp-wrapper gallery-wrapper" id="inner-isotope">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="rt-portfolio-tab isotop-btn isotop-btn"> 
                <a href="#" data-filter="*" class="current"><?php esc_html_e( 'All' , 'financepro-core' ); ?></a>
                <?php foreach ( $cats as $key => $value): ?>
                    <a href="#" data-filter=".<?php echo esc_attr( $key );?>"><?php echo esc_html( $value );?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
	<div class="row auto-clear rt-isotope1 featuredContainer">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post();?>
			<?php $content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, $count );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage.jpg" alt="'.get_the_title().'">';
					}
				}
				$terms = get_the_terms( get_the_ID(), 'fin_portfolio_category' );
			?>
			<?php
				if ( $terms && ! is_wp_error( $terms ) ) : 
					$term_links = array(); 
					foreach ( $terms as $term ) {
						$term_links[] = $term->slug;
					}
					$term_list = join( " ", $term_links );
				endif;
			?>
			<div class="<?php echo esc_attr( $col_class );?> <?php echo esc_html( $term_list ); ?>">
				<figure class="tlp-portfolio-item">
					<?php echo wp_kses_post( $thumbnail ); ?>
					<figcaption>
						<div class="tlp-content9">
							<h3 class="title">
								<a class="tlp-item-details pfp-popup tlp-single-item-popup" href="<?php the_permalink(); ?>"><?php the_title();?></a>
							</h3>
							<p class="pfp-categories"><?php
								if ( $terms && ! is_wp_error( $terms ) ) : 
									$term_links = array(); 
									foreach ( $terms as $term ) {
										$term_links[] = $term->name;
									}
									$term_list = join( ", ", $term_links );
									echo esc_html( $term_list );
								endif;
							?></p>
							<p class="short-desc"><?php echo esc_html($content); ?></p>
							<p class="link-icon"><a class="tlp-item-details pfp-popup tlp-single-item-popup" href="<?php the_permalink(); ?>"><i class="fa fa-info"></i></a><a class="pfp-zoom" href="<?php the_post_thumbnail_url( 'full' ); ?>"><i class="fa fa-arrows" aria-hidden="true"></i></a></p>
						</div>
					</figcaption>
				</figure>
			</div>
			<?php endwhile;?>
			<?php if ( $show_pagination == 'true' ) { ?>
			<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
			<?php } ?>	
		<?php } else { ?>
			<div class="<?php echo esc_attr( $col_class ); ?>">
				<?php esc_html_e( 'No Portfolio Found' , 'financepro-core' ); ?>
			</div>
		<?php } ?>
		<?php $wp_query = $temp; wp_reset_postdata();?>
	</div>
</div>