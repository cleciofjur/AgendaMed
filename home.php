<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AgendaMed</title>
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="icon" href="img/logo-AgendaMed.png">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php
  include('config.php');

  $SqlEventos = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);

  ?>

  <div class="sidebar">
    <h2>AgendaMed</h2>
    <br><br>
    <ul>
      <li><a href="home.php">Página Inicial</a></li>
      <li><a href="consultas.php">Consultas Agendadas</a></li>
      <li><a href="funcionarios/medico/index.php">Médico(a)</a></li>
      <li><a href="funcionarios/odonto/index.php">Odontologo(a)</a></li>
      <li><a href="funcionarios/psico/index.php">Psicólogo(a)</a></li>
      <li><a href="funcionarios/enf/index.php">Enfermeiro(a)</a></li>
      <li><a href="funcionarios/fisio/index.php">Fisioterapeuta</a></li>
      <li><a href="gerenciarProfissionais.php">Gerenciar profissionais</a></li>
      <li><a href="https://wa.me/+5597984464572">Ajuda</a></li>
    </ul>
    <br><br><br><br>
    <a href="index.php" class="logout">Sair</a>
  </div>

  <!-- <div class="mt-5"></div> -->

  <div class="container">
    <header style="display: flex; justify-content: space-between;">
      <h3 style="margin: 0;">Agenda</h3>
      <button class="btn btn-primary cadastro" style="background-color: #192951; border: none;">Cadastrar+</button>
    </header>
    <br>
    <div class="row">
      <div class="col msjs">
        <?php
        include('msjs.php');
        ?>
      </div>
    </div>
    <div id="calendar"></div>
  </div>

  <?php
  include('modalNuevoEvento.php');
  include('modalNovoprofissional.php');
  ?>

  <script src="js/jquery-3.0.0.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.cadastro').click(function () {
        $('#modalProfissional').modal('show');
      });
    });

    $('#area-profissional').change(function () {
      var selectedOption = $(this).val();
      $('#campoCRM, #campocoren, #campoCRP, #campoCRO, #campoCREFITO').hide();
      if (selectedOption === 'medico') {
        $('#campoCRM').show();
      } else if (selectedOption === 'enfermeiro') {
        $('#campocoren').show();
      } else if (selectedOption === 'psicologo') {
        $('#campoCRP').show();
      } else if (selectedOption === 'odontologo') {
        $('#campoCRO').show();
      } else if (selectedOption === 'fisioterapeuta') {
        $('#campoCREFITO').show();
      }
    });

    $(document).ready(function () {
      $("#calendar").fullCalendar({
        themeSystem: 'bootstrap4',
        height: 540,
        header: {
          left: "prev,next today",
          center: "title",
          right: "month,agendaWeek,agendaDay",

        },

        buttonText: {
          today: 'Hoje',
          month: 'Mês',
          week: 'Semana',
          day: 'Dia',
        },

        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho',
          'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ],

        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua',
          'Quin', 'Sex', 'Sab'
        ],

        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta',
          'Quinta', 'Sexta', 'Sabádo'
        ],

        defaultView: "month",
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: false,

        //Novo Evento
        select: function (start, end) {
          $("#exampleModal").modal();
          $("input[name=data_inicio]").val(start.format('DD-MM-YYYY'));

          var valorDataFinal = end.format("DD-MM-YYYY");
          var D_final = moment(valorDataFinal, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY');
          $('input[name=data_final]').val(D_final);

        },

        events: [
          <?php
          while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
              _id: '<?php echo $dataEvento['ID']; ?>',
              title: '<?php echo $dataEvento['nome']; ?>',
              start: '<?php echo $dataEvento['data_inicio'] . ' ' . $dataEvento['hora_inicio']; ?>',
              end: '<?php echo $dataEvento['data_inicio'] . ' ' . $dataEvento['hora_final']; ?>',
            },
          <?php } ?>
        ],

        //Eliminar Evento
        eventRender: function (event, element) {
          element
            .find(".fc-content")
            .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#128465</span>");

          //Eliminar evento
          element.find(".closeon").on("click", function () {

            var pregunta = confirm("Deseja apagar este evento?");
            if (pregunta) {

              $("#calendar").fullCalendar("removeEvents", event._id);

              $.ajax({
                type: "POST",
                url: 'deleteEvento.php',
                data: {
                  id: event._id
                },
                success: function (datos) {
                  $(".alert-danger").show();

                  setTimeout(function () {
                    $(".alert-danger").slideUp(500);
                  }, 3000);

                }
              });
            }
          });
        },

        // //Movimento de arrastar e soltar 
        // eventDrop: function(event, delta) {
        //   var idEvento = event._id;
        //   var start = event.start.format('YYYY-MM-DD HH:mm:ss');
        //   var end = event.end.format('YYYY-MM-DD HH:mm:ss');

        //   $.ajax({
        //     url: 'drag_drop_evento.php',
        //     data: {
        //       start: start,
        //       end: end,
        //       idEvento: idEvento
        //     },
        //     type: "POST",
        //     success: function(response) {
        //       // Faça algo com a resposta, se necessário
        //     }
        //   });
        // },
        // //Modificar evento no calendário
        // eventClick: function(event) {
        //   var idEvento = event.id;
        //   var nome = event.title;
        //   var data_inicio = event.start.format('DD-MM-YYYY');
        //   $('#idEvento').val(idEvento);
        //   $('#nome').val(nome);
        //   $('#data_inicio').val(data_inicio);

        //   $("#modelUpdateEvento").modal();
        // }

      });

      //Ocultar mensagens de notificação
      setTimeout(function () {
        $(".alert").slideUp(300);
      }, 3000);
    });
  </script>
</body>

</html>