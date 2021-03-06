<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mmh_weblog
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
 		                       	        <?php mmh_weblog_posted_on(); ?>
	                	        </div><!-- .entry-meta -->
        		        <?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mmh-weblog' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mmh-weblog' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php mmh_weblog_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		
		
		<h2 class="entry-title"><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php echo get_post()->post_title ?></a></h2>
		
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php mmh_weblog_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
			the_post_thumbnail();
		?>

		<?php the_excerpt(); ?>

	</article>

<?php endif; // is_single() ?>

