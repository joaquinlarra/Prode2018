<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$page_title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$page_description?>">
    <meta name="keywords" content="<?=$page_keywords?>">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets_fe/ico/favicon.png">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link href="<?=$link_url?>assets_fe/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?=$link_url?>assets_fe/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.7.0/introjs.min.css" rel="stylesheet">
    <link href="<?=$link_url?>assets_fe/css/fonts.css" rel="stylesheet">
    <link href="<?=$link_url?>assets_fe/css/spinner.css" rel="stylesheet">
    <link href="<?=$link_url?>assets_fe/css/general.css" rel="stylesheet">
    <?
	if($this->company_model->bg_image)
	{
		?><style>
        body
		{
		background: #010D27 url('<?= $this->company_model->bg_image?>') top center repeat-y;
		}
        </style><?
	}
	if($this->company_model->custom_css)
	{
		echo "<style>".$this->company_model->custom_css."</style>";	
	}
	?>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xs-6 col-sm-6" style="padding-top:10px; padding-bottom:10px">
            <a href="<?=$link_url?>pronosticos">
            	
            	<?
                if($this->company_model->main_image)
				{
					?><img src="<?=$this->company_model->main_image?>" id="company-logo-header"  border="0" /><?	
				}
				if(!$this->company_model->no_logos)
				{
					?><img src="<?=$link_url?>assets_fe/img/logo.png" id="prode-logo-header" /><?
				}
				?>
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 head-title" style="text-align:right">
			<?
			if($this->company_model->fantasy_logo)
			{
				?>
				<a href="<?= $this->company_model->fantasy_logo_url ? $this->company_model->fantasy_logo_url : $link_url?>" target="_blank">
					<img src="<?=$this->company_model->fantasy_logo?>" border="0" style="margin:10px 0px 5px 0px; width:100%; max-width:400px"/>
				</a>
				<?
			}
			else
			{
				if($this->company_model->no_logos)
				{
					?><div style="height:25px"></div><?
				}
			}
			?>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle pull-right" style="margin-top:20px;" data-toggle="collapse" data-target="#menu-items">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-menu" id="sticker">
    	<div class="container">
            <div class="collapse navbar-collapse" id="menu-items">
                <ul class="nav navbar-nav main-navbar navbar-left">
                    <li><a <? if($section=='bet'){?>class="active"<? } ?> href="<?=$link_url?>pronosticos"><?= strtoupper(lang('Pronosticos'))?></a></li>
                    <li><a <? if($section=='scores'){?>class="active"<? } ?> href="<?=$link_url?>posiciones"><?= strtoupper(lang('Posiciones'))?></a></li>
                 	<?
                    if($this->company_model->wall)
					{
					?>
                    	<li><a  <? if($section=='wall'){?>class="active"<? } ?>href="<?=$link_url?>muro"><?= strtoupper(lang('Muro'))?></a></li>
                	<?
					}
					
					if($this->company_model->friends_league)
					{
						?>
						<li class="dropdown">
                        <a class="dropdown-toggle <?= $section == "friends_league" ? "active" : ""?>" href="#" data-toggle="dropdown" ><?= lang("Liga de amigos")?><?= $friends_league_notifications['total'] ? " <span class='badge'>".$friends_league_notifications['total']."</span>" : ""?><strong class="caret"></strong></a>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= $link_url?>crear-liga-de-amigos" class="sum-league"><b><?= strtoupper(lang("CREAR LIGA"))?></b></a></li>
                        <li><a href="<?= $link_url?>unirse-liga-de-amigos" class="sum-league"><b><?= lang("UNIRSE A UNA LIGA")?></b></a></li>
						<?
						if(is_array($friends_league))
						{
							foreach($friends_league as $league)
							{
								?>
								<li><a href="<?= $link_url?>liga-de-amigos/<?= urlencode($league['league_id'])?>/<?= urlencode($league['league'])?>"><?= $league['league']?> <?= $friends_league_notifications[$league['league_id']] ? " <span class='badge pull-right'>".$friends_league_notifications[$league['league_id']]."</span>" : ""?></a></li>
								<?	
							}
						}
						?>
                    </ul>
                </li>
						<?	
					}
					?>
                </ul>
                <ul class="nav navbar-nav main-navbar navbar-right">   
                    <li class="min-link" <? if($user_first_login){ echo 'data-intro="Clickea en <i>Como jugar</i> antes de emepzar!"'; } ?> >
						<a <? if($section=='how-to'){?>class="active"<? } ?> href="<?=$link_url?>como-jugar"><?= lang('Cómo jugar')?></a>
					</li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?= $shortname?> <span class="glyphicon glyphicon-user"></span><strong class="caret"></strong></a>
                        <ul class="dropdown-menu" role="menu">
                            <li <? if($section=='usuario'){?>class="active"<? } ?>><a href="<?=$link_url?>mi-cuenta"><?= lang('Mi cuenta')?></a></li>
                    		<li><a href="<?=$link_url?>log-out"><?= lang('Salir')?></a></li>
                        </ul>
                  	</li> 
                   	<?
					if($this->company_model->multi_lang)
					{
						$lang = $this->bitauth->user_language == "AR"? "ES" : ($this->bitauth->user_language == "US" ? "EN" :$this->bitauth->user_language);   
					?>
						<li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><small><?= $lang?></small><strong class="caret"></strong></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="<?= $link_url?>cambiar-idioma/AR">ESPAÑOL (ES)</a></li>
                            <li><a href="<?= $link_url?>cambiar-idioma/PR">PORTUGUES (PR)</a></li>
                            <li><a href="<?= $link_url?>cambiar-idioma/US">ENGLISH (EN)</a></li>
                        </ul>
                  	</li> 
                        
					<?	
					}
					?>  
                </ul>
            </div>
        </div>
    </div>