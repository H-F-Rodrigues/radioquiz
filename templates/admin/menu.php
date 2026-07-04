<?php
$gameState = get_game_state();
$status = $gameState['status'];
?>

<section>
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <h2 style="margin:0;">Painel do Admin</h2>
        <a href="index.php?admin=out" class="button" style="background-color: #6B7785; box-shadow: none;">🚪 Sair (Admin)</a>
    </div>
    <?php if ($status === 'waiting'): ?>
        <div class="qr-code-wrapper">
            <img class="qr-code" src="img/qr-code.svg" alt="qr code do quiz">
        </div>
        <p class="status-line">⏳ Quiz aguardando início.</p>
        <a href="index.php?admin_action=start" class="button">▶️ Iniciar Quiz</a>
    <?php elseif ($status === 'active'): ?>
        <p class="status-line">🎮 Quiz em andamento.</p>
        <a href="index.php?admin_action=finish" class="button">⏹️ Finalizar Quiz</a>
    <?php elseif ($status === 'finished'): ?>
        <p class="status-line">🏁 Quiz finalizado. Os jogadores não podem mais responder.</p>
        <a href="index.php?reset=true" class="button danger">🔄 Resetar Quiz</a>
    <?php endif; ?>

    <hr>

    <?php if ($status === 'active' || $status === 'finished'): ?>
        <h3>Pontuações atuais</h3>
        <?php require 'templates/admin/placar.php'; ?>
    <?php else: ?>
        <h3>Jogadores cadastrados (<span id="players-count"><?= count($GLOBALS['players']) ?></span>)</h3>
        <div id="players-wrap" class="players">
            <?php
            // Ordena os jogadores pela data de entrada e atribui índice sequencial
            $player_list = $GLOBALS['players'];
            usort($player_list, function($a, $b) {
                return strtotime($a['joined_at']) - strtotime($b['joined_at']);
            });
            $index = 1;
            foreach ($player_list as $p):
            ?>
                <div class="player">
                    <p class="id"><?= $index++ ?></p>
                    <p class="nickname"><?= htmlspecialchars($p['nickname']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>