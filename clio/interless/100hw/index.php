
<?php
    include("conf/post_friend_processes.php");
    include("user/comments/get_comment.php");
    include("user/activity/conf_act.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 100 || Height-Weight || HomePage</title>
    <link rel="icon" href="./static/midia/favicon/100.png" type="image/x-icon">
    <link rel="stylesheet" href="static/style/100hw.css">
    <link rel="stylesheet" href="static/style/geral_store_fun.css">
</head>
<body id="body-home-hw-user" class="body-home-hw-user body-gr">
    <div class="esc-inc-cnt">
        <?php 
            switch (@$_REQUEST['indexConfiguration']) {

                case 'uploadPictureProfile':
                    include("conf_home/profile_conf/upload_image.php");
                break;

                case 'profile':
                    include("profile.php");
                break;

                case 'passConf':
                    include("pass_conf.php");
                break;

                case 'statetment_live':
                    include("states_page/public/live_page.php");
                break;

                case 'statetment_share':
                    include("states_page/shares/share_page.php");
                break;

                case 'statetment_mode':
                    include("states_page/mode_page.php");
                break;
                
                default:
                    
                    echo "<div class='cnt-fles-itm'> ";
                        echo "<div class='cnt-esc-lef'>";
                            include('conf_home/home-lef.php');
                        echo"</div>";
                        echo "<div class='cnt-esc-cet'>";
                            include('conf_home/home-cet.php');
                        echo "</div>";
                    echo "</div>";
                break;
            }
        ?>
    </div>
    <script defer src="./static/scripts/hw.js"></script>
    <script defer src="./static/scripts/logout_time.js"></script>
</body>
</html>
