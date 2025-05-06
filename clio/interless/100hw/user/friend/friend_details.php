
<div class="header-view-details-friend">
    <div class="img-view-details-friend"></div>
    <ul class="cnt-oth-conf">
        <li class="cnt-username-friend"><?php echo $user_details['username_hw']; ?></li>
        <li class="cnt-act-conf">
            <ul class="hold-act-conf">
                <li class="act-itm">
                    <form method="post" action="delete_friend.php">
                        <input type="hidden" name="user_id" value="<?php echo $userr_details['user_hw_id']; ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </li>
                <li class="act-itm">
                    <form method="post" action="delete_friend.php">
                        <input type="hidden" name="user_id" value="<?php echo $userr_details['user_hw_id']; ?>">
                        <input type="submit" value="Mensagem">
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>