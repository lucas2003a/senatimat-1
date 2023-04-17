<!doctype html>
<html lang="es">

<head>
  <title>Title</title>
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
  <button type="button" class="btn btn-success btn-md mt-3" data-bs-toggle="modal" data-bs-target="#modal-estudiante">
    Ver Formulario
  </button>

  <!-- <div class="container mt-3">
    <div class="card table-responsive">
      <div class="card-header bg-info text-light">
        <div class="row">
          <div class="col-md-6">
            <strong>LISTA DE ESTUDIANTES</strong>
          </div>
          <div class="col-md-6 text-end">
            <button class="btn btn-success btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-estudiante"><i class="bi bi-plus-square-fill"></i> FORMULARIO ESTUDIANTE</button>
          </div>
        </div>
      </div>-->
    <div class="container mt-3">
      <div class="table-responsive">
        <table id="tabla-estudiantes" class="table table-striped table-sm">
          <thead>
            <th>#</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Tipo</th>
            <th>Documento</th>
            <th>Nacimiento</th>
            <th>Carrera</th>
            <th>Operaciones</th>
          </thead>
          <tbody>
                
              </tbody>
          </table>
      </div>
    </div>
  
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-estudiante" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-light">
          <h5 class="modal-title" id="modalTitleId">Estudiantes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Da capacidad de recibir binarios al formulario: enctype="multipart/form-data"-->
          <form action="" id="formulario-estudiantes" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
              <!-- CAMPO APELLIDOS -->
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control form-control-sm" id="apellidos">
              </div>
              <!-- CAMPO NOMBRES -->
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control form-control-sm" id="nombres">
              </div>
            </div>
            <!-- CAMPO TIPO DOCUMENTO -->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="tipodocumento" class="form-label">Tipo Documento</label>
                <select id="tipodocumento" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                  <option value="D">DNI</option>
                  <option value="C">Carnet de Extranjería</option>
                </select>
              </div>
              <!-- CAMPO NÚMERO DOCUMENTO-->
              <div class="mb-3 col-md-6">
                <label for="nrodocumento" class="form-label">Número Documento</label>
                <input type="text" class="form-control form-control-sm" id="nrodocumento">
              </div>
            </div>
            <!-- CAMPO FECHA DE NACIMIENTO-->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for=fechanacimiento class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control form-control-sm" id="fechanacimiento">
              </div>
              <!-- CAMPO SEDE-->
              <div class="mb-3 col-md-6">
                <label for="sede" class="form-label">Sede: </label>
                <select id="sede" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
            <!-- CAMPO ESCUELA -->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="escuela" class="form-label">Escuela: </label>
                <select id="escuela" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
              <!-- CAMPO CARRERAS -->
              <div class="mb-3 col-md-6">
                <label for="carrera" class="form-label">Carreras</label>
                <select id="carrera" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
            <!-- CAMPO FOTOGRAFÍA -->
              <div class="mb-3">
                <label for="fotografia" class="form-label">Fotografía</label>
                <!-- Atributo que impida enviar cualquier otro archivo que no sea .jgp= accept-->
                <input type="file" accept=".jpg" class="form-control form-control-sm" id="fotografia">
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cerrar</button>
          <button type="button" class="btn btn-outline-success btn-sm" id="guardar-estudiante"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">    
  </script>
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lightbox JS -->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>

  <script>
    $(document).ready(function() {

      // OBTENER LAS SEDES DE LA BASE DE DATOS
      function obtenerSedes(){
        // Obteniendo de forma asíncrona
        $.ajax({
          url : '../controllers/sede.controller.php',
          type : 'POST',
          data : { operacion : 'listar'},
          dataType : 'text',
          success : function(result){
            $("#sede").html(result);
          }
        });
      }

      function obtenerEscuelas(){
        $.ajax({
          url : '../controllers/escuela.controller.php',
          type : 'POST',
          data : { operacion : 'listar'},
          dataType : 'text',
          success : function(result){
            $("#escuela").html(result);
          }
        });
      }

      // LISTAR ESTUDIANTES
      function mostrarEstudiantes(){
        $.ajax({
          url : '../controllers/estudiante.controller.php',
          type: 'POST',
          data: { operacion: 'listar'},
          dataType: 'text',
          success : function(result){
            $("#tabla-estudiantes tbody").html(result);
          }
            
        });
      }
      mostrarEstudiantes();

      function registrarEstudiante(){

        // Enviaremos los datos dentro de un objeto 
        var formData = new FormData();
        // .val() cuando se trabjaa con input
        formData.append("operacion", "registrar");
        formData.append("apellidos", $("#apellidos").val());
        formData.append("nombres", $("#nombres").val());
        formData.append("tipodocumento", $("#tipodocumento").val());
        formData.append("nrodocumento", $("#nrodocumento").val());
        formData.append("fechanacimiento", $("#fechanacimiento").val());
        formData.append("idcarrera", $("#carrera").val());
        formData.append("idsede", $("#sede").val());
        formData.append("fotografia", $("#fotografia")[0].files[0]);
        

        $.ajax({
          url: '../controllers/estudiante.controller.php',
          type: 'POST',
          data: formData,
          contentType: false, // Porque se desactiva estos procesos!?, eso sucede cuando se usa un array
          processData: false,
          // Memoria temporal
          cache: false,
          success: function(){
            $("#formulario-estudiantes")[0].reset();
            $("#modal-estudiante").modal("hide");
            alert("Guardado correctamente");
          }
        });
      }

      function preguntarRegistro(){
        Swal.fire({
          icon: 'question',
          title: 'Matrículas',
          text: '¿Está seguro de registrar al estudiante?',
          footer: 'Desarrollado con PHP',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#33C0FF',
          showCancelButton: true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          // Identificando la acción del usuario
          if (result.isConfirmed){
            //console.log("Guardando datos...");
            registrarEstudiante();
          }
        });
      }

      $("#guardar-estudiante").click(preguntarRegistro);

      // Al cambiar una escuela, se actualizará las carreras
      $("#escuela").change(function (){
        const idescuelaListar = $(this).val();
        console.log(idescuelaListar);
        $.ajax({
          url : '../controllers/carrera.controller.php',
          type : 'POST',
          data : {
            operacion : 'listar',
            idescuela : idescuelaListar
          },
          dataType : 'text',
          success: function(result){
            $("#carrera").html(result);
          }
        });
      });

      // Predeterminamos un control dentro del modal
      $("#modal-estudiante").on("shown.bs.modal", event =>{
        $("#apellidos").focus();

        obtenerSedes();
        obtenerEscuelas();
      });
      
    });
  </script>

</body>

</html>