<h2>Modifier un Item</h2>

<div class="update-container">

    <form action="index.php" method="post">

        <input type="hidden" name="route" value="items.update">
        <input type="hidden" name="id" value="<?= isset($item['id']) ? htmlspecialchars($item['id']) : '' ?>">

        <input type="text" name="title" value="<?= isset($item['title'])? htmlspecialchars($item['title']) : '' ?>" placeholder="Titre" required>

        <textarea name="content" id="content"><?= 
        isset($item) && is_array($item) && isset($item['content']) 
        ? htmlspecialchars($item['content']) 
        : ''  ?></textarea>

        <button type="submit">Mettre à jour</button>

    </form>

    <button class="link"><a href="index.php?route=items.index">Annuler</a></button>

        <script>
        const mde = new SimpleMDE({
        element: document.getElementById("content"),
        placeholder: "Écrivez votre note en Markdown…",
        spellChecker: false,
        status: false, 
        autosave: { enabled: true, uniqueId: "Kanban-Lite-content", delay: 1000 },
        toolbar: ["bold","italic","heading","|","quote","unordered-list","ordered-list","|","link","preview","guide"]
        });
    </script>
</div>

<div class="errors-container">
    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>