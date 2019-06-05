window.Parsley.addValidator('palindrome', {
  validateString: function(value) {
    return value.split('').reverse().join('') === value;
  },
  messages: {
    en: 'This string is not the reverse of itself'
  }
});

window.Parsley.addValidator('uppercaseInitial', {
  validateString: function(value) {
    return value[0] == value[0].toUpperCase();
  },
  messages: {
    en: 'First letter must be uppercase'
  }
});

window.Parsley.addValidator('registrationPlate', {
  validateString: function(value) {
    var patt = /^[a-zA-Z]{2}[-]{1}/;
    return patt.test(value);
  },
  messages: {
    en: 'Must be of type CC-N...'
  }
});

window.Parsley.addValidator('vin', {
  validateString: function(value) {
    return value.length == 17;
  },
  messages: {
    en: 'Must be of 17 character lenght'
  }
});

window.Parsley.addValidator('emso', {
  validateString: function(value) {
    var sum = value[0]*7 + value[1]*6 + value[2]*5 + value[3]*4 + value[4]*3 + value[5]*2 + value[6]*7 + value[7]*6 + value[8]*5 + value[9]*4 + value[10]*3 + value[11]*2;
    var controlNo;
    if(sum%11==0)
    {
      controlNo=0;
    }
    else{
      controlNo=11 - (sum%11);
    }
    console.log(controlNo);
    return controlNo == value[12] && value.length == 13;;
  },
  messages: {
    en: 'Control number is invalid'
  }
});
