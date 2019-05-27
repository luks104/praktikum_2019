<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>  


window.Parsley.addValidator('palindrome', {
validateString: function(value) {
  return value.split('').reverse().join('') === value;
},
messages: {
  en: 'This string is not the reverse of itself',
  fr: "Cette valeur n'est pas l'inverse d'elle même."
}
});




window.Parsley.addValidator('multipleOf', {
validateNumber: function(value, requirement) {
  return value % requirement === 0;
},
requirementType: 'integer',
messages: {
  en: 'This value should be a multiple of %s.',
  fr: "Ce nombre n'est pas un multiple de %s."
}
});




window.Parsley.addValidator('maxFileSize', {
validateString: function(_value, maxSize, parsleyInstance) {
  if (!window.FormData) {
    alert('You are making all developpers in the world cringe. Upgrade your browser!');
    return true;
  }
  var files = parsleyInstance.$element[0].files;
  return files.length != 1  || files[0].size <= maxSize * 1024;
},
requirementType: 'integer',
messages: {
  en: 'This file should not be larger than %s Kb',
  fr: 'Ce fichier est plus grand que %s Kb.'
}
});



window.Parsley.addValidator('jebemTiMater', {
validateNumber: function(value, requirement) {
  return value % requirement === 0;
},
requirementType: 'integer',
messages: {
  en: 'This value should be a multiple of %s.',
  fr: "Ce nombre n'est pas un multiple de %s."
}
});



window.Parsley.addValidator('jebise', {

validateNumber: function(value, requirement) {

  return value % requirement === 0;
},
requirementType: 'integer',
messages: {
  en: 'This value should be a multiple of %s.',
  fr: "Ce nombre n'est pas un multiple de %s."
}
});
