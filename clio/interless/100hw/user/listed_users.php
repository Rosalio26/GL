<?php
	session_start();
	if (!isset($_SESSION['username_hw'])) {
		header("Location: ../includes/login.php");
		exit();
	}

	include('../../instance/dbinterless.php');

	$user_id = $_SESSION['user_id'];

	//Obter todos os usuarios registrados
	$sql = "SELECT * FROM register_gch WHERE user_hw_id != '$user_id'";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <link rel="stylesheet" href="../static/style/profile.css">
    <link rel="stylesheet" href="../static/style/index.css">
</head>
<body id="body_profile" class="body-gr body_profile"> 
    <h2>Usuarios Registrados</h2>
    <ul>
    	<?php
    		if ($result->num_rows > 0) {
    			while ($row = $result->fetch_assoc()) {
    				echo "<li>" . $row['username_hw'] . "<a href='inc/send_friend_request.php?receiver_id=" . $row['user_hw_id'] . "'> Pedir Amizade</a></li>";
    			}
    		} else {
    			echo "No user Found.";
    		}

    	?>
    </ul>	
</body>
</html>

<?php $conn->close();?>