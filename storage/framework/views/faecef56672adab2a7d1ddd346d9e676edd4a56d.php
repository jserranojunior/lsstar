
<?php $__env->startSection('content'); ?>

<h3 class="text-center">Relatório Consolidado</h3>

<div class="col-md-8 col-md-offset-2">
<table class="table table-hover table-condensed" >
    <tr>
        <th class="text-center">#</th>
        <th>NOME</th>
        <th class="text-right">2017</th>
        <th class="text-right">2018</th>
        <th class="text-right">2019</th>
        <th class="text-right">TOTAL</th>
    </tr>

    <?php $__currentLoopData = $dados['unidades']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr onclick="location.href = '<?php echo e(url('financeiro/anual')); ?>';">
        <td  class="text-center"> <?php echo e($count++); ?> </td>
        <td> <?php echo e($item['nomeUnidade']); ?> </td>        
        <?php $__currentLoopData = $item['valores']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td  class="text-right">
                    <?php if($valor > 0): ?> 
                    <?php echo e(number_format($valor ,2,',','.')); ?>

                    <?php else: ?>
                    0,00
                    <?php endif; ?>                 
               </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <td  class="text-right text-warning text-bold">
                <?php if($item['soma'] > 0): ?> 
                <?php echo e(number_format($item['soma'] ,2,',','.')); ?>

                <?php else: ?>
                0,00
                <?php endif; ?> 
       
        </td>
       

        
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  
    <tr>
        <td class="text-center">#</td>
        <td>TOTAL</td>       
        <?php $__currentLoopData = $dados['total']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td class="text-right text-primary text-bold"> <?php echo e($total); ?></td>        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </tr>
</table>
</div>                               
                            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>