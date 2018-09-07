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
  <?php foreach($posts_popular as $post) {
    $short_title = get_post_meta($post->ID, 'short_title', true);
    if(strlen($short_title) > 0) $title = $short_title;
    else $title = $post->post_title;?>
    <p><a href="<?php the_permalink();?>"><?php print_string($title, 32) ?></a></p>
  <?php } ?>
</div>
