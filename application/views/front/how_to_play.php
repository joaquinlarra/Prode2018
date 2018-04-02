<? include(dirname(__FILE__)."/common/header.php")?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1><?= lang('Cómo jugar')?></h1></div>
        </div>
    </div>
</div>
<?
if($this->company_model->how_to_text)
{ ?>
    <div id="section-nav" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?= $link_url?>como-jugar" <? if($link=='image'){?>class="active"<? } ?>><?= lang("Instrucciones")?></a></li>
    				<li><a href="<?= $link_url?>reglamento" <? if($link=='text'){?>class="active"<? } ?>><?= lang("Reglamento")?></a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>	
<?
}
?>

<div class="container">
<div class="col-md-12" align="center" style="padding-top:10px">
    <?
	if($link == 'text')
	{
		?>
		<div class="panel panel-primary">
        <div class="panel-body">   	
                    <div class="row">
                    	<div class="col-md-12" align="left">
                        	<?= $this->company_model->how_to_text?>
                        </div>
                    </div>
        </div>
        </div>
		
		<?
	}
	else
	{
		if($this->company_model->how_to_image)
		{
			$img = $this->company_model->how_to_image;
			
			if($this->company_model->multi_lang)
			{
				switch($lang)
				{
					case 'AR': break;
					case 'MX':
								if($this->company_model->how_to_image_MX)
								{
									$img = $this->company_model->how_to_image_MX;	
								}
								break;
					case 'PR':
								if($this->company_model->how_to_image_PR)
								{
									$img = $this->company_model->how_to_image_PR;	
								}
								break;
					case 'US':
								if($this->company_model->how_to_image_US)
								{
									$img = $this->company_model->how_to_image_US;	
								}
								break;
				}
				
			}
			
			?><img src="<?= $img?>"><?
		}
		else
		{
			?><img src="<?= base_url()?>assets_fe/img/<?= lang('infografia')?>.png"><?
		}
	}
	?>
</div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>