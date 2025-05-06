

<div id="cnt-lef-itm" class="cnt-tr-itm cnt-lef-itm">
    <div class="acn-ac-nav">

        <!-- <div class="ass-spa-cnt">
                <button 
                id="fecharcnt" 
                class="btn btn-close-nav btn-cnt-close">x</button>
        </div> -->

        <style>
            .new-form-capitalizaction {
                display: flex;
                gap: 10px;
                align-items: center;

                position: relative;
                width: max-content;
                height: max-content;
                padding: 2px;
            }

            .link-states 
            {
                border-radius: 5px;
                padding: 5px 10px;
                font-size: 9pt;

                display: flex;
                align-items: center;
                justify-content: center;
                gap: 3px;
            }

            .link-states img {
                width: 30px
            }

            .cnt-act-hed
            {
                justify-content: space-between;
                padding-top: 10px;
                padding-right: 10px;
            }

            .btn-modify-statment
            {
                background-color: #4627f6;
                border-radius: 5px;
                padding: 5px 10px;
                font-size: 9pt;

                display: flex;
                align-items: center;
                justify-content: center;
                gap: 3px;
            }

            .states_live
            {
                background-color: #f2a9ff1e;
            }

            #first-window-hd
            {
                display: flex;
            }

            #window-more-itm-hd
            {
                justify-content: space-around;
                display: none;
            }

            .blocks-hd-more {
                border: 2px solid #4627f6;
                border-radius: 1000px;
                width: 70px;
                height: 70px;
                padding: 5px;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .blocks-hd-more img {
                width: 20px;
            }

            .blocks-hd-more span {
                font-style: 100;
                font-size: 9pt;
            }

        </style>

        <div id="first-window-hd" class="cnt-act-hed">
            <div id="cnt-image-inf" onclick="infImage()" class="item-cnt-lef cnt-lef-username">
                <?php if ($user_details['profile_image']): ?>
                    <button class="cnt-user-icon">
                        <img class="icon-sml-img" src="conf_home/profile_conf/uploads/<?php echo $user_details['profile_image'];?>" alt="user icon">
                    </button>
                <?php else: ?>
                    <button class="cnt-user-icon">
                        <img class="icon-sml-img" src="./static/midia/img/user.png" alt="user icon">
                    </button>
                <?php endif; ?>
            </div>

            <div class="cnt-inf-imagem">
                <div class="cnt-close-btn">
                    <button id="btn-close" class="btn btn-close">x</button>
                </div>
                <nav class="cnt-list-inf">
                    <ul class="itm-ms-inf">
                        <li class="cnt-user"><?php echo $user_details['username_hw'];?></li>
                        <li><a class="cnt-lk-inf">Perfil</a></li>
                        <li><a class="cnt-lk-inf">Editar</a></li>
                        <li><a class="cnt-lk-inf">Definições</a></li>
                        <li><a class="cnt-lk-inf">desativar animação</a></li>
                        <li><a href="includes/logount.php" class="cnt-lk-inf dangerous-act"><img class="icon-img" src="./static/style/icon/turn-off.png">Sair</a></li>
                    </ul>
                </nav>
            </div>

            <div class="ascend-item-link-left item-cnt-lef cnt-lef-quick-view">
                <ul class="new-form-capitalizaction"> 
                    <li><a class="btn-modify-statment link-states states_live" href="index.php?indexConfiguration=statetment_live">
                        <img src="./static/midia/favicon/live_red.png" alt="icon streaming">live
                    </a></li>
                </ul>
            </div>

            <button class="btn-modify-statment states_next"><-></button>

        </div>

        <div id="window-more-itm-hd" class="cnt-act-hed window-more-itm-hd">
            <button class="btn-modify-statment states_back"><-></button>
            
            <a class="blocks-hd-more" href=""> <img src="./static/midia/favicon/briefcase.png"> <span>negocio</span></a>
            <a class="blocks-hd-more" href=""> <img src="./static/midia/favicon/telephone.png"> <span>phone</span></a>
        </div>

    </div>
    
    <!-- <div class="item-cnt-lef">
        <nav class="navbar sst-inc nav-inc">
            <button type="button" class="btn btn-nav btn-menu btn-menu-navbar"></button>
            <ul id="home-nav-cnt" class="cnt-nav nav-cnt-home">
                <div class="ass-spa"><button id="btnCloseNavBar" class="btn btn-close-nav">x</button></div>
                <div class="conf conf-sst itm-sit">
                    <li class="cnt-lk lk-esc-fr-itm">
                        <a href="index.php?indexConfiguration=passConf&confPages=newOfficcePage"><img class="icon-img" src="./static/style/icon/more.png"><span class="ascend-item-link-left">New</span></a></li>

                    <li class="cnt-lk lk-esc-fr-itm">
                        <a href="index.php"><img class="icon-img" src="./static/style/icon/casa-1.png"><span class="ascend-item-link-left">Home</span></a></li>

                    <li class="cnt-lk lk-esc-fr-itm"><a href="index.php?indexConfiguration=profile"><img class="icon-img" src="./static/style/icon/user.png"><span class="ascend-item-link-left">Profile</span></a></li>
                    <li class="cnt-lk lk-esc-fr-itm"><a href="?pagesCenter=ficheiros"><img class="icon-img" src="./static/style/icon/folder.png"><span class="ascend-item-link-left">Ficheiros</span></a></li>
                    <li class="cnt-lk lk-esc-fr-itm"><a href="?pagesCenter=platform"><img class="icon-img" src="./static/style/icon/responsive.png"><span class="ascend-item-link-left">Plataformas</span></a></li>
                </div>
                <div class="conf conf-sst">
                    <li class="cnt-lk lk-esc-fr-itm">
                        <a href="?pagesCenter=settings"><img class="icon-img" src="./static/style/icon/settings-2.png"><span class="ascend-item-link-left">Definições</span></a>
                    </li>

                    <li class="cnt-lk lk-esc-fr-itm dangerous-act"><a href="form_reg_log/logount.php"><img class="icon-img" src="./static/style/icon/logout.png"><span class="ascend-item-link-left">Logout</span></a></li>
                </div>
            </ul>
        </nav>
    </div> -->
</div>
<style>
    .add-mode
    {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 5px;
        padding: 8px 10px;
        position: relative;
    }
    
    .add-mode::before {
        background-color:rgba(32, 15, 182, 0.69);
        border-radius: 10px;
        content: "";
        width: 300px;
        height: 2px;
        position: absolute;
        top: 0;
        left: 0;
    }

    .add-mode button.buttons-move {
        background-color:rgba(18, 31, 130, 0.48);
        box-shadow: 1px 1px 7px rgba(93, 80, 241, 0.65);
        border-radius: 5px;
        border: 1px solid rgba(44, 56, 226, 0.79);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 50px;
        padding: 4px;
    }

    .add-mode button img { width: 20px;}

    @keyframes toggleButtons {
        0%, 50% {
            opacity: 1;
            transform: scale(1);
            rotate: 1.5deg;
        }
        50.1%, 100% {
            opacity: 0.8;
            transform: scale(0.9999);
            rotate: 0deg;
        }
    }

    @keyframes vibrate {
        0% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(1px, -1px) scale(1.01); }
        50% { transform: translate(-1px, 1px) scale(1.01); }
        75% { transform: translate(1px, 1px) scale(1.01); }
        100% { transform: translate(-1px, -1px) scale(1); }
    }   

    .move-block-right-move {
        background-color:rgb(13, 23, 67);
        border-radius: 0px 5px 5px 0px;
        border-right: 2px solid #425095;
        /* position: fixed; */
        position: absolute; 
        top: 100%;
        left: 0;
        width: 6px;
        height: 70vh;
        /* width: 100vw;
        height: 100vh; top: 0; left: 0; */
        z-index: 100;
        overflow: hidden;
    }

    .move-block-down {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background-color: rgba(10, 2, 80, 0.72);
        border: 2px solid rgb(34, 20, 165);
        border-radius: 3px;
        position: absolute;
        top: 100%;
        right: 0;
        width: 100px;
        height: 20vh;
        z-index: 100;
    }

    .maximize-button,
    .restore-button, 
    .close-button,
    .inf-cnt-lef {
        display: none;
    }

    .blocks-down-move {
        background-color:rgba(29, 16, 105, 0.9);
        border: 2px solid rgba(88, 22, 108, 0.71);
        border-radius: 100%;
        box-shadow: 0.3px 0.2px 5px rgb(50, 27, 179);
        width: 70px;
        height: 70px;
        padding: 5px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .blocks-down-move span {
        display: block;
        font-size: 9pt;
    }

    .col-btn-lef{
        background:rgb(26, 0, 171);
        border-bottom: 2px solid #4627f6;
        width: 100%;
        height: 8%;
        margin: 0px auto;
        padding: 0px;
        position: relative;

        display: flex;
        align-items: center;
    }

    .inf-cnt-lef
    {
        width: 100%;
    }

    .inf-cnt-lef .cntent-lnk {
        display: block;
        margin: 7px auto 0px auto;
        border: 2px solid #4627f6;
        border-radius: 1000px;

        width: 50px;
        height: 50px;
    }

    .maximize-button
    {
        background-image: url("static/midia/favicon/maximize.png");
        background-size: 30px 25px;
    }

    .restore-button
    {
        background-image: url("static/midia/favicon/maximize.png");
        background-size: 30px 25px;
    }

    .close-button
    {
        background-image: url("static/midia/favicon/maximize.png");
        background-size: 30px 25px;
    }

    .btns-min-win-conf
    {
        background-color: transparent;
        background-position: center;
        /* background-size: cover; */
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
    }

    .rest-alph-btn
    {
        position: absolute;
        display: flex;
        gap: 5px;
        height: 70%;
        right: 0;
        padding: 4px;
    }

    .alph-btn
    {
        border: 2px solid #425095;
        width: 60px;
    }


</style>

<div class="add-mode">
    <button class="buttons-move button-right-move">
        <img src="./static/midia/favicon/right-home.png" alt="more icon">
    </button>
    <button class="buttons-move button-down-move">
        <img class="downMoveImage" src="./static/midia/favicon/arrow-down.png" alt="more settings">
    </button>

    <div class="move-block-right-move">
        <div class="col-btn-lef">
            <button class="btns-min-win-conf maximize-button"></button>
            <div class="rest-alph-btn">
                <button id="restore-button" class="btns-min-win-conf alph-btn restore-button"></button>
                <button id="close-button" class="btns-min-win-conf alph-btn close-button"></button>
            </div>
        </div>
        <div class="inf-cnt-lef">
            <a href="" class="cntent-lnk"></a>
            <a href="" class="cntent-lnk"></a>
            <a href="" class="cntent-lnk"></a>
            <a href="" class="cntent-lnk"></a>
        </div>
    </div>
    <div class="move-block-down">
        <a class="blocks-down-move" href="index.php?indexConfiguration=statetment_share"> <img src="./static/midia/favicon/updates.png"> <span>shares</span></a>
        <a class="blocks-down-move" href=""> <img src="./static/midia/favicon/les-mode.png"> <span>mode</span></a>
    </div>
</div>

<script>

    document.querySelector('.states_next').addEventListener('click', function() {
        let blockOrigen = document.querySelector('#first-window-hd');
        let blockEnd = document.querySelector('#window-more-itm-hd');

        if(blockEnd) {
            blockEnd.style.display = 'flex';
            blockOrigen.style.display = 'none';
        }
    });
    
    document.querySelector('.states_back').addEventListener('click', function() {
        let blockEnd = document.querySelector('#window-more-itm-hd');
        let blockOrigen = document.querySelector('#first-window-hd');

        if(blockOrigen) {
            blockEnd.style.display = 'none';
            blockOrigen.style.display = 'flex';
        }
    });
    

    document.querySelector('.button-right-move').addEventListener('click', function() {
        let block = document.querySelector('.move-block-right-move');
        let maximizeButton = document.querySelector('.maximize-button');
        let boxeContentLnk = document.querySelector('.inf-cnt-lef');

        if(block.style.width === '5px') {
            block.style.width = '60px';
            block.style.transition = 'width 1s ease';
        } else {
            block.style.width = '5px';
            boxeContentLnk.style.display = 'none';
            maximizeButton.style.display = 'none';
        }
       
        setTimeout(() => {
            const blockWidth = parseInt(getComputedStyle(block).width);

            if (blockWidth >= 50) {
                maximizeButton.style.display = 'block';
                boxeContentLnk.style.display = 'block';
                boxeContentLnk.style.width = '100%';
                boxeContentLnk.style.margin = 'auto';
            }
        }, 1000);


    });


    // Adicionando evento ao botão de maximizar
    document.addEventListener('DOMContentLoaded', function() {
        let maximizeButton = document.querySelector('.maximize-button');
        let boxeContentLnk = document.querySelector('.inf-cnt-lef');
        let restoreButton = document.querySelector('.restore-button');
        let closeButton = document.querySelector('.close-button');
        let block = document.querySelector('.move-block-right-move');
        
        maximizeButton.addEventListener('click', function() {
            if (maximizeButton) {
                block.style.position = 'fixed';
                block.style.width = '100vw';
                block.style.height = '100vh';
                block.style.top = '0';
                block.style.left = '0';
                block.style.zIndex = '9999';

                maximizeButton.style.display = 'none';
                restoreButton.style.display = 'block';
                closeButton.style.display = 'block';

                boxeContentLnk.style.display = 'flex';
                boxeContentLnk.style.flexWrap = 'wrap';
                boxeContentLnk.style.alignItems = 'center';
                boxeContentLnk.style.justifyContent = 'left';
                boxeContentLnk.style.width = '80vw';
                boxeContentLnk.style.margin = '10px auto 0px 5px';
            }
        });

        restoreButton.addEventListener('click', function() {
            if (block) {
                block.style.position = 'absolute';
                block.style.width = '60px';
                block.style.height = '70vh';
                block.style.top = '';
                block.style.left = '';
                block.style.zIndex = '';
                
                maximizeButton.style.display = 'block';
                restoreButton.style.display = 'none';
                closeButton.style.display = 'none';
                
                boxeContentLnk.style.display = 'block';
                boxeContentLnk.style.width = '100%';
                boxeContentLnk.style.margin = '0px auto';
            }
        });
        
        closeButton.addEventListener('click', function() {
            if (closeButton) {
                block.style.width = '5px';
                block.style.height = '70vh';
                block.style.position = 'absolute';
                block.style.top = '100%';
                block.style.left = '0';
                
                restoreButton.style.display = 'none';
                closeButton.style.display = 'none';
                boxeContentLnk.style.width = '100%';
                boxeContentLnk.style.display = 'none';
            }
        });
    });

    document.querySelector('.button-down-move').addEventListener('click', function(){
        let buttonToggleDown = document.querySelector('.button-down-move');
        let buttonImage = document.querySelector('.downMoveImage');
        let block = document.querySelector('.move-block-down');
        
        if(block.style.display === 'none') {
            buttonImage.src = 'static/midia/favicon/up_arrow.png'; 
            block.style.display = 'flex';
            block.style.animation = 'expandHeight 1s forwards';
        } else {
            block.style.display = 'none';
        }
    });
    // Adicionando a animação ao CSS
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes incresingWidth {
            from {
                width: 5px;
            }
            to {
                width: 50px;
            }
        }

        @keyframes expandHeight {
            from {
                height: 0;
            }
            to {
                height: 20vh;
            }
        }

        .moving-block {
            animation: expandHeight 1s ease forwards; /* Aplica a animação de expansão */
        }
    `;
    document.head.appendChild(style);



    
    // function toogleNavLef() {
        //     console.log(toogleNavLef())
    // }
    var btnNavBar = document.querySelector('.btn-menu-navbar');
    var navItm = document.querySelector('.nav-cnt-home');
    var btnCloseNav = document.querySelector('.btn-close-nav');

    btnNavBar.addEventListener('click', function() {
        navItm.classList.add('openNavBar');
        btnNavBar.style.display = 'none';
        

        navItm.addEventListener('click', function(event) {
            if(event.target.id == 'btnCloseNavBar'){
                navItm.classList.remove('openNavBar');
                btnNavBar.style.display = 'block';
            }
        });

    });

    

    function infImage() {
        var btnNavBar = document.querySelector('.cnt-image-inf');
        var navItm = document.querySelector('.cnt-inf-imagem');
        var btnCloseNav = document.querySelector('.btn-close');

        navItm.style.display = 'block';

        navItm.addEventListener('click', function(event) {
            if(event.target.id == 'btn-close'){
                navItm.style.display = 'none';
            }
        });
    }
</script>