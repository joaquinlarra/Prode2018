<? include(dirname(__FILE__)."/common/header.php")?>

<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1><?= lang("Mi Grupo")?></h1></div>
        </div>
    </div>
</div>

<div id="section-nav" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <ul class="nav navbar-nav navbar-left">
                        <li><a href="<?= $link_url?>mi-grupo" class="active"><?= lang("Info General")?></a></li>
                        <li><a href="<?= $link_url?>editar-grupo"><?= lang("Editar")?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
					<!--
                    <div class="col-md-3 col-sm-3"><img src="<?= $this->user_profile->image_list?>" class="full-width"></div>
                    -->
                    <div class="col-md-12 col-sm-12">
                    		<div class="row" id="profile-info">
                            	<div class="col-md-12"><h1><?= lang('URL')?> <small><?= $this->company_model->namespace?>.prode2018.com</small></h1></div>
                                <div class="col-md-3 col-sm-3"><b><?= lang("Nombre")?></b></div>
                                <div class="col-md-9 col-sm-9" id="profile-name"><?= $this->company_model->name?></div>
                            	<div class="clearfix"></div>
                                <div class="col-md-3 col-sm-3"><b><?= lang("Logo")?></b></div>
                                <div class="col-md-9 col-sm-9" id="profile-name"><img src="<?= $this->company_model->main_image?>" style="max-width:100px"></div>
                            	<div class="clearfix"></div>
                                <div class="col-md-3 col-sm-3"><b><?= lang("Imagen Fondo")?></b></div>
                                <div class="col-md-9 col-sm-9" id="profile-name"><?= $this->company_model->bg_image ? '<img src="'.$this->company_model->bg_image.'" style="max-width:100px">' : '-'?></div>
                                <div class="clearfix"></div>
                                <div class="col-md-3 col-sm-3"><b><?= lang("Imagen Premios")?></b></div>
                                <div class="col-md-9 col-sm-9" id="profile-name"><?= $this->company_model->prizes_image ? '<img src="'.$this->company_model->prizes_image.'" style="max-width:100px">' : '-'?></div>
                                <div class="clearfix"></div>

                                <div class="clearfix"></div>
                            	</div>
                    </div>
                    
			</div>
		</div>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>