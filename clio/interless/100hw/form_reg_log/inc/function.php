<?php 
	session_start();
	include('../../../instance/dbinterless.php');

	switch (@$_REQUEST['form_page']) {
		case 'login':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = $_POST['username_hw'];
				$password = $_POST['password_hw'];
			
				// Verificar se o usuário existe
				$sql = "SELECT * FROM register_gch WHERE username_hw='$username'";
				$result = $conn->query($sql);
			
				if ($result->num_rows > 0) {
					$user = $result->fetch_assoc();
			
					// Verificar se a conta está bloqueada
					if ($user['account_locked']) {
						$_SESSION['error'] = "Conta bloqueada. </br> <a href='unlock_account.php'>Desbloquear conta</a>";
						header("Location: ../login.php");
						exit();
					}
			
					if (password_verify($password, $user['password_hw'])) {
						// Resetar o contador de tentativas de login em caso de sucesso
						$sql = "UPDATE register_gch SET login_attempts = 0 WHERE username_hw='$username'";
						$conn->query($sql);
			
						$_SESSION['username_hw'] = $user['username_hw'];
						$_SESSION['numberaccess_hw'] = $user['numberaccess_hw'];
						$_SESSION['email_hw'] = $user['email_hw'];
						$_SESSION['user_id'] = $user['user_hw_id'];
						header("Location: ../../index.php");
					} else {
						// Incrementar o contador de tentativas de login
						$loginAttempts = $user['login_attempts'] + 1;
						$sql = "UPDATE register_gch SET login_attempts = $loginAttempts WHERE username_hw='$username'";
						$conn->query($sql);
			
						// Bloquear a conta após 3 tentativas falhadas
						if ($loginAttempts >= 3) {
							$sql = "UPDATE register_gch SET account_locked = TRUE WHERE username_hw='$username'";
							$conn->query($sql);
							$_SESSION['error'] = "Sua conta foi bloqueada após 3 tentativas falhadas.";
						} else {
							$_SESSION['error'] = "Senha inválida! " . (3 - $loginAttempts) . " tentativas restantes.";
							header("Location: ../login.php");
							exit();
						}
					}
				} else {
					$_SESSION['error'] = "Usuário não encontrado.";
					header("Location: ../login.php");
					exit();
				}
			}
			
		break;

		case 'register':

			// Função para hash de dados sensíveis
			function hash_dados($dado) {
				return password_hash($dado, PASSWORD_DEFAULT);
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$personalName = trim($_POST['personalname_hw']);
				$username = trim($_POST['username_hw']);
				$email = trim($_POST['email_hw']);
				$password = trim($_POST['password_hw']);
				$phone = trim($_POST['numberaccess_hw']);
				$pin = trim($_POST['pinaccess_hw']);

				// Validação básica de entradas
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$_SESSION['error'] = "Email inválido.";
					header("Location: ../register.php");
					exit;
				}
			
				if (!preg_match('/^[0-9]{9}$/', $phone)) {
					$_SESSION['error'] = "Número de telefone inválido.";
					header("Location: ../register.php");
					exit;
				}

				// Verificando se o usuário existe e qual dado está duplicado
				$sql_check_user_exist = "SELECT email_hw, username_hw, numberaccess_hw FROM register_gch WHERE email_hw = ? OR username_hw = ? OR numberaccess_hw = ?";
				$stmt_check_user_exist = $conn->prepare($sql_check_user_exist);
				$stmt_check_user_exist->bind_param("sss", $email, $username, $phone);
				$stmt_check_user_exist->execute();
				$stmt_check_user_exist->bind_result($existingEmail, $existingUsername, $existingPhone);
				$stmt_check_user_exist->store_result();
				
				$duplicatedData = [];

				if ($stmt_check_user_exist->fetch()) {
					if ($existingEmail == $email) {
						$duplicatedData[] = 'email_hw';
						$_SESSION['error'] = "O email já está registrado.";
					} elseif ($existingUsername == $username) {
						$duplicatedData[] = 'username_hw';
						$_SESSION['error'] = "O nome de usuário já está registrado.";
					} elseif ($existingPhone == $phone) {
						$duplicatedData[] = 'numberaccess_hw';
						$_SESSION['error'] = "O número de telefone já está registrado.";
					}

					
					$_SESSION['duplicated_data'] = $duplicatedData;
					header("Location: ../register.php");
					exit;
				}  else {
					// Hashing dos dados sensíveis$_SESSION['username_hw'] = $user['username_hw'];
					// 
					
					$hashedPassword = hash_dados($password);
					$hashedEmail = hash_dados($email);
					$hashedPhone = hash_dados($phone);
					$hashedPin = hash_dados($pin);

					// Inserção dos dados no banco de dados
					$sql_insert_user = "INSERT INTO register_gch (personalname_hw, username_hw, email_hw, password_hw, numberaccess_hw, pinaccess_hw) VALUES (?, ?, ?, ?, ?, ?)";
					$stmt_insert_user = $conn->prepare($sql_insert_user);
					$stmt_insert_user->bind_param("ssssss", $personalName, $username, $email, $hashedPassword, $phone, $hashedPin);

					if ($stmt_insert_user->execute()) {
						// Definindo as variáveis de sessão após o registro bem-sucedido
						$_SESSION['username_hw'] = $username;
						$_SESSION['email_hw'] = $email;
						$_SESSION['numberaccess_hw'] = $phone;
						$_SESSION['user_id'] = $stmt_insert_user->insert_id;

						header("Location: ../../index.php?indexConfiguration=uploadPictureProfile");
						exit;
					} else {
						echo "Erro no registro: " . $stmt_insert_user->error;
					}

				}
				
				$stmt_insert_user->close();
				$stmt_check_user_exist->close();
			}
		break;
		
		case 'unlockAccount':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$numberAccess = $_POST['numberaccess_hw'];
				$pin = $_POST['pinaccess_hw'];
	
				// Verificar se o usuário existe e o pin está correto
				$sql = "SELECT * FROM register_gch WHERE numberaccess_hw='$numberAccess'";
				$result = $conn->query($sql);
	
				if ($result->num_rows > 0) {
					$user = $result->fetch_assoc();
	
					if (password_verify($pin, $user['pinaccess_hw'])) {
						// Desbloquear a conta
						$sql = "UPDATE register_gch SET account_locked = FALSE, login_attempts = 0 WHERE numberaccess_hw='$numberAccess'";
						$conn->query($sql);
	
						$_SESSION['success'] = "Conta desbloqueada com sucesso!";
						header("Location: ../login.php");
					} else {
						$_SESSION['error'] = "PIN inválido.";
						header("Location: ../unlock_account.php");
					}
				} else {
					$_SESSION['error'] = "Número de acesso não encontrado.";
					header("Location: ../unlock_account.php");
				}
				exit();
			}
		break;
		
		case 'resetPassword':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username_hw'];
                $phone = $_POST['numberaccess_hw'];
                $pin = $_POST['pinaccess_hw'];
                $newPassword = $_POST['new_password_hw'];

                // Verificar se o usuário existe e os dados estão corretos
                $sql = "SELECT * FROM register_gch WHERE username_hw='$username' AND numberaccess_hw='$phone'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();

                    if (password_verify($pin, $user['pinaccess_hw'])) {
                        // Hash da nova senha
                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                        // Atualizar a senha no banco de dados
                        $sql = "UPDATE register_gch SET password_hw='$hashedNewPassword' WHERE username_hw='$username'";
                        $conn->query($sql);

                        $_SESSION['success'] = "Senha alterada com sucesso!";
                        header("Location: ../login.php");
                    } else {
                        $_SESSION['error'] = "PIN inválido.";
                        header("Location: ../reset_password.php");
                    }
                } else {
                    $_SESSION['error'] = "Dados não encontrados.";
                    header("Location: ../reset_password.php");
                }
                exit();
            }
        break;

		case 'uploadImagePicture':
			// Supondo que o user_id esteja armazenado na sessão
			$user_id = $_SESSION['user_id'] ?? null;

			if (!$user_id) {
				die("ID do usuário não está definido.");
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profile_image'])) {
				$target_dir = __DIR__ . "/../../conf_home/profile_conf/uploads/";

				// Verificar se o diretório existe, caso contrário, criar o diretório
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0777, true);
				}

				$target_file = $target_dir . basename($_FILES['profile_image']['name']);
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

				// Verificar se o arquivo é uma imagem
				$check_if_image = getimagesize($_FILES["profile_image"]["tmp_name"]);
				if ($check_if_image === false) {
					die("Desculpe, o arquivo não é uma imagem.");
				}

				// Permitir certos formatos de arquivo
				if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
					die("Desculpe, mas somente são suportados arquivos: PNG, JPEG, JPG, GIF.");
				}

				// Fazer upload
				if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
					$sql = "UPDATE register_gch SET profile_image='" . basename($_FILES["profile_image"]["name"]) . "' WHERE user_hw_id='$user_id'";
					if ($conn->query($sql) === TRUE) {
						echo "Upload bem-sucedido.";
						// Redirecionar para index.php
						header("Location: ../../index.php?indexConfiguration=uploadPictureProfile");
						exit;
					} else {
						echo "Erro: " . $conn->error;
					}
				} else {
					die("Erro ao fazer upload da imagem.");
				}
			}
		break;

		case 'updateDataUser':

			$user_id = $_SESSION['user_id'] ?? null;

			if (!$user_id) {
				die("ID do usuário não está definido.");
			}


			if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username_hw'];
                $email = $_POST['email_hw'];
                $numberAccess = $_POST['numberaccess_hw'];
                $userId = $_SESSION['user_id'];  // Assumindo que o ID do usuário está armazenado na sessão

                // Atualizar os dados no banco de dados
                $sql = "UPDATE register_gch SET username_hw=?, email_hw=?, numberaccess_hw=? WHERE user_hw_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $username, $email, $numberAccess, $userId);

                if ($stmt->execute()) {
                    $_SESSION['success'] = "Dados atualizados com sucesso!";
                } else {
                    $_SESSION['error'] = "Erro ao atualizar os dados: " . $stmt->error;
                }

                $stmt->close();
                header("Location: ../../index.php?indexConfiguration=uploadPictureProfile");
                exit();
            }			
		break;
	}
?>