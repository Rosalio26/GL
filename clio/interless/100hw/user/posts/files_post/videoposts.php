
<div>
	<h1>Posts de Vídeo</h1>
		<?php if (!empty($posts_video)): ?>
			<?php foreach ($posts_video as $post): ?>
				<div class="post">
					<div class="post-title"><?php echo htmlspecialchars($post['title_post_video']); ?></div>
					<div class="post-date"><?php echo htmlspecialchars($post['created_at']); ?></div>
					<?php if (!empty($post['video_url'])): ?>
						<div class="post-media">
							<video controls>
								<source src="<?php echo htmlspecialchars($post['video_url']); ?>" type="video/mp4">
								Seu navegador não suporta a tag de vídeo.
							</video>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class='cnt-info-hidden'>
				<p class='no-post nothing-et'>Ainda não tens nenhum post disponivel.</p>
				<a href='./pass_conf.php?confPages=new_post' class='no-post create-et'>Criar novo post.</a>
			</div>
		<?php endif; ?>
</div>