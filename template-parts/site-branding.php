<div class="site-branding">

	<?php 
		if ( !is_home() ) {
			echo get_avatar( get_the_author_meta( 'ID' ) , 64, "", "", array('class' => 'img-circle') ); 
		}
	?>
	
	<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description hidden-xs"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
		
		<div class="primary-menu" style="overflow:hidden;">
			<?php
				$menuParameters = array(
					'container'       => false,
					'echo'            => false,
					'items_wrap'      => '%3$s',
					'depth'           => 0,
				);
				
				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>
		
		</div>
		<div style="clear:both;"></div>
</div>
