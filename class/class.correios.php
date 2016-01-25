<?php

/**
 * Created by PhpStorm.
 * User: jorge-jr
 * Date: 23/01/16
 * Time: 13:59
 */
class freteCorreios
{
    private $parametros;

    public function init(){
        $this->parametros=array();
        // Código e senha da empresa, se você tiver contrato com os correios, se não tiver deixe vazio.
        $this->parametros['nCdEmpresa']='';
        $this->parametros['sDsSenha'] = '';
        $this->parametros['sCepOrigem'] = '';
        $this->parametros['sCepDestino'] = '';
        $this->parametros['nVlPeso'] = '';
        $this->parametros['nCdFormato'] = '1';
        $this->parametros['nVlComprimento'] = '';
        $this->parametros['nVlAltura'] = '';
        $this->parametros['nVlLargura'] = '';
        $this->parametros['nVlDiametro'] = '';
        $this->parametros['sCdMaoPropria'] = 'n';
        $this->parametros['nVlValorDeclarado'] = '0';
        $this->parametros['sCdAvisoRecebimento'] = 's';
        $this->parametros['StrRetorno'] = 'xml';
        //40010 -> SEDEX 40215->SEDEX10 41106->PAC
        $this->parametros['nCdServico'] = '40010,41106';

    }

    public function setnCdEmpresa($value){
        $this->parametros['nCdEmpresa']=$value;
    }
    public function setsDsSenha($value){
        $this->parametros['sDsSenha']=$value;
    }
    public function setsCepOrigem($value){
        // CEP de origem. Esse parametro precisa ser numérico, sem "-" (hífen) espaços ou algo diferente de um número.
        $this->parametros['sCepOrigem']=str_replace('-','',$value);
    }
    public function setsCepDestino($value){
        // CEP de destino. Esse parametro precisa ser numérico, sem "-" (hífen) espaços ou algo diferente de um número.
        $this->parametros['sCepDestino']=str_replace('-','',$value);
    }
    public function setnVlPeso($value){
        // O peso do produto deverá ser enviado em quilogramas, leve em consideração que isso deverá incluir o peso da embalagem.
        $this->parametros['nVlPeso']=str_replace(',','.',$value);
    }
    public function setnCdFormato($value){
        // O formato tem apenas duas opções: 1 para caixa / pacote e 2 para rolo/prisma.
        $this->parametros['nCdFormato']=(int)$value;
    }
    public function setnVlComprimento($value){
        $this->parametros['nVlComprimento']=(double)$value;
    }
    public function setnVlAltura($value){
        $this->parametros['nVlAltura']=(double)$value;
    }
    public function setnVlLargura($value){
        $this->parametros['nVlLargura']=(double)$value;
    }
    public function setnVlDiametro($value){
        $this->parametros['nVlDiametro']=(double)$value;
    }
    public function setsCdMaoPropria($value){
        // Aqui você informa se quer que a encomenda deva ser entregue somente para uma determinada pessoa após confirmação por RG. Use "s" e "n".
        $this->parametros['sCdMaoPropria']=$value;
    }
    public function setnVlValorDeclarado($value){
        // O valor declarado serve para o caso de sua encomenda extraviar, então você poderá recuperar o valor dela. Vale lembrar que o valor da encomenda interfere no valor do frete. Se não quiser declarar pode passar 0 (zero).
        $this->parametros['nVlValorDeclarado']=$value;
    }
    public function setsCdAvisoRecebimento($value){
        // Se você quer ser avisado sobre a entrega da encomenda. Para não avisar use "n", para avisar use "s".
        $this->parametros['sCdAvisoRecebimento']=$value;
    }
    public function setnCdServico($values){
        $this->parametros['nCdServico']=implode(',',$values);
    }
    public function getI(){
        return count(explode(',',$this->parametros['nCdServico']));
    }
    public $codigoServico;
    public $valorServico;
    public $prazoentregaServico;
    public $erroServico;
    public function calcularFreteeEntrega(){

        $parametros = http_build_query($this->parametros);
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $curl = @curl_init($url.'?'.$parametros);
        @curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $dados = @curl_exec($curl);
        $dados = simplexml_load_string($dados);
        foreach ($dados->cServico as $linhas)
        {
            if ($linhas->Erro == 0)
            {

                $this->codigoServico[]=$linhas->Codigo;
                $this->valorServico[]=$linhas->Valor;
                $this->prazoentregaServico[]=$linhas->PrazoEntrega;
                $this->erroServico[]=null;

            }
            else {
                $this->codigoServico[]=$linhas->Codigo;
                $this->valorServico[]=null;
                $this->prazoentregaServico[]=null;
                $this->erroServico[]=$linhas->MsgErro;
            }
        }
    }

}
