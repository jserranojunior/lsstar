
<?php $__env->startSection('content'); ?>
<div class="atualizar" onunload="window.opener.location.reload();"></div>
<div class="parte-cima">
  <div class="row">
    <?php if(Auth::user()->id == 2 or Auth::user()->id == 3 or Auth::user()->id == 5 or Auth::user()->id == 1): ?>
    <!-- PANEL 1 -->
    <div class="col-md-4 ">
      <div class="box box-info">
        <div class="box-header with-border">
          <p class="center bold">Relatórios</p>
        </div>
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-4 text-center">
              <a class="btn btn-primary btn-xs" href="<?php echo e(Url('financeiro/anual/2017')); ?>" role="button">Anual 2017</a>
            </div>
            <div class="col-md-4 text-center">
              <a class="btn btn-primary btn-xs" href="<?php echo e(Url('financeiro/anual/2018')); ?>" role="button">Anual 2018</a>
            </div>

            <div class="col-md-4 text-center">
              <a class="btn btn-primary btn-xs" href="<?php echo e(Url('financeiro/anual/2019')); ?>" role="button">Anual 2019</a>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 ">
              <a class="btn btn-info btn-xs" href="<?php echo e(Route('financeiro.relatorioconsolidado')); ?>" role="button">Relatório Consolidado</a>
            </div>
            <div class="col-md-6 ">
              <a class="btn btn-danger btn-xs" href="<?php echo e(Route('financeiro.relatorioarea')); ?>" role="button">Relatório de Negócios</a>
            </div>
          </div>
        </div>
        <div class="box-footer">

        <div class="col-md-6">
        <input type="button" class="btn btn-success excel btn-xs" onclick="tableToExcel('tabelaprincipal', 'Contas a pagar')"   value="Exportar Excel">
       
             </div>
         
          <div class="col-md-6 ">
              <a class="btn btn-warning btn-xs" href="<?php echo e(Route('financeiro.mensal')); ?>" role="button">Relatório Mensal</a>
            </div>

        </div>
        
      </div>
    </div>
    <?php endif; ?>
    <!-- PANEL 2 -->
    <div class="col-md-4 ">
      <div class="box box-info">
        <div class="box-header with-border">
          <p class="center bold"> Data <?php echo e(Auth::user()->id); ?></p>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <ul class="nav nav-tabs">
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <a  href="#">
                    <?php echo e($nomeMes); ?>

                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"> 
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',01,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Janeiro</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',02,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Fevereiro</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',03,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Março</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',04,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Abril</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',05,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Maio</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',06,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Junho</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',07,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Julho</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',08,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Agosto</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',09,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Setembro</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',10,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Outubro</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',11,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Novembro</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',12,<?php echo e($ano); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Dezembro</a>
                </li>
                </ul>
              </div>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-tabs">
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <a  href="#">
                    <?php echo e($ano); ?>

                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>, 2017,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">2017</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>, 2018,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">2018</a>
                </li>
                <li>
                <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>, 2019,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">2019</a>
                </li>
                </ul>
              </div>
            </ul>
          </div>
          <div class="row">
            <div class="proxant col-md-12 text-center">
              <a class="btn btn-default btn-xs" href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mesAnterior); ?>,<?php echo e($anoAnterior); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');" >
                <p class="glyphicon glyphicon-menu-left"></p>
                Anterior 
              </a>
              <a class="btn btn-default btn-xs"  href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mesConst); ?>,<?php echo e($anoConst); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');">Atual</a>
              <a class="btn btn-default btn-xs"  href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mesPosterior); ?>,<?php echo e($anoPosterior); ?>,'<?php echo e($areafiltro); ?>','<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>');"  >
                Próximo
                <p class="glyphicon glyphicon-menu-right"></p>
              </a>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="col-xs-4">
            <a class="esquerda btn btn-primary btn-sm" href="#" onclick="criar('<?php echo e($dataatual); ?>');"                                          >
            (+)  Incluir</a>
          </div>
          <div class="col-xs-4">
            <input type="number" class="form-control" id="diaInicial" value="<?php echo e($diaInicial); ?>" name="diaInicial" form="formulariofiltros">
          </div>
          <div class="col-xs-4">
            <input type="number" class="form-control" id="diaFinal" value="<?php echo e($diaFinal); ?>" name="diaFinal" form="formulariofiltros">
          </div>
        </div>
      </div>
    </div>
    <!--FECHAMENTO PAINEL 2 -->
    <div class="col-md-4 ">
      <div class="box box-info">
        <div class="box-header with-border">
          <p class="center bold">Legenda</p>
        </div>
        <div class="box-body">
          <div class="col-md-6 ">
            <span class="icone icone-cheque"></span> Cheque emitido
            <br>
            <span class="icone icone-setemaior"></span> Maior que 7%
            <br>
            <span class="glyphicon glyphicon-ok icone"></span> Selecionado
          </div>
          <div class="col-md-6 ">
            <span class="icone icone-transferencia"></span>  Transferência
            <br>
            <span class="icone icone-setemenor"></span> Menor que 7%
            <br>
            <span class="glyphicon glyphicon-unchecked icone"></span> Não selecionado
          </div>
        </div>
        <div class="box-footer">
          <input class="btn btn-info emitir btn-sm" type="submit"  form='form-emitir' value="Emitir Pagamento" >
          <div class="col-md-6 float-right">
            <div class=" btn btn-warning btn-sm" id="descerpagina"> TOTAL  <span class="glyphicon  glyphicon-chevron-down"></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- LINHA FILTRO -->
<!-- FIM LINHA FILTRO -->
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <table  class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
          <thead>
            <tr>
              <th class="text-center"></th>
              <th>
                <style>
                  .row-ecra{
                  margin-bottom:5px;
                  }
                  .a-black{
                  color:black;
                  }
                  .a-black:hover{
                  color:black;
                  }
                  .nav-tabs > li > a {
                  margin-right: 0px;
                  line-height: 0;
                  border: 0px solid transparent;
                  border-radius: 0px 0px 0 0;
                  }
                  bootstrap.css:3986
                  .nav > li > a {
                  position: relative;
                  display: block;
                  padding: 10px 0px;
                  }
                  .filtro-hr{
                  color:black;
                  font-size:12px;
                  }
                  .nav > li > a {
                  position: relative;
                  display: block;
                  padding: 10px 3px;
                  }
                  .nav-hr {
                  border-bottom: 0px solid #ddd;
                  }
                </style>
                <!-- PAINEL AREAS -->
                <div class="">
                  <ul class="nav nav-tabs nav-hr">
                    <li class="dropdown <?php if($areafiltro != "Todos"): ?>filtroselect <?php endif; ?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="filtro-hr bold"> Negócios </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>,<?php echo e($ano); ?>, 'Todos', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')">Todos</a>
                      </li>
                      <?php $__currentLoopData = $all_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($f_area->nome); ?>', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')"><?php echo e($f_area->nome); ?></a>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </li>
                  </ul>
                </div>
              </th>
              <th>
                <!-- PAINEL CONTAS -->
                <div class="">
                  <ul class="nav nav-tabs nav-hr">
                  <li class="dropdown <?php if($contafiltro != "Todos"): ?>filtroselect <?php endif; ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <span class="filtro-hr bold"> Contas </span> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', 'Todos', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')">Todos</a>
                    </li>
                    <?php $__currentLoopData = $all_conta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_conta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
                    <li>
                      <a href="#" onclick="enviar('<?php echo e($ordenacao); ?>',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($f_conta->nome); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')"><?php echo e($f_conta->nome); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </th>
              <th>


                  <!-- PAINEL PAGADOR -->
                <div class="">
                  <ul class="nav nav-tabs nav-hr">
                    <li class="dropdown dropdown <?php if($tipofiltro != "Todos"): ?>filtroselect <?php endif; ?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="filtro-hr bold"> Tipo </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#" onclick="enviar('favorecido',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>',  '<?php echo e($pagadorfiltro); ?>', 'Todos')">Todos</a>
                      </li>
                      <li>
                        <a href="#" onclick="enviar('favorecido',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>',  '<?php echo e($pagadorfiltro); ?>', 'Extra')">Á vista</a>
                      </li>
                      <li>
                        <a href="#" onclick="enviar('dia',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', 'Parcelado')">Parcelado</a>
                      </li>
                      <li>
                        <a href="#" onclick="enviar('dia',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', 'Fixo')">Mensal</a>
                      </li>
                    </ul>
                    </li>
                  </ul>
                </div>


              </th>
              <th>
                <p class="bold">Pg</p>
              </th>
              <th>
                <a href="#" class="" onclick="enviar('favorecido',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')">
                <span class="filtro-hr bold">  Favorecido </span> <span class="caret"></span>
                </a>
              </th>
              <th>
                <!-- PAINEL PAGADOR -->
                <div class="">
                  <ul class="nav nav-tabs nav-hr">
                    <li class="dropdown dropdown <?php if($pagadorfiltro != "Todos"): ?>filtroselect <?php endif; ?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="filtro-hr bold"> REC/NF </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#" onclick="enviar('favorecido',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>',  'Todos', '<?php echo e($tipofiltro); ?>')">Todos</a>
                      </li>
                      <li>
                        <a href="#" onclick="enviar('favorecido',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>',  'Nota Fiscal', '<?php echo e($tipofiltro); ?>')">Nota Fiscal</a>
                      </li>
                      <li>
                        <a href="#" onclick="enviar('dia',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>', 'Recibo', '<?php echo e($tipofiltro); ?>')">Recibo</a>
                      </li>
                    </ul>
                    </li>
                  </ul>
                </div>
              </th>
              <th>
                <a href="#" onclick="enviar('dia',<?php echo e($mes); ?>,<?php echo e($ano); ?>, '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')">
                <span class="filtro-hr bold">  Venc </span> <span class="caret"></span>
                </a>
              </th>
              <th>
                <p class="bold">Á Pagar</p>
              </th>
          </thead>
          <tbody>
            <span class="invisible">   <?php echo e(($i = 1)); ?> </span>
            <form method="post" action="financeiro/emitirpagamento" name="form-emitir" id="form-emitir">
              <?php $__currentLoopData = $contas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <tr  class="point">
                <td class="text-center" onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e($i++); ?> 
                </td>
                <td style= "white-space: nowrap;" onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e($conta->area); ?>

                </td>
                <td onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e($conta->ccustos); ?>

                </td>
                <td onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e($conta->tipo); ?>

                </td>
                <td class="text-center" style="background-color:<?php echo e($conta->tipo_pagamento); ?>;"
                <?php if($conta->tipo_pagamento == '#2196f3'): ?>
                onclick="cheque('<?php echo e($conta->numero_cheque); ?>');"
                <?php endif; ?> 
                >
                <?php if($conta->tipo_pagamento !== '#2196f3'): ?>
                <?php echo $conta->tipo_pagamento; ?>

                <?php endif; ?>  
                </td>
                <td style= "white-space: nowrap;" onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <span class='bold'><?php echo e($conta->favorecido); ?></span> - <?php echo e($conta->item); ?>

                  <span class='bold azul'> <?php if($conta->tipo == 'Parcelado'): ?>
                  (<?php echo e($conta->parcelas); ?>)</span>
                  <?php endif; ?>
                </td>
                <td class="text-right" onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e($conta->pagador); ?> 
                </td>
                <td class="text-center" onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e($conta->dia); ?>

                </td>
                <td class="text-right" onclick="editar('<?php echo e($conta->id); ?>','<?php echo e($dataatual); ?>');">
                  <?php echo e(number_format($conta->valor, 2, ',', '.')); ?> 
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" form="form-emitir" name="dataconta" id="dataconta" value="<?php echo e($dataatual); ?>">
              <input type="hidden" form='form-emitir'  name="datacompleta" value="<?php echo e($dataatualcompleta); ?>">
              <input type="hidden" form='form-emitir'  name="_token" value="<?php echo e(csrf_token()); ?>">
            </form>
            <tr class="trcolor">
              <td colspan="5" ></td >
              <td class="azulclaro" colspan="2">
                <span class="bold  numaior direita">TOTAL DO MÊS</span>
              </td>
              <td></td>
              <td class="azulclaro" colspan="1">
                <span class="bold numaior  azul">
                  <p class="centronum"><?php echo e($totalsomames); ?></p>
                </span>
              </td>
            </tr>
            <tr class="trcolor">
              <td colspan="6" > Total de pendencias: 
              <?php if($dataatual == "2019-09"): ?>
              <span class="bold azul">Engas - 27.000,00 </span></td>
              <?php endif; ?>

              <td class="" colspan="1">
                <span class="direita">Total pago</span>
              </td>
              <td></td>
              <td class="">
                <span class="direita"><?php echo e($totalpago); ?></span>
              </td>
            </tr>
            <tr class="trcolor">
              <td colspan="6" ></td>
              <td class="" colspan="1">
                <span class="direita">A pagar</span>
              </td>
              <td></td>
              <td class="">
                <span class="direita"><?php echo e($apagar); ?></span>
              </td>
            </tr>
            <tr class="trcolor">
              <td colspan="5" ></td >
              <td class="azulclaro" colspan="2">
                <span class="bold  numaior direita">TOTAL ESTIMADO</span>
              </td>
              <td></td>
              <td class="azulclaro" colspan="1">
                <span class="bold numaior  azul">
                  <p class="centronum"><?php echo e($totalestimado); ?></p>
                </span>
              </td>
            </tr>
            <tr class="trcolor">
              <td colspan="4" >
                <span>¹Parcelamento com valor variável</span>
              </td>
            </tr>
            <tr></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<form method="post" action="<?php echo e(Route('financeiro.index')); ?>" name="formulario" id="formulariofiltros">
  <input type="hidden" value="" name="mes" id="mes">
  <input type="hidden" value="" name="ano" id="ano">
  <input type="hidden" value="" name="areafiltro" id="areafiltro">
  <input type="hidden" value="" name="contafiltro" id="contafiltro">
  <input type="hidden" value="" name="pagadorfiltro" id="pagadorfiltro">
  <input type="hidden" value="" name="tipofiltro" id="tipofiltro">
  <input type="hidden" value="" name="ordenacao" id="ordenacao">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form>
<script>
  function enviar(ordenacao, mes, ano, areafiltro, contafiltro, pagadorfiltro, tipofiltro){
    var ordenacao;
  var mes;
  var ano;
  var areafiltro;
  var contafiltro;
  var pagadorfiltro;
  var tipofiltro;
  
  document.getElementById('mes').value = mes;
  document.getElementById('ano').value = ano;
  document.getElementById('ordenacao').value = ordenacao;
  document.getElementById('areafiltro').value = areafiltro;
  document.getElementById('contafiltro').value = contafiltro;
  document.getElementById('pagadorfiltro').value = pagadorfiltro;
  document.getElementById('tipofiltro').value = tipofiltro;
  document.getElementById("formulariofiltros").submit();
  }
  
  function editar($id,$data) { 
   var $url = 'financeiro/'+$id+'/'+$data+'/editar';
   var width = 560;
   var height = 650;   
  var left = 400;
      var top = 100; 
    window.open($url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
   }
  
  function criar($data) {   
      var $url = 'financeiro/criar/'+$data;
       var width = 560;
       var height = 568;    
     var left = 400;
         var top = 100;    
       window.open($url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');      
     }
  
     function cheque($cheque) {   
      var $url = 'vue#/financeiro/pagamentoemitido/'+$cheque;
       var width = 900;
       var height = 400;    
     var left = 550;
         var top = 250;    
       window.open($url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
      
     }
     /* Defaults */ 


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
 
  
      $(document).ready(function(){
  
  
                  function filtroDia(){
                      enviar('<?php echo e($ordenacao); ?>','<?php echo e($mes); ?>','<?php echo e($ano); ?>', '<?php echo e($areafiltro); ?>', '<?php echo e($contafiltro); ?>', '<?php echo e($pagadorfiltro); ?>', '<?php echo e($tipofiltro); ?>')
                       }
  
                      $('#diaInicial').change(function() {                            
                          filtroDia();                
                      });
  
                      $('#diaFinal').change(function() {                            
                          filtroDia();                
                      });
  
          
      });
  
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>