<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120712390-1"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-120712390-1');
      </script>

      <title><?=$page_title?></title>
      <?php header('Access-Control-Allow-Origin: *'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$page_description?>">
    <meta name="keywords" content="<?=$page_keywords?>">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets_fe/ico/favicon.png">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link href="<?=$link_url?>assets_fe/css/theme.min.css" rel="stylesheet">
	<link href="<?=$link_url?>assets_fe/css/fonts.css" rel="stylesheet">
    <link href="<?=$link_url?>assets_fe/css/spinner.css" rel="stylesheet">
    <link href="<?=$link_url?>assets_fe/css/general.css?2" rel="stylesheet">
    <?
	if($this->company_model->bg_image)
	{
		?><style>
        body
		{
		background: #010D27 url('<?=$this->company_model->bg_image?>') top center repeat-y;
		}
        </style><?
	}
	if($this->company_model->custom_css)
	{
		echo "<style>".$this->company_model->custom_css."</style>";	
	}
    if($this->company_model->fonts_url)
    {
        $additional_fonts = $this->company_model->fonts_url;
        $additional_fonts = explode(",",$additional_fonts);

        foreach($additional_fonts as $additional_font)
        {
            echo '<link href="'.trim($additional_font).'" rel="stylesheet">'."\n";
        }

        echo "<style>".$this->company_model->custom_css."</style>";
    }
	?>
  </head>
  <body>
  <header id="sticker">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="headerInner">
					<div class="logos">
						<a href="<?=$link_url?>pronosticos">
							<?
							if($this->company_model->main_image)
							{
								?><img src="<?=$this->company_model->main_image?>" id="company-logo-header"  class="img-responsive" /><?	
							}
							if(!$this->company_model->no_logos)
							{
								?><img src="<?=$link_url?>assets_fe/img/logo.png" id="prode-logo-header" /><?
							}
							?>
						</a>
					</div>
					
					<div class="navs">
						<div class="leftNav">
							<div class="btn-group" role="group">
								<a href="<?=$link_url?>pronosticos" class="btn btn-header <?= $section == 'bet' ? 'active' : '' ?>">
									<?= strtoupper(lang('Pronosticos'))?>
								</a>
								<a href="<?=$link_url?>posiciones" class="btn btn-header <?= $section == 'scores' ? 'active' : '' ?>">
									<?= strtoupper(lang('Posiciones'))?>
								</a>
								<?
									if($this->company_model->wall){
										?>
											<a href="<?=$link_url?>muro" class="btn btn-header <?= $section == 'wall' ? 'active' : '' ?>">
												<?= strtoupper(lang('Muro'))?>
											</a>
										<?
									}
								?>
							</div>
						</div>

						<span class="glyphicon glyphicon-align-justify navToggle navToggler"></span>

						<div class="rightNav" id="rightNav">
							<span class="glyphicon glyphicon-menu-right closeNav navToggler"></span>
                            <?
                            if($this->company_model->prizes_image){

                            ?>
                                <a class="btn btn-header <?= $section == 'prizes' ? 'active' : '' ?>" href="<?=$link_url?>premios">
                                    <?= strtoupper(lang('Premios'))?>
                                </a>
                            <? } ?>
                            <a <? //if($user_first_login){ echo 'data-intro="Clickea en <i>Como jugar</i> antes de emepzar!"'; } ?> class="btn btn-header <?= $section == 'how-to' ? 'active' : '' ?>" href="<?=$link_url?>como-jugar">
								<?= strtoupper(lang('Cómo jugar'))?>
							</a>

							<div class="dropdown">
								<button class="btn btn-header dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<?= strtoupper($shortname)?>
									<span class="glyphicon glyphicon-user">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li <? if($section=='usuario'){?>class="active"<? } ?>><a href="<?=$link_url?>mi-cuenta"><?= lang('Mi cuenta')?></a></li>
                                    <? if($this->company_model->is_company_admin($this->bitauth->email))
                                    {
                                        ?>
                                    <li <? if($section=='edit_company'){?>class="active"<? } ?>><a href="<?=$link_url?>editar-grupo"><?= lang('EDITAR GRUPO')?></a>
                                    <li <? if($section=='players'){?>class="active"<? } ?>><a href="<?=$link_url?>jugadores"><?= lang('LISTA DE JUGADORES')?></a>
                                        <?
                                    }
                                    ?>
                                    <li><a href="<?=$link_url?>log-out"><?= lang('Salir')?></a></li>
								</ul>
							</div>

							<div class="dropdown">
								<?
								if($this->company_model->multi_lang){
									$lang = $this->bitauth->user_language == "AR"? "ES" : ($this->bitauth->user_language == "US" ? "EN" :$this->bitauth->user_language);   
								?>
									<button class="btn btn-header dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<?= strtoupper($lang)?>
										<!-- <span class="glyphicon glyphicon-user"> -->
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?= $link_url?>cambiar-idioma/AR">ESPAÑOL (ES)</a></li>
											<li><a href="<?= $link_url?>cambiar-idioma/PR">PORTUGUES (PR)</a></li>
											<li><a href="<?= $link_url?>cambiar-idioma/US">ENGLISH (EN)</a></li>
									</ul>	
								<?	
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </header>