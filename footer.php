<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blightone
 */

?>

	<footer id="colophon" class="site-footer">
		<section class="blightone-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-4">
						<div class="line"></div>
					</div> <!-- end of Column -->
					<div class="col-md-4 col-lg-4 col-sm-4">
						<div class="blightone-footer-logo-section">
							<img class="blightone-footer-logo" src="logo.png">
						</div>
					</div> <!-- end of Column -->  
					<div class="col-md-4 col-lg-4 col-sm-4">
						<div class="line"></div>
					</div> <!-- end of Column --> 
					<!-- End of logo Line -->
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="blightone-footer-dec">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet fringilla imperdiet cras pellentesque. Nisi aliquet interdum est, cum. Quam ac nisi, elit egestas ullamcorper nunc quam purus.
							</p>

						</div>
					</div> <!-- end of Column -->  
					<!-- Start Footer Bottom Scetion -->
					
					<div class="col-md-3 col-lg-3 col-sm-3">
						<?php if( is_active_sidebar( 'blight-one-sidebar-footer1' ) ): ?>
							<div class="blight-footer-column">
								<?php dynamic_sidebar( 'blight-one-sidebar-footer1' ); ?>
							</div>
						<?php endif; ?>
					</div> <!-- end of Column --> 
					
					<div class="col-md-3 col-lg-3 col-sm-3">
					    <?php if( is_active_sidebar( 'blight-one-sidebar-footer2' ) ): ?>
							<div class="blight-footer-column">
								<?php dynamic_sidebar( 'blight-one-sidebar-footer2' ); ?>
							</div>
						<?php endif; ?>
					</div> <!-- end of Column --> 
					<div class="col-md-3 col-lg-3 col-sm-3">
					    <?php if( is_active_sidebar( 'blight-one-sidebar-footer3' ) ): ?>
							<div class="blight-footer-column">
								<?php dynamic_sidebar( 'blight-one-sidebar-footer3' ); ?>
							</div>
						<?php endif; ?>
					</div> <!-- end of Column -->
					<div class="col-md-3 col-lg-3 col-sm-3">
						<div class="blight-footer-column">
							<h3>Follow Us</h3>
							<?php if( is_active_sidebar( 'blight-one-sidebar-footer4' ) ): ?>
								<?php dynamic_sidebar( 'blight-one-sidebar-footer4' ); ?>
						    <?php endif; ?>
						</div>
					</div> <!-- end of Column --> 
					<!-- End of footer bottom section   -->
					<div class="col-md-12 col-lg-12 col-sm-12 blightone-copyright">
						
					</div> <!-- bottom line -->
				</div><!-- end of row -->
				<!--end ts-box-->
				<div class="text-center text-white py-4">
					<small>© 2018 ThemeStarz, All Rights Reserved</small>
				</div>
			</div>
			<!--end container-->
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
