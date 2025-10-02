<?php
require __DIR__ . '/../controllers/itemController.php';

$route = $_POST['route'] ?? $_GET['route'] ?? 'items.index';

switch ($route) {
    case 'items.index':
        indexItems();
        break;
    case 'items.create':
        createItem();
        break;
    case 'items.store':
        storeItem();
        break;
    case 'items.delete':
        deleteItem();
        break;
    case 'items.search':
        searchItem();
        break;
    case 'items.update':
        updateItem();
        break;
    case 'items.kanban':
        kanbanItem();
        break;
    default:
    echo "404 - Page Not found";
}