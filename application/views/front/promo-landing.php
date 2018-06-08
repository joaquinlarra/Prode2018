<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Jugá al prode con tus amigos o empresa">

  <title>Jugá al Prode este mundial 2018</title>

  <!-- Bootstrap -->
  <link href="<?=$link_url?>assets_fe/landing/assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?=$link_url?>assets_fe/landing/assets/css/bootstrap-theme.css" rel="stylesheet">
  <link href="<?=$link_url?>assets_fe/landing/assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?=$link_url?>assets_fe/landing/assets/css/price-chart.css" rel="stylesheet">
  <!-- siimple style -->
  <link href="<?=$link_url?>assets_fe/landing/assets/css/style.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div id="wrapper" style="padding-bottom: 10px; padding-top:10px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <img src="<?=$link_url?>assets_fe/landing/assets/img/logo-mundial.png" class="logo" style="width:100%">
        </div>
        <div class="col-md-8">
        <br><br><h2 class="subtitle">Participá del mundial con tus amigos con la <b>app del prode.</b></h2>
        </div>
        <div class="col-md-12">
          <a href="http://demo.prode2018.com/" target="_blank" class="btn btn-warning" style="font-size:30px;margin-right: 10px"><b>PROBÁ LA DEMO</b></a>
          <span style="color: #ffffff; font-weight: bold">CODIGO DE REGISTRO : 042</span>
          <div id="countdown"></div>
        </div>
          <div class="col-md-12 col-sm-12">
              <div class="panel panel-specs">
                  <div class="panel-body" style="text-align: center;">
                      <h1>Fácil e intuitivo.</h1>
                      <div class="col-md-12"><h3 style="color: white;"> Cargamos los partidos, los resultados y calculamos los puntos.<br>Podés cambiar pronóstico hasta antes que empieze el partido.</h3></div>
                      <br>
                      <div class="col-md-6" style="text-align: left;">
                      <span class="glyphicon glyphicon-ok" style="color:forestgreen"></span> <b>Dominio propio:</b> http://<em><span style="color:orange">tu-nombre</span></em>.prode2018.com </br>
                      <span class="glyphicon glyphicon-ok" style="color:forestgreen"></span> <b>Multilenguaje:</b> Español, Inglés, Portugués </br>
                      </div>
                      <div class="col-md-6" style="text-align: left;">
                          <span class="glyphicon glyphicon-ok" style="color:forestgreen"></span> <b>Customizable:</b> subile tu logo, ponele tus colores.</br>
                          <span class="glyphicon glyphicon-ok" style="color:forestgreen"></span> <b>Mobile Friendly</b></br>
                      </div>
                      <div class="clearfix"></div>
                      <div align="center" style="font-size:28px; margin: 30px 0px;"><b>1.</b> Creás Grupo <b>2.</b> Elegís Tamaño <b>3.</b> Ya estás jugando!</div>
                  </div>
              </div>
          </div>
          <div class="col-md-8 col-sm-12 col-md-offset-2">
              <div class="panel panel-primary">
                  <div class="panel-body" style="text-align: left; padding: 0px 30px 20px 30px">
                      <h2 align="center" style="margin-bottom: 20px"><b>CREÁ TU GRUPO</b></h2>
                            <form class="ajax-form" id="company-form" method="post" action="<?= $link_url.'home/validate_contact_form/create_company'?>" enctype="multipart/form-data">
                              <div class="row" id="profile-info">
                                  <div id="contact_success" class="alert alert-success" style="display: none"></div>
                                  <div class="clearfix"></div>
                                  <div class="form-group contact" id="name_box">
                                      <label for="name" class="col-md-3 col-sm-12 control-label">Nombre del Grupo</label>
                                      <div class="col-sm-12 col-md-9"><input type="text" id="name" name="name" class="form-control " placeholder="" value=""></div>
                                      <div class="clearfix"></div>
                                      <div id="contact_error_name" class="contact_msg_error alert alert-danger" style="display:none"></div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="form-group contact" id="namespace_box">
                                      <label for="namespace" class="col-md-3 col-sm-12 control-label">URL</label>
                                      <div class="col-sm-6 col-md-4 col-xs-5" style="padding-right:0px"><input type="text" id="namespace" name="namespace" placeholder="Solo letras o números" class="form-control"><br></div>
                                      <div class="col-sm-6 col-md-5 col-xs-7">.prode2018.com</div>
                                      <div class="col-sm-12 col-xs-12 col-md-9 col-md-offset-3"></div>
                                      <div class="clearfix"></div>
                                      <div id="contact_error_namespace" class="contact_msg_error alert alert-danger" style="display:none"></div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="form-group contact" id="email_box">
                                      <label for="email" class="col-md-3 col-sm-12 control-label">Email del Admin</label>
                                      <div class="col-sm-12 col-md-9"><input type="text" id="email" name="email" class="form-control " value=""></div>
                                      <div class="col-sm-12 col-md-9 col-md-offset-3"><small>El <b>Admin</b> puede sacar jugadores de la lista y editar grupo.</small></div>

                                      <div class="clearfix"></div>
                                      <div id="contact_error_email" class="contact_msg_error alert alert-danger" style="display:none"> </div>
                                      <div class="clearfix"></div>

                                  </div>
                                  <div class="form-group contact" align="center">
                                      <div class="g-recaptcha" data-sitekey="6LdLQ10UAAAAAFO6kHOVwn4WG07ox26m8SkUL5hG"></div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <input class="btn btn-primary btn-block" type="submit" value="<?= lang("Crear Grupo")?>">
                              </div>
                            </form>
                      </h4>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="container" id="outer-box">
      <div class="row">
          <div class="col-xs-12 col-md-4">
              <div class="panel panel-primary">
                  <div class="panel-body">
                      <div class="the-price">
                          <h1>$300 <span style="font-weight: normal">ARS</span><br>
                              <small class="subscript">para 15 personas</small>
                          </h1>
                      </div>
                      </table>
                  </div>
                  <div class="panel-footer">
                    <a class="btn btn-orange checkout" href="<?=site_url().'checkout/15PERSONAS'?>">COMPRAR</a>
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-md-4">
          <div class="panel panel-primary">
            <div class="panel-body">
              <div class="the-price">
                <h1>$500 <span style="font-weight: normal">ARS</span><br>
                  <small class="subscript">para 25 personas</small>
                </h1>
              </div>
            </div>
            <div class="panel-footer">
              <a class="btn btn-orange checkout" href="<?=site_url().'checkout/25PERSONAS'?>">COMPRAR</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="panel panel-success">
            <div class="panel-body">
              <div class="the-price">
                <h1>$1000 <span style="font-weight: normal">ARS</span><br>
                  <small class="subscript">para 50 personas</small>
                </h1>
              </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-orange checkout" href="<?=site_url().'checkout/50PERSONAS'?>">COMPRAR</a>
              </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="panel panel-info">
            <div class="panel-body">
              <div class="the-price">
                <h1>$1500 <span style="font-weight: normal">ARS</span><br>
                  <small class="subscript">para 100 personas</small>
                </h1>
              </div>
            </div>
            <div class="panel-footer">
              <a class="btn btn-orange checkout" href="<?=site_url().'checkout/100PERSONAS'?>">COMPRAR</a>
            </div>
          </div>
        </div>
          <div class="col-xs-12 col-md-4">
              <div class="panel panel-info">
                  <div class="panel-body">
                      <div class="the-price">
                          <h1>$2500 <span style="font-weight: normal">ARS</span><br>
                              <small class="subscript">para 400 personas</small>
                          </h1>
                      </div>
                  </div>
                  <div class="panel-footer">
                    <a class="btn btn-orange checkout" href="<?=site_url().'checkout/400PERSONAS'?>">COMPRAR</a>
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-md-4">
              <div class="panel panel-info">
                  <div class="panel-body">
                      <div class="the-price">
                          <h1>$4000 <span style="font-weight: normal">ARS</span><br>
                              <small class="subscript">para 1000 personas</small>
                          </h1>
                      </div>
                  </div>
                  <div class="panel-footer">
                    <a class="btn btn-orange checkout" href="<?=site_url().'checkout/1000PERSONAS'?>">COMPRAR</a>
                  </div>
              </div>
          </div>
      </div>
        <div id="inner-box">
            <p>Creá tu grupo primero <span class="glyphicon glyphicon-arrow-up"></span></p>
        </div>
    </div>
  </div>
  <input type="hidden" id="company_id" value="" />
  <div class="container-fluid" id="bg-footer" style="padding:30px;0px; line-height: 30px; background-color: #000000; color: #ffffff">
          <div class="col-md-12">
              <div class="pull-left">
                  <small><?= lang('support-email')?></small>
              </div>
          </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="<?=$link_url?>assets_fe/landing/assets/js/bootstrap.min.js"></script>
  <script src="<?=$link_url?>assets_fe/landing/assets/js/jquery.countdown.min.js"></script>
  <script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script type="text/javascript">
    const COMPANY_ID = null
    $(document).ready(function(){
        $('.checkout').click(function(event){
            event.preventDefault();
            url = $(this).attr('href') + '/' + $('#company_id').val()
            window.location.href = url
        })
    })
    $('#countdown').countdown('2018/06/14 12:00:00', function (event) {
      $(this).html(event.strftime('Faltan %D días %H:%M:%S hrs'));
    });

    $('#company-form').ajaxForm({
        // dataType identifies the expected content type of the server response
        dataType:  'json',
        // success identifies the function to invoke when the server response
        // has been received
        success:   validate_register_form
    });

    function validate_register_form(data) {
        $('#error').hide();
        if(data.valid)
        {
            $('#company-form').hide();
            $('#company-form').html(data.message);
            $('#company-form').fadeIn();
            $('#inner-box').hide();
            $('#company_id').val(data.company_id)
        }
        else
        {
            $.each(data.errors, function(key, value) {

                if(value)
                    $('#contact_error_' + key ).html( value ).fadeIn();
            });
        }
    };
  </script>
    <script type="text/javascript">
        var onloadCallback = function() {

        };
    </script>
</body>

</html>