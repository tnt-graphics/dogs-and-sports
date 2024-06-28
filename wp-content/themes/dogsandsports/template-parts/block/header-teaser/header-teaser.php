<?php
/**
 * Header Post - Display Post as Header Size.
 */
?>

<?php if( get_field('hintergrundbild') ) { 
	$image_url = get_field('hintergrundbild'); 
	$iamge_size = 'large'; // (thumbnail, medium, large, full or custom size)
	
	$headerimage = $image_url['sizes'][ $iamge_size ];


   
    if( $headerimage ) { ?>
			<div class="header-holder section header-size" style="background-image: url(<?php echo $headerimage; ?>) ">
				
				<div class="featured-content">
					<?php if ( get_field("titel") ) { ?>
						<h1><?php the_field("titel"); ?></h1>
					<?php } ?>
					
				<?php if ( get_field("cta_link") ) { 
					$link = get_field('cta_link'); ?>	
					<div class="is-layout-flex wp-block-buttons">
						<div class="wp-block-button is-style-fill">
							<a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $link ); ?>">
								<?php the_field("cta_bezeichnung"); ?>
							</a>
						</div>
					</div>
				<?php } ?>	
				</div>	
			</div>		
			<?php } 
	}		
?>