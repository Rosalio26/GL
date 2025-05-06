
<div>
	<?php if (!empty($posts_music)): ?>
		<?php foreach ($posts_music as $post): ?>
			<div class="post">
				<div class="post-title"><?php echo htmlspecialchars($post['title_post_music']); ?></div>
				<div class="post-date"><?php echo htmlspecialchars($post['created_at']); ?></div>
				<?php if (!empty($post['music_url'])): ?>
					<div class="post-media">
						<audio controls>
							<source src="<?php echo htmlspecialchars($post['music_url']); ?>" type="audio/mpeg">
							Seu navegador não suporta a tag de Musicas.
						</audio>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p>Nenhum post de musica encontrado.</p>
	<?php endif; ?>
</div>