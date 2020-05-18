        </div>
	</div>
<script src="https://analytics.emi-foundation.com/en/get/analytics"></script>
<script type=“text/javascript” src=“https://cdn.ywxi.net/js/1.js” async></script>
	<?php
		get_template_part('templates/section', 'footer');
		
		if(Cryptronick_Theme_Helper::get_option('back_to_top') == '1'){
			echo "<a href='#' id='back_to_top'></a>";
		}
		?>
    <?php 		
		wp_footer();
    ?>

</body>
</html>