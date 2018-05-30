<? include(dirname(__FILE__)."/common/header_mini.php")?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-index-header">

            <?
            if($this->company_model->main_image)
            {
                ?><img src="<?=$this->company_model->main_image?>" border="0" style="max-height:150px;max-width: 100%;" /><?
            }
            ?><br>
            <h1 class="hidden-sm hidden-xs">Prode <?= $this->company_model->name?></h1>
            <h3 class="visible-sm visible-xs">Prode <?= $this->company_model->name?></h3>

            <br>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12">
             <div class="panel panel-primary">
                <div class="panel-heading" align="center">
                    <?= lang("COMPLETA TUS DATOS")?><br>
                        <small><?= lang("Para finalizar el registro")?></small>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="alert alert-danger" id="error" style="display:none"></div>
                        </div>
                    	<div class="col-md-12" id="register-content">
                            <form method="POST" class="form-signin ajax_form" action="<?=$link_url.'home/validate_contact_form/register'?>" accept-charset="UTF-8">
                               <?
                            $this->admin_forms->label_in_input = false;
                            foreach($page_fields['register'] as $field => $attr)
                            {
								
								echo '<div class="form-group contact" id="'.$field.'_box">
												'.$this->admin_forms->input_block($field,$attr, $login_user[$field]).'
												<div class="clearfix"></div>
												<div id="contact_error_'.$field.'" class="contact_msg_error alert alert-danger" style="display:none"></div>
												<div class="clearfix"></div>
											</div>';

                            }?>
                                
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"><?= lang("Completar registro")?></button>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
             </div>
		</div>
        <div class="col-md-4">
        		
		</div>
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>