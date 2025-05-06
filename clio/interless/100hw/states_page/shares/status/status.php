

<?php include("states_page/shares/inc_shares/btns_hd.php"); ?>
<?php
// CONFIGURAÇÃO: Tempo de expiração em segundos
$tempo_expiracao = 120; // 2 minutos = 120 segundos

$sql = "
    SELECT status.*, register_gch.username_hw
    FROM status
    JOIN register_gch ON status.user_id = register_gch.user_hw_id
    ORDER BY status.created_at DESC
";

$result = mysqli_query($conn_mof, $sql);

if (!$result) {
    die("Erro ao buscar status: " . mysqli_error($conn_mof));
}

// Variável para saber se exibiu algum status
$temStatus = false;
?>

<h2>Status Recentes</h2>

<?php while ($status = mysqli_fetch_assoc($result)): ?>
    <?php
        $createdAtTimestamp = strtotime($status['created_at']);
        $now = time();
        $expiraEm = $createdAtTimestamp + $tempo_expiracao;
        $tempoRestante = $expiraEm - $now;

        if ($tempoRestante <= 0) {
            continue; // já expirou, não mostra
        }

        $temStatus = true; // Marcar que tem pelo menos um status válido
    ?>

    <div id="status-container-<?= $status['id'] ?>" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; position: relative;">
        <strong>Postado por:</strong> <?= htmlspecialchars($status['username_hw']) ?><br>
        <strong>Tipo:</strong> <?= htmlspecialchars($status['content_type']) ?><br>
        <strong>Data:</strong> <?= htmlspecialchars($status['created_at']) ?><br><br>

        <?php if ($status['content_type'] == 'photo'): ?>
            <img src="<?= htmlspecialchars($status['file_path']) ?>" width="300">
        <?php elseif ($status['content_type'] == 'video'): ?>
            <video src="<?= htmlspecialchars($status['file_path']) ?>" width="300" controls></video>
        <?php elseif ($status['content_type'] == 'audio'): ?>
            <audio src="<?= htmlspecialchars($status['file_path']) ?>" controls></audio>
        <?php endif; ?>

        <!-- Contador regressivo formatado -->
        <div style="margin-top:10px; color: red; font-weight:bold;">
            Expira em: <span id="contador-<?= $status['id'] ?>"></span>
        </div>
    </div>

    <script>
        function formatarTempo(segundos) {
            const horas = Math.floor(segundos / 3600);
            const minutos = Math.floor((segundos % 3600) / 60);
            const segundosRestantes = segundos % 60;

            return (
                String(horas).padStart(2, '0') + ':' +
                String(minutos).padStart(2, '0') + ':' +
                String(segundosRestantes).padStart(2, '0')
            );
        }

        let tempoRestante<?= $status['id'] ?> = <?= $tempoRestante ?>;
        const contador<?= $status['id'] ?> = document.getElementById("contador-<?= $status['id'] ?>");
        const container<?= $status['id'] ?> = document.getElementById("status-container-<?= $status['id'] ?>");

        contador<?= $status['id'] ?>.innerText = formatarTempo(tempoRestante<?= $status['id'] ?>);

        const intervalo<?= $status['id'] ?> = setInterval(() => {
            tempoRestante<?= $status['id'] ?>--;

            if (tempoRestante<?= $status['id'] ?> <= 0) {
                clearInterval(intervalo<?= $status['id'] ?>);

                // Faz a requisição para deletar o status do banco
                fetch('states_page/shares/status/delete_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=<?= $status['id'] ?>'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        container<?= $status['id'] ?>.remove(); // Remove da tela se foi deletado
                    } else {
                        console.error('Erro ao apagar status:', data.error);
                    }
                })
                .catch(error => console.error('Erro na requisição:', error));

            } else {
                contador<?= $status['id'] ?>.innerText = formatarTempo(tempoRestante<?= $status['id'] ?>);
            }
        }, 1); // Atualiza cada 1 segundo
        </script>

<?php endwhile; ?>

<?php if (!$temStatus): ?>
    <p style="color: gray; font-style: italic;">Nenhum status encontrado.</p>
<?php endif; ?>

<!-- Botão para adicionar novo status -->
<a href="index.php?indexConfiguration=statetment_share&indexSharesContent=moreStatusUpload" class="btns-espos-change" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">+status</a>
