

<?php get_footer("info"); ?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
		    window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.11.2.min.js"><\/script>')
		</script>

		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/slick.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/parallax.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.viewportchecker.min.js"></script>
		
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.mmenu.js"></script>
		
		
		<?php
			$slug = "";
			if ( is_page() ){
				$slug = get_queried_object()->post_name;
			}
			
			if($slug == "analiticki-prikaz") {
				?>
				<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/responsive-tables.js"></script>
				<script src="http://mottie.github.com/tablesorter/js/jquery.tablesorter.js"></script>
				<script src="http://mottie.github.com/tablesorter/js/jquery.tablesorter.widgets.js"></script>
				<script src="http://mottie.github.com/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
				<?php
			}
		?>
		
		<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
