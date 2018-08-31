<?php
$themepath = get_stylesheet_directory_uri();
$img1_url = $themepath.'/img/seoulcityagriculture.jpg';
$img2_url = $themepath.'/img/we_all_city_farmer.jpg';
?>
<div class="imgbanner1">
  <div class="imgbanner1_img" style="background-image: url(<?=$img1_url?>);">

  </div>
  <div class="imgbanner1_text">
    <a href="http://economy.seoul.go.kr/archives/category/cityfarm/news_cityfarm_nationaleconomy-n1" target="_blank">서울시<br>도시농업과</a>
  </div>
</div>
<div class="imgbanner2">
  <div class="imgbanner2_img">
    <a href="https://www.modunong.or.kr:449/main.do" target="_blank"><img src="<?=$img2_url?>" alt="banner2" border="0"></a>
  </div>
</div>
