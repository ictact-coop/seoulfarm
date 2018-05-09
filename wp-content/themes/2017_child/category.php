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
			<?php $category = get_the_category(); // 현재 카테고리를 가져옴
			// var_dump($category);
			$category_id = $category[0]->cat_ID; // 카테고리 ID (숫자)
			$category_name = $category[0]->name; // 카테고리 이름
			$category_count = $category[0]->category_count;
			$posts = get_posts(array('category' => $category_id)); // 현재 카테고리에 해당하는 포스트
			?>
			<h2><?=$category_name?> <small>전체(<?=$category_count?>)건</small></h2>

			<ul class="list-group">
			<?php
			foreach($posts as $post) { ?>
					<li class="list-group-item">
						<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
					</li>
			<?php } // End of the loop.
			?>
			</ul>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
