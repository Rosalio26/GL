
<!DOCTYPE html>
<html>
<head>
    <title>New Reel - Interless</title>
    <style>
        body { background: #0b0c2a; color: white; font-family: sans-serif; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .btn { padding: 10px 20px; margin: 10px; background: #0cf; border: none; border-radius: 5px; cursor: pointer; }
        video, audio { display: block; margin-top: 20px; width: 100%; }
        #upload-msg { color: #f44; margin-top: 10px; }
        #cameraOverlay, #audioOverlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.95);
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        #dialogBox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #222;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            display: none;
            z-index: 1100;
        }
        .disabled { background: #555 !important; cursor: not-allowed !important; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Comece a criar um reel</h2>
        <button class="btn" onclick="openCameraOverlay()">Camera</button>
        <button class="btn" onclick="openAudioOverlay()">Audio</button>
        <p id="upload-msg">Não são suportados uploads de ficheiros</p>
    </div>

    <div id="cameraOverlay">
        <video id="overlayPreview" autoplay muted style="width: 90%; max-height: 70%;"></video>
        <div>
            <button class="btn" onclick="setMode('video')">Vídeo</button>
            <button class="btn" onclick="setMode('photo')">Foto</button>
            <button class="btn" id="captureBtn" onclick="startRecording()">Capturar</button>
            <button class="btn" onclick="closeCameraOverlay()">Fechar</button>
        </div>
        <div id="dialogBox"></div>
    </div>

    <div id="audioOverlay">
        <div>
            <button class="btn" id="startAudioBtn" onclick="startAudioCapture()">Iniciar</button>
            <button class="btn" id="stopAudioBtn" onclick="stopAudioCapture()" style="display:none;">Parar</button>
            <button class="btn" onclick="closeAudioOverlay()">Fechar</button>
        </div>
        <audio id="audioPreview" controls style="display:none;"></audio>
        <div id="dialogBox"></div>
    </div>

    <script>
        let mediaRecorder, chunks = [], stream, type = 'video';

        function openCameraOverlay() {
            document.getElementById('cameraOverlay').style.display = 'flex';
            navigator.mediaDevices.getUserMedia({ video: true, audio: true })
                .then(s => {
                    stream = s;
                    document.getElementById('overlayPreview').srcObject = stream;
                    document.getElementById('captureBtn').classList.remove('disabled');
                })
                .catch(() => {
                    showDialog('Câmera não foi encontrada ou permissão negada.');
                    document.getElementById('captureBtn').classList.add('disabled');
                });
        }

        function closeCameraOverlay() {
            document.getElementById('cameraOverlay').style.display = 'none';
            if (stream) stream.getTracks().forEach(track => track.stop());
        }

        function setMode(selectedType) {
            type = selectedType;
        }

        function startRecording() {
            const captureBtn = document.getElementById('captureBtn');
            if (captureBtn.classList.contains('disabled')) return;

            if (type === 'photo') {
                capturePhoto();
                return;
            }

            mediaRecorder = new MediaRecorder(stream);
            chunks = [];
            mediaRecorder.ondataavailable = e => chunks.push(e.data);
            mediaRecorder.onstop = () => {
                let blob = new Blob(chunks, { type: mediaRecorder.mimeType });
                uploadBlob(blob);
            };
            mediaRecorder.start();

            setTimeout(() => {
                mediaRecorder.stop();
                closeCameraOverlay();
            }, 5000);
        }

        function capturePhoto() {
            const video = document.getElementById('overlayPreview');
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);
            canvas.toBlob(blob => {
                uploadBlob(blob);
                closeCameraOverlay();
            }, 'image/png');
        }

        function showDialog(msg) {
            const boxes = document.querySelectorAll('#dialogBox');
            boxes.forEach(box => {
                box.textContent = msg;
                box.style.display = 'block';
                setTimeout(() => { box.style.display = 'none'; }, 4000);
            });
        }

        function uploadBlob(blob) {
            const formData = new FormData();
            formData.append('media_type', type);
            formData.append('file', blob);

            fetch('upload.php', {
                method: 'POST',
                body: formData
            }).then(res => res.text()).then(response => {
                showDialog('Reel enviado com sucesso!');
                setTimeout(() => window.location.href = 'reels.php', 2000);
            }).catch(err => {
                showDialog('Erro ao enviar o Reel.');
            });
        }

        // AUDIO
        let audioStream, audioRecorder, audioChunks = [];

        function openAudioOverlay() {
            document.getElementById('audioOverlay').style.display = 'flex';
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(s => {
                    audioStream = s;
                    document.getElementById('startAudioBtn').classList.remove('disabled');
                })
                .catch(() => {
                    showDialog('Microfone não foi encontrado ou permissão negada.');
                    document.getElementById('startAudioBtn').classList.add('disabled');
                });
        }

        function closeAudioOverlay() {
            document.getElementById('audioOverlay').style.display = 'none';
            if (audioStream) audioStream.getTracks().forEach(track => track.stop());
        }

        function startAudioCapture() {
            if (document.getElementById('startAudioBtn').classList.contains('disabled')) return;
            audioRecorder = new MediaRecorder(audioStream);
            audioChunks = [];
            audioRecorder.ondataavailable = e => audioChunks.push(e.data);
            audioRecorder.onstop = () => {
                const blob = new Blob(audioChunks, { type: 'audio/webm' });
                document.getElementById('audioPreview').src = URL.createObjectURL(blob);
                document.getElementById('audioPreview').style.display = 'block';
                uploadBlob(blob);
            };
            audioRecorder.start();
            document.getElementById('startAudioBtn').style.display = 'none';
            document.getElementById('stopAudioBtn').style.display = 'inline-block';
        }

        function stopAudioCapture() {
            audioRecorder.stop();
            document.getElementById('stopAudioBtn').style.display = 'none';
        }
    </script>
</body>
</html>