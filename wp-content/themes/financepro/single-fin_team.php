<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<main id="main" class="site-main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'single-team' );?>
				<?php endwhile; ?>
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>