<?php
// Ordenação apenas para exibição (não altera dados/lógica do back-end)
$__placar = $GLOBALS['players'];
usort($__placar, function ($a, $b) {
    return (int)$b['score'] - (int)$a['score'];
});
?>
<div class="tabela-wrapper">
    <table>
        <thead>
            <tr>
                <th>Nickname</th>
                <th>Pontuação</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody id="admin-placar-body">
            <?php foreach ($__placar as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['nickname']) ?></td>
                    <td><?= (int)$p['score'] ?></td>
                    <td><?= htmlspecialchars($p['state']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
