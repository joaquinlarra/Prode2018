<? 
	include(dirname(__FILE__)."/common/header.php");
	
	$qualyfied_teams = array(	"13","38", //a
								"22","28", //b
								"10","16", //c
								"33","17", //d
								"12","19", //e
								"8","30", //f
								"39","34", //g
								"9","24" //h						
							);


?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1 class="pull-left"><?= lang("Pronósticos")?></h1></div>
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
            
			if($qualys_completed)
			{
				echo lang("qualy-chosen")." ".(dateFormat($this->company_model->qualys_close_date,"d/m/Y H:i"))." ".lang('to-select-qualy').".</small>";	
			}
			else
			{
				echo lang("choose-qualy").(dateFormat($this->company_model->qualys_close_date,"d/m/Y H:i"))." ".lang('to-select-qualy').".</small>";	
			}
			
			?>
        </h3>
		<div id="message" style="display:none"></div>
        <form name="qualys-form" id="qualys-form" action="<?= $link_url?>front_user/save_qualys" method="post">
		<?
		$i = 1;
        foreach($zones as $zone => $zone_teams)
        {
            ?>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div id="winner_1_id" class="select-team select-qualy hidden-xs">
                    <div class="zone-label">
                        <?	$zone_label = explode(" ",$zone);?>
                        <span><?= lang($zone_label[0])?></span>
                        <span class="big"><?= $zone_label[1]?></span>
                    </div>
                    
                    <?
                    if($qualys_completed)
					{
						?><div class="pos-label"><b>1°</b> <?= $qualy['team'.$i."_id"] == $qualyfied_teams[$i-1] ? '<span class="glyphicon glyphicon-ok-circle" style="color: #16bb4F; font-size:18px"></span>' : '<span class="glyphicon glyphicon-remove-circle" style="color: #D43C30; font-size:18px"></span>'?> <img src="<?= $qualy['team'.$i.'_flag']?>"> <?= $qualy['team'.$i.'_name']?></div><?
						
					}
					else
					{
					?>
                        <div class="pos-label">1°</div>
                        <select id="<?= str_replace(" ","_",$zone)?>_select_1" class="select-qualy" zone="<?= $zone?>">
                        <option value=""><?= lang("select-country")?></option>
						<?
                        foreach($zone_teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                        <input type="hidden" name="qualy_ids[<?= $i?>]" id="<?= str_replace(" ","_",$zone)?>_team_1_id">
                    <?
					}
					$i++;
					?>
                    
                    <?
                    if($qualys_completed)
					{
						?><div class="pos-label"><b>2°</b> <?= $qualy['team'.$i."_id"] == $qualyfied_teams[$i-1] ? '<span class="glyphicon glyphicon-ok-circle" style="color: #16bb4F; font-size:18px"></span>' : '<span class="glyphicon glyphicon-remove-circle" style="color: #D43C30; font-size:18px"></span>'?> <img src="<?= $qualy['team'.$i.'_flag']?>"> <?= $qualy['team'.$i.'_name']?></div><?
					}
					else
					{
					?>
                        <div class="pos-label">2°</div>
                        <select id="<?= str_replace(" ","_",$zone)?>_select_2" class="select-qualy" zone="<?= $zone?>">
                        <option value=""><?= lang("select-country")?></option>
						<?
                        foreach($zone_teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                        <input type="hidden" name="qualy_ids[<?= $i?>]" id="<?= str_replace(" ","_",$zone)?>_team_2_id">
                	<?
					}
					$i++;
					?>
                </div>
                <div class="select-team select-qualy visible-xs" style="text-align:center; padding-bottom:10px; height:70px">
                	<h4 style="margin-top:0px"><?= $zone?></h4>
                    <b>1°</b> 
                    <?
                    if($qualys_completed)
					{
						?> <img src="<?= $qualy['team'.($i -2).'_flag']?>"> <?= $qualy['team'.($i -2).'_name']?> <?
						
					}
					else
					{
					?>
                        <select id="<?= str_replace(" ","_",$zone)?>_select_mobile_1" q_id="<?= str_replace(" ","_",$zone)?>_team_1_id" class="select-qualy-mobile" zone="<?= $zone?>">
                        <option value=""><?= lang("select-country")?></option>
						<?
                        foreach($zone_teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                   	<?
					}
				   	?>
                    <b>2°</b> 
                    <?
                    if($qualys_completed)
					{
						?> <img src="<?= $qualy['team'.($i -1).'_flag']?>"> <?= $qualy['team'.($i -1).'_name']?> <?
						
					}
					else
					{
					?>
                        <select id="<?= str_replace(" ","_",$zone)?>_select_mobile_2" q_id="<?= str_replace(" ","_",$zone)?>_team_2_id" class="select-qualy-mobile" zone="<?= $zone?>">
                        <option value=""><?= lang("select-country")?></option>
						<?
                        foreach($zone_teams as $team)
                        {
                            ?>
                                <option value="<?= $team['team_id']?>" data-imagesrc="<?= $team['team_flag']?>"><?= $team['name']?></option>
                            <?
                        }
                        ?>
                        </select>
                    <?
					}
					?>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <?
        }
        ?>
        <div class="clearfix"></div>
        <?
		if(!$qualys_completed && (minDiff($this->company_model->qualys_close_date,$today) > 0))
		{
			?><input type="submit" class="btn btn-primary btn-lg btn-block" value="<?= lang("Guardar y Continuar")?>">
		<?
		}
		else
		{
			if(minDiff($this->company_model->qualys_close_date,$today) > 0)
			{
			?><div id="modify-qualys" class="btn btn-primary btn-lg btn-block"><?= lang("Editar")?></div><?	
			}
		}
		?>
		</form>

    </div>	
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>