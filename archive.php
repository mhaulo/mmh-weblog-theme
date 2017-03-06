<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Future_Imperfect
 */

get_header(); ?>
<div class="col-xs-12 col-lg-9 small-padding main-content">

	<div class="row">
		<div class="col-xs-12 col-lg-9">
			<div id="content" class="site-content">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->

			     </div><!-- #content -->

		</div> <!-- col -->



		<div class="col-xs-12 col-lg-3 extra-content">
			<div class="blog-sidebar-content">
		<?php
			if ( is_user_logged_in() ) {
				dynamic_sidebar('blog-sidebar'); 
			}
		?>
			</div>

		</div>

	</div>
</div>

<?php
get_footer();
