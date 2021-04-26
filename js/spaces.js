$("input").not(".allowdoublespace").keyup(function(){

var strng = $(this).val();
var cleanStr = removeDoubleSpace(strng);
$(this).val(cleanStr);

});

function removeDoubleSpace (string) {
  return string.replace(/ +(?= )/g,'');
}


$("input").not(".allowfirstspace").keyup(function(){

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


$("textarea").not(".allowdoublespace").keyup(function(){

var strng = $(this).val();
var cleanStr = removeDoubleSpace(strng);
$(this).val(cleanStr);

});

function removeDoubleSpace (string) {
  return string.replace(/ +(?= )/g,'');
}


$("textarea").not(".allowfirstspace").keyup(function(){

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
