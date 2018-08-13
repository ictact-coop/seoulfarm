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
					<div class="post_comment">
						<div class="post_comment_count">
							독자 의견 | 댓글 10개
						</div>
						<div class="comment_form_tool">
							<div class="comment_form_user">
								<p>작성자</p>
								<div class="comment_form_name">
									<!-- 댓글네임폼 -->
								</div>
								<p>비밀번호</p>
								<div class="comment_form_password">
									<!-- 댓글 패스워드폼 -->
								</div>
							</div>
							<div class="comment_button">
								등록
							</div>
						</div>
						<div class="comment_form">

						</div>
						<div class="user_comment_place">
							<div class="user_comment_title">
								정인국
							</div>
							<div class="user_comment_content">
								<p>안녕하세요 태스트 댓글입니다.</p>
							</div>
						</div>
						<div class="user_comment_place">
							<div class="user_comment_title">
								정인국
							</div>
							<div class="user_comment_content">
								<p>
									로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.로렘 입숨(lorem ipsum; 줄여서 립숨, lipsum)은 출판이나 그래픽 디자인 분야에서 폰트, 타이포그래피, 레이아웃 같은 그래픽 요소나 시각적 연출을 보여줄 때 사용하는 표준 채우기 텍스트로, 최종 결과물에 들어가는 실제적인 문장 내용이 채워지기 전에 시각 디자인 프로젝트 모형의 채움 글로도 이용된다. 이런 용도로 사용할 때 로렘 입숨을 그리킹(greeking)이라고도 부르며, 때로 로렘 입숨은 공간만 차지하는 무언가를 지칭하는 용어로도 사용된다.
								</p>
							</div>
						</div>
					</div>
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
