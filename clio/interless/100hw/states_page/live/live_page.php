<div class="body-live-area">
    <div class="header-live-area">
        <style>
            button {
                cursor: pointer;
                background-color: transparent;
                outline: none;
            }
            * {
                color:rgb(144, 136, 210);
                font-weight: 100;
            }
            .cnt-hdr-itm {
                border-bottom: 2px solid #444988;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 20px;

                width: 100vw;
                padding: 5px;
            }
            .title-live-area span{
                display: block;
            }
            .title-live-area span:first-child {
                border: 1px solid #444988;
                border-radius: 10px;
                padding: 2px 5px;
                font-size: 100;
                margin-bottom: 5px;
            }
        </style>
        <ul class="cnt-hdr-itm">
            <div class="title-live-area">
                <span><?php echo $user_details['username_hw'];?></span>
                <span>Streming &rightarrow; Studio</span>
            </div>
            <li id="cnt-image-inf" class="item-cnt-lef cnt-lef-username">
                <?php if ($user_details['profile_image']): ?>
                    <button class="cnt-user-icon">
                        <img class="icon-sml-img" src="conf_home/profile_conf/uploads/<?php echo $user_details['profile_image'];?>" alt="user icon">
                    </button>
                <?php else: ?>
                    <button class="cnt-user-icon">
                        <img class="icon-sml-img" src="./static/midia/img/user.png" alt="user icon">
                    </button>
                <?php endif; ?>
                </li>
        </ul>
    </div>
    <div class="body-striming-studio">
        <style>
            .col-area-live {
                display: flex;
                justify-content: space-between;
                border: 1px solid #444988;
                border-radius: 5px;

                height: 35vh;
                width: 95vw;
                margin: 10px auto;
                padding: 0px;
                overflow: hidden;
            }

            .cont-type-stream {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-bottom: 5px;
            }



            .cnt-text-for-stream-type, 
            .cnt-stream-type-text {
                font-size: 10pt;
                position: relative;
                color:rgb(161, 167, 255);
            }

            .cnt-text-for-stream-type::before {
                background-color:rgb(24, 30, 109);
                content: " ";
                bottom: 0;
                position: absolute;
                width: 100%;
                height: 3px;
            }

            .cnt-stream-type-text {
                border: 1px solid rgba(136, 68, 95, 0.92);
                border-radius: 2px;
                animation: piscar 1s infinite;
                padding: 1px;
            }

            @keyframes piscar {
                0%, 100% {
                    background-color:rgba(136, 68, 95, 0.92);
                }
                50% {
                    background-color: transparent; /* Cor clara */
                }
            }

            .btn-change-itm-scream {
                background-color:rgb(32, 36, 95);
                border-radius: 5px;
                height: 40px;
                width: 70px;
                padding: 1px 3px 3px 3px;
                overflow: hidden;
            }

            .btn-change-itm-scream span {
                display: block;
            }

            .btn-change-itm-scream span:first-child {
                font-size: 9pt;
            }

            .change-screen-stream img{
                width: 15px;
            }

            .block-cnt-stream {
                width: 73%;
                height: 100%;
                padding: 10px;
            }

            .video-container {
                position: relative;
                display: inline-block;
                width: 100%;
                height: 160px;
            }

            video#remoteVideo {
                display: block;
                width: 100%;
                height: 100%;
                border: 1px solid #444988;
                border-radius: 10px;
            }

            video#localVideo {
                display: none;
                width: 100%;
                height: 100%;
                border: 1px solid #444988;
                border-radius: 10px;
            }

            .block-cnt-button-change-stream {
                background-color:rgb(29, 39, 61);
                padding: 5px;
                position: relative;

                width: 25%;
                height: 100%;
            }

            .block-cnt-button-change-stream button {
                display: block;
                border: 1px solid #444988;
                border-radius: 5px;
                font-size: 11pt;

                width: 100%;
                margin-top: 5px;
                padding: 5px 7px;
            }
        </style>
        <div class="col-area-live">
            <div id="screenVideo" class="block-cnt-stream">
                <div class="cont-type-stream">
                    <span class="cnt-text-for-stream-type">Gravação 
                      <span id="textToScreen" class="cnt-stream-type-text">Tela</span>
                      <span style="display: none;" id="textToCamera" class="cnt-stream-type-text">Camera</span>
                    </span>
                    <button id="changeToCamera" class="btn-change-itm-scream">
                        <span>Camera</span> 
                        <span class="change-screen-stream"><img src="states_page/gal/icon/video-camera.png" alt="button-change-screen"></span>
                    </button>

                    <button style="display: none;" id="changeToScreen" class="btn-change-itm-scream">
                        <span>Tela</span> 
                        <span class="change-screen-stream"><img src="states_page/gal/icon/maximize.png" alt="button-change-screen"></span>
                    </button>
                </div>
                
                <div class="video-container">
                    <video id="remoteVideo" autoplay playsinline></video>
                    <video id="localVideo" autoplay playsinline></video>
                </div>

                <div class="temppo-transmissao">
                    <span>Tempo de transmissao</span>
                    <span class="cronometro">00:00:00</span>
                </div>
            </div>

            <div style="display: none;" id="screenAudio" class="block-cnt-stream">

                <div class="temppo-transmissao">
                    <span>Tempo de transmissao</span>
                    <span class="cronometro">00:00:00</span>
                </div>
            </div>
            <div class="block-cnt-button-change-stream">
                <button id="changeToVideoStudio" class="btn-change-stream-type">Video</button>
                <button id="changeToAudioStudio" class="btn-change-stream-type">Audio</button>
                <button onclick="startBroadcast()" id="startBtn" class="btn-change-stream-type">Iniciar</button>
                <button onclick="stopStream()" id="stopBtn" class="btn-change-stream-type">End</button>
                <button onclick="watch()" class="btn-change-stream-type">👀 Assistir</button>
            </div>
        </div>

        <script>
          //==================================================================
          //*******CONFIGURAÇÃO DO MAIN DE GRAVAÇÃO DE VIDEO SCREEN E CÂMERA
          //==================================================================
          let btnChangeToCamera = document.querySelector("#changeToCamera");
          let btnChangeToScreen = document.querySelector("#changeToScreen");
          let changeTextStreamType = document.querySelector(".cnt-stream-type-text");
          let textStreamTypeCamera = document.querySelector("#textToCamera");
          let textStreamTypeScreen = document.querySelector("#textToScreen");
          let videoPlayStream = document.querySelector("#remoteVideo");
          let videoPlayChangedStream = document.querySelector("#localVideo");

          
          btnChangeToCamera.addEventListener('click', function() {
            btnChangeToCamera.style.display = "none";
            btnChangeToScreen.style.display = "block";
            changeTextStreamType.style.display = "none";
            textStreamTypeCamera.style.display = "inline";
            videoPlayStream.style.display = "none";
            videoPlayChangedStream.style.display = "block";
          });

          btnChangeToScreen.addEventListener('click', function() {
            btnChangeToCamera.style.display = "block";
            btnChangeToScreen.style.display = "none";
            changeTextStreamType.style.display = "block";
            textStreamTypeCamera.style.display = "none";
            textStreamTypeScreen.style.display = "inline";
            videoPlayStream.style.display = "block";
            videoPlayChangedStream.style.display = "none";
        });
        
        
        //==================================================================
        //*******CONFIGURAÇÃO DO MAIN DE GRAVAÇÃO DE VIDEO SCREEN E CÂMERA
        //==================================================================
        //===============================================
        //*****************MIRRORS WINDOWS
        let btnMirrorAudio = document.querySelector('#changeToAudioStudio');
        let btnMirrorVideo = document.querySelector('#changeToVideoStudio');
        let screenVideoType = document.querySelector('#screenVideo');
        let screenAudio = document.querySelector('#screenAudio');

          btnMirrorAudio.addEventListener("click", function() {
            screenVideo.style.display = "none";
            screenAudio.style.display = "block";
          });

          btnMirrorVideo.addEventListener("click", function() {
            screenVideo.style.display = "block";
            screenAudio.style.display = "none";
          });
          
          </script>
        <script src="states_page/node_modules/socket.io/client-dist/socket.io.js"></script>
        <!-- Passa o userId da sessão PHP -->
        <script>
          let userId = <?= json_encode($_SESSION['user_id'] ?? null); ?>;
        </script>
        <script>
            const socket = io();
            const video = document.getElementById("remoteVideo");
            let localStream;
            let peerConnection;
            let isBroadcaster = false;
            let mediaRecorder;
            let recordedChunks = [];

            const config = {
            iceServers: [{ urls: 'stun:stun.l.google.com:19302' }]
            };

            async function startBroadcast() {
            if (!userId) {
                alert("Usuário não autenticado.");
                return;
            }

            // Atualiza status para online
            fetch('/update_status.php', {
                method: 'POST',
                body: new URLSearchParams({
                id_user: userId,
                status: 'online'
                })
            });

            try {
                localStream = await navigator.mediaDevices.getDisplayMedia({ video: true, audio: true });
                video.srcObject = localStream;

                mediaRecorder = new MediaRecorder(localStream);
                mediaRecorder.ondataavailable = e => recordedChunks.push(e.data);
                mediaRecorder.start();

                socket.emit("message", { type: "broadcaster" });
                isBroadcaster = true;

            } catch (err) {
                alert("Erro ao capturar tela: " + err.message);
            }
            }

            function watch() {
            isBroadcaster = false;
            socket.emit("message", { type: "watcher" });
            }

            function stopStream() {
            if (peerConnection) peerConnection.close();
            if (localStream) localStream.getTracks().forEach(t => t.stop());
            socket.emit("message", { type: "endStream" });

            fetch('states_page/public/update_status.php', {
                method: 'POST',
                body: new URLSearchParams({
                id_user: userId,
                status: 'offline'
                })
            });

            if (isBroadcaster && mediaRecorder && mediaRecorder.state !== "inactive") {
                mediaRecorder.stop();

                mediaRecorder.onstop = async () => {
                const salvar = confirm("Deseja salvar o vídeo da transmissão?");
                if (!salvar) return;

                const blob = new Blob(recordedChunks, { type: 'video/webm' });
                const formData = new FormData();
                formData.append('video', blob, 'transmissao.webm');
                formData.append('id_user', userId);

                const res = await fetch('states_page/public/save.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await res.json();

                alert("Vídeo salvo em: " + result.path);
                };
            }
            }

            socket.on("message", async data => {
            if (data.type === "watcher" && isBroadcaster) {
                peerConnection = new RTCPeerConnection(config);
                localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));

                peerConnection.onicecandidate = e => {
                if (e.candidate) {
                    socket.emit("message", {
                    type: "candidate",
                    candidate: e.candidate,
                    target: data.sender
                    });
                }
                };

                const offer = await peerConnection.createOffer();
                await peerConnection.setLocalDescription(offer);
                socket.emit("message", {
                type: "offer",
                offer,
                target: data.sender
                });
            }

            if (data.type === "offer" && !isBroadcaster) {
                peerConnection = new RTCPeerConnection(config);

                peerConnection.ontrack = e => {
                video.srcObject = e.streams[0];
                };

                peerConnection.onicecandidate = e => {
                if (e.candidate) {
                    socket.emit("message", {
                    type: "candidate",
                    candidate: e.candidate,
                    target: data.sender
                    });
                }
                };

                await peerConnection.setRemoteDescription(new RTCSessionDescription(data.offer));
                const answer = await peerConnection.createAnswer();
                await peerConnection.setLocalDescription(answer);
                socket.emit("message", {
                type: "answer",
                answer,
                target: data.sender
                });
            }

            if (data.type === "answer" && isBroadcaster) {
                await peerConnection.setRemoteDescription(new RTCSessionDescription(data.answer));
            }

            if (data.type === "candidate") {
                await peerConnection.addIceCandidate(new RTCIceCandidate(data.candidate));
            }
            });

            window.onbeforeunload = () => {
            socket.emit("message", { type: "endStream" });
            if (peerConnection) peerConnection.close();
            };
        </script>
    </div>

    <style>
        .streamings-friend-area {
            width: 95vw;
            margin: 10px auto;
            padding: 5px;
        }
    </style>

    <div class="streamings-friend-area">
        <h2>Pessoas a transmitirem agora</h2>
        <div class="list-streaming">
            <div class="body-strems-friends">
            <?php

                $sql_stream = "
                    SELECT s.*, r.username_hw
                    FROM streaming s
                    JOIN register_gch r ON s.id_user = r.user_hw_id
                    JOIN friend_requests a ON (
                        (a.request_id = ? AND a.request_id = s.id_user)
                        OR
                        (a.request_id = ? AND a.request_id = s.id_user)
                    )
                    WHERE a.status = 'accepted' AND s.status = 'online'
                ";

                $stmt_stream = $conn_mof->prepare($sql_stream);
                $stmt_stream->bind_param("ii", $id_usuario_logado, $id_usuario_logado);
                $stmt_stream->execute();
                $result_stream = $stmt_stream->get_result();

                if ($result_stream->num_rows > 0) {
                    while ($row_stream = $result->fetch_assoc()) {
                        echo "<p><strong>{$row_stream['nome']}</strong> está a transmitir:</p>";
                        $ext = pathinfo($row_stream['arquivo'], PATHINFO_EXTENSION);

                        if ($ext === 'mp4') {
                            echo "<video width='600' controls>
                                    <source src='stream.php?file={$row_stream['arquivo']}' type='video/mp4'>
                                </video><br>";
                        } elseif ($ext === 'mp3') {
                            echo "<audio controls>
                                    <source src='stream.php?file={$row_stream['arquivo']}' type='audio/mpeg'>
                                </audio><br>";
                        }
                    }
                } else {
                    echo "<p>Nenhum amigo está a transmitir neste momento.</p>";
                }
            ?>


            </div>
        </div>
    </div>
</div>