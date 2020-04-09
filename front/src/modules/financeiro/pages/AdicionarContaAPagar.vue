<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Adicionar Conta</h3>
                    </div>
                    <div class="card-body">
                        <CriarEditar></CriarEditar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CriarEditar from '@/modules/financeiro/components/CriarEditar'
    export default {
        name: "AdicionarContaAPagar",
        components:{
            CriarEditar
        }
    }
</script>
