<?php
/**
 * Template part for displaying page content in About page template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mmh_weblog
 */

?>

<article id="post-<?php the_ID(); ?>">
	<div class="row" style="margin:0;">
		<div class="col-xs-12 site-branding">
			<div class="row" style="margin:0;">
				<div class="col-xs-12 col-sm-5">
					<?php the_post_thumbnail('full', ['class' => 'site-avatar img-circle']); ?>
				</div>
				
				<div class="col-xs-12 col-sm-7 content-area">
					<h1><?php the_title(); ?></h1>
					<strong><?php the_excerpt(); ?></strong>
				</div>
			</div>
		</div>
			
		<div class="col-xs-12">
			<div class="content-area">
				<?php the_content(); ?>
			</div>
		</div>
		
	</div>	
</article><!-- #post-## -->
