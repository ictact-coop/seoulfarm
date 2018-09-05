<?php
/*
Template Name: 카테고리별 보기
*/

/**
 * 메뉴(카테고리)를 선택했을 때 보이는 공통 화면
 * 특정 카테고리별로 다르게 표시하기 위해서는
 * 1.이 파일 내에서 if(is_category('news')) 등으로 분기하거나
 * 2.특정 카테고리를 위한 별도의 템플릿을 category-news.php 등으로 만든다
 */
get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="category_page">
				<div class="category_boerd_place">

				<?php $category = get_the_category(); // 현재 카테고리를 가져옴
				$category_id = $category[0]->cat_ID; // 카테고리 ID (숫자)
				$category_name = $category[0]->name; // 카테고리 이름
				$category_count = $category[0]->category_count;
				$posts = get_posts(array('category' => $category_id, 'posts_per_page' => 5)); // 현재 카테고리에 해당하는 포스트
				?>

				<div class="category_upper">
					<div class="category_title"><?=$category_name?> <small>전체(<?=$category_count?>)건</small></div>
					<!-- <div class="writebutton">글쓰기</div> -->
				</div>

				<?php
				foreach($posts as $post) {
					$post_banner_img = get_featured_image($post->ID); ?>
					<div class="category_boerd">
						<div class="category_boerd_img" style="background-image: url(<?=$post_banner_img?>);">

						</div>
						<div class="category_boerd_contents">
							<div class="category_boerd_title">
								<a href="<?php the_permalink();?>"><?=$post->post_title?></a>
							</div>
							<div class="category_boerd_text">
								<p><?php print_content($post->post_content); ?></p>
							</div>
							<div class="category_boerd_author">
								<p><?=date('Y년 n월 j일', strtotime($post->post_date))?> | <?=get_writer_name()?>기자</p>
								<!-- <p> 2018 5월 21일 | 최승혁기자 </p> -->
							</div>
						</div>
					</div>
				<?php } // End of the loop. ?>
					<!-- 쪽번호 -->
					<div class="pagemove">
						<?php //echo paginate_links( $args ); ?>
						<?php the_posts_pagination(); ?>
						<!-- <div class="nav-previous alignleft"><?php next_posts_link( '다음' ); ?></div>
						<div class="nav-next alignright"><?php previous_posts_link( '이전' ); ?></div> -->
					</div>
				</div>
				<div class="sidebar_place">
					<div class="sidebar_banner">
						<div class="Banner_station Bannerstyle_basic">
							<div class="Banner_rail">
								<div class="Train_1 Train">

								</div>
								<div class="Train_2 Train">

								</div>
								<div class="Train_3 Train">

								</div>
								<div class="Train_4 Train">

								</div>
								<div class="Train_5 Train">

								</div>

							</div>
							<div class="text_rail">
								<div class="coach">
									<p>반응형 배너 테스트입니다.</p>
								</div>
								<div class="coach">
									<p>2</p>
								</div>
								<div class="coach">
									<p>3</p>
								</div>
								<div class="coach">
									<p>4</p>
								</div>
								<div class="coach">
									<p>5</p>
								</div>

							</div>
							<div class="banner_Layer_1">
								<div class="move_button">
									<div class="button_left">

									</div>
									<div class="button_right">

									</div>
								</div>
								<div class="call_button">
									<div class="call_button_1">
									</div>
									<div class="call_button_2">
									</div>
									<div class="call_button_3">
									</div>
									<div class="call_button_4">
									</div>
									<div class="call_button_5">
									</div>
								</div>
							</div>
						</div>
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
