<div class="items-columns-container" style="display: flex; gap: 20px;">

    <!-- Colonne TODO -->
    <div class="column column-todo" style="flex:1;">
        <h3>À faire (todo)</h3>
        <?php if (empty($todo)): ?>
            <p>Aucun item pour ce statut.</p>
        <?php else: ?>
            <?php foreach ($todo as $item): ?>
                <div class="card">

                    <h4>
                        <?= htmlspecialchars($item['title']) ?>
                    </h4>

                    <p>
                        <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>
                    </p>

                    <small>
                        <?= htmlspecialchars($item['created_at']) ?>
                    </small>

                    <a href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                    <a href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Colonne INPROGRESS -->
    <div class="column column-inprogress" style="flex:1;">
        <h3>En cours (inprogress)</h3>
        <?php if (empty($inprogress)): ?>
            <p>Aucun item pour ce statut.</p>
        <?php else: ?>
            <?php foreach ($inprogress as $item): ?>
                <div class="card">

                    <h4>
                        <?= htmlspecialchars($item['title']) ?>
                    </h4>

                    <p>
                        <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>
                    </p>

                    <small>
                        <?= htmlspecialchars($item['created_at']) ?>
                    </small>

                    <a href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                    <a href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Colonne FINISHED -->
    <div class="column column-finished" style="flex:1;">
        <h3>Terminé (finished)</h3>
        <?php if (empty($finished)): ?>
            <p>Aucun item pour ce statut.</p>
        <?php else: ?>
            <?php foreach ($finished as $item): ?>
                <div class="card">

                    <h4>
                        <?= htmlspecialchars($item['title']) ?>
                    </h4>

                    <p>
                        <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>
                    </p>

                    <small>
                        <?= htmlspecialchars($item['created_at']) ?>
                    </small>

                    <a href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                    <a href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="link-button">
    <button class="link"><a href="index.php?route=items.index">Retour à la liste complète</a></button>
</div>
