//Quantity counter
function decrement() {
    var counterElement = document.getElementById('counterValue');
    var currentValue = parseInt(counterElement.innerText, 10);
    if (currentValue > 1) {
      counterElement.innerText = currentValue - 1;
    }
}

function increment() {
    var counterElement = document.getElementById('counterValue');
    var currentValue = parseInt(counterElement.innerText, 10);
    counterElement.innerText = currentValue + 1;
}