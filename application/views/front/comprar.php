<? include(dirname(__FILE__)."/common/header_mini.php")?>
<div class="container">
    <div class="row">
        <div class="col-md-7 comprar-col-left">
            <h1 class="wow bounceInDown" data-wow-delay="0.3s">Manejá tu prode!</h1>
            <h3 class=" wow bounceInLeft" data-wow-delay="0.6s">Fácil, intuitivo y divertido</h3>
            <p  class=" wow fadeIn" data-wow-delay="1s">Organizá tu prode de una manera sencilla y facil. Los partidos ya se encuentran cargados, simplemente tenes que realizarles una invitación a quienes quieras que participen y ya empiezan a jugar.</p>
        </div>
        <div class="col-md-5 comprar-col-right wow bounceInDown" data-wow-delay="1.3s" style="color:white;">
        <h1>Compra y empezá a Jugar Ahora!</h1>
        <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=35681194-ea43d2d0-839e-4b1e-9baa-a97a3de27dff" name="MP-payButton" class='lightBlue-ar-m-rn-aron'>Comprar Prode para 10 personas $300</a>
        <script type="text/javascript">
        (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
        </script>
        <br />
        <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=35681194-714953ad-6e1d-43f0-bda4-3cc83cf60e2a" name="MP-payButton" class='lightBlue-ar-m-rn-aron'>Comprar Prode para 20 personas $500</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 comprar-col-imgs">
            <img src="<?=base_url().'assets_fe/img/comprar/pronosticos-1.png'?>" width="100%" border="0" class=" wow bounceInLeft" data-wow-delay="0.9s" />
        </div>
        <div class="<?= $this->company_model->register ? "comprar-col-demo  col-md-offset-1 col-md-7" : "comprar-col-demo col-md-8 col-sm-offset-2 col-sm-7"?>">
             <div class="panel panel-primary">
                <div class="panel-heading" align="center">
                <?
                if($this->company_model->main_image)
				{
					?><img src="<?=$this->company_model->main_image?>" border="0" /><?	
				}
				?>
                </div>
                <div class="panel-body">   	
                    <div class="row">
                    	<div class="col-md-12" align="center"><h4><?= lang("PROBA LA DEMO")?></h4>
                        <?
						
                        if($this->company_model->first_login)
						{
							?><small><?= lang("first-time-login")?> <?= $this->company_model->username_field?>
                            <?
                            if($this->company_model->first_login_text)
							{
								echo "<br>".$this->company_model->first_login_text;	
							}
							?>
                            </small><?	
						}
						?>
                        <div class="alert alert-danger" id="error" style="display:none"></div>
                        </div>
                    	<div class="<?= $this->company_model->register && !$no_company ? "col-md-6 col-sm-6" : "col-md-12"?>">
                         <?
						if($no_company)
						{
							?><div align="center" style="margin:20px 0px">Debe entrar al link específico de su empresa.<br>EJ: <b>miempresa.prode2018.com</b></div><? 
						}
						else
						{
						 ?>
                            <form method="POST" id="login-form" class="form-signin ajax_form" action="<?=$link_url.'front_user/login'?>" accept-charset="UTF-8">
                                <div class="form-group" style="margin-bottom:15px; text-align:left">
                                <label for="username"><?= $this->company_model->username_field ? $this->company_model->username_field : "usuario"?></label><br><input type="text" id="username" class="form-control" name="username">
                                </div>
                                <div class="form-group" style=" text-align:left">
                                <label for="password"><?= lang("Contraseña")?></label><br>
                                <input type="password" id="password" class="form-control" name="password">
                                </div>
                                <div class="form-group checkbox">
                                    <label>
                                        <input name="remember_me" id="remember_me" type="checkbox" value="remember-me"> <?= lang("Guardar sesión")?>
                                    </label>
                                </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"><?= lang("Ingresar")?></button>
                            </form>
                            <a class="pull-right" href="<?= $link_url?>olvide-mi-clave"><?= lang('olvide-clave')?></a>
                            <?
                            if($this->company_model->tyc_doc)
							{
							 ?><br><a class="pull-right" href="<?= $this->company_model->tyc_doc?>" target="_blank"><?= lang('politica-privacidad')?></a><?	
							}
							?>
                        <?
						}
						?>
                        </div>
                        <?
                        if($this->company_model->register && !$no_company)
						{
						?>
                            <div class="col-md-6 col-sm-6">
                                <h3><?= lang("email-register")?></h3>
                                <form method="POST" id="register-form" class="form-signin ajax_form" action="<?= $link_url.'front_user/register'?>" accept-charset="UTF-8">
                                    <div id="error" style="display:none" class="alert alert-danger"></div>
                                    <?
                                    if(!$this->company_model->register_domain)
									{
										?>
										<div class="form-group" style=" text-align:left">
											<input type="text" id="email" class="form-control" name="email" placeholder="email">
										</div>
                                    <?
									}
									else
									{
									?>
                                        <div class="input-group" style="margin-bottom:25px;">
                                            <input type="text" id="email" class="form-control" name="email" placeholder="email">
                                            <span class="input-group-addon">@<?= $this->company_model->register_domain?></span>
                                        </div>
                                    <?
									}
									?>
                                    <input type="submit" class="btn btn-success btn-block" value="<?= lang("Ingresar")?>">
                                </form>
                            </div>
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
<? include(dirname(__FILE__)."/common/footer.php")?>