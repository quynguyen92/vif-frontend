<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_socials = RDTheme_Helper::socials();
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? RDTHEME_IMG_URL . 'logo-light.png' : RDTheme::$options['logo_light']['url'];
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-xs-12">
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
			</div>
			<div class="col-sm-2 col-xs-12">
				<?php if ( RDTheme::$options['logo_type'] == 'image_type' ) { ?>
					<a class="topbar-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<?php } else { ?>
					<a class="rt-text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo RDTheme::$options['logo_text'];  ?></a>
				<?php } ?>
			</div>
			<div class="col-sm-5 col-xs-12">
				<div class="tophead-right">
					<?php if ( $rdtheme_socials ): ?>
						<ul class="tophead-social">
							<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
								<?php if ( $rdtheme_social['icon'] != 'fa-skype' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fa <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
								<?php } else { ?>
								<li><a href="skype:<?php echo esc_url( $rdtheme_social['url'] );?>?call"><i class="fa <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
								<?php } ?>
							<?php endforeach; ?>					
						</ul>						
					<?php endif; ?>
				</div>				
			</div>
		</div>
	</div>
</div>