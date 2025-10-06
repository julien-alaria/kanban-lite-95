<div class="items-container">

    <div class="search-container">

        <form action="index.php" method="get">

            <input type="hidden" name="route" value="items.search">
            <input type="text" name="search" id="search" placeholder="Votre recherche...">

            <button type="submit">Rechercher</button>

        </form>

    </div>
   
    <div class="h2">
        <h2>Tickets en cours</h2>
    </div>

    <div class="link-add">
        <a href="index.php?route=items.create" class="link">Ajouter un ticket</a>
    </div>
    
    <div class="items-columns-container">
        
        <div class="column column-todo dropzone" data-status="todo">
            <div class="column-title">
                <h3>A faire (todo)</h3>
            </div>
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
                                    <p>Crée le : <?= htmlspecialchars($item['created_at']) ?></p>
                                </div>

                                <div class="card-status">
                                    <p>Statut : <?= htmlspecialchars($item['status']) ?></p>
                                </div>

                                <div class="card-buttons">

                                    <a class="card-update" href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                                    <a class="card-delete" href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                                </div>
                               
                                <form action="index.php" method="post" class="card-select">
                                    <input type="hidden" name="route" value="items.updateStatus">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">

                                    <select name="status">
                                        <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
                                        <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
                                        <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
                                    </select>
                                    <button type="submit" class="button-select">valider</button>
                                </form>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>

        <div class="column column-inprogress dropzone" data-status="inprogress">
            <div class="column-title">
                <h3>En cours (in progress)</h3>
            </div>
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
                                    <p>Crée le : <?= htmlspecialchars($item['created_at']) ?></p>
                                </div>

                                <div class="card-status">
                                    <p>Statut : <?= htmlspecialchars($item['status']) ?></p>
                                </div>

                                <div class="card-buttons">

                                    <a class="card-update" href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                                    <a class="card-delete" href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                                </div>

                                <form action="index.php" method="post" class="card-select">
                                    <input type="hidden" name="route" value="items.updateStatus">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">

                                    <select name="status">
                                        <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
                                        <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
                                        <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
                                    </select>
                                    <button type="submit" class="button-select">valider</button>
                                </form>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="column column-done dropzone" data-status="done">
            <div class="column-title">
                <h3>Terminé (done)</h3>
            </div>
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
                                    <p>Crée le : <?= htmlspecialchars($item['created_at']) ?></p>
                                </div>

                                <div class="card-status">
                                    <p>statut : <?= htmlspecialchars($item['status']) ?></p>
                                </div>

                                <div class="card-buttons">
                                    <a class="card-update" href="index.php?route=items.update&id=<?= $item['id'] ?>">Modifier</a>

                                    <a class="card-delete" href="index.php?route=items.delete&id=<?= $item['id'] ?>">Supprimer</a>

                                </div>

                                <form action="index.php" method="post" class="card-select">

                                    <input type="hidden" name="route" value="items.updateStatus">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <select name="status">
                                        <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
                                        <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
                                        <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
                                    </select>
                                    <button type="submit" class="button-select">valider</button>
                                </form>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
