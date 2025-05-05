<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/getHead.php"; getHead();?>
<body>
    <?php include "parts/header.php"; ?>
    <main class="grid-container">
        <article></article>
        <div class="mainContent">
            <div class="page-content">
                <div class="calc">
                    <h1>Scientific Calculator</h1>
                    <input id="output" type="text" class="display" readonly />
                    <?php include "parts/calc_buttons.php"?>
                </div>
            </div>
        </div>
        <article></article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>