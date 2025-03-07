let displayValue = "";
let evalValue = "";

//                                                             <!-- kreatívny bod -->

function appendValue(value) {
  const output = document.getElementById("output");

  const openParens = (displayValue.match(/\(/g) || []).length;
  const closeParens = (displayValue.match(/\)/g) || []).length;

  if (value === ")" && openParens <= closeParens) {
    return;
  }

  if (value === ".") {
    const lastNumber = displayValue.split(/[^\d.]+/).pop();
    if (lastNumber.includes(".")) {
      return;
    }
    if (/\d$/.test(displayValue)) {
      displayValue += ".";
      evalValue += ".";
    } else {
      displayValue += "0.";
      evalValue += "0.";
    }
    output.value = displayValue;
    return;
  }

  if (isMathFunction(value) && displayValue && !isOperator(displayValue.slice(-1)) && displayValue.slice(-1) !== "(") {
    displayValue += "*";
    evalValue += "*";
  }

  if (value === "**") {
    displayValue += "^";
    evalValue += "**";
  } else {
    if (isMathFunction(value) && /\d$/.test(displayValue)) {
      displayValue += "*";
      evalValue += "*";
    }

    displayValue += humanReadable(value);
    evalValue += value;
  }

  output.value = displayValue;
}

function clearDisplay() {
  displayValue = "";
  evalValue = "";
  document.getElementById("output").value = "";
}

function magic() {
    const result = eval(evalValue);
    if (isNaN(result) || result === undefined) {
      document.getElementById("output").value = "Error";
      clearDisplay();
      return
    }
    displayValue = result.toString();
    evalValue = result.toString();
    document.getElementById("output").value = displayValue;
}

function isOperator(char) {
  return ["+", "-", "*", "/"].includes(char);
}

function isMathFunction(value) {
  return ["Math.sin(", "Math.cos(", "Math.tan(", "Math.log(", "Math.sqrt(", "Math.PI", "Math.E"].some(func => value.startsWith(func));
}

function humanReadable(value) {
  if (value === "Math.PI") return "π";
  if (value === "Math.E") return "e";
  if (value === "Math.sin(") return "sin(";
  if (value === "Math.cos(") return "cos(";
  if (value === "Math.tan(") return "tan(";
  if (value === "Math.log(") return "ln(";
  if (value === "Math.sqrt(") return "√(";
  if (value === "**") return "^";
  return value;
}

function handleFirstInput(value) {
  if (isOperator(value)) {
    if (value === "-") {
      appendValue(value);
    } else if (value === "*" || value === "/") {
      appendValue("1");
      appendValue(value);
    }
  } else {
    appendValue(value);
  }
}

function back() {
  if (displayValue.length > 0) {
    displayValue = displayValue.slice(0, -1);
    evalValue = evalValue.slice(0, -1);
    document.getElementById("output").value = displayValue;
  }
}
