<template>
  <div>
    <header class="text-center text-primary font-weight-bold display">
      <h3>RELATORIO DE VISITAS LAS PALMAS</h3>
    </header>

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped table-condensed table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Data da visita</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="pointer"
                  v-for="(item, key, index) in clienteslaspalmas"
                  :key="item.id"
                >
                  <td>{{ index + 1 }}</td>
                  <td>{{ item.nome }}</td>
                  <td>{{ item.data_agenda }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";

export default {
  name: "Visitas",
  data() {
    return {};
  },

  methods: {
    ...mapActions(["getClientesLasPalmas"]),
  },
  computed: {
    ...mapState({
      clienteslaspalmas: (state) => state.Clientes.laspalmas,
    }),
  },
  mounted() {
    this.getClientesLasPalmas();
  },
};
</script>

<style>
.table td,
.table th {
  padding: 6px 5px;
  font-size: 13px;
  vertical-align: middle;
  border-top: 1px solid #dee2e6;
}

.nowrap {
  white-space: nowrap;
}

.pointer {
  cursor: pointer;
}
</style>
