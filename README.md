# Cálculo de frete PAC e SEDEX c/ PHP

Este script webservice tem por objetivo integrar o sistema em desenvolvimento ao cálculo de frete dos Correios. Para tal processo, foi adotado as seguintes funções e respectivos parâmetros:

* Recebimento de dados empresa contratante dos Correios, sendo opcional o seu preenchimento.
* Recebimento de dados de origem e destino.
* Recebimento de dados do produto a ser enviado, cujo parâmetros precisam ser numéricos, sem "-" (hífen) espaços ou algo diferente de um número. O peso do produto deverá ser enviado em quilogramas e o formato tem apenas duas opções: 1 para caixa / pacote e 2 para rolo/prisma. O comprimento, altura, largura e diametro deverá ser informado em centímetros e somente números.
* Requerimento de autenticação: informa se encomenda deve ser entregue somente para uma determinada pessoa após confirmação por RG.
* Preenchimento de declaração de valor para recuperação do mesmo caso extravio de encomenda.
* Retorno da consulta: seleciona o formato o qual a consulta será retornada. O formato de resposta selecionado pelo desenvolvedor foi XML.
* Código de serviço: emite o código do serviço prestado. 

###### Referência Bibliográfica
Calcular Valor Frete PAC e Sedex com PHP  em [mauricioprogramador](http://www.mauricioprogramador.com.br/posts/calcular-valor-frete-pac-e-sedex-com-php).


