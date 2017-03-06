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


<?php if ( is_single() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php future_imperfect_posted_on(); ?>
				</div><!-- .entry-meta -->

				<?php the_title( '<h4>', '</h4>' ); ?>
				<?php the_post_thumbnail(); ?>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				/*the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'future-imperfect' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );*/

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'future-imperfect' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php future_imperfect_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		echo '<h2 class="entry-title"><span class="entry-meta"><time>' . get_the_date() . ' </time>';

                echo '</span><br>';

		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_post()->post_title . '</a>';
                if ( get_post_status ( $ID ) == 'private' ) {
	                echo '&nbsp;&nbsp;<span style=" font-size: 65%;"><i class="fa fa-lock"></i></span>';
                }

		echo '</h2>';

		the_post_thumbnail();
	?>

	</article>

<?php endif; // is_single() ?>

