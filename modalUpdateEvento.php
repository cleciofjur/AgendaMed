<div class="modal" id="modelUpdateEvento" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atualizar consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEventoUpdate" id="formEventoUpdate" action="UpdateEvento.php" class="form-horizontal" method="POST">
        <input type="hidden" class="form-control" name="idEvento" id="idEvento">
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
              <option value="medico">Médico</option>
              <option value="enfermeiro">Enfermeiro</option>
              <option value="psicologo">Psicólogo</option>
              <option value="odontologo">Odontólogo</option>
              <option value="fisioterapeuta">Fisioterapeuta</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="especializacao" class="col-sm-12 control-label">Especialização</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="especializacao" id="especializacao">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="background-color: blue;">Salvar alterações</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>