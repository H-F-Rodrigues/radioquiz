<div class="question" id="quiz-question">
    <p>Pergunta <strong><?= (int)$q ?></strong> de 10</p>
    <h2><?= htmlspecialchars($pergunta['pergunta']) ?></h2>
    <div class="alternatives">
        <?php foreach ($pergunta['alternativas'] as $letra => $texto): ?>
            <a href="index.php?answer=<?= urlencode($letra) ?>">
                <strong><?= htmlspecialchars($letra) ?></strong><?= htmlspecialchars($texto) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
