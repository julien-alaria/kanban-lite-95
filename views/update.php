<div class="h2">
    <h2>Modifier un Item</h2>
</div>

<div class="update-container">

    <form action="index.php" method="post">

        <input type="hidden" name="route" value="items.update">
        <input type="hidden" name="id" value="<?= isset($item['id']) ? htmlspecialchars($item['id']) : '' ?>">

        <input type="text" name="title" value="<?= isset($item['title'])? htmlspecialchars($item['title']) : '' ?>" placeholder="Titre" required>

        <textarea name="content" id="content"><?= 
        isset($item) && is_array($item) && isset($item['content']) 
        ? htmlspecialchars($item['content']) 
        : ''  ?></textarea>

        <select name="status" id="status">
            <option value="todo" <?= $item['status'] == 'todo' ? 'selected' : '' ?>>A faire</option>
            <option value="inprogress" <?= $item['status'] == 'inprogress' ? 'selected' : '' ?>>En cours</option>
            <option value="done" <?= $item['status'] == 'done' ? 'selected' : '' ?>>Terminé</option>
        </select>

        <button type="submit">Mettre à jour</button>

    </form>

    <a href="index.php?route=items.index" class="link">Annuler</a>
</div>
<div class="spacer-fill-height"></div> 