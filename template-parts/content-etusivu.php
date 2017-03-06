<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Future_Imperfect
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('frontpage-hero'); ?>>
	<header class="entry-header">
		<?php the_post_thumbnail(); ?>
		<?php the_title( '<h1 class="entry-title" style="font-size: 3em;">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content"> 
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'future-imperfect' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
