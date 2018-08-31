<?php
/**
 * The template for displaying 인기소식
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
 ?>
<div class="PopularNews_title">
  인기 소식
</div>
<?php
$posts_popular = get_posts(array('meta_key' => 'post_views_count', 'orderby' => 'meta_value', 'posts_per_page' => 5));
?>
<div class="PopularNews_boder">
  <?php foreach($posts_popular as $post) { ?>
    <p><a href="<?php the_permalink();?>"><?php the_title(); ?></a></p>
  <?php } ?>
    <!-- <p>형식 표본을 만들기 위해 뒤섞어 놓았던</p>
    <p>알 수없는 프린터가 유형의 조리실을</p>
    <p>이래로 업계 표준 더미 텍스트였습니다</p>
    <p>표본을 만들기 위해 뒤섞어 놓았던 1500 년대</p>
    <p><알 수없는 프린터가 유형의 조리실을 가져다가</p> -->
</div>
