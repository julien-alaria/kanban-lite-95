<?php $search = $search ?? ''; ?>

<div class="result-container">

    <div class="result-title">
        <h2>Résultat de la recherche pour : "<?php echo htmlspecialchars($search); ?>"</h2>
    </div>

    <div class="search-result">
        <?php if (empty($items)): ?>
        <p>Aucun ticket en cours</p>
        <?php else : ?>
            <ul>
                <?php foreach ($items as $item): ?>
                    <li>
                        <strong class="title-result"><?= htmlspecialchars($item['title']); ?></strong>

                        <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>">
                        </div>
                        <small class="created-result">Créée le <?= $item['created_at']; ?></small>

                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <a href="index.php?route=items.index" class="link" >Retour à la liste complète</a>
</div>
<div class="spacer-fill-height"></div> 

