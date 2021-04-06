
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Agendamento de Visitas</h3>
        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
       
                    <!-- PANEL 2 -->
                    <div class="col-md-4 col-md-offset-4">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="col-md-6">
                                            <ul class="nav nav-tabs">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <a  href="#">
                                                        <?php echo e($mesEscrito); ?> <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="#" onclick="enviar('01',<?php echo e($ano); ?>);">Janeiro</a></li>
                                                        <li><a href="#" onclick="enviar('02',<?php echo e($ano); ?>);">Fevereiro</a></li>
                                                        <li><a href="#" onclick="enviar('03',<?php echo e($ano); ?>);">Março</a></li>
                                                        <li><a href="#" onclick="enviar('04',<?php echo e($ano); ?>);">Abril</a></li>
                                                        <li><a href="#" onclick="enviar('05',<?php echo e($ano); ?>);">Maio</a></li>
                                                        <li><a href="#" onclick="enviar('06',<?php echo e($ano); ?>);">Junho</a></li>
                                                        <li><a href="#" onclick="enviar('07',<?php echo e($ano); ?>);">Julho</a></li>
                                                        <li><a href="#" onclick="enviar('08',<?php echo e($ano); ?>);">Agosto</a></li>
                                                        <li><a href="#" onclick="enviar('09',<?php echo e($ano); ?>);">Setembro</a></li>
                                                        <li><a href="#" onclick="enviar('10',<?php echo e($ano); ?>);">Outubro</a></li>
                                                        <li><a href="#" onclick="enviar('11',<?php echo e($ano); ?>);">Novembro</a></li>
                                                        <li><a href="#" onclick="enviar('12',<?php echo e($ano); ?>);">Dezembro</a></li>
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">  
                                            <ul class="nav nav-tabs">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <a  href="#">
                                                           <?php echo e($ano); ?> <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="#" onclick="enviar('<?php echo e($mes); ?>',2017);">2017</a></li>
                                                        <li><a href="#" onclick="enviar('<?php echo e($mes); ?>',2018);">2018</a></li>
                                                    
                                                        <li><a href="#" onclick="enviar('<?php echo e($mes); ?>',2019);">2019</a></li>
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="proxant col-md-12 text-center">  
                                                <a class="btn btn-default btn-xs" href="#" onclick="enviar('<?php echo e($mesAnterior); ?>','<?php echo e($anoAnterior); ?>');" >
                                                    <p class="glyphicon glyphicon-menu-left"></p> Anterior 
                                                </a>

                                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('<?php echo e($mesAtual); ?>','<?php echo e($anoAtual); ?>');">Atual</a> 
                                                
                                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('<?php echo e($mesPosterior); ?>','<?php echo e($anoPosterior); ?>');"  >
                                                    Próximo<p class="glyphicon glyphicon-menu-right"></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="box-footer">
                                    <a class="direita btn btn-warning btn-sm" href="<?php echo e(ROUTE('agenda.calendario')); ?>">
                                            (<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>)  Calendário</a>
                                            

                                         <a class="esquerda btn btn-primary btn-sm" href="<?php echo e(ROUTE('agenda.create')); ?>">
                                            (+)  Incluir</a>
                                    </div>
                                </div>
                            </div><!--FECHAMENTO PAINEL 2 -->
               
    </div>
</div>
    
<div class="row">
            <div class="col-md-12">
        <div class="box">    
            <div class="box-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Data</th>
                            <th>Horario</th>
                            <th>Nome</th>
                            <th>Referência</th>
                            <th>Imóvel/Rua</th>
                            <th>Resultado da Visita</th>
                            <th>Expectativas de Negócios</th>                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" ><?php echo e($count += 1); ?></a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" ><?php echo e($dado->data); ?></a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" > <?php echo e($dado->horario); ?></a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('cliente/editar')); ?>/<?php echo e($dado->id_cliente); ?>" ><?php echo e($dado->nome); ?> </a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" ><?php echo e($dado->referencia); ?></a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" ><?php echo e($dado->imovel); ?></a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" ><?php echo e($dado->resultado); ?></a></td>
                            <td class="point"><a class="link-tabela" href="<?php echo e(Url('agenda/editar')); ?>/<?php echo e($dado->id); ?>" ><?php echo e($dado->expectativa); ?></a></td>                   
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form method="post" action="<?php echo e(Route('agenda.index')); ?>" name="formulario" id="formulariofiltros">
    <input type="hidden" value="" name="mes" id="mes">
    <input type="hidden" value="" name="ano" id="ano">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form> 

                            <script>
function enviar(mes, ano){

var mes;
var ano;

    document.getElementById('mes').value = mes;
    document.getElementById('ano').value = ano;
    document.getElementById("formulariofiltros").submit();
}


</script>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>