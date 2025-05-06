
<h2 class="tlt-post">Rejetados</h2>

<ul>
    <?php
    if ($result_rejected_friend->num_rows > 0) {
        while($row = $result_rejected_friend->fetch_assoc()) {
            echo "<li>" . $row['username_hw'] . " (" . $row['email_hw'] . ")</li>";
        }
    } else {
        echo "<li>Nenhum pedido de amizade rejeitado.</li>";
    }
    ?>
</ul>