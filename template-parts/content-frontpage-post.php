<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mmh_weblog
 */


?>

<article id="post-<?php the_ID(); ?>">
	<header>
		
		<h2><?php the_title(); ?></h2>
		<?php mmh_weblog_posted_on(); ?>
	</header>
	
	<main>
		<?php the_excerpt(); ?>
	</main>
	
	<footer>
		
	</footer>
</article><!-- #post-## -->
