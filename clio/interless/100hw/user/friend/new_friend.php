
<style>

    .esc-arm-send-friend-request
    {
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0px 0px;
        overflow: hidden;

        font-family: poppis-light;
    }

    .sub-send-friend-request
    {
        background-color: #3334;
        border-radius: 5px;
        border: 1px solid #3337;
        box-shadow: .5px .3px 20px 2px #7772;
        padding: 10px;
        height: 90%;

        font-family: poppis-light;
        overflow: hidden;
    }

    .art-friend
    {
        background-color: #3332;
        padding: 5px;
        height: 500px;
        overflow-y: auto;
    }

    .cnt-my-friend-direction
    {
        border-bottom: 2px solid #444;
        margin: 10px 0px;
        padding-bottom: 10px;

        display: flex;
        align-items: center;
        gap: 5px;
    }

    .cnt-my-friend-direction a
    {
        display: block;
        border: 1px solid #444;
        border-radius: 5px;
        width: max-content;
        padding: 5px;
    }

    .cnt-input
    {
        border: 2px solid #444;
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80%;
        overflow: hidden;
        margin: 10px auto;
    }

    .input-search
    {
        background-color: #3332;
        padding: 5px 10px;
        width: 80%;
        font-size: 11.5pt;
    }

    .input-submit-search
    {
        border-right: 2px solid #333;
        background-color: #4443;
        background-image: url('./static/style/icon/search-icon-white-normal.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 25px 25px;
        width: 20%;
        padding: 5px;
    }

    .lt-til-font
    {
        padding: 5px 3px;
        margin: 20px 0px;
        font-size: 12pt;
        font-family: poppis-medium;
        font-weight: 100;
        position: relative;
        /* height: ; */
    }

    .lt-til-font::before
    {
        content: "";
        background-color: #444;
        width: 50px;
        height: 3px;
        position: absolute;
        left: 0; bottom: 0;
    }

    .esc-add-send-request
    {
        background-color: #152A38;
        /* background-color: #0A2647; */
        /* background-color: #2225; */
        border: 2px solid #4445;
        border-radius: 5px;
        box-shadow: .4px .2px 5px 1px #7772;

        width: 300px;
        margin: 10px auto;
        padding: 7px 5px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .info-send-request
    {
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* gap: 5px; */
        width: 95%;
    }

    .picture-send-request
    {
        display: block;
        border: 1px solid #444;
        border-radius: 100%;
        width: 50px;
        height: 50px;
    }

    .username-send-request
    {
        font-size: 12pt;
    }

    .info-details-send-request
    {
        display: flex;
        gap: 5px;
    }

    .cnt-oth-info-request-redirect
    {
        background-color: transparent;
        border: 1px solid #444;
        border-radius: 5px;
        display: block;
        padding: 2px 5px;
        width: max-content;

        font-family: poppis-light;
        font-size: 11pt;
    }

    .btns-submit-request
    {
        border: 1px solid #444;
        border-radius: 5px;
        text-align: center;
        width: 90px;
        margin-left: 10px;
        padding: 5px;
        position: relative;
    }

    .btn-cancelar
    {
        color: #021526;
        background-color: #AE445A;
    }

    .btn-remove
    {
        color: #0A2647;
        background-color: #FB773C59;
    }

    .btn-enviar
    {
        background-color: #0A2647;
    }

    .btn-details-to-remove
    {
        background-color: #332FD0;
    }
</style>



<div class="esc-arm-send-friend-request">
    <div class="sub-send-friend-request">
        <div class="cnt-act-hed">
            <?php include("conf_home/new_semi_conf/header_new_confing.php");?>
        </div>

        <div class="art-friend">

            <div class="cnt-my-friend-direction">
                <a href="index.php?indexConfiguration=profile&confProfilePages=my_friend&postPagesContentFriends=my_friends_accepted">Meus Amigos</a>
                <a href="index.php?indexConfiguration=passConf&confPages=newOfficcePage&confPages=newOfficcePage&newViewInfo=myRequestsFriends">Pedidos</a>
            </div>

            <form class="form-search-user" method="GET">
                <div class="cnt-input">
                    <input class="input-submit-search" type="button">
                    <input class="input-search" type="text">
                </div>
                <div id="result_find"></div>
            </form>

            <div class="my-find listed-users">
                <h3 class="lt-til-font">Talvez conhecidos</h3>
                <nav class="cnt-listed-user list-itm">
                    <?php
                        if ($result_register_user->num_rows > 0) {
                            while($row = $result_register_user->fetch_assoc()) {
                                // Verificar se o pedido de amizade já foi enviado
                                $sql_check = "SELECT * FROM friend_requests WHERE (sender_id='$user_id' AND receiver_id='" . $row['user_hw_id'] . "') OR (sender_id='" . $row['user_hw_id'] . "' AND receiver_id='$user_id')";
                                $result_check = $conn->query($sql_check);
                                $is_friend_accepted = isset($friends_accepted[$row['user_hw_id']]);
                                $is_request_sent = $result_check->num_rows > 0;



                                if ($is_request_sent || $is_friend_accepted) {
                                    // Se o pedido já foi enviado ou se é um amigo aceito
                                    if ($is_friend_accepted) {
                                        // Se é um amigo aceito, exibir mensagem personalizada
                                        echo "
                                            <ul class='esc-add-send-request'>
                                                <li class='info-send-request'>
                                                    <span class='picture-send-request'></span>
                                                    <span class='username-send-request'>" . htmlspecialchars($row['username_hw']) . "</span>
                                                    <span>
                                                        <form class='details-form' action='?confPages=newOfficcePage&newConfStates=detailsFriend' method='POST'>
                                                            <input type='hidden' name='user_id' value='" . htmlspecialchars($row['user_hw_id']) . "'>
                                                            <button class='btns-submit-request btn-details-to-remove' type='submit'>Detalhes</button>
                                                        </form>
                                                    </span>
                                                </li>
                                                <li class='info-details-send-request'>

                                                    <form method='post' action='pass_conf.php?confPages=new_friend'>
                                                        <input type='hidden' name='remove_request_id' value='" . htmlspecialchars($row['user_hw_id']) . "'>
                                                        <input class='cnt-oth-info-request-redirect btn-remove' type='submit' value='Remover'>
                                                    </form>
                                                    <span class='cnt-oth-info-request-redirect'>Posts</span>
                                                    <span class='cnt-oth-info-request-redirect'>Chat</span>
                                                </li>
                                            </ul>";
                                    } else {
                                        // Se o pedido já foi enviado, exibir como "Cancelar"
                                        echo "
                                            <ul class='esc-add-send-request'>
                                                <li class='info-send-request'>
                                                    <span class='picture-send-request'></span>
                                                    <span class='username-send-request'>" . htmlspecialchars($row['username_hw']) . "</span>
                                                    <form method='post' action='pass_conf.php?confPages=new_friend'>
                                                        <input type='hidden' name='remove_request_id' value='" . htmlspecialchars($row['user_hw_id']) . "'>
                                                        <input class='btns-submit-request btn-cancelar' type='submit' value='Cancelar'>
                                                    </form>
                                                </li>
                                                <li class='info-details-send-request'>
                                                    <span class='cnt-oth-info-request-redirect'>Posts</span>
                                                </li>
                                            </ul>";
                                    }
                                } else {
                                    // Se o pedido não foi enviado e não é um amigo aceito, exibir como "Enviar"
                                    echo "
                                        <ul class='esc-add-send-request'>
                                            <li class='info-send-request'>
                                                <span class='picture-send-request'></span>
                                                <span class='username-send-request'>" . htmlspecialchars($row['username_hw']) . "</span>
                                                <form method='post' action='pass_conf.php?confPages=new_friend'>
                                                    <input type='hidden' name='receiver_id' value='" . htmlspecialchars($row['user_hw_id']) . "'>
                                                    <input class='btns-submit-request btn-enviar' type='submit' value='Enviar'>
                                                </form>
                                            </li>
                                        </ul>";
                                }
                            



                                // if ($result_check->num_rows > 0) {
                                //     echo "
                                //         <ul class='esc-add-send-request'>
                                //             <li class='info-send-request'>
                                //                 <span class='picture-send-request'></span>
                                //                 <span class='username-send-request'>" . htmlspecialchars($row['username_hw']) . "</span>
                                //                 <form method='post' action='pass_conf.php?confPages=new_friend'>
                                //                     <input type='hidden' name='remove_request_id' value='" . htmlspecialchars($row['user_hw_id']) . "'>
                                //                     <input class='btns-submit-request btn-cancelar' type='submit' value='Cancelar'>
                                //                 </form>
                                //             </li>

                                //             <li class='info-details-send-request'>
                                //                 <span>
                                //                     <form class='details-form' action='?confPages=newOfficcePage&newConfStates=detailsFriend' method='POST'>
                                //                         <input type='hidden' name='user_id' value= value='" . htmlspecialchars($row['user_hw_id']) . "'>
                                //                         <button class='cnt-oth-info-request-redirect' type='submit'>Detalhes</button>
                                //                     </form>
                                //                 </span>
                                //                 <span class='cnt-oth-info-request-redirect'>Posts</span>
                                //                 <span class='cnt-oth-info-request-redirect'>Chat</span>
                                //             </li>
                                //         </ul>";
                                // } else {
                                //     echo "
                                //         <ul class='esc-add-send-request'>
                                //             <li class='info-send-request'>
                                //                 <span class='picture-send-request'></span>
                                //                 <span class='username-send-request'>" . $row['username_hw'] . "</span>
                                //                 <form method='post' action='pass_conf.php?confPages=new_friend'>
                                //                     <input type='hidden' name='receiver_id' value='" . $row['user_hw_id'] . "'>
                                //                     <input class='btns-submit-request btn-enviar' type='submit' value='Enviar'>
                                //                 </form>
                                //             </li>

                                //             <li class='info-details-send-request'>
                                //                 <span class='cnt-oth-info-request-redirect'>Detalhes</span>
                                //                 <span class='cnt-oth-info-request-redirect'>Posts</span>
                                //                 <span class='cnt-oth-info-request-redirect'>Chat</span>
                                //             </li>
                                //         </ul>";
                                // }
                            }
                        } else {
                            echo "<li>Nenhum usuário encontrado.</li>";
                        }
                    ?>
                </nav>
            </div>
        </div>
    </div>
</div>