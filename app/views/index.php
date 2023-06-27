<!doctype html>
<html lang="en">

<head>

  <title>PROGRAMAS </title>

  <link rel="icon" type="image/x-icon" href="./../../public/images/snies.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

  <!-- Select con buscador de boostrap-->
  <link rel='stylesheet ' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet '
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>



  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="../../public/css/style.css" type="text/css" media="screen">
</head>

<body style="font-family: 'Roboto Condensed', sans-serif;">

  <header>
  </header>
  <div class="content_form">
    <form id="form-input" action="javascript:void(0)" onSubmit="Save.guardar()">
      <h1 style="margin-bottom: 15px; color:#0d6efd; ">REGISTRO DE PROGRAMAS EN SNIES</h1>
      <div class="mb-3">
        <label class="form-label">Nombre del programa</label>
        <input type="text" name="nomb_programa" class="form-control">
      </div>
      <div class="mb-3 input-snies">
        <label class="form-label">Codigo de SNIES</label>
        <input type="number" name="snies" class="form-control">
      </div>

      <div class="mb-3  input-creditos">
        <label class="form-label">Creditos</label>
        <input type="number" name="creditos" class="form-control">
      </div>
      <div class="mb-3 input-semestres">
        <label class="form-label">Semestres</label>
        <input type="number" name="semestres" class="form-control">
      </div>
      <div class="mb-3 input-periocidad">
        <label class="form-label">Periocidad</label>
        <input type="number" name="periocidad" class="form-control">
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="municipios">
        <select class="selectpicker" name="cod_munic" data-show-subtext="true" data-live-search="true">
          <option selected>Municipio</option>
          <?php
          require_once '/home/cesar/Documentos/programas_snies/app/controllers/consultas/municipios.php';

          $munics = Municipio::municip();

          foreach ($munics as $munic) {
            echo '
            <option value="' . $munic['cod_munic'] . '">' . $munic['nomb_munic'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="nivel_academico">
        <select class="selectpicker" name="cod_nivel" data-show-subtext="true" data-live-search="true">
          <option selected>Nivel academico</option>
          <?php
          require_once '/home/cesar/Documentos/programas_snies/app/controllers/consultas/nivel.php';

          $nivels = Nivel::academ();

          foreach ($nivels as $nivel) {
            echo '
            <option value="' . $nivel['cod_nivel'] . '">' . $nivel['nomb_nivel'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="modalidades">
        <select class="selectpicker" name="cod_modalidad" data-show-subtext="true" data-live-search="true">
          <option selected>Modalidades</option>
          <?php
          require_once '/home/cesar/Documentos/programas_snies/app/controllers/consultas/modalidades.php';

          $modalidades = Modalidad::elegir();

          foreach ($modalidades as $modalidad) {
            echo '
            <option value="' . $modalidad['cod_modalidad'] . '">' . $modalidad['nomb_modalidad'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="campo_amplio">
        <select class="selectpicker" name="cod_amplio" data-show-subtext="true" data-live-search="true">
          <option selected>Campo amplio</option>
          <?php
          require_once '/home/cesar/Documentos/programas_snies/app/controllers/consultas/amplio.php';

          $amplios = Campo::amplio();

          foreach ($amplios as $amplio) {
            echo '
            <option value="' . $amplio['cod_amplio'] . '">' . $amplio['nomb_amplio'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="campo_especifico">
        <select class="selectpicker" name="cod_especifico" data-show-subtext="true" data-live-search="true">
          <option selected>Campo especifico</option>
          <?php
          require_once '/home/cesar/Documentos/programas_snies/app/controllers/consultas/especifico.php';

          $especificos = CampoA::especifico();

          foreach ($especificos as $especifico) {
            echo '
            <option value="' . $especifico['cod_especifico'] . '">' . $especifico['nomb_especifico'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="campo_detallado">
        <select class="selectpicker" name="cod_detallado" data-show-subtext="true" data-live-search="true">
          <option selected>Campo detallado</option>
          <?php
          require_once '/home/cesar/Documentos/programas_snies/app/controllers/consultas/detallado.php';

          $detallados = CampoD::detallado();

          foreach ($detallados as $detallado) {
            echo '
            <option value="' . $detallado['cod_detallado'] . '">' . $detallado['nomb_detallado'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="estados">
        <select class="selectpicker" name="cod_estado" data-show-subtext="true" data-live-search="true">
          <option selected>Estados</option>
          <?php
          

          $estados = CampoD::estado();

          foreach ($estados as $estado) {
            echo '
            <option value="' . $estado['cod_estado'] . '">' . $estado['nomb_estado'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="municipio">
        <select class="selectpicker" name="cod_inst" data-show-subtext="true" data-live-search="true">
          <option selected value="0">Instituciones</option>
          <?php
          

          $institucions = CampoD::institucion();

          foreach ($institucions as $institucion) {
            echo '
            <option value="' . $institucion['cod_inst'] . '">' . $institucion['nomb_inst'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="container-select_form-progrmas" style="display: inline-block" id="municipio">
        <select class="selectpicker" name="cod_titulo" data-show-subtext="true" data-live-search="true">
          <option selected>Titulo otorgado</option>
          <?php
          $titulos = CampoD::titul();

          foreach ($titulos as $titulo) {
            echo '
            <option value="' . $titulo['cod_titulo'] . '">' . $titulo['nomb_titulo'] . '</option>';
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-submit">SUBMIT</button>

    </form>
  </div>

  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  <script src="../assets/code.js"></script>
 
  

</body>

</html>