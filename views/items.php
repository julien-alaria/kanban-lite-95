<div class="items-container">
    <form action="index.php" method="get" class="form2">
        <input type="hidden" name="route" value="items.search">
        <input type="text" name="search" id="search" placeholder="Votre recherche...">

        <button type="submit">Rechercher</button>
    </form>

    <div class="h2">
        <h2>Tickets en cours</h2>
    </div>

    <button class="link"><a href="index.php?route=items.create">Ajouter une ticket</a></button>

    <div class="card-container">
       
        <?php foreach ($items as $item): ?>
            <div class="card">
                <div class="card-details">
                    <p class="card-title"><?= htmlspecialchars($item['title']) ?></p>

                    <p>
                        <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>
                    </p>

                    <div class="create-detail">
                        <small><?= htmlspecialchars($item['created_at']) ?></small>
                    </div>

                    <div class="card_status">
                        <p><?= htmlspecialchars($item['statuts'])?></p>
                    </div>

                    <a class="card-update" href="index.php?route=items.update&id=<?= ($item['id']) ?>">Modifier</a>

                    <a class="card-delete" href="index.php?route=items.delete&id=<?= ($item['id']) ?>">Supprimer</a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="link"><a href="index.php?route=items.kanban">Affichage Kanban</a></button>

</div>
