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
                    <div class="buttons">
                        <button class="btn" onclick="input('7')">7</button>
                        <button class="btn" onclick="input('8')">8</button>
                        <button class="btn" onclick="input('9')">9</button>
                        <button class="btn_oper" onclick="input('/')">/</button>
                        
                        <button class="btn" onclick="input('4')">4</button>
                        <button class="btn" onclick="input('5')">5</button>
                        <button class="btn" onclick="input('6')">6</button>
                        <button class="btn_oper" onclick="input('*')">*</button>
                        
                        <button class="btn" onclick="input('1')">1</button>
                        <button class="btn" onclick="input('2')">2</button>
                        <button class="btn" onclick="input('3')">3</button>
                        <button class="btn_oper" onclick="input('-')">-</button>
                        
                        <button class="btn" onclick="input('0')">0</button>
                        <button class="btn" onclick="input('.')">.</button>
                        <button class="btn_oper" onclick="doTheMath()">=</button>
                        
                        <button class="btn_oper" onclick="input('+')">+</button>
                        <button class="btn" onclick="input('(')">(</button>
                        <button class="btn" onclick="input(')')">)</button>
                        <button class="btn" onclick="clearInput()">AC</button>
                        <button class="btn" onclick="backwardInput()"> C </button>
                    </div>
                </div>
            </div>
        </div>
        <article></article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>