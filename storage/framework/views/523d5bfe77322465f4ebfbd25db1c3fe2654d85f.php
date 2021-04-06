<?php $__env->startSection('content'); ?>


<div class="col-xs-10 col-xs-offset-1">

    <div class="box box-info">
            <div class="box-header with-border text-center">
                    <h3 class="box-title">Unidades de Negócio</h4>
  
                    <div class="box-tools pull-right">
                      <a href="casa/criar">
                      <button type="button" class="btn btn-box-tool">
                         
                          <span class="float-right btn btn-primary">
                                (+) Novo
                        </span>
                      </button>
                    </a>
                     
                    </div>
                  </div>

       

        <div class="box-body ">
            <table id="tabelacasa" class=" display table table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Número
                        </th>
                        <th>
                            Endereço
                        </th>
                        <th>RGI</th>
                        <th>Status</th>
                        
                    </tr>

                </thead>
                <tbody>
                    <?php $__currentLoopData = $casas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="editar('<?php echo e($item->id); ?>');">
                            
                        <td>
                            <?php echo e($item->nome); ?>

                        </td>
                        <td>
                            <?php echo e($item->numero); ?>

                        </td>
                        <td>
                            <?php echo e($item->logradouro); ?>

                        </td>
                        <td>
                            <?php echo e($item->rgi); ?>

                        </td>
                        <td>
                            <?php echo e($item->status); ?>

                        </td>
                     
                        
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tabelacasas').DataTable({
            "iDisplayLength": 100
        });
    });

    function editar($id) {
        window.location.href = "casa/editar/" + $id;
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>