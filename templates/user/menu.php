<?php
$gameState = get_game_state();
$status = $gameState['status'];
?>

<?php if (!isset($_SESSION['player'])): ?>
    <form method="POST">
        <h2>Entre na sala</h2>
        <label for="username">Seu nickname</label>
        <input type="text" name="username" id="username" placeholder="Ex: MARIA" required>
        <button type="submit">Vamos Lá!</button>
    </form>
<?php else: ?>
    <section>
        <?php if ($status === 'waiting'): ?>
            <h2>⏳ Aguardando o host iniciar o quiz…</h2>
            <p class="status-line">Você está logado como: <strong><?= htmlspecialchars($_SESSION['player']['nickname']) ?></strong></p>
        <?php elseif ($status === 'finished'): ?>
            <h2>🏁 O quiz foi finalizado</h2>
            <p class="status-line">Sua pontuação final: <strong><?= (int)$_SESSION['player']['score'] ?></strong> pontos</p>
            <hr>
            <h3>Placar final</h3>
            <?php $GLOBALS['players'] = $GLOBALS['players']; require 'templates/admin/placar.php'; ?>
        <?php elseif ($status === 'active'): ?>
            <?php if (!$_SESSION['player']['finished']): ?>
                <?php
                    $q = $_SESSION['player']['current_question'];
                    $pergunta = $GLOBALS['perguntas_quiz'][$q - 1];
                ?>
                <?php require 'templates/user/quiz.php'; ?>
            <?php else: ?>
                <h2>🏁 Parabéns, <?= htmlspecialchars($_SESSION['player']['nickname']) ?>!</h2>
                <p class="status-line">Você finalizou o quiz. Pontuação final: <strong><?= (int)$_SESSION['player']['score'] ?></strong></p>
                <p class="status-line">Você acertou <?= (int)$_SESSION['player']['score']/1000?>/10</p>
                <?php
                    $playerId = $_SESSION['player']['id'];
                    $answers = [];
                    $stmt = $conection->prepare("SELECT question_order, selected_option FROM answers WHERE player_id = ? ORDER BY question_order ASC");
                    $stmt->bind_param("i", $playerId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $answers[(int)$row['question_order']] = $row['selected_option'];
                    }
                    $stmt->close();
                ?>
                <div class="tabela-wrapper">
                    <table class="tabela-respostas">
                        <thead>
                            <tr>
                                <th class="col-num">#</th>
                                <th>Sua Resposta</th>
                                <th>Resposta Correta</th>
                            </tr>
                        </thead>
                        <tbody id="user-placar-body">
                            <?php foreach ($perguntas_quiz as $pkey => $p): ?>
                                <?php
                                    $questionIndex = $pkey + 1;
                                    $selectedOption = $answers[$questionIndex] ?? null;
                                    $correctOption = $p['correta'];
                                    $isCorrect = $selectedOption === $correctOption;
                                    $selectedLabel = $selectedOption ? ($selectedOption . ' — ' . $p['alternativas'][$selectedOption]) : 'Sem resposta';
                                    $correctLabel = $correctOption . ' — ' . $p['alternativas'][$correctOption];
                                ?>
                                <tr class="<?= $isCorrect ? 'row-correct' : 'row-wrong' ?>">
                                    <td class="col-num" data-label="#"><?= $questionIndex ?></td>
                                    <td data-label="Sua Resposta"><?= htmlspecialchars($selectedLabel) ?></td>
                                    <td data-label="Resposta Correta"><?= htmlspecialchars($correctLabel) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <?php if (!isset($_SESSION['player']['state_recorded'])): ?>
                    <?php finish_user_quiz($conection); ?>
                    <?php $_SESSION['player']['state_recorded'] = true; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </section>
<?php endif; ?>
