<?php $__env->startSection('content'); ?>



<!-- PANEL 2 -->
<div class="col-md-4 no-print">
    <a href="<?php echo e(route('financeiro.index')); ?>">
        <div class="btn btn-primary no-print">
            <span class="glyphicon glyphicon-arrow-left "></span> Voltar
        </div>
    </a>
</div>
<div class="col-md-4 col-md-offset-4 text-right no-print">
    <input type="button" class="esquerda btn btn-success excel btn" onclick="tableToExcel('tabelaprincipal', 'Relatório Mensal')"  id="btnExport" value="Excel">
</div>

<?php $__currentLoopData = $dadosAnuais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listaAnual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="tabela-geral">
    <div class="row row-text">
        <div class="col-md-12">
            <h5 class="text-center rel-mes-ano">Relatório Anual <?php echo e($listaAnual['anoContas']); ?> -
                Movimentação financeira por unidade de negócio
            </h5>
        </div>
    </div>
    <table class="table table-condensed" id="tabelaprincipal">
        <thead>
            <tr>
                <th>
                    Negócios
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(1); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Jan
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(2); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Fev
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(3); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Mar
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(4); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Abr
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(5); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Mai
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(6); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Jun
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(7); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Jul
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(8); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Ago
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(9); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Set
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(10); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Out
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(11); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Nov
                </th>
                <th class="point point-link text-center" onclick="enviar('favorecido',<?php echo e(12); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    Dez
                </th>
                <th>
                    TOTAL
                </th>
            </tr>

            <?php $__currentLoopData = $listaAnual['unidades']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($dado['unidade']); ?>

                </td>

                <?php $__currentLoopData = $dado['valor']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="text-right point point-link" onclick="enviar('favorecido',<?php echo e($val['mes']); ?>,<?php echo e($listaAnual['anoContas']); ?>,'<?php echo e($val['unidade']); ?>','Todos');">
                    <?php if($val['valor'] > 0): ?>
                    <?php echo e($val['valor']); ?>

                    <?php else: ?>
                    0,00
                    <?php endif; ?>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
             
                    <td class="bold text-warning text-right">
                    <?php echo e($dado['total']); ?>

                </td>
              
               
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php $__currentLoopData = $listaAnual['valores']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dadosGerais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <span class="bold">TOTAL</span>
                </td>
                
                <?php $__currentLoopData = $dadosGerais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <td class="text-primary bold text-right point point-link" onclick="enviar('favorecido',<?php echo e($totais['mes']); ?>,<?php echo e($listaAnual['anoContas']); ?>,'Todos','Todos');">
                    <?php echo e($totais['valorTotal']); ?>

                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td class="text-success bold text-right">
                    <?php echo e($listaAnual['totalano']); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </thead>
        <tbody>

        </tbody>
    </table>
    </table>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php $__env->stopSection(); ?>

    <form method="post" action="<?php echo e(Route('financeiro.index')); ?>" name="formulario" id="formulariofiltros">
        <input type="hidden" value="" name="mes" id="mes">
        <input type="hidden" value="" name="ano" id="anofiltro">
        <input type="hidden" value="" name="areafiltro" id="areafiltro">
        <input type="hidden" value="" name="contafiltro" id="contafiltro">
        <input type="hidden" value="" name="ordenacao" id="ordenacao">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    </form>

    <script>
        function enviar(ordenacao, mes, ano, areafiltro, contafiltro) {
            var ordenacao;
            var mes;
            var ano;
            var areafiltro
            var contafiltro

            document.getElementById('mes').value = mes;
            document.getElementById('anofiltro').value = ano;
            document.getElementById('ordenacao').value = ordenacao;
            document.getElementById('areafiltro').value = areafiltro;
            document.getElementById('contafiltro').value = contafiltro;

            document.getElementById("formulariofiltros").submit();
        }


        /* EXPORTAR EXCEL */
    //excel
    var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->   <meta charset="utf-8"></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    // window.location.href = uri + base64(format(template, ctx))
    var link = document.createElement("a");
                    link.download = "exportado.xls";
                    link.href = uri + base64(format(template, ctx));
                    link.click();
  }
})()
    </script>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>