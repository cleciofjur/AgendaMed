<?php
if (isset($_REQUEST['e'])) { ?>
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Concluído!</strong> A consulta foi marcada com sucesso!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>

<?php
if (isset($_REQUEST['ea'])) { ?>
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Atualizado!</strong> A consulta foi atualizada com sucesso!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <strong>Excluído!</strong> A consulta foi excluída com sucesso!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>