<div class="navbar">
	<?php if ( is_home() ) : ?>
		<div class="row">
			<?php dynamic_sidebar("topbar-1"); ?>
			<?php dynamic_sidebar("topbar-2"); ?>
			<?php dynamic_sidebar("topbar-3"); ?>
			<?php dynamic_sidebar("topbar-4"); ?>
		</div>
	<?php else: ?>
		<p style="margin:0;"><a href="<?php echo get_site_url(); ?>" style="color:#ddd;">Etusivulle</a></p>
	<?php endif; ?>
	
	
</div>
