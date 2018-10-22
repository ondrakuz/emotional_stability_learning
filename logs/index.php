<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs-cz" lang="cs-cz">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-language" content="cs" />
    <meta name="author" content="Softstar s.r.o.; mailto:softstar.cz@gmail.com"/>
    <meta name="copyright" content="Softstar s.r.o." />
    <title>Emotion Stability Learning Administration - <?php echo htmlspecialchars($title, ENT_QUOTES);?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="text-center" id="hlavicka">
        <h1><strong>Emotional Stability Learning Administration</strong></h1>
      </div>
      <div class="row">
        <div class="col-sm-2" >
          <ul class="list-group" id="levy_panel">
          <li class="list-group-item"><div class="kategorie">
            <img src="./icons/application_side_list.png" width="16" height="16" alt="icon" /> <span class="nadpis">Problémy</span><br />
            <ul class="list-group">
              <li class="list-group-item"><a href="./?prob=1">Přehled problémů</a></li>
              <li class="list-group-item"><a href="./?prob=2">Přidat problém</a></li>
            </ul>
          </div></li>
          <li class="list-group-item"><div class="kategorie">
            <img src="./icons/lightbulb.png" width="16" height="16" alt="icon" /> <span class="nadpis">Kognitivní schémata</span><br/>
            <ul class="list-group">
              <li class="list-group-item"><a href="./?kschema=1">Přehled schémat</a></li>
              <li class="list-group-item"><a href="./?kschema=2">Přidat schéma</a></li>
            </ul>
          </div></li>
          </ul>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-4">
          <h4>Vložení nového problému</h4>
          <form method="post" action="./">
            <div class="form-group">
              <label for="nazev">Název:</label>
              <input type="text" class="form-control" id="nazev">
            </div>
            <div class="form-group">
              <label for="popis">Popis:</label>
              <textarea class="form-control" rows="5" id="popis"></textarea>
            </div>
            <button type="submit" class="btn btn-default"></button>
            <td colspan="2" align="center"><input type="submit" name="prob" value="Uložit" /></td>
          </form>
        </div><!-- /col-sm-4 -->
        <div class="col-sm-3"></div>
      </div>
      <div class="panel panel-default text-center margintop30">
        <div class="panel-footer" id="paticka">Copyright &copy; <?php date_default_timezone_set('Europe/Prague'); echo date("Y"); ?> <a href="http://www.sofstar.cz">Softstar s.r.o.</a><br /><a href="http://validator.w3.org/check?uri=referer" title="" onclick="return !window.open(this.href);">XHTML</a> a <a href="http://jigsaw.w3.org/css-validator/check/referer" title="" onclick="return !window.open(this.href);">CSS 3.0</a></div>
      </div>
    </div><!-- /container -->
  </body>
</html>

