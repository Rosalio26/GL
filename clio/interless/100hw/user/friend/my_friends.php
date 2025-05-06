
<div class="my-col-post">
	<div class="cnt_new_not">
		<form class="find_friend">
			<button class="bnt-sub-icons-back">
				<img class="img-icon" src="../static/style/icon/search-icon-white-666.png" alt="Lumpa Icon">
			</button>
			<input type="text" name="">
		</form>
	</div>
	
    <div class="cnt_new_post">
        <a class="lk_btn_nw" href="index.php?indexConfiguration=passConf&confPages=new_post">New</a>
    </div>

	<nav class="nav-post cnt-post-itm">
		<ul class="cnt-itm-post">
			<li class="inv-itm-link"><a class="itm-link-ven" href="index.php?indexConfiguration=profile&confProfilePages=my_friend&postPagesContentFriends=my_friends_accepted">Amigos</a></li>
			<li class="inv-itm-link"><a class="itm-link-ven" href="index.php?indexConfiguration=profile&confProfilePages=my_friend&postPagesContentFriends=my_friends_pedding">pedentes</a></li>
			<li class="inv-itm-link"><a class="itm-link-ven" href="index.php?indexConfiguration=profile&confProfilePages=my_friend&postPagesContentFriends=my_friends_accepted">Aceitos</a></li>
			<li class="inv-itm-link"><a class="itm-link-ven" href="index.php?indexConfiguration=profile&confProfilePages=my_friend&postPagesContentFriends=my_friends_rejected">Recusados</a></li>
		</ul>
	</nav>

	<div>
		<?php
            switch (@$_REQUEST["postPagesContentFriends"]) {

                case 'my_friends_accepted':
                    include('user/friend/status/accepted_friend.php');
                    break;

                case 'my_friends_pedding':
                    include('user/friend/status/peding_friend.php');
                    break;

                case 'my_friends_rejected':
                    include('user/friend/status/rejected_friend.php');
                    break;

                default:
                    include('user/friend/status/accepted_friend.php');
                    break;
            }
        ?>
	</div>
</div>