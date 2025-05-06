
<style>
</style>

<div id="provisouly-new-header" class="cnt-links-new-set">
    <div class="add-conf-link">
        <a href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=newOfficcePage"><img src="./static/style/icon/close.png" alt="..."> Fechar</a>
        <a href="index.php"><img src="./static/style/icon/user.png" alt="..."> Home</a>
        <a href="index.php?indexConfiguration=profile"><img src="./static/style/icon/user.png"> Profile</a>
    </div>

    <div class="user-info">
        <ul class="cnt-uss">
            <li class="adan-li-previu"><?php echo $user_details['personalname_hw'];?></li>
            <li class="ing-uss">
                <?php echo $user_details['email_hw'];?>
                -
                <?php echo $user_details['numberaccess_hw']; ?>
            </li>
        </ul>
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
    </div>
</div>