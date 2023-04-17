<!doctype html>
<html lang="es">

<head>
  <title>Colaboradores</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- ÍCONOS FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Lightbox CSS -->
  <link rel="stylesheet" href="../dist/lightbox2/src/css/lightbox.css">

</head>

<body>
  <!-- Modal trigger button -->
  <button type="button" class="btn btn-success btn-md mt-3 ms-3" data-bs-toggle="modal" data-bs-target="#modal-colaborador">
    Registro Colaboradores
  </button>

  <div class="container mt-3">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-sm table-striped" id="tabla-colaboradores">
          <colgroup> <!-- colgroup: Permite ordenar las tablas -->
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "15%">
            <col width = "10%">
          </colgroup>
          <thead>
            <tr>
              <th>#</th>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Cargo</th>
              <th>Sede</th>
              <th>Télefono</th>
              <th>Dirección</th>
              <th>Tipo Contrato</th>
              <th>Curriculum Vitae</th>
              <th>Operaciones</th>
            </tr>
          </thead>
          <!-- DATOS DE PRUEBA -->
          <tbody>
          </tbody> <!-- FIN DE DATOS PRUEBA-->
        </table>
      </div>
    </div>
  </div>
</div> <!-- FIN DEL CONTAINER -->
  
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-colaborador" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-light">
          <h5 class="modal-title" id="modalTitleId">Colaboradores</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Da capacidad de recibir binarios al formulario: enctype="multipart/form-data"-->
          <form action="" id="formulario-colaboradores" autocomplete="off" enctype="multipart/form-data">
          <div class="row">
              <!-- CAMPO APELLIDOS -->
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label"><strong>Apellidos</strong></label>
                <input type="text" class="form-control form-control-sm" id="apellidos">
              </div>
              <!-- CAMPO NOMBRES -->
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label"><strong>Nombres</strong></label>
                <input type="text" class="form-control form-control-sm" id="nombres">
              </div>
            </div>
            <!-- CAMPO CARGO -->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="cargo" class="form-label"><strong>Cargo: </strong></label>
                <select id="cargo" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
              <!-- CAMPO SEDES -->
              <div class="mb-3 col-md-6">
                <label for="sede" class="form-label"><strong>Sede: </strong></label>
                <select id="sede" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
            <!-- CAMPO TELÉFONO -->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="telefono" class="form-label"><strong>Teléfono</strong></label>
                <input type="text" class="form-control form-control-sm" id="telefono">
              </div>
              <!-- CAMPO DIRECCIÓN -->
              <div class="mb-3 col-md-6">
                <label for="direccion" class="form-label"><strong>Dirección</strong></label>
                <input type="text" class="form-control form-control-sm" id="direccion">
              </div>
            </div>
            <!-- CAMPO TIPO CONTRATO -->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="tipocontrato" class="form-label"><strong>Tipo Contrato: </strong></label>
                <select id="tipocontrato" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
              <!-- CAMPO CV -->
              <div class="mb-3 col-md-6">
                <label for="cv" class="form-label"><strong>Curiculum Vitae</strong></label>
                <!-- Atributo que impida enviar cualquier otro archivo que no sea .jgp= accept-->
                <input type="file" accept=".pdf" class="form-control form-control-sm" id="cv">
              </div>
            </div>
          </form> <!-- FIN DEL FORMULARIO -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cerrar</button>
          <button type="button" class="btn btn-outline-success btn-sm" id="guardar-colaborador"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lightbox JS -->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>

</body>

</html>