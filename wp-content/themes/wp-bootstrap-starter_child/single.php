<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header();
$post = get_post();
$post_categories = wp_get_post_categories( $post->ID );

// var_dump($post_categories);
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="post_page">
				<div class="post_place">
					<!-- 하드코딩됨  -->
					<div class="post_upper">
						<div class="post_category">
							<?php foreach($post_categories as $c) {
					    	$cat = get_category( $c );
								echo '['.$cat->name.']';
							} ?>
						</div>
						<div class="post_title">
							<div class="post_title_main">
								<h3><?=$post->post_title?></h3>
							</div>
							<div class="post_title_sub">
								<h4>서울 농부들의 시민축제 작물 시들어 아쉬움</h4>
							</div>
							<div class="post_info">
								<p><?=date('Y년 n월 j일', strtotime($post->post_date))?> | <?=get_the_author_meta('display_name', $post->post_author)?> 기자</p>
							</div>
						</div>
					</div>
					<div class="post_contents">
						<p><?=nl2br($post->post_content)?></p>
						<p><?=get_the_author_meta('display_name', $post->post_author)?> 기자 www@naver.com <br>저작권자 서울도시농업 e소식
						</p>
					</div>

					<?php // 덧글 부분
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
			   </div>
			 <!-- <div class="sidebar_place">
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
					<div class="PopularNews_title">
						인기 소식
					</div>
					<div class="PopularNews_boder">
							<p>형식 표본을 만들기 위해 뒤섞어 놓았던</p>
							<p>알 수없는 프린터가 유형의 조리실을</p>
							<p>이래로 업계 표준 더미 텍스트였습니다</p>
							<p>표본을 만들기 위해 뒤섞어 놓았던 1500 년대</p>
							<p><알 수없는 프린터가 유형의 조리실을 가져다가</p>
					</div>
				</div>
				<div class="imgbanner1">
					<div class="imgbanner1_img" style="background-image: url(img/seoulcityagriculture.jpg);">

					</div>
					<div class="imgbanner1_text">
						서울시<br>도시농업과
					</div>
				</div>
				<div class="imgbanner2">
					<div class="imgbanner2_img">

					</div>
					<div class="imgbanner2_text">
						모두농링크
					</div>
				</div>
			</div> -->
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
/* get_sidebar(); */

// 조회수 증가
setPostViews(get_the_ID());

get_footer();
