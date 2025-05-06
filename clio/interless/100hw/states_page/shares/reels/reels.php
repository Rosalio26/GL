<!-- <div class="ger-col-body">
    <div class="info-my-reels">
        <h1>My reels</h1>
    </div>
    <div class="info-friend-reel"></div>
</div> -->
<?php include("states_page/shares/inc_shares/btns_hd.php"); ?>

<?php

// Pegando o ID real do usuário logado
$myUserId = $_SESSION['user_id'];

// Buscar "My Reels" (postados pelo usuário logado)
$myReels = $conn_mof->query("
    SELECT * FROM reels 
    WHERE user_id = $myUserId 
    AND created_at >= NOW() - INTERVAL 1 DAY
    ORDER BY created_at DESC
");

// Buscar "Friend Reels" (postados por outros usuários)
$friendReels = $conn_mof->query("
    SELECT * FROM reels 
    WHERE user_id != $myUserId 
    AND created_at >= NOW() - INTERVAL 1 DAY
    ORDER BY created_at DESC
");
?>

<style>
    video, img, audio { width: 300px; margin: 10px; display: block; }
    .reel { border: 1px solid #ccc; margin-bottom: 20px; padding: 10px; }
</style>

<h1>My Reels</h1>

<?php if ($myReels->num_rows > 0): ?>
    <?php while($row = $myReels->fetch_assoc()): ?>
        <div class="reel">
            <?php if ($row['media_type'] == 'photo'): ?>
                <img src="<?= htmlspecialchars($row['file_path']) ?>" alt="Foto">
            <?php elseif ($row['media_type'] == 'video'): ?>
                <video controls src="<?= htmlspecialchars($row['file_path']) ?>"></video>
            <?php elseif ($row['media_type'] == 'audio'): ?>
                <audio controls src="<?= htmlspecialchars($row['file_path']) ?>"></audio>
            <?php endif; ?>
            <p>Postado em: <?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></p>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Você ainda não postou nenhum Reel.</p>
<?php endif; ?>

<hr>

<h1>Friend Reels</h1>

<?php if ($friendReels->num_rows > 0): ?>
    <?php while($row = $friendReels->fetch_assoc()): ?>
        <div class="reel">
            <?php if ($row['media_type'] == 'photo'): ?>
                <img src="<?= htmlspecialchars($row['file_path']) ?>" alt="Foto">
            <?php elseif ($row['media_type'] == 'video'): ?>
                <video controls src="<?= htmlspecialchars($row['file_path']) ?>"></video>
            <?php elseif ($row['media_type'] == 'audio'): ?>
                <audio controls src="<?= htmlspecialchars($row['file_path']) ?>"></audio>
            <?php endif; ?>
            <p>Postado em: <?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></p>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Seus amigos ainda não postaram nenhum Reel.</p>
<?php endif; ?>


<div class="arm-btn-new-reels">
    <a href="index.php?indexConfiguration=statetment_share&indexSharesContent=moreReels">+</a>
</div>