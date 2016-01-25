<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Informações do endereço de origem</h4></div>
            <div class="panel-body">
                 <? require_once 'cepFunction.php';$cepINFO=CEPdata($_POST['cepO']);?>
                 <table class="table table-hover">
                     <tbody>
                         <tr>
                             <td>UF</td>
                             <td><?= $cepINFO['uf'];?></td>
                         </tr>

                         <tr>
                             <td>Cidade</td>
                             <td><?= $cepINFO['cidade'];?></td>
                         </tr>
                         <tr>
                             <td>Bairro</td>
                             <td><?= $cepINFO['bairro'];?></td>
                         </tr>

                         <tr>
                             <td>Rua</td>
                             <td><?= $cepINFO['logradouro'];?></td>
                         </tr>

                     </tbody>
                 </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Informações do endereço de destino</h4></div>
            <div class="panel-body">
                 <? $cepINFO=CEPdata($_POST['cepD']);?>
                 <table class="table table-hover">
                     <tbody>
                         <tr>
                             <td>UF</td>
                             <td><?= $cepINFO['uf'];?></td>
                         </tr>

                         <tr>
                             <td>Cidade</td>
                             <td><?= $cepINFO['cidade'];?></td>
                         </tr>
                         <tr>
                             <td>Bairro</td>
                             <td><?= $cepINFO['bairro'];?></td>
                         </tr>

                         <tr>
                             <td>Rua</td>
                             <td><?= $cepINFO['logradouro'];?></td>
                         </tr>

                     </tbody>
                 </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Informações da entrega.</h4></div>
            <div class="panel-body">

<?php
if(count($_POST['servico'])>0){
require_once 'class/class.correios.php';
$c=new freteCorreios();
$c->init();
$c->setsCepOrigem($_POST['cepO']);
$c->setsCepDestino($_POST['cepD']);
$c->setnVlPeso($_POST['peso']);
$c->setnVlComprimento($_POST['comp']);
$c->setnVlAltura($_POST['alt']);
$c->setnVlLargura($_POST['larg']);
$c->setnVlDiametro('0');
$c->setnCdServico($_POST['servico']);
$c->calcularFreteeEntrega();
for($i=0;$i<$c->getI();$i++){

    ?>
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Código</td>
                <td><?= $c->codigoServico[$i];?></td>
            </tr>
             <tr>
                <td>Valor</td>
                <td><?= $c->valorServico[$i];?></td>
            </tr>
             <tr>
                <td>Prazo</td>
                <td><?= $c->prazoentregaServico[$i];?> dia<?= (int)$c->prazoentregaServico[$i]>1?'s':'';?></td>
            </tr>
            <? if(!empty($c->erroServico[$i])){
            ?>
            <tr>
                <td>Erro: </td>
                <td><?= $c->erroServico[$i];?></td>
            </tr>
            <?
            }
            ?>
        </tbody>
    </table>
    <?
}
}
?>

            </div>
        </div>
    </div>
</div>
