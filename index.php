<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			$post_index = 0;

			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
				echo '<p class="post-separator"><i class="fa fa-ellipsis-h"></i></p>';

				if (!is_sticky())
					$post_index++; 

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
