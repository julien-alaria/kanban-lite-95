<div class="form-container">

    <form action="index.php" method="post">
        <input type="hidden" name="route" value="items.store">
        <input type="text" name="title" placeholder="Titre" required>
        <textarea name="content" id="content"></textarea>

        <select name="status" id="status">
            <option value="todo">A faire</option>
            <option value="inprogress">En cours</option>
            <option value="done">terminé</option>
        </select>

        <button type="submit">Ajouter</button>
    </form>

    <button class="link"><a href="index.php?route=items.index">Retour à la liste</a></button>

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