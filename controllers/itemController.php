<?php
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../models/itemModel.php';

function indexItems() {
    //$items = getItems();
    $todo = getTodoItem();
    $inprogress = getInprogressItem();
    $done = getDoneItem();

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
        $status = $_POST['status'];
        if ($title !== '') {
            addItem($title, $content, $status);
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
        searchItems($search);
    } else {
        $search = '';
        $items = getItems();
    }

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/results.php';
    include __DIR__ . '/../views/footer.php';
}

function updateItem() {
    // Traitement du formulaire (POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $status = $_POST['status'];

        updateitems($title, $content, $status, $id);
        header("location: index.php?route=items.index");
    }
    // Traitement de l'affichage (GET)
    if (isset($_GET['id'])) {
        $item = getItemById($_GET['id']);
    }

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/update.php';
    include __DIR__ . '/../views/footer.php';
}

function updateItemStatus() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? null;

        if ($id && $status) {
            $item = getItemById($id);
            if ($item) {
                updateitems($item['title'], $item['content'], $status, $id);
            }
        }
    }
    header("Location: index.php?route=items.index");
    exit;
}
