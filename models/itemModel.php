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

function getTodoItem() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM items WHERE status = 'todo' ORDER BY created_at ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getInprogressItem() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM items WHERE status = 'inprogress' ORDER BY created_at ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDoneItem() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM items WHERE status = 'done' ORDER BY created_at ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getItemById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addItem($title, $content, $status) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO items (title, content, `status`) VALUES (?, ?, ?)");
    $stmt->execute([htmlspecialchars($title), htmlspecialchars($content), $status]);
}

function deleteItemById($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
    $stmt->execute([$id]);
}

function updateitems($title, $content, $status, $id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE items SET title = ?, content = ?, `status` = ? WHERE id = ?");
    $stmt->execute([$title, $content, $status, $id]);
}