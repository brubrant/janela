	
	</div><!-- /main -->
	
	<footer>
		<div id="colophon" role="contentinfo">
			<div id="site-generator">
				Janela Errada
			</div><!-- #site-generator -->
		</div><!-- #colophon -->
	</footer>
	
	<?php if( is_single( ) ) : ?>
	    <script src="<?php echo JS ?>/organictabs.jquery.js"></script>
	    <script>
	        jQuery(function() {
				jQuery("#entry-credits").organicTabs();
	        });
	    </script>
    <?php else : ?>
	    <script src="<?php echo JS ?>/jquery.masonry.min.js"></script>
	    <script>  
	        jQuery(function() {
	        	jQuery('#content-list').masonry({
    				itemSelector : '.hentry',
  				});
			});
	    </script>
    <?php endif; ?>
	
	<?php wp_footer(); ?>

</body>
</html>
