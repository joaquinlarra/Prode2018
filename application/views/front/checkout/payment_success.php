<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Jugá al prode con tus amigos o empresa">

  <title>Gracias por la compa</title>

  <!-- Bootstrap -->
  <link href="<?=$link_url?>assets_fe/landing/assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?=$link_url?>assets_fe/landing/assets/css/bootstrap-theme.css" rel="stylesheet">
  <link href="<?=$link_url?>assets_fe/landing/assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?=$link_url?>assets_fe/landing/assets/css/price-chart.css" rel="stylesheet">
  <!-- siimple style -->
  <link href="<?=$link_url?>assets_fe/landing/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper" style="padding-bottom: 10px; padding-top:10px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <img src="<?=$link_url?>assets_fe/landing/assets/img/logo-mundial.png" class="logo" style="width:100%">
        </div>
        <div class="col-md-8">
        <br><br><h2 class="subtitle pull-right"><b>Gracias por la compra.</b></h2>
        </div>
        <div class="col-md-12">
          <h1><b>Activaste tu prode<br><br>Tu código de registro es:</b></h1>
          <h1 style="font-size:68px; color: red;"><?=$register_code?></h1>
          <h1 style="text-transform: uppercase; font-size:32px;">Registrate con este código y compartilo con tus invitados</h1><br><br><br>
          <a href="<?=$company_url?>" target="_blank" class="btn btn-warning" style="font-size:30px;margin-right: 10px"><b>IR AL PRODE</b></a>
        </div>
      </div><br><br><br><br><br><br>
    </div>
  </div>
  <div class="container-fluid" id="bg-footer" style="padding:30px;0px; line-height: 30px; background-color: #000000; color: #ffffff">
          <div class="col-md-12">
              <div class="pull-left">
                  <small><?= lang('support-email')?></small>
              </div>
          </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="<?=$link_url?>assets_fe/landing/assets/js/bootstrap.min.js"></script>
</body>

</html>