<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Future_Imperfect
 */

?>
	</div> <!-- row -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="row hidden-md hidden-lg">
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php dynamic_sidebar("footer-1"); ?>
			</div>
			
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php dynamic_sidebar("footer-2"); ?>
			</div>
			
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php dynamic_sidebar("footer-3"); ?>
			</div>
			
			
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
