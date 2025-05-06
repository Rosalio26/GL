

<h2 class="tlt-post">Amigos</h2>

<ul class="cnt-itm-list">

    <?php if (!empty($friends_accepted)): ?>
        <?php foreach ($friends_accepted as $friend): ?>
            <div class="my-friend-cmp">
                <div class="friend-info">
                    <div class="cnt-user-mini-info">
						<?php if (!empty($friend['profile_image'])): ?>
							<img class="cnt-image-profile" src="./conf_home/profile_conf/uploads/<?php echo $friend['profile_image'];?>" alt="...">
						<?php else: ?>
							<img class="cnt-image-profile" src="static/style/icon/user.png" alt="...">
						<?php endif; ?>
						<span><?php echo htmlspecialchars($friend['username_hw']); ?></span>
					</div>
                </div>
				<form class="details-form" action="pass_conf.php?confPages=newOfficcePage&newConfStates=detailsFriend" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($friend['user_hw_id']); ?>">
                    <button class="details-button" type="submit">Ver</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum amigo aceito encontrado.</p>
    <?php endif; ?>
</ul>