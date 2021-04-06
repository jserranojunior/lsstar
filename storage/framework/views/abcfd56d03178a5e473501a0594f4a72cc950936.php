
<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $objetos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objeto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="col-xs-12">
    <div class='box box-info'>
        <div class='box-header with-border text-center'>
            EDITAR CONTA
        </div>
        <div class='box-body'>
            <form class="form-horizontal" method="post" action="<?php echo e(Route('financeiro.update')); ?>">
                
                <div class="form-group">
                    <label for="favorecido" class='col-xs-4  control-label'>Fornecedor</label>
                    <div class="col-xs-8">
                        
                        <select name="favorecido"  id="favorecido" class="form-control select_busca input_menor">
                        <option selected><?php echo e($objeto->favorecido); ?></option>
                            <?php $__currentLoopData = $favorecidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorecido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($favorecido->fornecedor); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class='col-xs-4 control-label'>Tipo de conta</label>	
                    <div class="col-xs-8">
                        <select name="tipo" id="tipo" class="form-control ">                                                    
                           <option <?php if($objeto->tipo == "Extra"): ?>selected <?php endif; ?> value="Extra">À Vista</option>
                           <option <?php if($objeto->tipo == "Parcelado"): ?>selected <?php endif; ?>  value="Parcelado">Parcelado</option>
                           <option <?php if($objeto->tipo == "Fixo"): ?>selected <?php endif; ?>  value="Fixo">Mensal</option>
                        </select>
                    </div>
                </div>



                

                <div class="form-group">
                    <label for="inicio_conta" class="col-xs-4 control-label">Data Pagamento</label>
                    <div class="col-xs-8">
                        <input type="date" name="inicio_conta"  id="inicio_conta" value="<?php echo e($objeto->inicio_mes); ?>" class="form-control"></input>
                    </div>
                </div>

                <div class="form-group">

                    <label for="valor" class="col-xs-4 control-label">
                    <p id="valor-vista">Valor</p> 
                    <p id="valor-parcela" class="ocultar">Valor de cada parcela</p>
                    </label>

                    <div class="col-xs-8">
                        <input type="text" name="valor" value="<?php echo e($objeto->valor); ?>" id="valor" class=" valor_mascara form-control"></input>
                    </div>
                </div>

                <div class="form-group" id="group-parcelas">
                    <label for="parcelas" class="col-xs-4 control-label">Quantida de parcelas</label>
                    <div class="col-xs-8">
                        <input type="number" name="parcelas" value="<?php echo e($objeto->parcelas); ?>" id="parcelas" class="form-control"></input>
                    </div>
                </div>
                

                <div class="form-group">
                    <label for="area" class="col-xs-4 control-label">Negócios</label>
                    <div class="col-xs-8"> 
                        <select name="area" id="area" class="select_busca form-control">
                        <option selected><?php echo e($objeto->area); ?></option>
                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($area->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ccustos"  class="col-xs-4 control-label">Conta</label>
                    <div class="col-xs-8"> 
                        <select name="ccustos" id="ccustos" class="form-control">
                            <option selected ><?php echo e($objeto->contas); ?></option>
                            <?php $__currentLoopData = $contas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($conta->nome); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="item" class="col-xs-4 control-label">Detalhes</label>
                    <div class="col-xs-8">
                      <input type="text" name="item" value="<?php echo e($objeto->item); ?>" id="item" class="form-control">
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="pagador"  class="col-xs-4 control-label">REC/NF</label>
                    <div class="col-xs-8"> 
                        <select name="pagador" id="pagador" class="form-control select_busca">                             
                            <option <?php if($objeto->pagador == "Recibo"): ?> selected <?php endif; ?>>Recibo</option>
                            <option <?php if($objeto->pagador == "Nota Fiscal"): ?> selected <?php endif; ?>>Nota Fiscal</option>
                        </select>
                    </div>
                </div>
  

        </div>
        <div class="box-footer with-border">
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-4">
                <input type="hidden" name="tipo_atual" value="<?php echo e($objeto->tipo); ?>">
                <input type="hidden" name="id" value="<?php echo e($objeto->id); ?>">
                <input type="hidden" name="$data_atual" value="<?php echo e($data_atual); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="submit" value="Atualizar" class="btn btn-primary">
                </div> 
                </form>


                <!-- Small modal -->

    <div class="col-sm-4">
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content text-center">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Deseja realmente excluir?</h4>
    </div>
    <div class="modal-body">
    <a href=" <?php echo e(Route('financeiro.destroy',$objeto->id)); ?>"><input type="submit" value="SIM" class="btn btn-primary"></a>
    <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Não</button>
    
    </div>

      
</div>
  </div>
</div>
</div>

                <div class="direita col-xs-4">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Excluir</button>

                </div>
            </div>
        </div>
    </div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.headertwo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>