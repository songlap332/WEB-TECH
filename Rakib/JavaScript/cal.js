
        let display = document.querySelector('.display');
        let currentValue = '';

        function updateDisplay() {
            display.textContent = currentValue;
        }

        function appendNumber(num) {
            currentValue += num;
            updateDisplay();
        }

        function appendOperator(operator) {
            currentValue += operator;
            updateDisplay();
        }

        function clearDisplay() {
            currentValue = '';
            updateDisplay();
        }
        function deleteLast() {
            currentValue = currentValue.slice(0, -1);
            updateDisplay();
        }

        function calculate() {
            let operator;
            if (currentValue.includes('+')) operator = '+';
            else if (currentValue.includes('-')) operator = '-';
            else if (currentValue.includes('*')) operator = '*';
            else if (currentValue.includes('/')) operator = '/';
            
            let values = currentValue.split(operator);
            let num1 = parseFloat(values[0]);
            let num2 = parseFloat(values[1]);
            
            switch (operator) {
                case '+':
                    currentValue = (num1 + num2).toString();
                    break;
                case '-':
                    currentValue = (num1 - num2).toString();
                    break;
                case '*':
                    currentValue = (num1 * num2).toString();
                    break;
                case '/':
                currentValue = (num1 / num2).toString();
                    break;
                default:
                    currentValue = 'Error';
            }
            updateDisplay();
        }
  