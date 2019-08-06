<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Can be used only in 'include' function

if ( $type == 'cross-sells' ) {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 2 ),
		'992'  => array( 'items' => 2 ),
	);
}
elseif ( RDTheme::$layout == 'full-width' ) {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 2 ),
		'768'  => array( 'items' => 3 ),
		'992'  => array( 'items' => 4 ),
	);
}
else {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 2 ),
		'768'  => array( 'items' => 2 ),
		'992'  => array( 'items' => 3 ),
	);
}

$loop = count( $products ) > $responsive['992']['items'] ? true : false;

$owl_data = array( 
	'nav'                => false,
	'dots'               => false,
	'autoplay'           => true,
	'autoplayTimeout'    => '5000',
	'autoplaySpeed'      => '200',
	'autoplayHoverPause' => true,
	'loop'               => $loop,
	'margin'             => 3,
	'responsive'         => $responsive
);

$owl_data = json_encode( $owl_data );
wp_enqueue_style( 'owl-carousel' );
wp_enqueue_style( 'owl-theme-default' );
wp_enqueue_script( 'owl-carousel' );

$wrapper_class = $type;
if ( !$loop ) {
	$wrapper_class .= ' no-nav';
}
?>
<div class="owl-wrap rt-woo-nav related products <?php echo esc_attr( $wrapper_class );?>">
	<div class="section-title">
		<h2 class="owl-custom-nav-title"><?php echo wp_kses_post( $title );?></h2>
		<div class="owl-custom-nav owl-nav">
			<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="owl-custom-nav-bar"></div>
		<div class="clear"></div>
	</div>
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
		<?php foreach ( $products as $product ) : ?>
			<?php
			$post_object = get_post( $product->get_id() );
			setup_postdata( $GLOBALS['post'] =& $post_object );
			?>
			<ul class="products"><?php wc_get_template_part( 'content', 'product' ); ?></ul>
		<?php endforeach; ?>
	</div>
</div>