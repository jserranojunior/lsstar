<?php $__env->startSection('content'); ?>


<div class="col-xs-10 col-xs-offset-1">
    <?php $__currentLoopData = $casa['casa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Editar <?php echo e($item->id); ?></h3>
        </div>
        <form action="../atualizar" method="POST">
            <div class="box-body ">
                <table class="table text-center table-condensed">
                    <tr>
                        <td>
                            <h5 class="text-primary">Empreendimento</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->nome); ?>" name="nome" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Casa</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->numero); ?>" name="numero" type="number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">N° Matricula</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->numero_matricula); ?>"  name="numero_matricula" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Data Matricula</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->data_matricula); ?>" name="data_matricula" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">CEP</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="cep" value="<?php echo e($item->cep); ?>" id="cep" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Logradouro</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->logradouro); ?>" name="logradouro" id="rua"
                                type="text">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5 class="text-primary">Bairro</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="bairro" value="<?php echo e($item->bairro); ?>" id="bairro" type="text">
                        </td>

                        <td>
                            <h5 class="text-primary">Status</h5>
                        </td>

                        <td>
                            <select name="status" id="" class="form-control">
                                <option <?php if($item->status == "Construção"): ?> selected <?php endif; ?>>Construção</option>
                                <option <?php if($item->status == "Á venda"): ?> selected <?php endif; ?>>Á venda</option>
                                <option <?php if($item->status == "Vendida"): ?> selected <?php endif; ?>>Vendida</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Proprietário</h5>
                        </td>
                        <td colspan="3">
                            <select name="cliente_id" id="" class="form-control">


                                    <?php if($item->cliente_id > '' or $item->cliente_id > null): ?>
                                    <option value="<?php echo e($item->cliente_id); ?>"><?php echo e($item->cliente_nome); ?></option>
                                    <?php else: ?>
                                   <option value=""></option>
                                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->nome); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>    

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Instalação de luz</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->numero_instalacao_luz); ?>" name="numero_instalacao_luz" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Fornecedor de luz</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->fornecedor_luz); ?>" name="fornecedor_luz" type="text">
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <h5 class="text-primary">RGI</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->rgi); ?>" name="rgi" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">N° IPTU</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->numero_iptu); ?>" name="numero_iptu" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">N° Habite-se</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->numero_habitese); ?>" name="numero_habitese" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Data Habite-se</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->data_habitese); ?>" name="data_habitese" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Alvará de Construção</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->alvara); ?>" name="alvara" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Data do Alvará</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" value="<?php echo e($item->data_alvara); ?>" name="data_alvara" type="date">
                        </td>
                    </tr>

                </table>
            </div>
            <div class="box-footer">
                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="submit" class="text-right btn btn-primary" value="Atualizar">
            </div>
        </form>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>