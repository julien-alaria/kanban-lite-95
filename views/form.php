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

    <div class="link-container">
        <a href="index.php?route=items.index" class="link">Retour à la liste</a>
    </div>
    
</div>
<div class="spacer-fill-height"></div> 