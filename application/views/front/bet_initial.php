<? 
	include(dirname(__FILE__)."/common/header.php");
?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1 class="pull-left">Pronósticos</h1></div>
        </div>
    </div>
</div>
<div id="section-nav" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<? include(dirname(__FILE__)."/common/prog_list.php")?>
            </div>
        </div>
    </div>
</div>
<div class="container main-content">
	<div class="row paralax">
		<h3 class="page-title">
        	<?
			if($winners_completed)
			{
				echo lang("winners-chosen")." ".(dateFormat($this->company_model->winners_close_date,"d/m/Y H:i"))." ".lang("to-select-winners")."</small>";		
			}
			else
			{
				echo lang("choose-winners")." ".(dateFormat($this->company_model->winners_close_date,"d/m/Y H:i"))." ".lang("to-select-winners")."</small>";	
			}
			?>
        </h3>
        <div id="message" style="display:none"></div>
        <form id="winners-form" action="<?= $link_url?>front_user/save_winners" method="post">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="winners-podium" id="podium-2">
                    <h3 style="text-align:center; text-transform:uppercase"><?= lang("Subcampeón")?></h3>
                    <div id="winner_2" class="select-team-div">
                    <?
                    if($winners_completed)
					{
						?><img src="<?= $winners['winner2_flag']?>"> <?= $winners['winner2_name']?><?	
					}
					else
					{
					?>
                        <select id="winner2_select" class="select-winner">
                        <option value=""><?= lang("select-country")?></option>
                        <?
                        foreach($teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                        <input type="hidden" name="winner2_id" id="winner2_id" value="">
                    <?
					}
					?>
                    </div>
                    <img src="<?= base_url()?>assets_fe/img/plata.png" class="medal">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="winners-podium" id="podium-1">
                    <h3 style="text-align:center; text-transform:uppercase"><?= lang("Campeón")?></h3>
                    <div class="select-team-div">
                    <?
                    if($winners_completed)
					{
						?><img src="<?= $winners['winner1_flag']?>"> <?= $winners['winner1_name']?><?	
					}
					else
					{
					?>
                        <select id="winner1_select" class="select-winner">
                        <option value=""><?= lang("select-country")?></option>
                        <?
                        foreach($teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                        <input type="hidden" name="winner1_id" id="winner1_id" value="">
                    <?
					}
					?>
                    </div>
                    <img src="<?= base_url()?>assets_fe/img/oro.png" class="medal">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="winners-podium" id="podium-3">
                    <h3 style="text-align:center; text-transform:uppercase"><?= lang("Tercero")?></h3>
                    <div id="winner_3" class="select-team-div">
                    <?
                    if($winners_completed)
					{
						?><img src="<?= $winners['winner3_flag']?>"> <?= $winners['winner3_name']?><?	
					}
					else
					{
					?>
                        <select id="winner3_select" class="select-winner">
                        <option value=""><?= lang("select-country")?></option>
                        <?
                        foreach($teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                        <input type="hidden" name="winner3_id" id="winner3_id" value="">
                    <?
					}
					?>
                    </div>
                     <img src="<?= base_url()?>assets_fe/img/bronce.png" class="medal">
                </div>
            </div>
            <div class="clearfix"></div>
            <?
            if(!$winners_completed)
			{
				?>
                <div class="clearfix"></div>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="<?= lang("Guardar y Continuar")?>">
			<?
			}
			else
			{
				if(minDiff($this->company_model->winners_close_date,$today) > 0)
				{
				?><div id="modify-winners" class="btn btn-primary btn-lg btn-block"><?= lang("Editar")?></div><?	
				}
			}
			?>
        </form>
    </div>	
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>