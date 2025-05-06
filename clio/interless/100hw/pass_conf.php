
<div>
    <?php
        switch(@$_REQUEST["confPages"]) {
            case 'newOfficcePage':
                include("conf_home/new_conf.php");
            break;
    
            case 'new_friend':
                include("user/friend/new_friend.php");
            break;
            case 'new_post':
                include("user/posts/new_post.php");
            break;
            case 'save_post':
                include("user/posts/save_post.php");
            break;
    
            case 'save_post_content':
                include("user/posts/save_post_content.php");
            break;
    
            case 'save_post_photo':
                include("user/posts/save_post_photo.php");
            break;
            case 'save_post_video':
                include("user/posts/save_post_video.php");
            break;
            case 'save_post_music':
                include("user/posts/save_post_music.php");
            break;
            case 'requestFiles':
                include("user/friend/requests.php");
            break;
            default:
                echo "";
        }
    
    ?>
    <?php
        switch(@$_REQUEST["attrPages"]) {
            case 'messages':
                include("store_fun/message.php");
            break;
    
            case 'calls':
                include("store_fun/calls.php");
            break;
            case 'business':
                include("store_fun/business.php");
            break;
    
            default: echo "";
        }
    
    ?>
</div>