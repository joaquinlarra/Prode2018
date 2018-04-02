<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1><?= lang("Liga de amigos")?></h1></div>
        </div>
    </div>
</div>
<div id="section-nav" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?= $link_url?>crear-liga-de-amigos" class="<?= $sub_section == 'create_friends_league' ? "active" : ""?>"><b><?= strtoupper(lang("CREAR LIGA"))?></b></a></li>
                <li><a href="<?= $link_url?>unirse-liga-de-amigos" class="<?= $sub_section == 'join_friends_league' ? "active" : ""?>"><b><?= lang("UNIRSE A UNA LIGA")?></b></a></li>
            	<?
                if($in_league)
				{
					?><li><a href="#" class="active"><?= $in_league?></a></li><?	
				}
				?>
            </ul>
            </div>
        </div>
    </div>
</div>