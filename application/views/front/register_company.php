<? include(dirname(__FILE__)."/common/header_mini.php")?>
<div class="container index-page">
    <div class="row">
        <div class="col-md-12 col-index-header">
            <h1>CREÁ TU PRODE PARA ESTE MUNDIAL</h1>
            <br>
        </div>
    </div>  
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
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
                    	<div class="col-md-12" align="center" id="register-header"><h4><?= lang("COMPLETA TUS DATOS")?></h4>
                        <small><?= lang("Para finalizar el registro")?></small>	
                        <div class="alert alert-danger" id="error" style="display:none"></div>
                        </div>
                    	<div class="col-md-12" id="register-content">
                            <form method="POST" id="company-create-form" class="validate_ajax_form ajax_form" action="<?=$link_url.'home/validate_contact_form/register_company'?>" accept-charset="UTF-8">
                               <?
                            $this->admin_forms->label_in_input = false;
                            foreach($page_fields['register_company'] as $field => $attr)
                            {
								
								echo '<div class="form-group register_company" id="'.$field.'_box">
												'.$this->admin_forms->input_block($field,$attr, $register_company[$field]).'
                                                <div class="clearfix"></div>
                                                <div class="col-md-10 pull-right">
                                                <div id="register_company_error_'.$field.'" class="register_company_msg_error alert alert-danger" style="display:none"></div>
                                                </div>
												<div class="clearfix"></div>
											</div>';

                            }?>
                                
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"><?= lang("Completar registro")?></button>
                            </form>
                            <div id="company-create-message" class="hidden"></div>
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