const inputCreditNum = document.getElementById('credit-num');

const formatInput = (cardNum, key) => {
      cardLength = cardNum.length;
      if (key !== 'Backspace') {
            cardNum = cardNum.split('');
            if (cardLength > 4 && cardLength <= 5) {
                  cardNum.splice(4, 0, ' ');
            }
            if (cardLength > 9 && cardLength <= 10) {
                  cardNum.splice(9, 0, ' ');
            }
            if (cardLength > 14 && cardLength <= 15) {
                  cardNum.splice(14, 0, ' ');
            }
            return cardNum.join('');
      } else {
            if (cardLength === 5 || cardLength === 10 || cardLength === 15) {
                  cardNum = cardNum.trim();
            }
            return cardNum;
      }
}

inputCreditNum.addEventListener('keydown', (e) => {
      key = e.key;
      if (!(key > 0 || key < 9 || key === 'Backspace') || (e.target.value.length == 19 && key !== 'Backspace')) {
            e.preventDefault();
      }
});

inputCreditNum.addEventListener('keyup', (e) => {
      key = e.key;
      if (key > 0 || key < 9 || key === 'Backspace') {
            e.target.value = formatInput(e.target.value, key);
      }
});