
<style>


.cnt-info-picture-update
{
	display: block;
	height: 80vh;
	overflow-y: auto;
}

.picture-upload
{
	padding: 13px;
	width: 90%;
	margin: 0px auto;
}

.cnt-btn-close
{
	position: relative;
	overflow: hidden;
	height: 30px;

	display: flex;
	align-items: center;
}

.cnt-btn-close a
{
	background-color: #ccc2;
	display: flex;
	align-items: center;
	justify-content: center;
	position: absolute;
	top: 0; right: 0; bottom: 0;
	padding: 5px 10px;
}

.cnt-upload-picture
{
	border: 1px solid rgba(3, 51, 102, 0.45);
	border-radius: 5px;
	width: 98%;
	margin: 20px auto;
	padding: 5px 10px;
}

.cnt-image-profile
{
	
	background-color: transparent;
	border-radius: 100%;
	padding: 0px;
	width: 60px;
	height: 60px;

	overflow: hidden;
	display: flex;
	align-items: center;
	justify-content: center;
}

.cnt-user-fs
{
	background-color: transparent;
	border-radius: 100%;
	width: 100%;
	height: 100%;
}

.icon-sml-img
{
	background-color: #7774;
	border-radius: 100%;
	padding: 0px;
	width: 100%;
	height: 100%;
}

.cnt-img-prf
{
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 0px 0px 10px 10px;
	border-bottom: 2px solid rgba(13, 38, 65, 0.49);

	width: 100%;
}
.cnt-img-prf span 
{
	font-family: poppis-light;
}
	
.form-pict-upload
{
	border-radius: 5px;
	margin: 10px 0px;
	padding: 5px;
	position: relative;
}

#image-preview img {
	width: 100%;
	height: 100%;
}
	
.custom-file-upload {
	background-color:rgba(0, 123, 255, 0.05);
	border: 1px solid rgba(0, 123, 255, 0.2);
	text-align: center;

	position: relative;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	cursor: pointer;

	color: #fff;
	border-radius: 4px;
	padding: 5px;
	transition: background-color 0.3s, transform 0.3s;
	height: 200px;
}

.custom-file-upload:hover {
	background-color:rgba(0, 87, 179, 0.52);
	transform: scale(1.01);
}

.custom-file-upload span {
	content: "";
	font-size: 12px;
	color: #666;
	display: block;
	margin-top: 5px;
}

.back-img-pict
{
	width: 150px;
	height: 100px;

	background-image: url('./static/style/icon/media_files/image.png');
	background-repeat: no-repeat;
	background-size: 70px 60px;
	background-position: center;
}

#profile_image {
	position: absolute;
	overflow: hidden;
	left: 0; right: 0;
	bottom: 0; top: 0;
	height: 100%;
	width: 100%;
	cursor: pointer;
	opacity: 0;

	background-size: 20px 60px;
	background-position: center;
	background-repeat: no-repeat;

}

.btn-send-upload
{
	background-color: transparent;
	margin-top: 20px;
	position: relative;
	width: 100%;
	height: 30px;
}

.btn-send-upload span
{
	font-family: poppis-light;
	border: 1px solid rgba(0, 87, 179, 0.52);
	border-radius: 5px;
	font-size: 13px;
	padding: 5px;

	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;

	display: flex;
	align-items: center;
	justify-content: center;
}


.info-edit
{
	width: 100%;
	overflow: hidden;
	border-radius: 5px 0px 5px 0px;
	position: relative;
	padding: 5px;
}

.tlt-personal-data
{
	font-family: poppis-light;
	font-size: 11pt;
	text-align: center;
	padding: 5px;
	margin-bottom: 5px;
	position: relative;
}

.tlt-personal-data::before{
	content: " ";
	position: absolute;
	background-color: rgba(0, 87, 179, 0.52);
	bottom: 0; left: 0; right: 0;
	margin: auto;
	width: 80%;
	height: 1px;
}

:root
{
	
	--background-stm-clouse: rgba(38, 86, 138, 0.33);
}


.clouse
{
	background-color: var(--background-stm-clouse);
	position: absolute;
	top: 0;
	left: 0;
	width: 1px;
	height: 90%;
}

.clouse-1
{
	background-color: var(--background-stm-clouse);
	position: absolute;
	top: 0;
	left: 0;
	width: 90%;
	height: 1px;
}

.clouse-2
{
	background-color: var(--background-stm-clouse);
	position: absolute;
	bottom: 0;
	right: 0;
	width: 1px;
	height: 90%;
}

.clouse-3
{
	background-color: var(--background-stm-clouse);
	position: absolute;
	bottom: 0;
	right: 0;
	width: 90%;
	height: 1px;
}

.itm-of-info
{
	display: flex;
	align-items: center;
	width: 80%;
	gap: 10px;

	font-family: poppis-light;
	font-size: 10pt;
	border: 1px solid rgba(0, 87, 179, 0.52);
	border-radius: 5px;
	overflow: hidden;

	margin: 10px auto;
	padding: 5px;
	width: 95%;
}

.itm-of-info img
{
	width: 25px;
}

.edit-btn
{
	background-color: transparent;
	margin-top: 10px;
	position: relative;

	height: 25px;
	width: 100%;
}

.edit-btn span {
	font-family: poppis-light;
	text-transform: uppercase;
	border: 1px solid rgba(0, 87, 179, 0.52);
	border-radius: 5px;
	font-size: 11px;
	position: absolute;

	right: 0;
	bottom: 0;
	top: 0;
	padding: 0px 7px;

	display: flex;
	align-items: center;
	justify-content: center;
}

.cnt-done-btn
{
	position: relative;
	width: 100%;
	height: 30px;
	margin-top: 10px;
}

.cnt-done-btn a
{
	border: 1px solid rgba(0, 123, 255, 0.2);
	position: absolute;
	top: 0; right: 0; bottom: 0;
	font-size: 11pt;
	font-family: poppis-light;
	text-transform: capitalize;

	display: flex;
	align-items: center;
	justify-content: center;
	padding: 5px;
}

#btn-enviar {
	display: none;
}

@media (min-width: 600px) {
	
	.esc-arm-upload
	{
		width: 100%;
		height: 100%;

		display: flex;
		align-items: center;
		justify-content: center;
	}

	.cnt-upload-picture
	{
		border: 1px solid rgba(3, 51, 102, 0.45);
		border-radius: 5px;
		width: 600px;
		padding: 5px 10px;
	}

	.cnt-info-picture-update
	{
		display: flex;
		align-items: center;
	}

	.txt-btn-close
	{
		font-size: 20pt;
	}

	.picture-upload
	{
		padding: 13px;
		width: 330px;
	}

	.info-edit
	{
		width: 60%;
	}

}
</style>

<div class="esc-arm-upload">
	<div class="cnt-upload-picture">
		<div class="cnt-btn-close">
			<a href="index.php"><span class="txt-btn-close">&times;</span></a>
		</div>
		<div class="cnt-info-picture-update">
			<div class="picture-upload">

				<div class="cnt-img-prf">
					<div class="cnt-image-profile">
						<?php if ($user_details['profile_image']): ?>
							<button class="cnt-user-fs">
								<img class="icon-sml-img" src="conf_home/profile_conf/uploads/<?php echo $user_details['profile_image'];?>" alt="user icon">
							</button>
						<?php else: ?>
							<button class="cnt-user-fs">
								<img class="icon-sml-img" src="./static/midia/img/user.png" alt="user icon">
							</button>
						<?php endif; ?>
					</div>
					<span>Imagem de Perfil</span>
				</div>

				<form class="form-pict-upload" method="post" action="form_reg_log/inc/function.php?form_page=uploadImagePicture" enctype="multipart/form-data">
					<label id="image-preview" class="custom-file-upload">
						<div class="back-img-pict"></div>
						<input type="file" name="profile_image" id="profile_image" required onchange="showPreview(event);">
						<span class="cnt-txt-ch-img">Escolha uma imagem de perfil (PNG, JPEG, JPG, GIF)</span>
					</label>
					<button class="btn-send-upload" type="submit"><span>Actualizar</span></button>
				</form>

			</div>
			<div class="info-edit">
				<div class="clouse"></div>
				<div class="clouse-1"></div>
				<div class="clouse-2"></div>
				<div class="clouse-3"></div>
				<h1 class="tlt-personal-data">Dados pessoas</h1>

				<form class="update-info-person" method="post" action="form_reg_log/inc/function.php?form_page=updateDataUser">
					<span class="itm-of-info">
						<img src="./static/style/icon/mail.png">
						<input 
							class="input-forms readonly" 
							type="email" 
							id="email" 
							name="email_hw" 
							value="<?php echo $user_details['email_hw'];?>"
							placeholder="Email"
							readonly 
							required>
					</span>

					<span class="itm-of-info">
						<img src="./static/style/icon/user-1.png">
						<input 
							class="input-forms username readonly" 
							type="text" 
							id="username" 
							name="username_hw"
							value="<?php echo $user_details['username_hw'];?>"
							placeholder="Usuario" 
							required 
							minlength="4" 
							maxlength="9"
							readonly 
							oninput="copyValue()">
					</span>
						
					<span class="itm-of-info">
						<img src="./static/style/icon/telephone.png">
						<input 
							class="input-forms readonly" 
							type="text" 
							id="numberInc"  
							name="numberaccess_hw" 
							value="<?php echo $user_details['numberaccess_hw'];?>"
							minlength="9"
							maxlength="9"
							type="text"
							readonly  
							placeholder="Numero">
						</span>
					<button type="button" id="btn-editar" class="edit-btn" onclick="habilitarEdicao()"><span>editar</span></button>
					<button type="submit" id="btn-enviar" class="edit-btn" ><span>Enviar</span></button>
				</form>
			</div>
		</div>
		<div class="cnt-done-btn">
			<a href="index.php?indexConfiguration=profile">Concluir</a>
		</div>
	</div>
</div>

<script>
	function showPreview(event) {
		var reader = new FileReader();
		reader.onload = function(){
			var output = document.getElementById('image-preview');
			output.style.backgroundImage = 'url(' + reader.result + ')';
			output.style.backgroundPosition = 'center';
			output.style.backgroundSize = 'cover';
			output.style.backgroundRepeat = 'no-repeat';
			output.style.border = 'none';

			document.querySelector('.cnt-txt-ch-img').style.opacity = "0";
			document.querySelector('#profile_image').style.opacity = "0";
			document.querySelector('.back-img-pict').style.opacity = "0";
    }
    reader.readAsDataURL(event.target.files[0]);
	}

	function habilitarEdicao() {
		var inputs = document.querySelectorAll('.readonly');
		inputs.forEach(function(input) {
			input.removeAttribute('readonly');
		});
		document.getElementById('btn-editar').style.display = 'none';
		document.getElementById('btn-enviar').style.display = 'block';
	}
</script>