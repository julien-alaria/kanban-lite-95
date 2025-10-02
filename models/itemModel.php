<?php

function searchItems($search) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM items WHERE title LIKE ? OR content LIKE ? ORDER BY created_at DESC");
    $stmt->execute(['%' . $search . '%', '%' . $search . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getItems() {
    global $pdo;
    return $pdo->query("SELECT * FROM items ORDER BY created_at DESC")->fetchAll();
}

function getItemById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addItem($title, $content) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO items (title, content) VALUES (?, ?)");
    $stmt->execute([htmlspecialchars($title), htmlspecialchars($content)]);
}

function deleteItemById($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
    $stmt->execute([$id]);
}

function updateItems($title, $content, $id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE items SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);
}

function getItemsByStatus($status) {
    global $pdo;

    $validStatus = ['todo', 'inprogress', 'finished'];

    if (!in_array($status, $validStatus, true)) {
        throw new InvalidArgumentException("Statut invalide : $status");
    }

    $stmt = $pdo->prepare("SELECT * FROM items WHERE statuts = ? ORDER BY created_at ASC");
    $stmt->execute([$status]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    
