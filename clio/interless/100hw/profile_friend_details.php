
<?php 
// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: form_reg_log/login.php");
    exit();
}

// Verifica se o parâmetro user_id está presente no POST
if (!isset($_POST['user_id'])) {
    echo "ID do amigo não fornecido.";
    exit();
}

$user_id = $_SESSION['user_id'];
$friend_id = (int)$_POST['user_id'];

$sql_friend_accepted_details = "
SELECT u.user_hw_id, u.username_hw, u.personalname_hw, u.email_hw, u.profile_image
FROM register_gch u
INNER JOIN friend_requests f
ON (u.user_hw_id = f.sender_id OR u.user_hw_id = f.receiver_id)
WHERE f.status = 'accepted' AND (f.sender_id = ? OR f.receiver_id = ?)
AND u.user_hw_id = ?
ORDER BY u.username_hw ASC";

$stmt_friend_accepted_details = $conn->prepare($sql_friend_accepted_details);
$stmt_friend_accepted_details->bind_param("iii", $user_id, $user_id, $friend_id);
$stmt_friend_accepted_details->execute();
$result_friend_accepted_details = $stmt_friend_accepted_details->get_result();

$friend = $result_friend_accepted_details->fetch_assoc();

?>

<?php 
    include("conf_home/new_semi_conf/header_new_confing.php");
?>

<h1>Detalhes do Amigo</h1>

<div class="cnt-details-friends">
    <?php if ($friend): ?>
        <div class="friend">
            <?php if (!empty($friend['profile_image'])): ?>
                <img src="./conf_home/profile_conf/uploads/<?php echo $friend['profile_image'];?>" alt="Foto do Perfil">
            <?php else: ?>
                <img src="static/style/icon/user.png" alt="Foto do Perfil">
            <?php endif; ?>
            <div>
                <div class="friend-name"><?php echo htmlspecialchars($friend['personalname_hw']); ?></div>
                <div class="friend-email"><?php echo htmlspecialchars($friend['email_hw']); ?></div>
            </div>
        </div>
    <?php else: ?>
        <p>Amigo não encontrado.</p>
    <?php endif; ?>
</div>