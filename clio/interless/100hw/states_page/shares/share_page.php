
<style>
    .cll-espo-none {
        border-bottom: 2px solid #012259;
        padding: 10px 20px;
    }
    .in-cobb-info, .boll-cnt-child
    {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .in-cobb-info {
        justify-content: space-between;
    }

    .logo-info-shares
    {
        display: flex;
        align-items: center;
        gap: 5px;
        background-color: #000E25;
        border-radius: 5px;
        box-shadow: 1px 2px 1px #012259;
        margin-bottom: 10px;
        padding: 5px 20px;
    }

    .logo-info-shares span > img {
        font-size: 11px;
        width: 32px;
    }

    .name-logo {
        color: #ba83fd;
    }

    .cnt-espos-tlt {
        color: #9DB7E2;
    }

    .cnt-change-polo {
        border: 2px solid #BA83FD;
        border-radius: 4px;
        padding: 1px 3px;
    }

    .accor-body
    {
        padding: 10px;
    }

    .asless-btns-sco,
    .cnt-list-btn
    {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .cnt-list-btn {
        justify-content: space-between;
    }

    .btns-espos-change {
        background-color: #020E33;
        border: 1px solid #02255F;
        border-radius: 10px;
        display: block;
        padding: 5px 10px;
        position: relative;
        overflow: hidden;
    }

    .active-rag::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #012259;
        width: 100%;
        height: 7px;
    }
</style>

<div class="body-shares">
    <div class="header-share">
        <nav class="cnt-list-header">
            <ul class="espos cll-espo-none">
                <li class="in-cobb-info">
                    <ul class="boll-espos">
                        <li class="logo-info-shares">
                            <span>
                                <img src="states_page/gal/icon/logo.png" alt="logo interless">
                            </span>
                            <p class="name-logo">interless</p>
                        </li>
                        <li class="boll-cnt-child">
                            <p class="cnt-espos-tlt">Shares</p>
                            <p class="cnt-espos-tlt">-></p>
                            <p class="cnt-espos-tlt cnt-change-polo">
                                <?php

                                    switch (@$_REQUEST['indexSharesContent']) {

                                        case 'stores':
                                            echo"stores";
                                        break;

                                        case 'status':
                                            echo"status";
                                        break;

                                        case 'moreStatusUpload':
                                            echo"status+";
                                        break;

                                        default:
                                            echo "Reels";
                                        break;
                                    }

                                ?>
                            </p>
                        </li>
                    </ul>
                    <ul class="cnt-espos-tlt">
                        <?php if ($user_details['profile_image']): ?>
                            <img class="icon-sml-img" src="./conf_home/profile_conf/uploads/<?php echo $user_details['profile_image'];?>" alt="user icon">
                        <?php else: ?>
                            <img class="icon-sml-img" src="./static/midia/img/user.png" alt="user icon">
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <div class="accor-body">
         <?php 
            switch (@$_REQUEST['indexSharesContent']) {

                case 'stores':
                    include("stores/stores.php");
                break;

                case 'status':
                    include("status/status.php");
                break;

                case 'reels':
                    include("reels/reels.php");
                break;

                case 'moreStatusUpload':
                    include("status/upload_status.php");
                break;

                case 'moreReels':
                    include("reels/new_reels.php");
                break;

                default:
                    include("reels/reels.php");
                break;
            }
        ?>
    </div>
</div>