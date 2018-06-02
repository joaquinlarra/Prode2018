<? include(dirname(__FILE__)."/common/header_mini.php")?>
<div class="container index-page">
    <div class="row">
        <div class="col-md-12 col-index-header">
            
            <?

                if(!$this->company_model->no_logos)
                {
                    ?><img src="<?=$link_url?>assets_fe/img/logo.png" style="max-width:200px" /><?
                }
                if($this->company_model->main_image)
				{
					?><img src="<?=$this->company_model->main_image?>" border="0" style="max-height:150px;max-width: 100%;" /><?
				}
				?><br>
            <? if($this->company_model->name):?>
                <h1 class="hidden-sm hidden-xs">Prode <?= $this->company_model->name?></h1>
                <h3 class="visible-sm visible-xs">Prode <?= $this->company_model->name?></h3>
            <? endif; ?>
            <br>
        </div>
    </div>
    <div class="row">
		<div class="<?= $this->company_model->register ? "col-md-offset-2 col-md-8" : "col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8"?>">
             <div class="panel panel-primary">
                 <div class="panel-heading">

                     <div class="pull-right" style="font-size: 13px">
                         <div class="dropdown">
                         <? $lang = $this->bitauth->user_language == "AR"? "ES" : ($this->bitauth->user_language == "US" ? "EN" :$this->bitauth->user_language); ?>
                         <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                             <?= strtoupper($lang)?>
                             <!-- <span class="glyphicon glyphicon-user"> -->
                             <span class="caret"></span>
                             Idioma / Language
                         </button>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="<?= $link_url?>cambiar-idioma/AR">ESPAÑOL (ES)</a></li>
                             <li><a href="<?= $link_url?>cambiar-idioma/PR">PORTUGUES (PR)</a></li>
                             <li><a href="<?= $link_url?>cambiar-idioma/US">ENGLISH (EN)</a></li>
                         </ul>

                         </div>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="panel-body">

                     <?if($no_company){
                         echo '<div class="row"><h4 align="center">'.lang("wrong-url")."</h4></div>";
                         
                     }
                     else
                     {?>

                         <div class="row">
                             <div class="col-md-12">
                                <div class="alert alert-danger" id="error" style="display:none"></div>
                                </div>
                            <div class="<?= $this->company_model->register && !$no_company ? "col-md-6 col-sm-6" : "col-md-12"?>">
                                <form method="POST" id="login-form" class="form-signin ajax_form" action="<?=$link_url.'front_user/login'?>" accept-charset="UTF-8">
                                    <label><?= lang('login')?><br></label>
                                    <div class="form-group" style="margin-bottom:15px; text-align:left">
                                    <input type="text"  placeholder="<?= lang("Email")?>" id="username" class="form-control" name="username">
                                    </div>
                                    <div class="form-group" style=" text-align:left">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="<?= lang("Contraseña")?>">
                                    </div>
                                    <div class="form-group checkbox">
                                        <label>
                                            <input name="remember_me" id="remember_me" type="checkbox" value="remember-me"> <?= lang("Guardar sesión")?>
                                        </label>
                                    </div>
                                        <button type="submit" name="submit" class="btn btn-green btn-block"><?= lang("Ingresar")?></button>
                                <br><a class="pull-right" href="<?= $link_url?>olvide-mi-clave"><?= lang('olvide-clave')?></a>
                                </form>

                                <?
                                if($this->company_model->tyc_doc)
                                {
                                 ?><br><a class="pull-right" href="<?= $this->company_model->tyc_doc?>" target="_blank"><?= lang('politica-privacidad')?></a><?
                                }
                                ?>

                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label><?= lang("code-register")?></label>

                                <div align="center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" id="company-code-error" style="display:none"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form method="POST" id="check-code" class="form-horizontal form-inline form-code ajax_form" action="<?=$link_url.'check-code'?>" accept-charset="UTF-8" role="form">

                                            <br ><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <input type="text" id="code" class="form-control" name="code"  placeholder="<?= lang('# codigo')?>">
                                            </div>
                                            <br >
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                                <button type="submit" name="submit" class="btn btn-green btn-block pull-left"><?= lang("register-button")?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <? } ?>
                </div>
             </div>
		</div>
        <div class="col-md-4">
        		
		</div>
    </div>
</div>
<? require(dirname(__FILE__)."/common/footer.php")?>