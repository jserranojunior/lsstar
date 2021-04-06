
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <h3 class="text-center">Emitir Pagamento</div>

<div class="box">
<div class="box-body">
        <form name="emitirpagamento" method="post" action="<?php echo e(Route('financeiro.salvarpagamento')); ?>" class="form-inline">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="col-xs-4">
                    <label for="tipopagamento" class="control-label">Tipo Pagamento</label>
                </div>

                <div class="col-xs-8">
                    <select class="form-control" name="tipopagamento" id="tipopagamento" required>
                    <option></option>
                    <option>Cartão</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Transferência">Transferência</option>
                    </select>
                </div>
            </div>
            

            <div class="form-group">
                <div class="col-xs-4">
                    <label for="numeropagamento" class="control-label">N°</label>
                </div>

                <div class="col-xs-8">
                    <input type="text"  class="form-control" value="<?php echo e($numerocadastro); ?>" name="numeropagamento" required id="numeropagamento">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-4">
                    <label for="link_comprovante" class="control-label">Link Comprovante</label>
                </div>

                <div class="col-xs-8">
                    <input type="text"  class="form-control" name="link_comprovante">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-4">
                    <label for="data" class="control-label">Data</label>
                </div>

                <div class="col-xs-8">
                    <input type="date" value="<?php echo e($data); ?>" class="form-control" name="data" id="data">
                </div>
            </div>

        </div>
        </div>    
</div>


        <table class="table table-condensed">
        <?php $__currentLoopData = $conta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td>
            <?php echo e($dado['favorecido']); ?> 
            </td>
            <td class="text-center">
            <?php echo e($dado['data']); ?> 
            </td>
            <td class="text-right">
            <?php echo e($dado['valor']); ?>

            </td>
        </tr>
        
        <input type="hidden" name="check_list[]" value="<?php echo e($dado['id']); ?>">

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="2" class="text-center text-bold">
                TOTAL
            </td>
            <td class="text-right text-bold">                
              <?php echo e($somavalor); ?>   
            </td>
        </tr>
        </table>

        <div class="col-xs-4 col-xs-offset-4 text-center">

        <input type="hidden" name="dataconta" value="<?php echo e($dataconta); ?>">
        <input type="hidden" name="somavalor" value="<?php echo e($somavalor); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="submit" class="btn btn-primary" value="EMITIR">
        </div> 
    </form>
    
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.headertwo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>