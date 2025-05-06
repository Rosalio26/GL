
<style>

    .asp-item-post
    {
        display: none;
    }

    .cnt-posts-conf
    {
        width: 95%;
        margin: 20px auto;
        overflow: hidden;
    }

    .acc-add-info
    {
        overflow: auto;
        height: 550px;
    }

    .cnt-all-files-post{
        border: 1px solid #333;
        border-radius: 5px;
        width: 60%;
        margin: 0px auto;
        padding: 10px;
    }

    .cnt-title-post-inf
    {
        border: 1px solid #333;
        border-radius: 5px;
        padding: 5px;
        height: 50px;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hid-title-post
    {
        background-color: #2222;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px 0px;
    }

    .inp-title-dis
    {
        width: 15px;
    }

    .title-media
    {
        display: none;
    }

    .tlt-post
    {
        background-color: #6661;
        border: 1px solid #3332;
        border-radius: 5px;
        font-size: 11pt;
        width: 40%;
        padding: 2px 10px;
        margin-left: 0px;
    }

    .tlt-post::first-letter
    {
        text-transform: uppercase;
    }

    /* .acc-add-res-inpu
    {
        display: none;
    } */

    .cnt-arm-post
    {
        border: 1px solid #333;
        border-radius: 5px;
        width: 400px;
        height: 400px;
        margin: 5px auto;
        overflow: hidden;
    }

    .cnt-inf-post
    {
        background-color: transparent;
        width: 100%;
        height: 100%;

        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    #content-info
    {
        background-color: #9992;
        width: 95%;
        height: 95%;
        text-align: center;
        resize: none;
        border: none;
        border-radius: 5px;
        padding: 10px 5px 5px 5px;
    }

    .cnt-btn-tip-media, .cnt-btn-option
    {
        display: flex;
        align-items: center;
    }

    .file-input
    {
        position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            height: 100%;
            width: 100%;
    }

    .tlt-posts
    {
        font-family: poppis-light;
        font-size: 13pt;
        padding: 5px 20px;
        position: relative;
    }

    .aclas
    {
        position: relative;
        display: flex;
        align-items: center;
        padding-bottom: 10px;
    }

    .aclas span
    {
        font-family: poppis-light;
        font-size: 16pt;
        display: block;
        margin-right: 20px;
    }

    .aclas::before
    {
        content: "";
        width: 30%;
        height: 2px;
        background-color: #3334;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .asp-item-post, 
    .attr-item-post
    {
        width: 500px;
        margin: 10px auto;
        border: 1px solid #333;
        border-radius: 5px;
        padding: 5px;
    }

    #media_type
    {
        background-color: #3334;
        border-radius: 5px;
        padding: 5px 10px;
        appearance: none;
        border: none;
    }

</style>

<div class="cnt-posts-conf">
    <div class="cnt-act-hed">
        <?php include("conf_home/new_semi_conf/header_new_confing.php");?>
    </div>

    <div class="acc-add-info">
        <div class="aclas">
            <h1 class="tlt-posts">Adicionar Post</h1>
            <span>></span>
            <div class="cnt-btn-tip-media">
                <div class="camp-conf-bg-content"></div>
                <div class="cnt-btn-option">
                    <select id="media_type" name="media_type" onchange="toggleInputs()" required>
                        <option class="" value="text_post">Texto</option>
                        <option class="" value="video_post">Vídeo</option>
                        <option class="" value="music_post">Música</option>
                        <option class="" value="photo_post">Foto</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="forms_posts">

            <div id="content-post-attr" class="arm-cnt-content-form-post attr-item-post">
                <form action="?confPages=save_post_content" method="POST" id="formPost">
                    <div class="hid-title-post" id="content-title-post">
                        <input type="text" class="tlt-post title-content" name="titlo-content-1" placeholder="Titulo" required>
                        <input type="text" class="title-content inp-title-dis" name="titlo-content-2" value="#" disabled>
                        <input type="text" class="tlt-post title-content" name="titlo-content-3" placeholder="Sub titulo">

                        <input type="hidden" class="title-content" placeholder="Titulo Content" name="title_post_content"  id="concatenatedInput">
                    </div>

                    <div class="cnt-arm-post">
                        <div class="cnt-inf-post" id="content_div">
                            <textarea id="content-info" name="content_post" placeholder="Conteudo" required></textarea>
                        </div>
                    </div>

                    <input type="submit" value="Enviar">
                </form>
            </div>

            <div id="photo-post-attr" class="arm-cnt-photo-form-post asp-item-post">
                <form action="?confPages=save_post_photo" method="POST" enctype="multipart/form-data" id="formPostPhoto">
                    <div class="hid-title-post acc-add-res-inpu" id="photo-title-post">
                        <input type="text" class="tlt-post title-photo" name="titlo-photo-1" placeholder="Titulo photo" required>
                        <input type="text" class="title-photo inp-title-dis" name="titlo-photo-2" value="#" disabled>
                        <input type="text" class="tlt-post title-photo" name="titlo-photo-3" placeholder="Sub titulo photo">
                        <input type="hidden" class="title-media" name="title_post_photo"  id="conPhoto">
                    </div>

                    <div class="cnt-arm-post">
                        <div class="cnt-inf-post" id="file_input_div">
                            <label class="file-input-label" for="media_file">
                                <div class="cascading-photo-file-input"></div>
                                <span class="labe-change-acc">Escolhe o Arquivo</span>
                            </label>
                            <input type="file" id="media_file" class="file-input" name="media_file">
                        </div>
                    </div>

                    <input type="submit" value="Enviar">
                </form>
            </div>

            <div id="video-post-attr" class="arm-cnt-video-form-post asp-item-post">
                <form action="?confPages=save_post_video" method="POST" enctype="multipart/form-data" id="formPostVideo">
                    <div class="hid-title-post acc-add-res-inpu" id="video-title-post">
                        <input type="text" class="tlt-post title-video" name="titlo-video-1" placeholder="Titulo video" required>
                        <input type="text" class="title-video inp-title-dis" name="titlo-video-2" value="#" disabled>
                        <input type="text" class="tlt-post title-video" name="titlo-video-3" placeholder="Sub titulo video">
                        <input type="hidden" class="title-video" name="title_post_video" id="conVideo">
                    </div>

                    <div class="cnt-arm-post">
                        <div class="cnt-inf-post" id="file_input_div">
                            <label class="file-input-label" for="media_file">
                                <div class="cascading-video-file-input"></div>
                                <span class="labe-change-acc-vd">Escolhe o Arquivo</span>
                            </label>
                            <input type="file" id="media_file_video" class="file-input" name="media_file">
                        </div>
                    </div>

                    <input type="submit" value="Enviar">
                </form>
            </div>

            <div id="music-post-attr" class="arm-cnt-music-form-post asp-item-post">
                <form action="?confPages=save_post_music" method="POST" enctype="multipart/form-data" id="formPostMusic">
                    <div class="hid-title-post acc-add-res-inpu" id="music-title-post">
                        <input type="text" class="tlt-post title-music" name="titlo-music-1" placeholder="Titulo Music" required>
                        <input type="text" class="title-music inp-title-dis" name="titlo-music-2" value="#" disabled>
                        <input type="text" class="tlt-post title-music" name="titlo-music-3" placeholder="Sub titulo Music">
                        <input type="hidden" class="title-music" placeholder="post Music" name="title_post_music" id="conMusic">
                    </div>

                    <div class="cnt-arm-post">
                        <div class="cnt-inf-post" id="file_input_div">
                            <label class="file-input-label" for="media_file">
                                <div class="cascading-music-file-input"></div>
                                <span class="labe-change-acc-ms">Escolhe o Arquivo</span>
                            </label>
                            <input type="file" id="media_file_music" class="file-input" name="media_file">
                        </div>
                    </div>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleInputs() {
        var mediaType = document.getElementById("media_type").value;
        var contentPostBlock = document.getElementById("content-post-attr");
        var photoPostBlock = document.getElementById("photo-post-attr");
        var videoPostBlock = document.getElementById("video-post-attr");
        var musicPostBlock = document.getElementById("music-post-attr");


        if (mediaType === 'video_post') {
                videoPostBlock.style.display = "block";
                contentPostBlock.style.display = "none";
                musicPostBlock.style.display = "none";
                photoPostBlock.style.display = "none";
            } else if (mediaType === 'music_post') {
                musicPostBlock.style.display = "block";
                videoPostBlock.style.display = "none";
                contentPostBlock.style.display = "none";
                photoPostBlock.style.display = "none";
            } else if (mediaType === 'photo_post') {
                photoPostBlock.style.display = "block";
                videoPostBlock.style.display = "none";
                contentPostBlock.style.display = "none";
                musicPostBlock.style.display = "none";
            } else if (mediaType === 'text_post') {
                contentPostBlock.style.display = "block";
                videoPostBlock.style.display = "none";
                musicPostBlock.style.display = "none";
                photoPostBlock.style.display = "none";
            } else {
                contentPostBlock.style.display = "block";
        }
    }

    document.getElementById('media_file').addEventListener('change', function() {
        var label = document.querySelector('.labe-change-acc');
        label.textContent = 'Selected';
    });

    document.getElementById('media_file_music').addEventListener('change', function() {
        var label = document.querySelector('.labe-change-acc-ms');
        label.textContent = 'Selected';
    });

    document.getElementById('media_file_video').addEventListener('change', function() {
        var label = document.querySelector('.labe-change-acc-vd');
        label.textContent = 'Selected';
    });


    document.getElementById('formPost').addEventListener('submit', function (event) {
            
        var input1 = document.getElementsByName('titlo-content-1')[0].value;
        var input2 = document.getElementsByName('titlo-content-2')[0].value;
        var input3 = document.getElementsByName('titlo-content-3')[0].value;
        
        var concatenatedInput = input1 + ' ' + input2 + ' ' + input3;
        document.getElementById('concatenatedInput').value = concatenatedInput;
    });


    //=================
    //=====Photos
    //================
    document.getElementById('formPostPhoto').addEventListener('submit', function (event) {
    
        var inputPhoto1 = document.getElementsByName('titlo-photo-1')[0].value;
        var inputPhoto2 = document.getElementsByName('titlo-photo-2')[0].value;
        var inputPhoto3 = document.getElementsByName('titlo-photo-3')[0].value;
        
        var concatPhoto = inputPhoto1 + ' ' + inputPhoto2 + ' ' + inputPhoto3;
        document.getElementById('conPhoto').value = concatPhoto;
    });


    //=================
    //=====Videos
    //================
    document.getElementById('formPostVideo').addEventListener('submit', function (event) {
    
        var inputVideo1 = document.getElementsByName('titlo-video-1')[0].value;
        var inputVideo2 = document.getElementsByName('titlo-video-2')[0].value;
        var inputVideo3 = document.getElementsByName('titlo-video-3')[0].value;
        
        var concatPhoto = inputVideo1 + ' ' + inputVideo2 + ' ' + inputVideo3;
        document.getElementById('conVideo').value = concatPhoto;
    });


    //=================
    //=====Musicas
    //================
    document.getElementById('formPostMusic').addEventListener('submit', function (event) {
    
        var inputMusic1 = document.getElementsByName('titlo-music-1')[0].value;
        var inputMusic2 = document.getElementsByName('titlo-music-2')[0].value;
        var inputMusic3 = document.getElementsByName('titlo-music-3')[0].value;
        
        var concatPhoto = inputMusic1 + ' ' + inputMusic2 + ' ' + inputMusic3;
        document.getElementById('conMusic').value = concatPhoto;
    });
</script>