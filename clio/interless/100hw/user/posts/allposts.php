
<div style="z-index: 1000;">
    <p class='tlt-nm-post'>Todos os posts</p>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class='cnt-post-grl'>
                    <h4 class="title-post-conf">
                        <span class="post-date"><?php echo htmlspecialchars($post['created_at']); ?></span>
                    </h4>
                    <p class="arm-cnt-post">
                        <?php echo nl2br(htmlspecialchars($post['text_content'])); ?>
                    </p>
                </div>
                <?php if (!empty($post['post_type'])): ?>
                    <div class="post-media">
                        <?php if ($post['post_type'] == 'video'): ?>
                            <video controls>
                                <source src="<?php echo htmlspecialchars($post['video_url']); ?>" type="video/mp4">
                                Seu navegador não suporta a tag de vídeo.
                            </video>
                        <?php elseif ($post['post_type'] == 'music'): ?>
                            <audio controls>
                                <source src="<?php echo htmlspecialchars($post['music_url']); ?>" type="audio/mpeg">
                                Seu navegador não suporta a tag de áudio.
                            </audio>
                        <?php elseif ($post['post_type'] == 'image'): ?>
                            <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Foto">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class='cnt-info-hidden'>
            <p class='no-post nothing-et'>Ainda não tens nenhum post disponivel.</p>
            <a href='../pass_conf.php?confPages=new_post' class='no-post create-et'>Criar novo post.</a>
        </div>
    <?php endif; ?>
</div>
