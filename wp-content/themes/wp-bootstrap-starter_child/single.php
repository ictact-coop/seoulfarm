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
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="post_page">
				<div class="post_place">
					<!-- 하드코딩됨  -->
					<div class="post_upper">
						<div class="post_category">
							<?php foreach($post_categories as $c) {
					    	$cat = get_category( $c )->name;
								if($cat != 'Uncategorized') echo '['.$cat.']';
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
								<p><?=date('Y년 n월 j일', strtotime($post->post_date))?> |
									<?php $author_name = get_post_meta($post->ID, 'writer_name', true);
									if(!isset($author_name)) $author_name = get_the_author_meta('display_name', $post->post_author);?>
									<?=$author_name?> 기자</p>
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
			 <!--</div>test-->
			 <!-- 2018년 8월 27일 오후 7시 25분 업데이트 합니다. 이거 안 보이면 다 꽝임!! -->
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
/* get_sidebar(); */

// 조회수 증가
setPostViews(get_the_ID());

get_footer();
