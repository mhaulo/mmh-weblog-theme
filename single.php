<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mmh_weblog
 */

get_header(); ?>

<?php get_template_part( 'template-parts/navigation' ); ?>


<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/site-branding' ); ?>

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
						get_template_part( 'template-parts/content', get_post_format() );
						echo '<p class="post-separator"><i class="fa fa-ellipsis-h"></i></p>';
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</main><!-- #main -->
			</div><!-- #primary -->

	<?php
			the_posts_navigation();
		endwhile;

	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; 
	
get_footer();
