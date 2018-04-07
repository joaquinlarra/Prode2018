<? include(dirname(__FILE__)."/common/header_mini.php")?>
<div class="container forgot-password">
	<div class="row">
		<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
             <div class="panel panel-primary">
                <div class="panel-heading" align="center">
                <?
                if($this->company_model->main_image)
				{
					?><img src="<?=$this->company_model->main_image?>" border="0" /><?	
				}else{ 
                    ?><?= lang("Recuperá tu clave")?><?
                }
				?>
                </div>
                <div class="panel-body">   	
                    <div class="row">
                    	<div class="col-md-12" align="center" id="recover-header"><h4><h5><?= lang("recover-pass-desc")?></small></h5>
                        <div class="alert alert-danger" id="error" style="display:none"></div>
                        </div>
                    	<div class="col-md-12" id="recover-content">
                            <form method="POST" id="recover-form" class="form-signin ajax_form" action="<?=$link_url.'front_user/forgot_password'?>" accept-charset="UTF-8">
                                <div class="form-group" style="margin-bottom:15px; text-align:left">
                                <label for="username"><?= $this->company_model->username_field ? $this->company_model->username_field : "usuario"?></label><br><input type="text" id="username" class="form-control" name="username">
                                </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"><?= lang("Recuperar password")?></button>
                            </form>
                        </div>
                       
                    </div>
                    
                </div>
             </div>
		</div>
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>