var name;
name = window.prompt("Podaj nam swoje imię");
if(name == "Bartuś" || name == "Bartek" || name == "Bartosz" || name == "Bartłomiej" ){
  window.alert("Redakcja Encyklopedii słodyczy serdecznie wita wszystkich Bartusiów <3");
}
function powitaj(){
  document.getElementById('welcome').innerHTML = "Witaj " + name + "! Słodkiego dnia <3";
}


