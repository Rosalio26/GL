
<button type="button" id="btn-tgg" class="toggle-btn btn-lef-tgg">-></button>
<div class="cent-cnt">
    <div>
    </div>
    <?php
        switch(@$_REQUEST["pagesCenter"]){
            case "mensagem":
                include("store_fun/message.php");
            break;
            case "chamadas":
                include("store_fun/calls.php");
            break;
            case "business":
                include("store_fun/business.php");
            break;
            case "platform":
                include("store_fun/platform.php");
            break;
            case "ficheiros":
                include("store_fun/ficheiros.php");
            break;
            case "settings":
                include("store_fun/settings.html");
            break;

            case "send_comment":
                include("user/comments/send_comment.php");
            break;

            case "share_comment":
                include("user/comments/share_comment.php");
            break;
            case "like_comment":
                include("user/comments/like_comment.php");
            break;

            default:
                include("./user/posts/post_of_friends.php");
        }
    ?>
</div>