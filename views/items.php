<div class="items-container">

    <form action="index.php" method="get">

        <input type="hidden" name="route" value="items.search">
        <input type="text" name="search" id="search" placeholder="Votre recherche...">

        <button type="submit">Rechercher</button>
    </form>

    <div class="h2">
        <h2>Tickets en cours</h2>
    </div>

    <div class="link-container">
         <button class="link"><a href="index.php?route=items.create">Ajouter un ticket</a></button>
    </div>
   

    <div class="items-columns-container">
        
        <div class="column column-todo dropzone" data-status="todo">
            <h3>A faire (todo)</h3>
            <div class="card-container">
                <?php if (empty($todo)): ?>
                    <p>Aucun item pour ce statut.</p>
                <?php else: ?>
                    <?php foreach ($todo as $item): ?>
                        <div class="card" draggable="true" data-id="<?= $item['id'] ?>">
                            <div class="card-details">
                                <p class="card-title">
                                    <?= htmlspecialchars($item['title']) ?>
                                </p>

                                <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>

                                <div class="create-detail">
                                    <?= htmlspecialchars($item['created_at']) ?>
                                </div>

                                <div class="card-status">
                                    <p><?= htmlspecialchars($item['status']) ?></p>
                                </div>

                                <a class="card-update" href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                                <a class="card-delete" href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                                <form action="index.php" method="post">
                                    <input type="hidden" name="route" value="items.updateStatus">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">

                                    <select name="status">
                                        <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
                                        <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
                                        <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
                                    </select>
                                    <button type="submit">valider</button>
                                </form>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>

        <div class="column column-inprogress dropzone" data-status="inprogress">
            <h3>En cours (in progress)</h3>
            <div class="card-container">
                <?php if (empty($inprogress)): ?>
                    <p>Aucun item pour ce statut.</p>
                <?php else: ?>
                    <?php foreach ($inprogress as $item): ?>
                        <div class="card" draggable="true" data-id="<?= $item['id'] ?>">
                            <div class="card-details">
                                <p class="card-title">
                                    <?= htmlspecialchars($item['title']) ?>
                                </p>

                                <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>

                                <div class="create-detail">
                                    <?= htmlspecialchars($item['created_at']) ?>
                                </div>

                                <div class="card-status">
                                    <p><?= htmlspecialchars($item['status']) ?></p>
                                </div>

                                <a class="card-update" href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                                <a class="card-delete" href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                                <form action="index.php" method="post">
                                    <input type="hidden" name="route" value="items.updateStatus">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <select name="status">
                                        <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
                                        <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
                                        <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
                                    </select>
                                    <button type="submit">valider</button>
                                </form>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="column column-done dropzone" data-status="done">
            <h3>Terminé (done)</h3>
            <div class="card-container">
                <?php if (empty($done)): ?>
                    <p>Aucun item pour ce statut.</p>
                <?php else: ?>
                    <?php foreach ($done as $item): ?>
                        <div class="card" draggable="true" data-id="<?= $item['id'] ?>">
                            <div class="card-details">
                                <p class="card-title">
                                    <?= htmlspecialchars($item['title']) ?>
                                </p>

                                <div class="rendered" data-md="<?= htmlspecialchars($item['content'], ENT_QUOTES) ?>"></div>

                                <div class="create-detail">
                                    <?= htmlspecialchars($item['created_at']) ?>
                                </div>

                                <div class="card-status">
                                    <p><?= htmlspecialchars($item['status']) ?></p>
                                </div>

                                <a class="card-update" href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                                <a class="card-delete" href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                                <form action="index.php" method="post">
                                    <input type="hidden" name="route" value="items.updateStatus">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <select name="status">
                                        <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
                                        <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
                                        <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
                                    </select>
                                    <button type="submit">valider</button>
                                </form>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>