 
<?php $__env->startSection('content'); ?>




<div class="col-xs-8 col-xs-offset-2">

    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Nova Manutenção ou Avaria </h3>
        </div>
        <form action="./cadastrar" method="POST">
            <div class="box-body ">
                <table class="table text-center table-condensed">
                    <tr class="bg-warning">
                        <td>
                            <h5 class="text-primary">Unidade de Negócio</h5>
                        </td>
                        <td>
                            <select name="casa" class="form-control" id="">
                                <option value="">Asturias</option>
                            </select></td>
                        </td>
                    </tr>
                    <tr class="bg-warning">
                            <td>
                                <h5 class="text-primary">Casa</h5>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="numero_casa">
                            </td>
                        </tr>
                    <tr class="bg-warning">
                        <td>
                            <h5 class="text-primary">Data de Garantia</h5>
                        </td>
                        <td>
                            <input type="date" class="form-control" name="data_garantia" id=""></td>

                        </td>
                    </tr>
                    <tr class="bg-warning">
                        <td>
                            <h5 class="text-primary">Proprietário</h5>
                        </td>
                        <td>
                            <select name="proprietario" class="form-control" id="">
                                <option value="">Nome do proprietario</option>
                            </select></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Tipo de solicitação</h5>
                        </td>
                        <td>
                            <select name="casa" class="form-control" id="">
                                <option value="">Estrutural</option>
                                <option value="">Piso</option>
                                <option value="">Azuleijos</option>
                                <option value="">Alvenaria</option>
                                <option value="">Pintura</option>     
                                <option value="">Elétrica</option>  
                                <option value="">Esquadrias</option>                         
                            </select></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Descrição</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="descricao">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Data da Solicitação</h5>
                        </td>
                        <td>
                            <input type="date" class="form-control" name="data_solicitacao" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Data da Visita Tecnica</h5>
                        </td>
                        <td>
                            <input type="date" class="form-control" name="data_visita" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Link das Fotos</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="link_fotos" id=""></td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Nome do tecnico</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="nome_tecnico" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Data da Solicitação</h5>
                        </td>
                        <td>
                            <input type="date" class="form-control" name="data_manutencao" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Empresa que realizou</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="nome_empresa" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Materiais Usados</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="materiais_usados" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Custo</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="custo" id=""></td>
                    </tr>


                </table>
            </div>
            <div class="box-footer">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="submit" class="text-right btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>