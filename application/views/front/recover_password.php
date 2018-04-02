<? include(dirname(__FILE__)."/common/header_mini.php")?>
<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
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
                    	<div class="col-md-12" align="center" id="register-header">
                        	<?= lang('complete-login')?>
                        <div class="alert alert-danger" id="error" style="display:none"></div>
                        </div>
                    	<div class="col-md-12" id="register-content">
                            <form method="POST" id="recover-form" class="form-signin ajax_form" action="<?=$link_url.'home/validate_contact_form/forgot_pass'?>" accept-charset="UTF-8">
                            <div class="form-group contact" id="password_box">
                                <label for="password" class="col-md-4 col-sm-12 control-label"><?= lang("Contraseña")?></label><div class="col-sm-12 col-md-8"><input type="password" id="password" name="password" class="form-control "></div>
                                <div class="clearfix"></div>
                                <div id="contact_error_password" class="contact_msg_error alert alert-danger" style="display:none"></div>
                                <div class="clearfix"></div>
                            </div>
							<div class="form-group contact" id="passconf_box">
                                <label for="passconf" class="col-md-4 col-sm-12 control-label"><?= lang("Repetir contraseña")?></label><div class="col-sm-12 col-md-8"><input type="password" id="passconf" name="passconf" class="form-control "></div>
                                <div class="clearfix"></div>
                                <div id="contact_error_passconf" class="contact_msg_error alert alert-danger" style="display:none"></div>
                                <div class="clearfix"></div>
                            </div>
                                
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"><?= lang("Cambiar contraseña")?></button>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
             </div>
		</div>
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>