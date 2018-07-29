<?php
/*
Template Name: 대문 페이지
*/

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="front-headline">
				<h3>headline : 사진 + 제목 + 개요</h3>
				<ul>
				<?php $posts_headline = get_posts( array('posts_per_page' => 3) );
				foreach($posts_headline as $post) :
					// var_dump($post);?>
					<li>
						<h4><a href="<?php the_permalink();?>">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'blogimg')); } ?>
							<?php the_title(); ?><br>
						</a></h4>
						<?php echo strip_tags(preg_replace("/\[.*\]/", '', $post->post_content)); //echo get_the_content(); ?>
					</li>
				<?php
				endforeach;
				?>
				</ul>
			</div>

			<div id="front-news-text">
				<h3>제목만 표시</h3>
				<ul>
					<?php $posts_news = get_posts( array('posts_per_page' => 10) );
					foreach($posts_news as $post) :?>
						<li>
							<a href="<?php the_permalink();?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>

			<div id="front-gallery">
				<h3>사진과 제목 표시 : 6개</h3>
				<ul>
					<?php $posts_gallery = get_posts( array('posts_per_page' => 6) );
					foreach($posts_gallery as $post) :?>
						<li>
							<a href="<?php the_permalink();?>">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'blogimg')); } ?>
								<?php the_title(); ?><br>
							</a>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>

			<div id="sidebar-issue">
				<h3>농업정보 사진+제목+개요 1개</h3>
				<ul>
					<?php $posts_issue = get_posts( array('posts_per_page' => 1, 'category_name' => '농사정보') );
					foreach($posts_issue as $post) :?>
						<li>
							<h4><a href="<?php the_permalink();?>">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'blogimg')); } ?>
								<?php the_title(); ?><br>
							</a></h4>
							<?php echo strip_tags(preg_replace("/\[.*\]/", '', $post->post_content)); ?>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>

			<div id="sidebar-hot">
				<h3>인기소식 제목 5개 이상</h3>
				<ul>
					<?php
					$hot_query = array(
						'posts_per_page' => 7,
						'meta_query' => array(
							array(
								'key'     => 'post_views_count',
								'value'   => 2,
								'compare' => '>=',
							)
						),
					);
					$posts_hot = get_posts($hot_query);

					foreach($posts_hot as $post) : ?>
						<li>
							<a href="<?php the_permalink();?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
