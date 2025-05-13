<form method="post">
    <input type="text" name="id" placeholder="ID">
    <input type="text" name="content" placeholder="Content">
    <button name="action" value="create">Create</button>
    <button name="action" value="read">Read</button>
    <button name="action" value="update">Update</button>
    <button name="action" value="delete">Delete</button>
</form>
<?php
include "dataBase/druc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $content = $_POST['content'] ?? null;
    $action = $_POST['action'];

    if ($action === 'create') echo create($content);
    if ($action === 'read') echo read();
    if ($action === 'update') echo update($id, $content);
    if ($action === 'delete') echo delete($id);
}?>
