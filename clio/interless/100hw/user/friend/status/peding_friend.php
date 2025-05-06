
<h2 class="tlt-post">Pendetes</h2>

<ul>
    <?php
    if ($result_pending_friend->num_rows > 0) {
        while($row = $result_pending_friend->fetch_assoc()) {
            echo "<li>" . $row['username_hw'] . " (" . $row['email_hw'] . ")</li>";
        }
    } else {
        echo "<li>Nenhum pedido de amizade pendente.</li>";
    }
    ?>
    </ul>