
<?php $__env->startSection('content'); ?>

<div class="col-xs-10 col-xs-offset-1">
        
    <div class="box box-info">
            <div class="box-head">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3 class="text-center"> FORNECEDORES </h3>
            </div>
            <div class="col-md-4 text-right">
                <a href="<?php echo e(URL('/fornecedor/criar')); ?>"> <div class="btn btn-primary ">NOVO</div></a>
            </div>
            </div>
            
    
               
            </div>

        <div class="box-body ">
<table id="tabelaclientes" class=" display table table-condensed table-hover"> 
    <thead>
        <tr>
            <th>
            Nome
            </th>
            <th>
           Endereço
            </th>
            <th>
            Numero
            </th>
            <th>
            Bairro
            </th>
        </tr>
       
    </thead>
    <tbody>
    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr onclick="editar('<?php echo e($dado->id); ?>');">
        <td>
        <?php echo e($dado->fornecedor); ?>

        </td>
        <td>
        <?php echo e($dado->endereco); ?>

        </td>
        <td>
        <?php echo e($dado->numero); ?>

        </td>
        <td>
        <?php echo e($dado->bairro); ?>

        </td>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

        </div>
    </div>
</div>

<script>
function editar($id){    
    window.location.href = "fornecedor/editar/"+$id;
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>