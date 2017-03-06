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
			<?php 
				the_post_thumbnail();
	                       	echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_post()->post_title .  '</a></h2>';

	                	if ( 'post' === get_post_type() ) : ?>
        		                <div class="entry-meta">
 		                       	        <?php future_imperfect_posted_on(); ?>
	                	        </div><!-- .entry-meta -->
        		        <?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'future-imperfect' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

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
			echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_post()->post_title .  '</a></h2>';
		?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php future_imperfect_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
			the_post_thumbnail();
		?>

		<?php the_content(); ?>

		</article>

<?php endif; // is_single() ?>
