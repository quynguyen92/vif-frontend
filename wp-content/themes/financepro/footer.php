<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_footer_column = RDTheme::$options['footer_column'];
switch ( $rdtheme_footer_column ) {
	case '1':
	$rdtheme_footer_class = 'col-sm-12 col-xs-12';
	break;
	case '2':
	$rdtheme_footer_class = 'col-sm-6 col-xs-12';
	break;
	case '3':
	$rdtheme_footer_class = 'col-sm-4 col-xs-12';
	break;		
	default:
	$rdtheme_footer_class = 'col-sm-3 col-xs-12';
	break;
}
?>
</div><!-- #content -->
<footer>
	<?php if ( RDTheme_Helper::has_footer() ){ ?>
		<div class="footer-top-area">
			<div class="container">
				<div class="row">
					<?php
					for ( $i = 1; $i <= $rdtheme_footer_column; $i++ ) {
						echo '<div class="' . $rdtheme_footer_class . '">';
						dynamic_sidebar( 'footer-'. $i );
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ( RDTheme::$options['copyright_area'] ): ?>
		<div class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-xs-12"><?php echo wp_kses_post( RDTheme::$options['copyright_text'] );?></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</footer>
</div>
<?php wp_footer();?>
</body>
</html>