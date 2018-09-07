<?php
/*
Template Name: 대문 페이지
*/
get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="newspaper_PR_mainbanner">
				<?php
				$posts_headline1 = get_posts(array('meta_key' => 'headline', 'meta_value' => 1, 'orderby' => 'meta_value', 'posts_per_page' => 1));
				$posts_headline2 = get_posts(array('meta_key' => 'headline', 'meta_value' => 2, 'posts_per_page' => 2));
				$post = array_pop($posts_headline1);
				$post_banner_img = get_featured_image($post->ID);
				?>
				<div class="newspaper_PR_mainbanner_big">
					<div class="newspaper_PR_mainbanner_element">
						<div class="newspaper_PR_mainbanner_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">
						</div>
						<div class="newspaper_PR_mainbanner_title">
							<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
						</div>
						<div class="newspaper_PR_mainbanner_subtitle">
							<a href="<?php the_permalink();?>"><?=get_post_meta($post->ID, 'subtitle', true)?></a>
						</div>
						<div class="newspaper_PR_mainbanner_text">
							<a href="<?php the_permalink();?>"><?php print_content($post->post_content, array('cut' => 240)); ?></a>
						</div>
					</div>
				</div>

				<div class="newspaper_PR_mainbanner_small">
				<?php
				// 헤드라인 2~3번째
				foreach($posts_headline2 as $post) {
					$post_banner_img = get_featured_image($post->ID);
					$title = get_short_title();
					?>
			        <div class="newspaper_PR_mainbanner_element">
			          <div class="newspaper_PR_mainbanner_summary">
			            <div class="newspaper_PR_mainbanner_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">
			            </div>

									<div class="newspaper_PR_mainbanner_sort">
										<div class="newspaper_PR_mainbanner_title">
											<a href="<?php the_permalink();?>"><?=$title?></a>
										</div>
										<div class="newspaper_PR_mainbanner_subtitle">
											<a href="<?php the_permalink();?>"><?=print_string(get_post_meta($post->ID, 'subtitle', true), 72)?></a>
										</div>
										<div class="newspaper_PR_mainbanner_text">
											<a href="<?php the_permalink();?>"><?php print_content($post->post_content, array('cut' => 128)); ?></a>
										</div>
									</div><!-- end of sort -->
								</div><!-- end of summary-->
						</div><!-- end of element -->

					<?php	} ?>
				</div>
	    </div>
	<!-- 배너 종료 -->
			<div class="middle_img_banner">
				<?php $themepath = get_stylesheet_directory_uri(); ?>
				<a href="http://제7회대한민국도시농업박람회.com/" target="_blank"><img border="0" style="width: 100%" src="<?=$themepath?>/img/imgbanner2.jpg"></a>
				<!-- <img src="img/imgbannertest.png"> -->
			</div>
	<!-- 컨텐츠 영역 -->
			<div class="contents_place">
				<div class="main_place">
					<div class="textboard">
						<div class="board1">
							<div class="boder_title">
								서울시 소식
							</div>
							<div class="boder_element">
								<?php
								$category_id = 7;
								$posts_seoul = get_posts(array('category' => $category_id, 'posts_per_page' => 5)); ?>
								<ul>
								<?php foreach($posts_seoul as $post) {
									$title = get_short_title(); ?>
									<li><a href="<?php the_permalink();?>"><?=print_string($title, 62)?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<div class="board2">
							<div class="boder_title">
								자치구 소식
							</div>
							<div class="boder_element">
								<?php
								$category_id = 8;
								$posts_other = get_posts(array('category' => $category_id, 'posts_per_page' => 5));?>
								<ul>
								<?php foreach($posts_other as $post) {
									$title = get_short_title(); ?>
									<li><a href="<?php the_permalink();?>"><?=print_string($title, 62)?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="imgboder_col6">
						<?php
						$posts_img1 = get_posts(array('meta_key' => 'frontpage_news_major', 'meta_value' => 1, 'posts_per_page' => 6));

						foreach($posts_img1 as $post) {
							$post_banner_img = get_featured_image($post->ID); ?>
							<div class="imgboder_<?=$i?>">
								<div class="imgboder_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">

								</div>
								<div class="imgboder_title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php } ?>

						<?php /*foreach($posts_img2 as $post) {
							$post_banner_img = get_featured_image($post->ID);  ?>
							<div class="imgboder_<?=$i?>">

								<div class="imgboder_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">

								</div>
								<div class="imgboder_title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php } */ ?>
					</div>
				</div>
				<div class="sidebar_place">
					<div class="sidebar_img_boder">
						<div class="sidebar_name">
							도시농업의 멋
						</div>
						<?php
						$posts_seoul = get_posts(array('meta_key' => 'frontpage_news_major', 'meta_value' => 2, 'posts_per_page' => 1));

						foreach($posts_seoul as $post) {
							$post_banner_img = get_featured_image($post->ID); ?>
							<div class="sidebar_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">
							</div>
							<div class="sidebar_title">
								<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
							</div>
							<div class="sidebar_text">
								<a href="<?php the_permalink();?>"><?php print_content($post->post_content, array('cut' => 145)); ?></a>
							</div>
							<div class="sidebar_writer">
								-<?=get_writer_name()?>
							</div>
						<?php } ?>

					</div>
					<div class="PopularNews">
						<?php get_template_part('hot'); ?>
					</div>
					<?php get_template_part('imgbanner'); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
