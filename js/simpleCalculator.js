let outputElement = "";
let strInput = "";
document.addEventListener("DOMContentLoaded", () => {
    outputElement = document.getElementById("output");
});

function input(toInput) {
    if (toInput === null) return
    checkInput(toInput)
    strInput+=toInput;
    outputElement.innerText = strInput;
}

function checkInput(input) {
    isOperator = false
    isStackHasOperator = false
    switch(input) {
        case '+': isOperator = true
        case '-': isOperator = true
        case '*': isOperator = true
        case '/': isOperator = true
    }
    switch(strInput.charAt(strInput.length - 1)) {
        case '+': isStackHasOperator = true
        case '-': isStackHasOperator = true
        case '*': isStackHasOperator = true
        case '/': isStackHasOperator = true
    }
    if (isOperator && isStackHasOperator) {
        strInput = strInput.slice(0, -1)
    }
}

function backwardInput() {
    strInput = strInput.slice(0, -1);
    toOut = strInput
    if (strInput.length <= 0) {
        toOut = "0"
    }
    outputElement.innerText = toOut;
}
  
function clearInput() {
  strInput = '';
  outputElement.innerText = '0';
}

function doTheMath() {
  try {
    let result = evaluateExpression(strInput);
    outputElement.innerText = result;
    strInput = result
  } catch (e) {
    outputElement.innerText = 'Error';
  }
}
//                                                             <!-- kreatívny bod -->

//I know that was more like creating bicycle, but i want to understood how calculators actually works, and make step-by-step calculator
function evaluateExpression(expression) {//So, this how function eval() works
    // 1. Tokenize input
    const tokens = expression.match(/(\d+|\+|\-|\*|\/|\(|\))/g);//this replace all non numeric sybol exept math (/*-+) and digits 0-9

    // 2. Convert to Reverse Polish Notation (RPN) using the Shunting-Yard algorithm
    const toRPN = (tokens) => {//Anonim fun
        const output = [];//It will be our output
        const operators = [];//This is operant stack, that will be added to output at the end
        const precedence = { '+': 1, '-': 1, '*': 2, '/': 2 };//We all know, * and / more valuble than +-
        const associativity = { '+': 'L', '-': 'L', '*': 'L', '/': 'L' }; //It wierd part, but important, it with precedence defind order and direction

        tokens.forEach(token => {//Go throw tokens!!!
            if (!isNaN(token)) {
                output.push(token); //Number
            } else if (token in precedence) {//Hmm, token are Not A Number and operator
                while (
                    operators.length && //Check if there are operators in the stack
                    precedence[operators[operators.length - 1]] >= precedence[token] && //Compare precedence
                    associativity[token] === 'L' //Ensure the operator is left-associative
                ) {
                    output.push(operators.pop()); //Adding to output like first operation (if we have something like '(a+b)' where '+' was first math operation)
                }
                operators.push(token); //Save for later
            } else if (token === '(') {
                operators.push(token); //Separate operators in ()
            } else if (token === ')') {
                while (operators.length && operators[operators.length - 1] !== '(') {
                    output.push(operators.pop());//Push into output expression in ()
                }
                operators.pop(); //Pop '(', we don't need it any more
            }
        });

        while (operators.length) {//Backward adding operator in output
            output.push(operators.pop());
        }

        return output;
    };

    const rpn = toRPN(tokens);//call toRPN

    // 3. Evaluate RPN
    const evaluateRPN = (rpn) => {
        const stack = [];//In finnal it be result, but in process it will be like memory stack
        rpn.forEach(token => {//Token can be number (operand) or operation
            if (!isNaN(token)) {//We add numbers in stack
                stack.push(Number(token)); //Push operand
            } else {//But if token operator, WE DO MATH
                const b = stack.pop();
                const a = stack.pop();
                switch (token) {//think about type of operator
                    case '+': stack.push(a + b); break;//push back
                    case '-': stack.push(a - b); break;
                    case '*': stack.push(a * b); break;
                    case '/': stack.push(a / b); break;
                }
            }
        });
        return stack[0];//There will be answer
    };

    return evaluateRPN(rpn);//And there we and our eval() function
    //Postfix (or RPN) need to do math with stack, and almost all instruction on computer work like it stack
    //I use educational exemples to make eval() function, and think more people must know how calculators actually works
}