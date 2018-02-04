<!DOCTYPE html>
<html>
<head>
    <title>The Chaos of Time</title>
    <link href="cot.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">

    <?php
    $_Fertigkeiten = array(Angeln, Athletik, "Bluffen/Diplomatie/Einschüchtern", Brauen, "Entdecken/Lauschen", Fallenstellen, Heilkunde, "Infos sammeln", Klettern, Kochen, Körperbeherrschung, "Mechanismen ausschalten", Menschenkenntnis, "Mit Tieren umgehen", Orientierung, Reiten, Schleichen, "Schlösser knacken", Schwimmen, Schätzen, Selbstbeherrschung, Spurenlesen, Taschendiebstahl, Unterhaltungskunst, Überlebenskunst, Verstecken, Zauberkunde, Handwerk, Handwerk, Handwerk, Wissen, Wissen, Wissen);
    $_KampfTalente = array("Leichte Rüstung", "Mittlere Rüstung", "Schwere Rüstung", "Zweihänder führen", "Zweihänder einhändig führen", "Schildkampf", "Umgang mit (Waffentyp1)", "Umgang mit (Waffentyp2)", "Waffenfokus(Waffe1) I", "Waffenfokus(Waffe1) II", "Waffenfokus(Waffe1) III", "Waffenfokus(Waffe1) IV", "Waffenfokus(Waffe2) I", "Waffenfokus(Waffe2) II", "Waffenfokus(Waffe2) III", "Waffenfokus(Waffe2) IV", "Schlaghagel", "Schneller Schuss", "Heftiger Angriff", "Hinterhältiger Angriff I", "Hinterhältiger Angriff II", "Hinterhältiger Angriff III", "Verbessertes Ausweichen", "Berittener Kampf", "Entwaffnen", "Improvisierte Waffe", "Ringkampf", "Tänzelnder Kampf", "Verbessertes Zufallbringen", "Aus vollem Lauf schießen", "Schnelle Waffenbereitschaft");
    $_MagieTalente = array("Magiebegabt", "Zauberfokus(Zauberart1)", "Zauberfokus(Zauberart2)", "Magieaffinität", "Magische Gegenstände herstellen", "Konzentration", "Regeneration I", "Regeneration II", "Regeneration III", "Regeneration IV", "Blutmagie");
    $_SonstTalente = array("Aufmerksamkeit", "Affinität zu Tieren", "Eiserner Wille", "Versteckte Waffe", "Magieresistent", "Starker Geist", "Gelehrter");
    include 'scripts.php';
    ?>

</head>
<body onload="FangandutollesProgramm()">
<div class="container-fluid">
    <h1>
      Chaos of Time
    </h1>

<div id='Punkte'>
    Verfügbare Punkte: 45
</div>
<div id="row1" class="row">
  <div id='allgemein' class="col-md-3 col-xs-6">
          <h4>Allgemeines:</h4>
    <div class="row">

    <div id='allgemeintext' class="col-md-3">

      Name:
      <br>
      Geschlecht:
      <br>
      Klasse:
    </div>
    <div id='allgemeininput' class="col-md-9">
        <form name="Name_usw">
          <input id="name" name="name">
          <input id='geschlecht' name="geschlecht">
          <input id="klasse" name="klasse">
        </form>
    </div>

    <div class="col-md-3">
    </div>
  <div  class="col-md-9">
    <form id="Anfang">
        <select id='rasseselect' name="Rasse" onchange="Modirasse()">
          <option>Rasse auswählen...</option>
          <option>Echsenwesen</option>
          <option>Elf</option>
          <option>Gnom</option>
          <option>Mensch</option>
          <option>Tiermensch</option>
          <option>Zwerg</option>
        </select>

    </form>
  </div>

  <div class="col-md-12">
    <form name="Sprachen">
      <div class="row">
      <div id='sprachetext' class="col-md-3">
        Sprachen:
      </div>
      <div class="col-md-9">
      <input id='sprache' name='sprache'>
      </div>
        <div class="col-md-3"></div>
        <div id='sprachen' class="col-md-9"></div>
        </div>
    </form>
  </div>

  <div class="col-md-3"></div>
  <div class="col-md-9" id="sprachenbutton">


    <button onclick="Sprachenhinzufuegen()">Sprache hinzufügen</button><br>
    <button onclick="Sprachenentfernen()">Sprachen zurücksetzen</button>

  </div><!--.row-->
</div>
  </div> <!-- #allgemein -->

  <div id='eigenschaften' class="col-md-2 col-xs-6">
    <h4>Eigenschaften</h4>
    <div class="row">
    <div id='eignames' class="col-md-6">
      Stärke:
      <br>
      Konstitution:
      <br>
      Geschicklichkeit:
      <br>
      Intelligenz:
      <br>
      Weisheit:
      <br>
      Charisma:
    </div>
    <div id='eiginputs' class="col-md-6">
      <form name="Eigenschaften" >
        <input type="number" id="St" name="St" min="2" max="20" value="10" onchange="insert()"><br>
        <input type="number" id="Ko" name="Ko" min="2" max="20" value="10" onchange="insert()"><br>
        <input type="number" id="Ge" name="Ge" min="2" max="20" value="10" onchange="insert()"><br>
        <input type="number" id="In" name="In" min="2" max="20" value="10" onchange="insert()"><br>
        <input type="number" id="We" name="We" min="2" max="20" value="10" onchange="insert()"><br>
        <input type="number" id="Ch" name="Ch" min="2" max="20" value="10" onchange="insert()">
      </form>
    </div>
  </div>

  </div><!-- #eigenschaften-->

  <div id ='modifikatoren' class="col-md-2 col-xs-4">
    <h4>Modifikatoren:</h4>
    <div id='modi'>

      Modi: 0 <br>
      Modi: 0 <br>
      Modi: 0 <br>
      Modi: 0 <br>
      Modi: 0 <br>
      Modi: 0 <br>
    </div>
  </div>

  <div id='werte0' class="col-md-2 col-xs-4">
    <h4>Werte:</h4>
    <div id='werte'>
      Lp: 10 <br>
      LepSteigerungen: 0 <br>
      AW: 10 <br>
      Ini: 0 <br>
    </div>
      <div id='leben'>
        <button onclick="Lepsteigern()">Lep steigern</button>
      </div>

      <div id='rasse'>
        Alter: <br>
        Größe: <br>
        Gewicht: <br>

      </div>
  </div><!--#werte0-->

  <div id='kosten' class="col-md-2 col-xs-4">
    <h4 id='kostenueberschrift'>Kosten: </h4>
    Kosten Fertigkeiten: 0 <br>
    Übrige Fertigkeitspunkte:0 <br>
    Kosten Gesamt: 0 <br>
  </div>

</div><!--#row1-->


<div id="row2" class="row">

  <div id='fertigkeiten' class="col-md-3">
    <h4>Fertigkeiten</h4>


    <?php
      echo("<form name='Fertigkeiten'><div class='row'><div id='fert_namen' class='col-md-8'>");
      for($_i=0; $_i<count($_Fertigkeiten); $_i++){
        echo('<p>');
        echo($_Fertigkeiten[$_i]);
        echo('</p>');

      }
      echo("</div><div id='fert_inputs' class='col-md-4'>");
      for($_i=0; $_i<count($_Fertigkeiten); $_i++){
        $_temp = pow(2,$_i);
        echo("<input type='number' id='a$_temp' value='0' onchange='insert()'><br>");

      }

      echo("</div></div></form>");
     ?>

    <!-- <div id='fertmodi'>
     </div>

     <div id='fertgesamt'>
     </div> -->

   </div><!--#fertigkeiten-->

  <div id='kampftalente' class="col-md-2">
     <h4>Kampftalente:</h4>

     <?php
      echo("<form name='KampfTalente'>");
      for($_i=0; $_i<count($_KampfTalente); $_i++){
        echo("<input type='checkbox' id='b$_i' onclick='insert()'>");
        echo($_KampfTalente[$_i]);
        echo("<br>");

      }
      echo("</form>");
     ?>
   </div><!--#kampftalente-->

  <div id='sonsttalente' class="col-md-2">
     <h4>Allgemeine Talente:</h4>
     <?php
      echo("<form name='SonstTalente'>");
      for($_i=0; $_i<count($_SonstTalente); $_i++){
        $_temp = $_i + 42;
        echo("<input type='checkbox' id='b$_temp' onclick='insert()'>");
        echo($_SonstTalente[$_i]);
        echo("<br>");

      }
      echo("</form>");
     ?>
  </div>

  <div id='magietalente' class="col-md-2">

      <h4>Magietalente:</h4>
     <?php
      echo("<form name='MagieTalente'>");
      for($_i=0; $_i<count($_MagieTalente); $_i++){
        $_temp = $_i + 31;
        echo("<input type='checkbox' id='b$_temp' onclick='insert()'>");
        echo($_MagieTalente[$_i]);
        echo("<br>");

      }
      echo("</form>");
     ?>

  </div>




</div>
</div>
</body>


</html>
