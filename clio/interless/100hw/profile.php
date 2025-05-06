
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./static/style/profile.css">
    <link rel="stylesheet" href="./static/style/index.css">
</head>
<body id="body_profile" class="body-gr body_profile"> 
    <div class="asp_profile">
        <div class="break_info_user">

            <div class="photo_img_profile">
                <div class="item-cnt-lef cnt-lef-username">
                    <?php if ($user_details['profile_image']): ?>
                        <a href="./index.php?indexConfiguration=uploadPictureProfile" class="cnt-user-icon">
                            <img class="icon-sml-img" src="./conf_home/profile_conf/uploads/<?php echo $user_details['profile_image'];?>" alt="user icon">
                        </a>
                    <?php else: ?>
                        <a href="./index.php?pagesStamen=uploadImagem" class="cnt-user-icon">
                            <img class="icon-sml-img" src="./static/midia/img/user.png" alt="user icon">
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="oth_info_profile">
                <div class="oth_info user_name">
                    <span class="tlt-span-jub">Nome de usuario</span>
                    <span class="cnt-span-jub"><?php echo $user_details['username_hw'];?></span>
                </div>

                <div class="oth_info unkw_stg_1">
                    <span class="tlt-span-jub">Numero de acesso</span>
                    <span class="cnt-span-jub"><?php echo $user_details['numberaccess_hw'];?></span>
                </div>

                <div class="oth_info unkw_stg_2">
                    <span class="tlt-span-jub">Email</span>
                    <span class="cnt-span-jub"><?php echo $user_details['email_hw'];?></span>
                </div>
            </div>

        </div>
        <div class="btns_inc_state">
            <ul class="esc_cnt">
                <li class="flet_itm"><a class="lk_btn_ril home-lk-ps" href="./index.php">Home</a></li>
                <li class="flet_itm"><a class="lk_btn_ril" href="index.php?indexConfiguration=passConf&confPages=newOfficcePage">New</a></li>
                <li class="flet_itm"><a class="lk_btn_ril" href="index.php?indexConfiguration=profile&confProfilePages=my_post">Post</a></li>
                <li class="flet_itm"><a class="lk_btn_ril" href="index.php?indexConfiguration=profile&confProfilePages=my_friend">Friend</a></li>
            </ul>
            <button type="button" class="flet-setting-btn" onclick="showFlet()">
                <span class="cnt-set-bool"></span>
                <span class="cnt-set-bool"></span>
                <span class="cnt-set-bool"></span>
            </button>
            <div class="block-flet">
                <button type="button" class="close-flet-block" onclick="closeFlet()"><span >X</span></button>
                <ul>
                    <li><a href="oth_conf/account_settings.php">Contas</a></li>
                    <li><a href="oth_conf/account_settings.php">Definicoes</a></li>
                    <li><a href="oth_conf/account_settings.php">Plataformas</a></li>
                    <li><a href="oth_conf/account_settings.php">Ficheiros</a></li>
                </ul>
            </div>
        </div>
        <div class="rec_inc_state">
            <?php
                switch(@$_REQUEST["confProfilePages"]) {

                    case 'my_friend':
                        include("user/friend/my_friends.php");
                    break;

                    case 'my_post':
                        include("user/posts/my_posts.php");
                    break;
            
                    default:
                        include("user/activity/show_activity.php");
                    break;
                }    
            ?>
        </div>
        <div class="cnt-btn-back">
            <button class="btn-back"><- Voltar</button>
        </div>
    </div>
    <script src="./static/scripts/profile.js"></script>
    <script src="./static/scripts/logout_time.js"></script>
</body>
</html>