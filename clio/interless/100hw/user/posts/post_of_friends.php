
<style>

.cnt-info-bs-comment
{
    border: 1px solid #4443;
    border-radius: 5px;
    padding: 5px 10px;
    width: 100%;

    overflow: hidden;
}

.cnt-user-comment-info, .comment_replay, .cnt-to-more, p.cnt-image-picture
{
    display: flex;
    align-items: center;
}

#sub-image-picture
{
    width: 20px;
    height: 20px;
}

.cnt-user-comment-info
{
    gap: 10px;
}

.cnt-user-comment-info, .cnt-username
{
    font-family: poppis-light;
    font-size: 11pt;
    text-transform: uppercase;
}

#sub-cnt-username
{
    text-transform: lowercase;
}

.cnt-user-comment-info > p.cnt-image-picture
{
    border: 1px solid #333;
    border-radius: 100%;
    width: 30px;
    height: 30px;
    overflow: hidden;

    justify-content: center;
}

.cnt-user-comment-info > p.cnt-image-picture img
{
    width: 100%;
    height: 100%;
}

.comment_replay
{
    gap: 5px;
    margin-top: 5px;
}

.comment
{
    border: 1px solid #3332;
}

.cnt-to-more
{
    background-color: #3338;
    border-radius: 5px;
    overflow: hidden;
    width: 60%;
}

.cnt-to-more > p
{
    background-color: #8882;
    font-family: poppis-light;
    font-size: 12pt;

    padding: 2px 5px;
    width: 85%;
}

.cnt-to-more > p::first-letter
{
    text-transform: uppercase;
}

.cnt-to-more > p.more-btn-toogle
{
    background-color: transparent;
    justify-content: left;
    height: 100%;
    width: 15%;
    display: flex;
    padding: 4px 0px;
}

.bool-sml-inc
{
    display: block;
    background-color: #888;
    border-radius: 100%;
    width: 6px;
    height: 6px;
    margin-left: 3px;
}

.comment-section {
    width: 50%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.reply {
    margin-left: 20px;
}

/* Estilos para o modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}


</style>

<div>
    <?php if (!empty($posts_friend)): ?>
        <?php foreach ($posts_friend as $post): ?>
            <div class="post-cnt-inf">
                <?php if ($post['post_type'] == 'text'): ?>
                    <div class="cnt-post-content cnt-post-grl">
                    
                        <form class="post-username details-form" action="profile_friend_details.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($post['user_hw_id']); ?>">
                            <input class="" type="submit" value="#<?php echo htmlspecialchars($post['username_hw']);?>">
                        </form>

                        <div class="title-post-conf">
                            <p class="post-title"><?php echo htmlspecialchars($post['text_title']); ?></p>
                            <nav class="nav-cnt-toogle-title-cnt">
                                <button class="toogle-title-cnt">
                                    <span class="btn-bool"></span>
                                    <span class="btn-bool"></span>
                                    <span class="btn-bool"></span>
                                </button>
                                <ul></ul>
                            </nav>
                        </div>
                        <div class="cnt-tst">
                            <div class="arm-cnt-post">
                                <p class="post-content"><?php echo nl2br(htmlspecialchars($post['text_content'])); ?></p>
                            </div>
                            <div class="cnt-btn-lks">
                                <ul class="itm-btn-lks">
                                    <li class="list-item"></li>
                                    <li class="list-item"></li>
                                    <li class="list-item"></li>
                                    <li class="list-item"></li>
                                </ul>
                                <?php include("user/comments/formulario_comment.php"); ?>
                            </div>
                        </div>
                        <div class="comments-show" id="comments">
                            <div class="comments">
                                <?php
                                    include("user/comments/fetch_comments.php");
                                ?>
                            </div>
                        </div>
                        <p>ver</p>
                    </div>

                    <?php elseif ($post['post_type'] == 'video'): ?>
                        <div class="cnt-post-video cnt-post-grl">
                            <p class="post-username"><?php echo htmlspecialchars($post['username_hw']);?></p>
                            <div class="title-post-conf">
                                <p class="post-title"><?php echo htmlspecialchars($post['video_title']); ?></p>
                                <nav class="nav-cnt-toogle-title-cnt">
                                    <button class="toogle-title-cnt">
                                        <span class="btn-bool"></span>
                                        <span class="btn-bool"></span>
                                        <span class="btn-bool"></span>
                                    </button>
                                    <ul></ul>
                                </nav>
                            </div>
                            <div class="cnt-tst">
                                <div class="arm-cnt-post">
                                    <video class="video-play-post1" controls>
                                        <source src="<?php echo htmlspecialchars($post['video_url']); ?>" type="video/mp4">
                                    Seu navegador não suporta a tag de vídeo.
                                    </video>
                                </div>
                                <div class="cnt-btn-lks">
                                    <ul class="itm-btn-lks">
                                        <li class="list-item"></li>
                                        <li class="list-item"></li>
                                        <li class="list-item"></li>
                                        <li class="list-item"></li>
                                    </ul>
                                    <?php include("user/comments/formulario_comment.php"); ?>
                                </div>
                            </div>
                            <div class="comments-show" id="comments">
                                <div class="comments">
                                    <?php
                                        include("user/comments/fetch_comments.php");
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php elseif ($post['post_type'] == 'music'): ?>
                            <div class="cnt-post-music cnt-post-grl">
                                <p class="post-username"><?php echo htmlspecialchars($post['username_hw']);?></p>
                                <div class="title-post-conf">
                                    <p class="post-title"><?php echo htmlspecialchars($post['music_title']); ?></p>
                                    <nav class="nav-cnt-toogle-title-cnt">
                                        <button class="toogle-title-cnt">
                                            <span class="btn-bool"></span>
                                            <span class="btn-bool"></span>
                                            <span class="btn-bool"></span>
                                        </button>
                                        <ul></ul>
                                    </nav>
                                </div>
                                <div class="cnt-tst">
                                    <div class="arm-cnt-post">
                                        <audio controls>
                                            <source src="<?php echo htmlspecialchars($post['music_url']); ?>" type="audio/mpeg">
                                            Seu navegador não suporta a tag de áudio.
                                        </audio>
                                    </div>
                                    <div class="cnt-btn-lks">
                                        <ul class="itm-btn-lks">
                                            <li class="list-item"></li>
                                            <li class="list-item"></li>
                                            <li class="list-item"></li>
                                            <li class="list-item"></li>
                                        </ul>
                                        <?php include("user/comments/formulario_comment.php"); ?>
                                    </div>
                                </div>
                                <div class="comments-show" id="comments">
                                    <div class="comments">
                                        <?php
                                            include("user/comments/fetch_comments.php");
                                        ?>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($post['post_type'] == 'image'): ?>
                            <div class="cnt-post-photo cnt-post-grl">
                                <p class="post-username"><?php echo htmlspecialchars($post['username_hw']);?></p>
                                <div class="title-post-conf">
                                    <p class="post-title"><?php echo htmlspecialchars($post['image_title']); ?></p>
                                    <nav class="nav-cnt-toogle-title-cnt">
                                        <button class="toogle-title-cnt">
                                            <span class="btn-bool"></span>
                                            <span class="btn-bool"></span>
                                            <span class="btn-bool"></span>
                                        </button>
                                        <ul></ul>
                                    </nav>
                                </div>
                                <div class="cnt-tst">
                                    <div class="arm-cnt-post">
                                        <img class="img-cnt-post" src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Foto">
                                    </div>
                                    <div class="cnt-btn-lks">
                                        <ul class="itm-btn-lks">
                                            <li class="list-item"></li>
                                            <li class="list-item"></li>
                                            <li class="list-item"></li>
                                            <li class="list-item"></li>
                                        </ul>
                                        <?php include("user/comments/formulario_comment.php"); ?>
                                    </div>
                                </div>
                                <div class="comments-show" id="comments">
                                    <div class="comments">
                                        <?php
                                            include("user/comments/fetch_comments.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <?php else: ?>
            <?php include("user/posts/no_post_set.html"); ?>
        <?php endif; ?>
</div>