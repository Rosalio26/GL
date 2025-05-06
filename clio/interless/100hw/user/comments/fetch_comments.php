<?php
    // Verifica se a função já foi declarada
    if (!function_exists('display_comments')) {
        // Função recursiva para exibir comentários e respostas
        function display_comments($parent_id, $conn) {
            $sql_replay_comment = "SELECT * FROM comments WHERE parent_id = ? ORDER BY created_at ASC";
            $stmt_replay_comment = $conn->prepare($sql_replay_comment);
            $stmt_replay_comment->bind_param("i", $parent_id);
            $stmt_replay_comment->execute();
            $result_replay_comment = $stmt_replay_comment->get_result();

            if ($result_replay_comment->num_rows > 0) {
                while($row = $result_replay_comment->fetch_assoc()) {
                    // Obtém os detalhes do usuário a partir do user_id
                    $user_detail = get_username($row['user_id'], $conn);
                    $username = htmlspecialchars($user_detail['username_hw']);

                    // $username = isset($row['username_hw']) ? htmlspecialchars($row['username_hw']) : 'Anônimo';

                    echo "<div class='comment'>
                            <div class='cnt-info-bs-comment'>
                                <div class='cnt-user-comment-info'>
                                    <p id='sub-image-picture' class='cnt-image-picture'><img src='' alt='...'></p>
                                    <p id='sub-cnt-username' class='cnt-username'>" . htmlspecialchars($username) . "</p>
                                </div>
                                <div class='comment_replays'>
                                    <div class='cnt-to-more'>
                                        <p>" . htmlspecialchars($row['comment_post']) . "</p>
                                    </div>
                                    <button class='reply-btn response_replay' onclick='openReplyModal(" . $row['id_comment'] . ", \"" . $username . "\")')'>
                                        <img src='static/style/icon/arrow-curse-right.png' alt='...'>
                                    </button>



                                    
                                    <form method='POST' action='?pagesCenter=like_comment' class='like-btn reply-btn'>
                                        <input type='hidden' name='comment_id' value='" . $row['id_comment'] . "'>
                                        <button type='submit' style='background: transparent;'>
                                            <img src='static/style/icon/coracao.png' alt='...'>
                                            <span class='ls-count' id='like-count-" . $row['id_comment'] . "'>" . get_like_count($row['id_comment'], $conn) . "</span>
                                        </button>
                                    </form>

                                    <form action='?pagesCenter=share_comment' method='POST' class='share-btn reply-btn'>
                                        <input type='hidden' name='comment_id' value='" . $row['id_comment'] . "'>
                                        <button type='submit' style='background: transparent;'>
                                            <img src='static/style/icon/seta-para-baixo-direita.png' alt='...'>
                                            <span class='ls-count' id='share-count-" . $row['id_comment'] . "'>" . get_share_count($row['id_comment'], $conn) . "</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class='replies'>";
                                display_comments($row['id_comment'], $conn);
                    echo "  </div>
                        </div>";
                }
            }

            $stmt_replay_comment->close();
        }
    }

    // Seleciona os comentários do post
    $post_id = $post['id_post'];
    $sql = "SELECT * FROM comments WHERE post_id = ? AND parent_id IS NULL ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Obtém os detalhes do usuário a partir do user_id
            $user_detail = get_username($row['user_id'], $conn);
            $username = htmlspecialchars($user_detail['username_hw']);
            
            echo "<div class='comment comment-fr-pls'>
                    <div class='cnt-info-bs-comment'>
                        <div class='cnt-user-comment-info'>
                            <p class='cnt-image-picture'><img src='' alt='...'></p>
                            <p class='cnt-username'>" . htmlspecialchars($username) . "</p>
                        </div>
                        <div class='comment_replay'>
                            <div class='cnt-to-more'>
                                <p>" . htmlspecialchars($row['comment_post']) . "</p>
                                <p class='more-btn-toogle'>
                                    <span class='bool-sml-inc'></span>
                                    <span class='bool-sml-inc'></span>
                                    <span class='bool-sml-inc'></span>
                                </p>
                            </div>
                            <button class='reply-btn response_replay' onclick='openReplyModal(" . $row['id_comment'] . ", \"" . $username . "\")'))'>
                                <img src='static/style/icon/replay-2.png' alt='...'>
                            </button>

                            <form method='POST' action='?pagesCenter=like_comment' class='like-btn reply-btn'>
                                <input type='hidden' name='comment_id' value='" . $row['id_comment'] . "'>
                                <button type='submit' style='background: transparent;'>
                                    <img src='static/style/icon/coracao.png' alt='...'>
                                    <span class='ls-count' id='like-count-" . $row['id_comment'] . "'>" . get_like_count($row['id_comment'], $conn) . "</span>
                                </button>
                            </form>
                            
                            <form action='?pagesCenter=share_comment' method='POST' class='share-btn reply-btn'>
                                <input type='hidden' name='comment_id' value='" . $row['id_comment'] . "'>
                                <button type='submit' style='background: transparent;'>
                                    <img src='static/style/icon/seta-para-baixo-direita.png' alt='...'>
                                    <span class='ls-count' id='share-count-" . $row['id_comment'] . "'>" . get_share_count($row['id_comment'], $conn) . "</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class='replies'>";
                        display_comments($row['id_comment'], $conn);
            echo "  </div>
                </div>";
        }
    } else {
        echo "<p>Sem comentários ainda.</p>";
    }

    $stmt->close();
?>


<div id="replyModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeReplyModal()">&times;</span>
        <h2>Responder a <span id="reply_to_username"></span></h2>
        <form class='reply-form' action='?pagesCenter=send_comment' method='POST'>
            <textarea class='textarea-comment' name='comment_post'></textarea>
            <input type="hidden" name="post_id" value="<?php echo $post['id_post']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <input type='hidden' id="parent_id" name='parent_id' value="">
            <input class='sub-comm-btn' type='submit' value='Responder'>
        </form>
    </div>
</div>

<script>
    
    function openReplyModal(commentId, username_hw) {
    document.getElementById('parent_id').value = commentId;
    document.getElementById('reply_to_username').innerText = username_hw;
    document.getElementById('replyModal').style.display = "block";
    }

    function closeReplyModal() {
        document.getElementById('replyModal').style.display = "none";
    }

//     function likeComment(commentId) {
//     fetch('?pagesCenter=like_comment', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: 'comment_id=' + commentId
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.status === 'error') {
//             alert(data.message);
//         } else {
//             console.log(data.message);
//             // Atualize a interface do usuário conforme necessário
//         }
//     });
// }


// function likeComment(commentId) {
//     fetch('?pagesCenter=like_comment', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: 'comment_id=' + commentId
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data);
//         // Atualize a interface do usuário conforme necessário
//     });
// }




// function shareComment(commentId) {
//     fetch('?pagesCenter=share_comment', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: 'comment_id=' + commentId
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data);
//         // Atualize a interface do usuário conforme necessário
//     });
// }
</script>