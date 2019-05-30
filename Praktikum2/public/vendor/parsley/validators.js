



window.Parsley.addValidator('palindrome', {
  validateString: function(value) {
    return value.split('').reverse().join('') === value;
  },
  messages: {
    en: 'This string is not the reverse of itself',
    fr: "Cette valeur n'est pas l'inverse d'elle même."
  }
});


window.Parsley.addValidator('uppercase', {
  validateString: function(value) {
    return value.charAt(0) === value.charAt(0).toUpperCase();
  },
  messages: {
    en: 'This string has a lowercase first letter.',
    fr: "Cette valeur n'est pas l'inverse d'elle même."
  }
});

window.Parsley.addValidator('davcnastevilka', {
  validateNumber: function(value) {
    if (value.length != 8) {
      

        return false
    }
    
   
  
  },
  messages: {
    en: 'Vpišite 8 mestno davčno številko',
    fr: "Ce nombre n'est pas un multiple de %s."
  }
});


window.Parsley.addValidator('datum', {
  validateNumber: function(value) {
    if (value.length != 8) {
      

        return false
    }
    
   
  
  },
  messages: {
    en: 'Vpišite 8 mestno davčno številko',
    fr: "Ce nombre n'est pas un multiple de %s."
  }
});







