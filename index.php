<!doctype html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>Correios Class</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/chosen.min.css">
    <script src="js/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn-calc').click(function(){
                $.post('control.php',$('form').serialize(), function (data) {
                    $('#res').html(data);
                });
            });
        });


    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Cálculo de frete/entrega</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form onsubmit="return false" class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">CEP Origem</label></div>
                        <div class="col-md-9"><input type="text" maxlength="9" name="cepO" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">CEP Destino</label></div>
                        <div class="col-md-9"><input type="text" maxlength="9" name="cepD" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">Peso</label></div>
                        <div class="col-md-9"><input type="text" maxlength="4" name="peso" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">Comprimento</label></div>
                        <div class="col-md-9"><input type="text" maxlength="9" name="comp" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">Altura</label></div>
                        <div class="col-md-9"><input type="text" maxlength="4" name="alt" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">Largura</label></div>
                        <div class="col-md-9"><input type="text" maxlength="4" name="larg" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3"><label for="" class="control-label">Serviço</label></div>
                        <div class="col-md-9">

                        <select name="servico[]" class="form-control chosen-select chosen-select-width chosen-select-no-results" multiple>
                            <option value="40010">SEDEX</option>
                            <option value="40215">SEDEX 10</option>
                            <option value="41106">PAC</option>
                            <option value="40290">SEDEX a Cobrar</option>
                            <option value="40290">SEDEX Hoje</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="button" class="btn btn-success pull-right btn-calc" value="Calcular">
                    </div>
                </div>
            </form>
            <div class="col-md-12" id="res">

            </div>
        </div>
    </div>
</div>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Nada encontrado'},
      '.chosen-select-width'     : {width:"100%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
</body>
</html>
