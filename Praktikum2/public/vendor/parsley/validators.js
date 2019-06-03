



window.Parsley.addValidator('palindrome', {
  validateString: function(value) {
    return value.split('').reverse().join('') === value;
  },
  messages: {
    en: 'This string is not the reverse of itself'
  }
});


window.Parsley.addValidator('uppercase', {
  validateString: function(value) {
    return value.charAt(0) === value.charAt(0).toUpperCase();
  },
  messages: {
    en: 'This string has a lowercase first letter.'
  }
});

window.Parsley.addValidator('tax', {
  validateNumber: function(value) {
    if (value.length != 8) {
        return false
    }
  },
  messages: {
    en: 'Tax number must be 8 digits long!'
  }
});


window.Parsley.addValidator('date', {
  validateDate: function(value) {
  },
  messages: {
    en: 'Please enter date in correct date format \"YYYY-MM-DD\"'
  }
});







