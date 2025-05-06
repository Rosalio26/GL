<?php 
	include('../instance/dbconn.php');

	if (isset($_GET['find'])) {
		$find_cher = $_GET['find'];

		//Consulta para buscar usuario
		$sql = "SELECT * FROM register_gch WHERE username_hw LIKE ?";
		$stmt = $conn->prepare($sql);
		$param = "%" . $find_cher . "%";
		$stmt->bind_param("s", $param);
		$stmt->execute();
		$result = $stmt->get_result();

		echo "<div class='desf_find'>";
		if ($result->num_rows > 0) {
			//Show Resullt
			while ($row = $result->fetch_assoc()) {
				echo  "<div class='has_no_test'>" . "<a href='#' id='find_user_name' class='find_user_result'>" . $row ['username_hw'] . "</a>" . "<a href='index.php' id='find_user_req' class='find_user_result'>req +</a>" . "</div>";
			}
		} else {
			echo "<p>Not Found User</p>";
		}
		echo "</div>";
		$stmt->close();
	}