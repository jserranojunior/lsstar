
<?php $__env->startSection('content'); ?>


<div class="col-xs-10 col-xs-offset-1">

    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">

                <?php if($tipocliente == "proprietario"): ?>
                Proprietários
                <?php else: ?>
                Clientes

                <a href="<?php echo e(Route('cliente.create')); ?>">
                    <div class="btn btn-info float-right">(+) NOVO</div>
                </a>
                <?php endif; ?>


            </h3>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-body ">
            <table id="tabelaclientes" class=" display table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Telefone
                        </th>
                        <?php if($tipocliente == "proprietario"): ?>
                        <th>
                            Empreendimento
                        </th>
                        <th>
                            Numero
                        </th>
                        <?php endif; ?>
                        
                    </tr>

                </thead>
                <tbody>
           
                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr onclick="editar('<?php echo e($cliente->id); ?>');">
                        <td>
                            <?php echo e($cliente->nome); ?>

                        </td>
                        <td>
                            <?php echo e($cliente->email); ?>

                        </td>
                        <td>
                            <?php echo e($cliente->telefone); ?>

                        </td>
                        <?php if($tipocliente == "proprietario"): ?>
                        <td>
                        <?php if(!empty($cliente->nome_empreendimento)): ?>
                            <?php echo e($cliente->nome_empreendimento); ?>

                        <?php endif; ?>    

                        </td>
                        <td>
                        <?php if(!empty($cliente->numero_empreendimento)): ?>
                            <?php echo e($cliente->numero_empreendimento); ?>

                        <?php endif; ?>    
                        </td>
                        <?php endif; ?>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</div>



<script>
    

    function editar($id) {
        window.location.href = "cliente/editar/" + $id;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>