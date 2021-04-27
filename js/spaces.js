$("#project-title-input").not(".allowdoublespace").keyup(function(){

var strng = $(this).val();
var cleanStr = removeDoubleSpace(strng);
$(this).val(cleanStr);

});

function removeDoubleSpace (string) {
  return string.replace(/ +(?= )/g,'');
}


$("#project-title-input").not(".allowfirstspace").keyup(function(){

var strng = $(this).val();
var cleanStr2=removeFirstSpace(strng);
$(this).val(cleanStr2);

});

function removeFirstSpace(string){
  if(string.charAt(0)==' '){
    return string.replace(/ +(?=)/g,'');
  }
  else{
    return string;
  }
}


$("#comment-area").not(".allowdoublespace").keyup(function(){

var strng = $(this).val();
var cleanStr = removeDoubleSpace(strng);
$(this).val(cleanStr);

});

function removeDoubleSpace (string) {
  return string.replace(/ +(?= )/g,'');
}


$("#comment-area").not(".allowfirstspace").keyup(function(){

var strng = $(this).val();
var cleanStr2=removeFirstSpace(strng);
$(this).val(cleanStr2);

});

function removeFirstSpace(string){
  if(string.charAt(0)==' '){
    return string.replace(/ +(?=)/g,'');
  }
  else{
    return string;
  }
}




$("#task").not(".allowdoublespace").keyup(function(){

var strng = $(this).val();
var cleanStr = removeDoubleSpace(strng);
$(this).val(cleanStr);

});

function removeDoubleSpace (string) {
  return string.replace(/ +(?= )/g,'');
}


$("#task-title-input").not(".allowfirstspace").keyup(function(){

var strng = $(this).val();
var cleanStr2=removeFirstSpace(strng);
$(this).val(cleanStr2);

});

function removeFirstSpace(string){
  if(string.charAt(0)==' '){
    return string.replace(/ +(?=)/g,'');
  }
  else{
    return string;
  }
}


$("#task-description").not(".allowdoublespace").keyup(function(){

var strng = $(this).val();
var cleanStr = removeDoubleSpace(strng);
$(this).val(cleanStr);

});

function removeDoubleSpace (string) {
  return string.replace(/ +(?= )/g,'');
}


$("#task-description").not(".allowfirstspace").keyup(function(){

var strng = $(this).val();
var cleanStr2=removeFirstSpace(strng);
$(this).val(cleanStr2);

});

function removeFirstSpace(string){
  if(string.charAt(0)==' '){
    return string.replace(/ +(?=)/g,'');
  }
  else{
    return string;
  }
}
