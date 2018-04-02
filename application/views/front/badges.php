<? include(dirname(__FILE__)."/common/header.php")?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1><?= lang("Badges")?></h1></div>
        </div>
    </div>
</div>
<div id="section-nav" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<p>
                <?= lang("badges-title")?>
            	</p>
            </div>
        </div>
    </div>
</div>

<div class="container main-content">

	<div class="col-md-12">
    	<?
        foreach($badges_descriptions as $badge)
		{
			?>
			<div class="col-md-4 col-sm-6 col-xs-12 badge-desc">
            	<img src="<?= base_url()?>assets_fe/img/badges/puntos/<?= $badge['img']?>">
                <br>
                <h1><?= $badge['name']?></h1>
                <p><?= $badge['desc']?></p>
            </div>
			<?	
		}
		?>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>