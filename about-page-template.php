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
 * @package mmh_weblog
 *
 * Template Name: About page
 */

get_header(); ?>

<?php get_template_part( 'template-parts/navigation' ); ?>

		<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'aboutpage' );
			endwhile; // End of the loop.
		?>
		
		<div class="row footer-widget-container">
			<div class="col-xs-12 col-md-6" style="background: #d7e9f3; color: #000; padding: 50px;">
				<?php
					dynamic_sidebar("footer-1");
				?>

				<p class="text-center"><small>Lisää postauksia <a href="/blogi">blogiarkistossa</a>.</small></p>
			</div>
			
			<div class="col-xs-12 col-md-6">
				<div class="row">
					<div class="col-xs-12" style="background: #141a1f; padding: 50px;">
						<?php dynamic_sidebar("footer-2"); ?>
					</div>
				
					<div class="col-xs-12" style="background: #000; padding: 50px;">
						<?php dynamic_sidebar("footer-3"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php

get_footer();
