<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Future_Imperfect
 */

?>

<?php global $post_index; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="entry-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<time><?php echo get_the_date(); ?></time>
			<?php
				if ( get_post_status ( $ID ) == 'private' ) {
					echo '- <span style="font-size: 65%;">&nbsp;&nbsp;<i class="fa fa-lock"></i></span>';
				}
			?>

			<br>
			<?php echo get_post()->post_title; ?>
		</a>
	</h2>

	<?php
		the_post_thumbnail();
		the_content();
		the_meta();
	?>

</article>
