<template>
  <div>
    <header class="text-center text-primary font-weight-bold display">
      <h3>MANUTENÇÕES</h3>
    </header>

    <div class="card">
      <div class="card-body">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Nome do proprietário</th>
              <th>Empreendimento</th>
              <th>Solicitação do proprietário</th>
              <th>Data da solicitação</th>
              <th>Resolução</th>
              <th>Observação</th>
            </tr>
          </thead>
          <tr>
            <td>Teste de</td>
            <td>Casa e número</td>
            <td>Problema a ser resolvido</td>
            <td>10/06/2019</td>
            <td
              class="pointer text-primary"
              data-toggle="modal"
              data-target="#mediumModal"
            >
              <span class="text-primary">Visita Agendada</span>
            </td>
            <td>Nenhuma</td>
          </tr>
        </table>
      </div>
    </div>
    <div
      class="modal fade show"
      id="mediumModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="mediumModalLabel"
      style=""
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mediumModalLabel">Resolução</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <tr>
                <th>Resolução</th>
                <th>Custo</th>
                <th>Data da resolução</th>
                <th>Data da garantia</th>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="btn btn-primary">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Manutencoes",
};
</script>

<style>
.pointer {
  cursor: pointer;
}
</style>
