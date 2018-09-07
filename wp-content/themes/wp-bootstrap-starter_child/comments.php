<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="post_comment">
  <div class="post_comment_count">
    독자 의견 | 댓글 <?php comments_number('없음', '1개', '%개'); ?>
  </div>
  <div class="comment_form_tool">

  </div>

  <?php // 덧글 입력 폼  ?>
  <div class="comment_form2">

    <?php
			comment_form( $args = array(
	        'id_form'           => 'commentform',  // that's the wordpress default value! delete it or edit it ;)
	        'id_submit'         => 'commentsubmit',
	        'title_reply'       => __( '댓글 남기기', 'wp-bootstrap-starter' ),  // that's the wordpress default value! delete it or edit it ;)
	        'title_reply_to'    => __( 'Leave a Reply to %s', 'wp-bootstrap-starter' ),  // that's the wordpress default value! delete it or edit it ;)
	        'cancel_reply_link' => __( 'Cancel Reply', 'wp-bootstrap-starter' ),  // that's the wordpress default value! delete it or edit it ;)
	        'label_submit'      => __( '댓글 저장', 'wp-bootstrap-starter' ),  // that's the wordpress default value! delete it or edit it ;)
					// 'fields' => $comment_fields,
					'comment_notes_before' => '',

	        'comment_field' =>  '<div class="comment_form_tool"><div class="comment_form_user"><p>' . __( '작성자', 'domainreference' ) .
			    ( $req ? '<span class="required">*</span>' : '' ) . '</p>' .
			    '<div class="comment_form_name"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			    '" size="30"' . $aria_req . ' /></div></div></div><p><textarea placeholder="Start typing..." id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

	        // 'comment_notes_after' => '<p class="form-allowed-tags">' .
	        //     __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'wp-bootstrap-starter' ) .
	        //     '</p><div class="alert alert-info">' . allowed_tags() . '</div>'

	        // So, that was the needed stuff to have bootstrap basic styles for the form elements and buttons

	        // Basically you can edit everything here!
	        // Checkout the docs for more: http://codex.wordpress.org/Function_Reference/comment_form
	        // Another note: some classes are added in the bootstrap-wp.js - ckeck from line 1
	    ));
		?>
		<!-- </div> -->
  </div>

	<?php $comments = get_comments( array('post_id' => get_the_ID()) );
	foreach($comments as $comment) {
		// var_dump($comment); ?>
		<div class="user_comment_place">
			<div class="user_comment_title">
				<?php comment_author(); ?>
			</div>
			<div class="user_comment_content">
				<?php comment_text(); ?>
			</div>
		</div>
	<?php }
	?>
</div>
