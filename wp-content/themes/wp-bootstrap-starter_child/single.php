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
								<h4><?=get_post_meta($post->ID, 'subtitle', true)?></h4>
							</div>
							<div class="post_info">
								<p><?=date('Y년 n월 j일', strtotime($post->post_date))?> |
									<?=get_writer_name()?></p>
							</div>
						</div>
					</div>
					<div class="post_contents">
						<p><?php print_content(); ?></p>
						<p><?php //=get_writer_name()?> 
							<span class="small">저작권자 서울도시농업 e소식, 무단 전제 및 재배포 금지</span>
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
