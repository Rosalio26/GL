
<form class="cnt-comment-cmp" action="?pagesCenter=send_comment" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $post['id_post']; ?>">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
    <textarea class="textarea-comment" name="comment_post"></textarea>
    <button class="sub-comm-btn" type="submit"><img src="static/style/icon/enviar.png" alt="..."></button>
</form>