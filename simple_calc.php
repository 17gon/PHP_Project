<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/getHead.php"; getHead();?>
<body>
    <?php include "parts/header.php"; ?>
    <main class="grid-container">
        <article></article>
        <div class="mainContent">
            <div class="page-content">
                <h1>Simple Calculator</h1>
                <div class="calc">
                    <div class="display">
                        <div id="output">0</div>
                    </div>
                    <?php include "parts/calc_buttons.php"?>
                </div>
            </div>
        </div>
        <article></article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>