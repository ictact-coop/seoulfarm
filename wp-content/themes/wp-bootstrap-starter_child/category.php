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
				$category_count_string = '<small>전체 ('.$category_count.')건</small>';
				// 임시로
				$req = explode('/', urldecode($wp->request));
				if(count($req) == 2 && $req[1] == '소식') {
					$category_name = '전체 소식';
					$category_count_string = '';
					if(function_exists('wp_count_term')) var_dump(wp_count_term(urlencode('소식')));
				}

				//$posts = get_posts(array('category' => $category_id, 'posts_per_page' => $post_per_page)); // 현재 카테고리에 해당하는 포스트
				// 윗줄이 없어야 정상 작동한다
				?>

				<div class="category_upper">
					<div class="category_title"><?=$category_name?> <?=$category_count_string?> </div>
					<!-- <div class="writebutton">글쓰기</div> -->
				</div>

				<?php
				foreach($posts as $post) {
					$post_banner_img = get_featured_image($post->ID); ?>
					<div class="category_boerd">
						<div class="category_boerd_img" data-url="<?php the_permalink(); ?>" style="background-image: url(<?=$post_banner_img?>);">

						</div>
						<div class="category_boerd_contents">
							<div class="category_boerd_title">
								<a href="<?php the_permalink();?>"><?=$post->post_title?></a>
							</div>
							<div class="category_boerd_text">
								<p><a href="<?php the_permalink();?>"><?php print_content($post->post_content); ?></a></p>
							</div>
							<div class="category_boerd_author">
								<p><?=date('Y년 n월 j일', strtotime($post->post_date))?> | <?=get_writer_name()?></p>
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

					<?php get_template_part('sidebar_banner'); ?>

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
