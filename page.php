<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Future_Imperfect
 */

get_header(); ?>

<?php get_template_part( 'template-parts/navigation' ); ?>

<?php
	while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/site-branding' ); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
			<?php
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endwhile; ?>

<?php

get_footer();
