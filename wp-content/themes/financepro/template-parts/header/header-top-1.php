<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tophead-contact">
					<ul>
						<?php if ( RDTheme::$options['phone'] ): ?>
							<li>
								<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
							</li>
						<?php endif; ?>
						<?php if ( RDTheme::$options['email'] ): ?>
							<li>
								<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( RDTheme::$options['email'] );?>"><?php echo esc_html( RDTheme::$options['email'] );?></a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="tophead-right tophead-address">
					<?php if ( RDTheme::$options['address'] ): ?>
						<i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo wp_kses_post( RDTheme::$options['address'] );?></span>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>