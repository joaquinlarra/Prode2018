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
                    	<div class="col-md-12" align="center" id="recover-header"><h4><?= lang("recover-failure")?><br><small><?= lang("recover-failure-contact")?></small></h4>
                       
                    </div>
                    
                </div>
             </div>
		</div>
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>