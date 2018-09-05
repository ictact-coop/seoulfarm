<?php
$posts_img1 = get_posts(array('meta_key' => 'frontpage_news_major', 'meta_value' => 1, 'posts_per_page' => 6));

$banner_rail = '';
$text_rail = '';
$banner_order = 0;

foreach($posts_img1 as $post) {
  $banner_order++;
  $post_banner_img = get_featured_image($post->ID);
  // var_dump($post);
  $permalink = $post->guid;
  // echo $permalink;
  $banner_rail .= '<div class="Train Train_'.$banner_order.'"><img src="'.$post_banner_img.'"></div>';
  $text_rail .= '<div class="coach"><p><a href="'.$permalink.'">'.$post->post_title.'</a></p></div>';
}
  ?>

<div class="sidebar_banner">
  <div class="Banner_station Bannerstyle_basic">

    <div class="Banner_rail">
      <!--<div class="Train_1 Train">

      </div>
      <div class="Train_2 Train">

      </div>
      <div class="Train_3 Train">

      </div>
      <div class="Train_4 Train">

      </div>
      <div class="Train_5 Train">

      </div>-->
      <?=$banner_rail?>

    </div><!-- end of banner_rail -->

    <div class="text_rail">
      <!--<div class="coach">
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
      </div>-->
      <?=$text_rail?>

    </div><!-- end of text_rail-->

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
    </div><!-- end of banner_Layer_1 -->

  </div><!-- end of Banner_station Bannerstyle_basic -->
</div><!-- end of sidebar_banner -->
