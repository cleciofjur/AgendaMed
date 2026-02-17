<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar nova consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEvento" id="formEvento" action="nuevoEvento.php" class="form-horizontal" method="POST">
        <div class="form-group">
          <label for="nome" class="col-sm-12 control-label">Nome:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="nome" required />
          </div>
        </div>
        <div class="form-group">
          <label for="numero_familia" class="col-sm-12 control-label">Número da Família:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="numero_familia" id="numero_familia" required />
          </div>
        </div>
        <div class="form-group">
          <label for="data_inicio" class="col-sm-12 control-label">Data da Consulta</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="data_inicio" id="data_inicio">
          </div>
        </div>
        <div class="form-group">
          <label for="hora_inicio" class="col-sm-12 control-label">Horário de Início</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
          </div>
        </div>
        <div class="form-group">
          <label for="hora_final" class="col-sm-12 control-label">Horário de Fim</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="hora_final" id="hora_final">
          </div>
        </div>

        <div class="form-group">
          <label for="area_consulta" class="col-sm-12 control-label">Área da Consulta</label>
          <div class="col-sm-10">
            <select class="form-control" name="area_consulta" id="area_consulta">
              <option>Escolha o profissional</option>
              <?php
              include 'config.php';

              $profissionais = array(
                'enfermeiro' => 'COREN',
                'odontologo' => 'CRO',
                'medico' => 'CRM',
                'fisioterapeuta' => 'CREFITO',
                'psicologo' => 'CRP'
              );

              foreach ($profissionais as $profissao => $codigo) {
                $query = "SELECT nome, $codigo FROM $profissao";
                $resultado = mysqli_query($con, $query);

                while ($row = mysqli_fetch_array($resultado)) {
                  echo "<option value='" . $row[$codigo] . "'>" . $row[$codigo] . " - " . $row['nome'] . "</option>";
                }
              }

              mysqli_close($con);
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="area_consulta" class="col-sm-12 control-label">Especialidade</label>
          <div class="col-sm-10">
            <select class="form-control" name="especializacao" id="especializacao">
              <option>Médico</option>
              <option>Enfermeiro</option>
              <option>Psicológo</option>
              <option>Fisioterapeuta</option>
              <option>Odontologo</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="background-color: blue;">Salvar consulta</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>