
<style>
    .asc-dbt-conf
    { 
        position: relative;
        width: 98%;
        height: 82vh;
        margin: 0px auto;
        overflow-y: auto;
    }

</style>

<div class="accs-emr">
    <div class="user-info">
        <div id="cnt-image-inf" class="item-cnt-lef cnt-lef-username">
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
        <ul class="cnt-uss">
            <li><?php echo htmlspecialchars($user_details['personalname_hw']);?></li>
            <li class="ing-uss">
                <?php echo $_SESSION['email_hw'];?>
                -
                <?php echo htmlspecialchars($user_details['numberaccess_hw']); ?>
            </li>
        </ul>
    </div>
    
    <div class="asc-dbt-conf">
        <div class="cnt-new-asp" id="asp-new">
            <h2>New</h2>
            <div class="new-itm">
                <div class="post-friend friend">
                    <a class="lk-oct" href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=new_friend"><img src="./static/style/icon/add-user.png"> Friend</a>
                </div>
                <div class="post-friend post">
                    <a class="lk-oct" href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=new_post"><img src="./static/style/icon/postagem.png"> Post</a>
                </div>
            </div>
        </div>
        <div class="adv-oth">
            <div class="cnt-links-new-set">
                <div class="add-conf-link">
                    <a href="index.php"><img src="./static/style/icon/user.png" alt="..."> Home</a>
                    <a href="index.php?indexConfiguration=profile"><img src="./static/style/icon/user.png"> Profile</a>
                    <a href=""><img src="./static/style/icon/chat.png"> Chat</a>
                </div>
                <div class="cnt-asc-temp-link">
                    <a href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=newOfficcePage&newViewInfo=myAllPosts" class="link-new">
                        <img src="./static/style/icon/post-it-1.png"> Meus Postes</a>
    
                    <a href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=newOfficcePage&newViewInfo=myAllFriends" class="link-new">
                        <img src="./static/style/icon/friends.png">Meus Amigos</a>
    
                    <a href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=newOfficcePage&newViewInfo=myRequestsFriends" class="link-new">
                        <img src="./static/style/icon/mail.png">Pedidos de amizade</a>
                </div>
            </div>
            <div class="cnt-link-request">
                <?php
                    switch (@$_REQUEST["newViewInfo"]) {
                        case "myAllPosts":
                            include("user/posts/allposts.php");
                            break;
    
                        case "myAllFriends":
                            include("user/friend/status/accepted_friend.php");
                            break;
    
                            case "myRequestsFriends":
                            include("user/friend/requests.php");
                            break;
    
                        default:
                        include("user/friend/status/accepted_friend.php");
                            break;
                    }
                ?>
            </div>
        </div>
    </div>
</div>