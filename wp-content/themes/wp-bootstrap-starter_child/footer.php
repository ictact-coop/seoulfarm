<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container-fluid p-3 p-md-5">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="Wordpress Technical Support" alt="Bootstrap Wordpress Theme"><?php echo esc_html__('Bootstrap Wordpress Theme','wp-bootstrap-starter'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		var TRAIN_NUMBER = 0;
		var MOVE = '100%';
		var TRAIN_COUNT = ($(".Train").length)-1;
		var myVar = setInterval(railTimer, 3000);

		function railTimer() {
				if (TRAIN_NUMBER < TRAIN_COUNT) {
					TRAIN_NUMBER = TRAIN_NUMBER + 1;
					$(".Banner_rail,.text_rail").stop();
					$(".Banner_rail,.text_rail").animate({'right': '+=100%'},1000);
				}
				else{
					TRAIN_NUMBER = 0;
					$(".Banner_rail,.text_rail").stop();
					$(".Banner_rail,.text_rail").animate({'right': '0%'},1000);
					// 색상

				};
		}
		setInterval(function() {
			$(".call_button > *").css("background-color", '#fff');
			$(("" +'.call_button_'+(TRAIN_NUMBER+1))).css("background-color", '#888');
		}, 10);

		// 버튼 클릭시 일어나는 이벤트 제어
		$(".Bannerstyle_basic .call_button_1").click(function(){
			TRAIN_NUMBER = 0;
				$(".Banner_rail,.text_rail").stop();
				$(".Banner_rail,.text_rail").animate({'right': ("" + (TRAIN_NUMBER * 100)+'%')}, 1000);
				clearInterval(myVar);
				 myVar = setInterval(railTimer, 3000);
			});
		$(".Bannerstyle_basic .call_button_2").click(function(){
			TRAIN_NUMBER = 1;
				$(".Banner_rail,.text_rail").stop();
				$(".Banner_rail,.text_rail").animate({'right':("" + (TRAIN_NUMBER * 100)+'%')}, 1000);
				clearInterval(myVar);
				 myVar = setInterval(railTimer, 3000);
			});
		$(".Bannerstyle_basic .call_button_3").click(function(){
			TRAIN_NUMBER = 2;
				$(".Banner_rail,.text_rail").stop();
				$(".Banner_rail,.text_rail").animate({'right':(TRAIN_NUMBER*100+'%')}, 1000);
				clearInterval(myVar);
				 myVar = setInterval(railTimer, 3000);
			});
		$(".Bannerstyle_basic .call_button_4").click(function(){
			TRAIN_NUMBER = 3;
				$(".Banner_rail,.text_rail").stop();
				$(".Banner_rail,.text_rail").animate({'right':(TRAIN_NUMBER*100+'%')}, 1000);
				clearInterval(myVar);
				 myVar = setInterval(railTimer, 3000);
			});
		$(".Bannerstyle_basic .call_button_5").click(function(){
			TRAIN_NUMBER = 4;
				$(".Banner_rail,.text_rail").stop();
				$(".Banner_rail,.text_rail").animate({'right':(TRAIN_NUMBER*100+'%')}, 1000);
				clearInterval(myVar);
				 myVar = setInterval(railTimer, 3000);
			});

		$('.imgboder_img, .newspaper_PR_mainbanner_img, .sidebar_img').on('click', function() {
			var url = '';
			url = $(this).attr('data-url');
			location.href = url;
		});

	});
</script>
</body>
</html>
