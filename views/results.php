<?php $search = $search ?? ''; ?>

<div class="result-container">
    <div class="result_title">
        <h2>Résultat de la recherche pour : "<?php echo htmlspecialchars($search); ?></h2>
    </div>

    <div class="search-result">
        <?php if (empty($items)): ?>
            <p>Aucun ticket en cours</p>
        <?php else : ?>
            <ul>
                <?php foreach ($items as $item): ?>
                    <li>
                        <strong><?= htmlspecialchars($item['title']); ?></strong>
                        <?= htmlspecialchars($item['content']); ?><br>
                        <small>Créée le <?= $item['created_at']; ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <button class="link"><a href="index.php?route=items.index">Retour à la liste complète</a></button>
</div>