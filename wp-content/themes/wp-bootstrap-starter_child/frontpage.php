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
				$posts_headline = get_posts(array('meta_key' => 'post_headline', 'orderby' => 'meta_value', 'posts_per_page' => 3));
				$headline_number = 1;
				foreach($posts_headline as $post) {
					$post_banner_img = get_featured_image($post->ID);

					// var_dump($post);
					if($headline_number == 1) { ?>
						<div class="newspaper_PR_mainbanner_big">
							<div class="newspaper_PR_mainbanner_element">
			          <div class="newspaper_PR_mainbanner_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">
			          </div>
							<?php
					} else { // 헤드라인 2~3번째
						if($headline_number == 2) { ?>
							<div class="newspaper_PR_mainbanner_small"><?php
						} ?>
			        <div class="newspaper_PR_mainbanner_element">
			          <div class="newspaper_PR_mainbanner_summary">
			            <div class="newspaper_PR_mainbanner_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">
			            </div>
									<div class="newspaper_PR_mainbanner_sort">
					<?php } ?>
									<div class="newspaper_PR_mainbanner_title">
										<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
									</div>
									<div class="newspaper_PR_mainbanner_subtitle">
										<a href="<?php the_permalink();?>"><?=get_post_meta($post->ID, 'subtitle', true)?></a>
									</div>
									<div class="newspaper_PR_mainbanner_text">
										<a href="<?php the_permalink();?>"><?php print_content($post->post_content, 130); ?></a>
									</div>
								<?php if($headline_number > 1) { ?>
								</div>
								<?php if($headline_number == 3) { // end of small?>
								</div>
								<?php
								}
							} ?>
						</div>
					</div>
					<?php
					$headline_number++;
				}
				?>
	    </div>
	<!-- 배너 종료 -->
			<div class="middle_img_banner">
				<img src="img/imgbannertest.png">
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
								<?php foreach($posts_seoul as $post) { ?>
									<li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
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
								<?php foreach($posts_other as $post) { ?>
									<li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="imgboder_col6">
						<?php
						$posts_img1 = get_posts(array('meta_key' => 'frontpage_news_major', 'meta_value' => 1, 'posts_per_page' => 3));
						$posts_img2 = get_posts(array('meta_key' => 'frontpage_news_major', 'meta_value' => 2, 'posts_per_page' => 3));

						foreach($posts_img1 as $post) {
							$post_banner_img = get_featured_image($post->ID);
							// $post_banner_img2 = 'http://yori.hansalim.or.kr/data/ing/20140702_506_4.jpg'; ?>
							<div class="imgboder_<?=$i?>">
								<div class="imgboder_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">

								</div>
								<div class="imgboder_title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php } ?>

						<?php foreach($posts_img2 as $post) {
							$post_banner_img = get_featured_image($post->ID);
							// $post_banner_img2 = 'http://yori.hansalim.or.kr/data/ing/20140702_506_4.jpg'; ?>
							<div class="imgboder_<?=$i?>">

								<div class="imgboder_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">

								</div>
								<div class="imgboder_title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php }
						/*for ($i = 0; $i < 6; $i++) {
							echo '<div class="imgboder_',$i,'">
										<div class="imgboder_img" style="background-image: url(http://yori.hansalim.or.kr/data/ing/20140702_506_4.jpg);">

										</div>
										<div class="imgboder_title">
											텍스트였습니다. 5 세기뿐만 아니라 전자 조판으로 도약했으며, 본질적으로 변하지 않았습니다
										</div>
									</div>';
						}*/ ?>
					</div>
				</div>
				<div class="sidebar_place">
					<div class="sidebar_img_boder">
						<div class="sidebar_name">
							도시농업의 멋
						</div>
						<?php
						$category_id = 4; // 농사정보
						$posts_seoul = get_posts(array('category' => $category_id, 'posts_per_page' => 1));
						foreach($posts_seoul as $post) {
							$post_banner_img = get_featured_image($post->ID);

							// var_dump($post);?>
							<div class="sidebar_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">
							</div>
							<div class="sidebar_title">
								<!-- 도시농업의 멋 두줄 씩 나오게 되면 이렇게 보입니다. -->
								<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
							</div>
							<div class="sidebar_text">
								<?php print_content(); ?>
								<!-- 하되 거선의 그것을 열매를 꽃이 황금시대다. 꽃이 무엇을 만천하의 가장 무언가 뭐지 -->
							</div>
							<div class="sidebar_writer">
								-<?=get_the_author_meta('display_name', $post->post_author)?>
								<!-- -최승혁 -->
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
