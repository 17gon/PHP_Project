<?php
require 'classes/CreateReadUpdateDelete.php';

function create($content) {
    $crud = new CreateReadUpdateDelete();

    $crud->create($content);
    return $crud->read();
}

function read() {
    $crud = new CreateReadUpdateDelete();

    return $crud->read();
}

function update($id, $content) {
    $crud = new CreateReadUpdateDelete();

    $crud->update($id, $content);
    return $crud->read();
}

function delete($id) {
    $crud = new CreateReadUpdateDelete();

    $crud->delete($id);
    return $crud->read();
}