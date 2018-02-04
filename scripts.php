<script>
var Eig = new Array(6);
var Mod = new Array(6);
var Talente = ["Leichte Rüstung", "Mittlere Rüstung", "Schwere Rüstung", "Zweihänder führen", "Zweihänder einhändig führen", "Schildkampf","Umgang mit (Waffentyp1)", "Umgang mit (Waffentyp2)", "Waffenfokus(Waffe1) I", "Waffenfokus(Waffe1) II", "Waffenfokus(Waffe1) III", "Waffenfokus(Waffe1) IV", "Waffenfokus(Waffe2) I", "Waffenfokus(Waffe2) II", "Waffenfokus(Waffe2) III", "Waffenfokus(Waffe2) IV", "Schlaghagel", "Schneller Schuss", "Heftiger Angriff", "Hinterhältiger Angriff I", "Hinterhältiger Angriff II", "Hinterhältiger Angriff III", "Verbessertes Ausweichen", "Berittener Kampf", "Entwaffnen", "Improvisierte Waffe", "Ringkampf", "Tänzelnder Kampf", "Verbessertes Zufallbringen", "Aus vollem Lauf schießen", "Schnelle Waffenbereitschaft", "Magiebegabt", "Zauberfokus(Zauberart1)", "Zauberfokus(Zauberart2)", "Magieaffinität", "Magische Gegenstände herstellen", "Konzentration", "Regeneration I", "Regeneration II", "Regeneration III", "Regeneration IV", "Blutmagie", "Aufmerksamkeit", "Affinität zu Tieren", "Eiserner Wille", "Versteckte Waffe", "Magieresistent", "Starker Geist", "Gelehrter"];
var LepSteigerungen = 0;
var awbonus = 0;
var zaehler = 0;
var wuerfel1 = 0;
var wuerfel2 = 0;
var wuerfel3 = 0;
var wuerfel4 = 0;
var Gesamtkosten = 0;
var R = [0, 0, 0, 0, 0, 0, 0, 0, 0]; //[St, Ko, Ge, In, We, Ch, Schwimmen, Orientierung, Verstecken]

var skills = new Array();
var skillsmodi = new Array(25);

function FangandutollesProgramm(){
  var min=1;
  var max=20;
  wuerfel1 = Würfel(min,max);
  wuerfel2 = Würfel(min,max);
  wuerfel3 = Würfel(min,max);
  wuerfel4 = Würfel(min,max);
  insert();

}

function insert (){

   var St = parseInt(document.getElementById('St').value);
   var Ko = parseInt(document.getElementById('Ko').value);
   var Ge = parseInt(document.getElementById('Ge').value);
   var In = parseInt(document.getElementById('In').value);
   var We = parseInt(document.getElementById('We').value);
   var Ch = parseInt(document.getElementById('Ch').value);



   Eig[0] = St;
   Eig[1] = Ko;
   Eig[2] = Ge;
   Eig[3] = In;
   Eig[4] = We;
   Eig[5] = Ch;

   <?php

      for($_i=0; $_i<count($_Fertigkeiten); $_i++){
        $_temp = pow(2,$_i);
        echo("skills[$_i] = document.getElementById(\"a$_temp\").value;\n");
      }

    ?>

   Kosten();
  // Rasse();
   Modifikatoren();
   Werte();
   //test();
   Punkte();



}

function Sprachenhinzufuegen() {
  var neuesprache = document.getElementById('sprache').value;
  document.getElementById('sprachen').innerHTML += neuesprache + '<br>';
}

function Sprachenentfernen() {
  document.getElementById('sprachen').innerHTML = "";
}

function Modifikatoren() {
  var x=0;
  var Punkte=0;
  var Modi=0;

  document.getElementById('modi').innerHTML = "";

  for (x=0;x<=5;x++){
    var m = Eig[x];
    Mod[x] = Math.floor((m - 10) / 2);
    document.getElementById('modi').innerHTML += 'Modi: ' + Mod[x] + '<br>';
  }



}

function Kosten() {
  var x=0;
  var Kosten1=0;
  var Kosten2=0;
  var Kosten3=0;
  var KostenLep=0;
  var KostenFertigkeiten=0;
  var Kosten4=0;
  var uebrigeFP=0;
  var a = 0;
  var Talentpreis = [2, 3, 4, 2, 5, 2, 2, 2, 1, 2, 3, 4, 1, 2, 3, 4, 3, 3, 3, 1, 2, 3, 2, 3, 2, 2, 2, 2, 3, 4, 2, 1, 2, 2, 2, 2, 2, 2, 3, 4, 5, 3, 2, 2, 2, 3, 3, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  var KostenTalente=0;


  for (x=0;x<=5;x++){
    var k = Eig[x] - R[x];

    if (k<10){

      var c = k - 10;
        var Kosten3 = Kosten3 + c;
    }
    else{

    if (k%2==0){
      var c = ((k-10) / 2) * ((k-9) / 2 + 0.5);
       var Kosten1=Kosten1 + c;

    }
    else{
      var c = ((k - 10) / 2 + 0.5) * ((k - 10) / 2 +0.5);
       var Kosten2 = Kosten2 + c;
    }

    var KostenEigenschaften = Kosten1 + Kosten2 + Kosten3;

  }

  }

  for (x=0;x<=LepSteigerungen;x++){
    var KostenLep = KostenLep + x;
  }


  for (x=0;x<=32;x++){
    a = parseInt(skills[x]);
    while (a > 0){
      Kosten4 = Kosten4 + a;
      a -= 3;
    }
  }



  if(document.forms["Anfang"].elements["Rasse"].selectedIndex == "4"){
    KostenFertigkeiten = Math.ceil((Kosten4 - R[6] - R[7] - R[8]) / 4);
    uebrigeFP = Modulo(-(Kosten4 - R[6] - R[7] - R[8]),4);
  }else{
    KostenFertigkeiten = Math.ceil((Kosten4 - R[6] - R[7] - R[8]) / 3);
    uebrigeFP = Modulo(-(Kosten4 - R[6] - R[7] - R[8]),3);
  }


  document.getElementById('kosten').innerHTML = '<h4>Kosten:</h4>  Kosten Fertigkeiten: ' + KostenFertigkeiten + '<br> Übrige Fertigkeitspunkte:' + uebrigeFP;

  for(i=0; i<Talente.length; i++){
    if(document.getElementById('b' + i).checked){
      KostenTalente += parseInt(Talentpreis[i]);

    }
  }

  Gesamtkosten = KostenEigenschaften + KostenLep + KostenFertigkeiten + KostenTalente;

  document.getElementById('kosten').innerHTML += '<br> Kosten Gesamt: ' + Gesamtkosten;

}

function Punkte() {
  var z = 45 - Gesamtkosten;
  document.getElementById('Punkte').innerHTML = "Verfügbare Punkte: " + z;

}

function Rasse() {
   document.getElementById('rasse').innerHTML = "";
  switch(document.forms["Anfang"].elements["Rasse"].selectedIndex){
  case 1:
    var alter=24 + wuerfel1;
    var groesse=200 + wuerfel2;
    var gewicht=70 + Math.floor(wuerfel3 /2);
    break;
  case 2:
    var alter=129 + wuerfel1 + wuerfel4;
    var groesse=160 + wuerfel2;
    var gewicht=40 + Math.floor(wuerfel3 /2);
    break;
  case 3:
    var alter=39 + wuerfel1;
    var groesse=90 + wuerfel2;
    var gewicht=18 + Math.floor(wuerfel3 /2);
    break;
  case 4:
    var alter=17 + wuerfel1;
    var groesse=160 + wuerfel2 + wuerfel4;
    var gewicht=60 + wuerfel3;
    break;
  case 5:
    var alter=17 + wuerfel1;
    var groesse=170 + wuerfel2;
    var gewicht=70 + Math.floor(wuerfel3 /2);
    break;
  case 6:
    var alter=119 + wuerfel1 + wuerfel2;
    var groesse=110 + wuerfel3;
    var gewicht=60 + Math.floor(wuerfel4 /2);
  }


  if (groesse<=150){
  awbonus = 0;
  awbonus++;
  }
  if(groesse>200){
  awbonus = 0;
  awbonus--;
  }

  document.getElementById('rasse').innerHTML = "Alter: " + alter + '<br> Größe: ' + groesse + '<br> Gewicht: ' + gewicht;

}

function Modirasse() {
  var ds = 0;
  document.getElementById('St').value = parseInt(document.getElementById('St').value) - R[0];
  document.getElementById('Ko').value = parseInt(document.getElementById('Ko').value) - R[1];
  document.getElementById('Ge').value = parseInt(document.getElementById('Ge').value) - R[2];
  document.getElementById('In').value = parseInt(document.getElementById('In').value) - R[3];
  document.getElementById('We').value = parseInt(document.getElementById('We').value) - R[4];
  document.getElementById('Ch').value = parseInt(document.getElementById('Ch').value) - R[5];
  document.getElementById('a262144').value = parseInt(document.getElementById('a262144').value) - R[6];
  document.getElementById('a16384').value = parseInt(document.getElementById('a16384').value) - R[7];
  document.getElementById('a33554432').value = parseInt(document.getElementById('a33554432').value) - R[8];
  document.getElementById('b49').checked = ds;

  switch(document.forms["Anfang"].elements["Rasse"].selectedIndex){
  case 1:
    R = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    R[2] = 2;
    R[6] = 2;
    ds = false;
    break;
  case 2:
    R = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    R[4] = 1;
    R[5] = 1;
    R[7] = 2;
    ds = false;
    break;
  case 3:
    R = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    R[3] = 1;
    R[2] = 1;
    R[8] = 2;
    ds = false;
    break;
  case 4:
    R = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    ds = false;
    break;
  case 5:
    R = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    R[2] = 2;
    R[1] = 2;
    R[5] = -1;
    ds = false;
    break;
  case 6:
    R = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    R[0] = 2;
    R[1] = 2;
    R[5] = -1;
    ds = true;
  }

  document.getElementById('St').value = parseInt(document.getElementById('St').value) + R[0];
  document.getElementById('Ko').value = parseInt(document.getElementById('Ko').value) + R[1];
  document.getElementById('Ge').value = parseInt(document.getElementById('Ge').value) + R[2];
  document.getElementById('In').value = parseInt(document.getElementById('In').value) + R[3];
  document.getElementById('We').value = parseInt(document.getElementById('We').value) + R[4];
  document.getElementById('Ch').value = parseInt(document.getElementById('Ch').value) + R[5];
  document.getElementById('a262144').value = parseInt(document.getElementById('a262144').value) + R[6];
  document.getElementById('a16384').value = parseInt(document.getElementById('a16384').value) + R[7];
  document.getElementById('a33554432').value = parseInt(document.getElementById('a33554432').value) + R[8];

  Rasse();

}

function Werte() {
  document.getElementById('werte').innerHTML = "";
  var LP = Eig[1] + 3*LepSteigerungen;
  var Ge = Eig[2];
  var AW = 10 + awbonus + Math.floor((Ge - 10) / 2);
  var Ini = Mod[2];

  document.getElementById('werte').innerHTML += 'Lp: ' + LP + '<br> LepSteigerungen: ' + LepSteigerungen + '<br> AW: ' + AW + '<br> Ini: ' + Ini;

  if(document.getElementById('b31').checked){
   var fw = (parseInt(document.getElementById("a67108864").value));
   var ZP = 2*(fw + Mod[4]);
   document.getElementById('werte').innerHTML += '<br> ZP: ' + ZP;
  }


}

function Lepsteigern (){
    LepSteigerungen++;
    Werte();
    Kosten();
  }

function Würfel(min,max) {

  return Math.floor(Math.random() * (max - min + 1)) + min;

  }

function Modulo(a,b){
  var c = Math.floor(a / b);
  var z = a - b*c;
  return (z);

}

/*function test(){
  alert("hallo");
}*/

</script>
