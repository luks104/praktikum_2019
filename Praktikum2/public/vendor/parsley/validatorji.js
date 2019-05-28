



window.Parsley.addValidator('palindromeJao', {
  validateString: function(value) {
    return value.split('').reverse().join('') === value;
  },
  messages: {
    en: 'This string is not the reverse of itself',
    fr: "Cette valeur n'est pas l'inverse d'elle même."
  }
});



window.Parsley.addValidator('zmazek', {
  validateNumber: function(value, requirement) {
    return value % requirement === 0;
  },
  requirementType: 'integer',
  messages: {
    en: 'This value should be a multiple of %s.',
    fr: "Ce nombre n'est pas un multiple de %s."
  }
});










