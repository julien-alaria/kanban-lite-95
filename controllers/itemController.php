<?php
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../models/itemModel.php';

function indexItems() {
    $items = getItems();
    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/items.php';
    include __DIR__ . '/../views/footer.php';
}

function createItem() {
    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/form.php';
    include __DIR__ . '/../views/footer.php';
}

function storeItem() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        if ($title !== '') {
            addItem($title, $content);
        }
    }
    header("Location: index.php?route=items.index");
}

function deleteItem() {
    if (isset($_GET['id'])) {
        deleteItemById($_GET['id']);
    }
    header("Location: index.php?route=items.index");
}

function searchItem() {
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $items = searchItems($search);
    } else {
        $search = '';
        $items = getItems();
    }

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/results.php';
    include __DIR__ . '/../views/footer.php';
}

function updateItem() {
    $errors = [];
    // Traitement du formulaire (POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        if (!$id) {
            $errors[] = "ID manquant pour la mise à jour.";
        }

        if ($title === '') {
            $errors[] = "Le titre ne peut pas être vide.";
        }

        if (empty($errors)) {
            updateItems($title, $content, $id);
            header("Location: index.php?route=items.index");
            exit;
        }
    }
    // Traitement de l'affichage (GET)
    if (isset($_GET['id'])) {
        $item = getItemById($_GET['id']);
        if (!$item) {
            $errors[] = "Item introuvable.";
            exit;
        }
    } else {
        $errors[] = "ID manquant pour la modification";
    }

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/update.php';
    include __DIR__ . '/../views/footer.php';
}

function kanbanItem() {
    $todo = getItemsByStatus('todo');
    $inprogress = getItemsByStatus('inprogress');
    $finished = getItemsByStatus('finished');

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/kanban.php';
    include __DIR__ . '/../views/footer.php';

}