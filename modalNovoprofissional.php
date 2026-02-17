<div class="modal" id="modalProfissional" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar profissional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formProfissional" id="formEvento" action="novoProfissional.php" class="form-horizontal" method="POST">
        <div class="form-group">
          <label for="nome" class="col-sm-12 control-label">Nome:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="nome" />
          </div>
        </div>

        <div class="form-group">
          <label for="area_consulta" class="col-sm-12 control-label">Área da Consulta</label>
          <div class="col-sm-10">
            <select class="form-control" name="area-profissional" id="area-profissional">
              <option value="selecione">Selecione...</option>
              <option value="medico">Médico</option>
              <option value="enfermeiro">Enfermeiro</option>
              <option value="psicologo">Psicólogo</option>
              <option value="odontologo">Odontólogo</option>
              <option value="fisioterapeuta">Fisioterapeuta</option>
            </select>
          </div>
        </div>
        <!-- Campo extra para CRM (Médico) -->
        <div class="form-group" id="campoCRM" style="display: none;">
          <label for="crm" class="col-sm-12 control-label">CRM: *será seu código de entrada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="crm" id="crm" maxlength="10" />
          </div>
        </div>

        <!-- Campo extra para COREN (Enfermeiro) -->
        <div class="form-group" id="campocoren" style="display: none;">
          <label for="coren" class="col-sm-12 control-label">COREN: *será seu código de entrada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="coren" id="coren" maxlength="10" />
          </div>
        </div>

        <!-- Campo extra para CRP (Psicólogo) -->
        <div class="form-group" id="campoCRP" style="display: none;">
          <label for="crp" class="col-sm-12 control-label">CRP: *será seu código de entrada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="crp" id="crp" maxlength="10" />
          </div>
        </div>

        <!-- Campo extra para CRO (Odontólogo) -->
        <div class="form-group" id="campoCRO" style="display: none;">
          <label for="cro" class="col-sm-12 control-label">CRO: *será seu código de entrada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="cro" id="cro" maxlength="10" />
          </div>
        </div>

        <!-- Campo extra para CREFITO (Fisioterapeuta) -->
        <div class="form-group" id="campoCREFITO" style="display: none;">
          <label for="crefito" class="col-sm-12 control-label">CREFITO: *será seu código de entrada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="crefito" id="crefito" maxlength="10" />
          </div>
        </div>

        <div class="form-group">
          <label for="senha" class="col-sm-12 control-label">Senha:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="senha" id="senha" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="background-color: blue;">Cadastrar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>