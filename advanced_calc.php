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
                    <div class="buttons">
                        <button onclick="appendValue('(')"> ( </button>
                        <button onclick="appendValue(')')"> ) </button>
                        <button onclick="back()"> C </button>
                        <button onclick="clearDisplay()"> AC </button>
                      
                        <button onclick="appendValue('7')"> 7 </button>
                        <button onclick="appendValue('8')"> 8 </button>
                        <button onclick="appendValue('9')"> 9 </button>
                        <button onclick="appendValue('/')"> ÷ </button>
                      
                        <button onclick="appendValue('4')"> 4 </button>
                        <button onclick="appendValue('5')"> 5 </button>
                        <button onclick="appendValue('6')"> 6 </button>
                        <button onclick="appendValue('*')"> × </button>
                      
                        <button onclick="appendValue('1')"> 1 </button>
                        <button onclick="appendValue('2')"> 2 </button>
                        <button onclick="appendValue('3')"> 3 </button>
                        <button onclick="appendValue('-')"> − </button>
                      
                        <button onclick="appendValue('0')"> 0 </button>
                        <button onclick="appendValue('.')"> . </button>
                        <button onclick="magic()"> = </button>
                        <button onclick="appendValue('+')"> + </button>
                      
                        <button onclick="appendValue('Math.sin(')"> sin </button>
                        <button onclick="appendValue('Math.cos(')"> cos </button>
                        <button onclick="appendValue('Math.tan(')"> tan </button>
                        <button onclick="appendValue('Math.log(')"> ln </button>
                        
                        <button onclick="appendValue('Math.sqrt(')"> √ </button>
                        <button onclick="appendValue('**')"> ^ </button>
                        <button onclick="appendValue('Math.PI')"> π </button>
                        <button onclick="appendValue('Math.E')"> e </button>
                    </div>
                </div>
            </div>
        </div>
        <article></article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>