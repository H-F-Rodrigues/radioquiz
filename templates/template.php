<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radioquiz — Química Farmacêutica</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/atom.png" type="image/x-icon">
</head>
<body>
    <h1>Radioquiz</h1>

    <?php
        // Snapshot exposto para o polling do front-end (apenas leitura, sem alterar lógica)
        $players_sorted = $GLOBALS['players'];
        usort($players_sorted, function($a, $b) {
            return strtotime($a['joined_at']) - strtotime($b['joined_at']);
        });
        $players_with_index = [];
        $idx = 1;
        foreach ($players_sorted as $p) {
            $players_with_index[] = [
                'id'       => (int)$p['id'],
                'nickname' => $p['nickname'],
                'score'    => (int)$p['score'],
                'state' => $p['state'],
                'index'    => $idx++,
            ];
        }

        $__snapshot = [
            'status'        => $gameState['status'] ?? 'waiting',
            'reset_counter' => $gameState['reset_counter'] ?? 1,
            'players'       => $players_with_index,
        ];
        ?>
        <script id="quiz-snapshot" type="application/json"><?= json_encode($__snapshot, JSON_UNESCAPED_UNICODE) ?></script>

        <?php if (isset($_SESSION['admin'])): ?>
            <?php require 'admin/menu.php'; ?>
        <?php else: ?>
            <?php require 'user/menu.php'; ?>
        <?php endif; ?>

        <script src="js/quiz.js" defer></script>
        </body>
        </html>
