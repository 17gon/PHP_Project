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
    let isStackHasOperator = false
    let isOperator = false;
    if (input === '+' || input === '-' || input === '*' || input === '/') {
        isOperator = true
    }
    let s = strInput.charAt(strInput.length - 1);
    if (s === '+' || s === '-' || s === '*' || s === '/') {
        isStackHasOperator = true
    }
    if (isOperator && isStackHasOperator) {
        strInput = strInput.slice(0, -1)
    }
}

function backwardInput() {
    strInput = strInput.slice(0, -1);
    let toOut = strInput
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
//I know that was more like creating bicycle, but i want to understand how calculators actually works, and make step-by-step calculator
function evaluateExpression(expression) {//So, this how function eval() works
    // 1. Tokenize input
    const tokens = expression.match(/(\d+|\+|-|\*|\/|\(|\))/g);//this replaces all non-numeric symbol except math (/*-+) and digits 0-9

    // 2. Convert to Reverse Polish Notation (RPN) using the Shunting-Yard algorithm
    const toRPN = (tokens) => {//Anonim fun
        const output = [];//It will be our output
        const operators = [];//This is operant stack, that will be added to output at the end
        const precedence = { '+': 1, '-': 1, '*': 2, '/': 2 };//We all know, * and / more valuable than +-
        const associativity = { '+': 'L', '-': 'L', '*': 'L', '/': 'L' }; //It wierd part, but important, it with precedence define order and direction

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
                operators.pop(); //Pop '(', we don't need it anymore
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
        const stack = [];//In final, it is result, but in process it will be like memory stack
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
    //I use educational examples to make eval() function, and think more people must know how calculators actually works
}