<?php $__env->startSection('content'); ?>

<style>
.scroll-horizontal {
    width: 100%;
    overflow-x: auto;
    white-space: nowrap;
     
}




</style>

<div class="row no-print">

<form action="<?php echo e(Route('financeiro.relatorioarea')); ?>" method="post">
    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <p class="center bold"> UNIDADE DE NEGÓCIO </p>
            </div>
            <div class="box-body">  
            <div class="col-md-6 col-md-offset-3">
            <select name="area" id="area" class="form-control" onchange="this.form.submit()">
        
                <?php $__currentLoopData = $dados['areas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemArea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($itemArea->nome == $dados['area']): ?> selected <?php endif; ?> value="<?php echo e($itemArea->nome); ?>"><?php echo e($itemArea->nome); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </select>           
            
                </div>   
                <div class="col-md-3">
                <input type="button" class=" text-right btn btn-success excel" onclick="tableToExcel('tabelaprincipal', 'Relatório Mensal')"   value="Excel">
       
                </div>       
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="box box-info">
            <div class="box-header with-border">
                <p class="center bold"> DATA DE INICIO </p>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <select name="mesInicio" class="form-control" onchange="this.form.submit()">
                
                        <option <?php if($dados['mesInicio'] == "01"): ?> selected <?php endif; ?> value="01">Janeiro</option>
                        <option <?php if($dados['mesInicio'] == "02"): ?> selected <?php endif; ?> value="02">Fevereiro</option>
                        <option <?php if($dados['mesInicio'] == "03"): ?> selected <?php endif; ?> value="03">Março</option>
                        <option <?php if($dados['mesInicio'] == "04"): ?> selected <?php endif; ?> value="04">Abril</option>
                        <option <?php if($dados['mesInicio'] == "05"): ?> selected <?php endif; ?> value="05">Maio</option>
                        <option <?php if($dados['mesInicio'] == "06"): ?> selected <?php endif; ?> value="06">Junho</option>
                        <option <?php if($dados['mesInicio'] == "07"): ?> selected <?php endif; ?> value="07">Julho</option>
                        <option <?php if($dados['mesInicio'] == "08"): ?> selected <?php endif; ?> value="08">Agosto</option>
                        <option <?php if($dados['mesInicio'] == "09"): ?> selected <?php endif; ?> value="09">Setembro</option>
                        <option <?php if($dados['mesInicio'] == "10"): ?> selected <?php endif; ?> value="10">Outubro</option>
                        <option <?php if($dados['mesInicio'] == "11"): ?> selected <?php endif; ?> value="11">Novembro</option>
                        <option <?php if($dados['mesInicio'] == "12"): ?> selected <?php endif; ?> value="12">Dezembro</option>
                    </select>
                </div>

            <div class="col-md-6">
                <select name="anoInicio" class="form-control" onchange="this.form.submit()">
                    <option <?php if($dados['anoInicio'] == "2017"): ?> selected <?php endif; ?> value="2017">2017</option>
                    <option <?php if($dados['anoInicio'] == "2018"): ?> selected <?php endif; ?> value="2018">2018</option>
                    <option <?php if($dados['anoInicio'] == "2019"): ?> selected <?php endif; ?> value="2019">2019</option>
                    <option <?php if($dados['anoInicio'] == "2020"): ?> selected <?php endif; ?> value="2020">2020</option>
                    <option <?php if($dados['anoInicio'] == "2021"): ?> selected <?php endif; ?> value="2021">2021</option>
                </select>
            </div>                        
            </div>                   
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="box box-info">
            <div class="box-header text-center with-border">
                <span class="text-center bold"> DATA FIM </span>
                
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <select name="mesFim" class="form-control" onchange="this.form.submit()">
                        <option <?php if($dados['mesFim'] == "01"): ?> selected <?php endif; ?> value="01">Janeiro</option>
                        <option <?php if($dados['mesFim'] == "02"): ?> selected <?php endif; ?> value="02">Fevereiro</option>
                        <option <?php if($dados['mesFim'] == "03"): ?> selected <?php endif; ?> value="03">Março</option>
                        <option <?php if($dados['mesFim'] == "04"): ?> selected <?php endif; ?> value="04">Abril</option>
                        <option <?php if($dados['mesFim'] == "05"): ?> selected <?php endif; ?> value="05">Maio</option>
                        <option <?php if($dados['mesFim'] == "06"): ?> selected <?php endif; ?> value="06">Junho</option>
                        <option <?php if($dados['mesFim'] == "07"): ?> selected <?php endif; ?> value="07">Julho</option>
                        <option <?php if($dados['mesFim'] == "08"): ?> selected <?php endif; ?> value="08">Agosto</option>
                        <option <?php if($dados['mesFim'] == "09"): ?> selected <?php endif; ?> value="09">Setembro</option>
                        <option <?php if($dados['mesFim'] == "10"): ?> selected <?php endif; ?> value="10">Outubro</option>
                        <option <?php if($dados['mesFim'] == "11"): ?> selected <?php endif; ?> value="11">Novembro</option>
                        <option <?php if($dados['mesFim'] == "12"): ?> selected <?php endif; ?> value="12">Dezembro</option>
                
                    </select>
                </div>

            <div class="col-md-6">
                <select name="anoFim" class="form-control" onchange="this.form.submit()">
                    <option  <?php if($dados['anoFim'] == "2017"): ?> selected <?php endif; ?> value="2017">2017</option>
                    <option <?php if($dados['anoFim'] == "2018"): ?> selected <?php endif; ?> value="2018">2018</option>
                    <option <?php if($dados['anoFim'] == "2019"): ?> selected <?php endif; ?> value="2019">2019</option>
                    <option <?php if($dados['anoFim'] == "2020"): ?> selected <?php endif; ?> value="2020">2020</option>
                    <option <?php if($dados['anoFim'] == "2021"): ?> selected <?php endif; ?> value="2021">2021</option>
                </select>
            </div>                        
            </div>                   
        </div>
    </div>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form>

</div>

<div class=" scroll-horizontal">       
            <table id="tabelaprincipal" class="table table-responsive">
                <thead>        
                    <th>#</th>
                    <th>Categorias</th>
                <?php $__currentLoopData = $dados['mesesTopo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                    <th><?php echo e($mes['nomeMes']); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <th class="text-green text-bold">TOTAL</th>        
                </thead>
                <tbody>
                <?php $__currentLoopData = $dados['relatorio']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <tr>     
                        <td><?php echo e($itens['ordem']); ?></td>
                            <td><?php echo e($itens['nome']); ?></td>
                        <?php $__currentLoopData = $itens['meses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class=""><?php echo e($mes['valor'] = number_format($mes['valor'],2,',','.')); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td class="text-green text-bold"><?php echo e($itens['totalAnualCategoria']); ?></td>
                    </tr>        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td>#</td>
                    <td  class="text-primary text-bold">TOTAL</td>
                <?php $__currentLoopData = $dados['mesesTopo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                    <td class="text-primary text-bold"><?php echo e($mes['valoresTotais']); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td class="text-warning text-bold "><?php echo e($dados['valorTotalAno']); ?></td>    
                </tr>   
                </tbody>
            </table>
</div>

<script>
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

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>