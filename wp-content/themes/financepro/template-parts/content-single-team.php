<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;
$id = get_the_ID();
$thumb_size = 'rdtheme-size9';
$thumbnail = false;
if ( has_post_thumbnail() ){
	$thumbnail = get_the_post_thumbnail( null, $thumb_size, array( 'class' => 'img-responsive' ) );
}
else {
	if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
		$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
	}
	elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
		$thumbnail = '<img class="img-responsive attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x522.jpg" alt="'.get_the_title().'">';
	}
}
$team_designation = get_post_meta( $id, 'fin_team_designation', true );
$team_socials = get_post_meta( $id, 'fin_team_socials', true );
$fin_team_skill = get_post_meta( $post->ID, 'fin_team_skill', true );
$fin_team_email = get_post_meta( $post->ID, 'fin_team_email', true );
$fin_team_phone = get_post_meta( $post->ID, 'fin_team_phone', true );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'row rt-team-single' ); ?>>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="detail-image">
			<div class="image-caption">
				<?php echo wp_kses_post( $thumbnail ); ?>
			</div>
			<ul>
				<?php if ( $fin_team_phone ) { ?>
				<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( $fin_team_phone ); ?></li>				
				<?php } if ( $fin_team_email ) { ?>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo esc_html( $fin_team_email ); ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="detail-content">
			<h2><?php the_title(); ?></h2>
			<?php if ( !empty( $team_designation ) ) { ?>
				<span class="position"><?php echo esc_html( $team_designation ); ?></span>
			<?php } ?>
			<?php if ( !empty( $team_socials ) ){ ?>
			<ul class="social-icons">
			<?php foreach ( $team_socials as $fin_team_social_key => $fin_team_social_value ) { ?>
				<?php if ( !empty( $fin_team_social_value ) ) { ?>
				<li><a target="_blank" href="<?php echo esc_attr( $fin_team_social_value );?>"><i class="fa <?php echo esc_attr( RDTheme::$team_social_fields[$fin_team_social_key]['icon'] );?>"></i></a></li>
				<?php } ?>
			<?php } ?>
			</ul>
			<?php } ?>
			<?php the_content(); ?>
			<?php if ( !empty( $fin_team_skill ) ){ ?>
			<div class="skill-progress">
			
				<?php foreach ( $fin_team_skill as $team_skill ) { ?>
					<?php
					if ( empty( $team_skill['skill_name'] ) || empty( $team_skill['skill_value'] ) ) {
						continue;
					}
					if ( empty ( $team_skill['skill_bar_color'] ) ) {
						$team_skill['skill_bar_color'] = '';
					}
					?>
					<?php $team_skill_value = (int) $team_skill['skill_value'];?>					
					<label><?php echo esc_html( $team_skill['skill_name'] );?></label>
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-danger" role="progressbar" aria-valuenow="<?php echo esc_attr( $team_skill_value );?>" aria-valuemin="0" aria-valuemax="100" style="background-color:<?php echo esc_html( $team_skill['skill_bar_color'] );?>;width:<?php echo esc_attr( $team_skill_value );?>%"><span><?php echo esc_attr( $team_skill_value );?>%</span>
						</div>
					</div>					
				<?php } ?>
			</div>
			<?php } ?>	
		</div>
	</div>
</div>