<? 
	include(dirname(__FILE__)."/common/header.php");
	$prev_date = "";
	$colspan = 7;
?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1 class="pull-left"><?= lang("Pronosticos")?></h1><div class="pull-right hidden-xs" style="margin-top:10px"><img src="<?= base_url()?>assets_fe/img/<?= lang("recorda")?>.png"></div></div>
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
    <h3 class="page-title"><?= lang("complete-bets")?></h3>
	<?
	if($saved)
	{
		?>
		<div class="col-md-12">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $message?>
		</div>
		</div>
		<?	
	}
	?>
        <form action="<?= $link_url?>home/validate_matches_form/" method="post" enctype="multipart/form-data" id="prognostics-form">
		<div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table pull-left zone-table table-responsive table-condensed full-width">
	<?
    foreach($matches as $match)
    {
		
		$class_col_1 = "";
		$class_col_2 = "";
		$match_completed = false;
		if($matches_completed[$match['match_id']])
		{
			$match_completed = true;
		}
		$no_complete = 0;
		$no_complete = minDiff($match['date_played'],$today) < 0 ? true : false;
		$match_ended = false;
		if(($match['result'] != -2) && $no_complete)
		{
			$match_ended = true;
			$match_asserted = $matches_completed[$match['match_id']]['result'] == $match['result'] ? true: false;
		}
		else
		{
			switch($matches_completed[$match['match_id']]['result'])
			{
				case -1: $matches_completed[$match['match_id']]['bet_message'] = lang('Gana')." <b>".$match['team1_name']."</b>";
						break;
				case 0: $matches_completed[$match['match_id']]['bet_message'] = "<b>".lang('Empate')."</b>";
						break;
				case 1: $matches_completed[$match['match_id']]['bet_message'] = lang('Gana')." <b>".$match['team2_name']."</b>";
						break;
				
			}
		}
		
		$bets = explode("|",$match['bet']);
		if(count($bets) == 3)
		{
			$bets = get_bet_percentage($bets);
		}
		
		
		
		$match_code = get_match_code($match['match_id'], $match_ended);
		if($match_ended)
		{
			$match_result = '<span class="match-result"><span class="'.$result_class1.'">'.$match['team1_goals'].'</span>-<span class="'.$result_class2.'">'. $match['team2_goals'].'</span></span>';
		}
		else
		{
			$match_result =  $bets[0].'% '. $bets[1].'% '.$bets[2].'%';
		}

		$date = get_date($match['date_played']);
		
        if($date != $prev_date)
        {
			if($prev_date)
			{
			/*
			?>
			<tr class="table-division">
            	<td colspan="<?= $colspan?>"></td>
            </tr>
			<?
				*/	
			}
			
			$prev_date = $date;
			?>
			
            <tr>
			<tr class="table-division">
			<td colspan="<?= $colspan?>"></td>
		</tr>
			<th colspan="<?= $colspan?>" class="hidden-xs"><h4><?= $date?></h4></th>
            <th colspan="6" class="visible-xs" style="text-align:center"><h4><?= $date?></h4></th>
			</tr>
		<?	
        }
        ?>
        
        <input type="hidden" name="match[<?= $match['match_id']?>][matchname]" value="<?= $zone?>: <?= $match['team1_abbr_name']?> vs <?= $match['team2_abbr_name']?>">
        <tr class="visible-xs stats-mobile">
        	<td colspan="<?= $colspan?>">
            	<b><?= strtoupper($match['zone'])?></b>
            	<?= $this->session->userdata('lang') == 'MX' ? (int)(dateFormat($match['date_played'],"G")-2):dateFormat($match['date_played'],"G")?>:<?= dateFormat($match['date_played'],"i")?>hs
            </td>
        </tr>
        <tr id="matchrow-<?= $match['match_id']?>" match-code="<?= $match_code?>" class="matchrow" zone="<?= $zone?>" matchname="<?= $match['team1_abbr_name']?> vs <?= $match['team2_abbr_name']?>">
            <td class="zone-info hidden-xs">
            	<?= strtoupper($match['zone'])?>
				<div class="date-info">
				<b><?= $this->session->userdata('lang') == 'MX' ? (int)(dateFormat($match['date_played'],"G")-2):dateFormat($match['date_played'],"G")?>:<?= dateFormat($match['date_played'],"i")?>hs</b>
				<br><i><?= $match['location']?></i>
				</div>
			</td>
            <td class="input-match matchrow-1-<?= $match['match_id']?> <?= $class_col_1?>">
           		<input <?= $no_complete || $match_completed ? "disabled='disabled'" : ""?> type="number" min="0" max="20" maxlength="1" id="input-goals-1-<?= $match['match_id']?>" match_id="<?= $match['match_id']?>" class="form-control input-goals" value="<?= isset($matches_completed[$match['match_id']]['team1_goals']) ? $matches_completed[$match['match_id']]['team1_goals'] : ""?>" name="match[<?= $match['match_id']?>][team1]">
            </td>
            <td class="teamname team1 matchrow-1-<?= $match['match_id']?> <?= $class_col_1?>" title="<?= $match['team1_name']?>">
                <p class="hidden-xs"><img  id="match-img-<?= $match['match_id']?>-1" src="<?= $match['team1_flag']?>" title="<?= $match['team1_name']?>" class="img-rounded team1-flag"><?= $match['team1_abbr_name']?>
				</p>
                <p class="visible-xs"><img id="match-img-<?= $match['match_id']?>-1" src="<?= $match['team1_flag']?>" title="<?= $match['team1_name']?>" class="img-rounded team1-flag" style="height:35px"><?= $match['team1_abbr_name']?></p>
				<div class="group-team-name-1" id="match-name-<?= $match['match_id']?>-1"><?= $match['team1_name']?></div>
			</td>
            <td class="middle-col" id="middle-col-<?= $match['match_id']?>">
            	
            	<?
				if($match_ended)
				{
					echo $match['team1_goals']." - ".$match['team2_goals'];	
				}
				else
				{
					if($match_completed && !$no_complete)
					{
						?><span><?= $matches_completed[$match['match_id']]['bet_message']?></span><br><span class="btn btn-success btn-edit-match" match_id="<?= $match['match_id']?>"><?= lang("editar")?></span><?	
					}
					else
					{
						?><p class="please-load-match"><?= lang('FALTA CARGAR')?></p><?	
					}
				}
				?>
            </td>
            <td class="teamname team2 matchrow-2-<?= $match['match_id']?> <?= $class_col_2?>"  title="<?= $match['team2_name']?>">
                <p class="hidden-xs hidden-sm">
				<?= $match['team2_abbr_name']?><img  id="match-img-<?= $match['match_id']?>-2" src="<?= $match['team2_flag']?>" title="<?= $match['team2_name']?>" class="img-rounded team1-flag">
				</p>
				<p class="visible-sm">
				<img  id="match-img-<?= $match['match_id']?>-2" src="<?= $match['team2_flag']?>" title="<?= $match['team2_name']?>" class="img-rounded team1-flag"><?= $match['team2_abbr_name']?>
				</p>
                <p class="visible-xs"><?= $match['team2_abbr_name']?><img src="<?= $match['team2_flag']?>"  id="match-img-<?= $match['match_id']?>-2" class="img-rounded team1-flag" title="<?= $match['team2_name']?>" style="width:28px"></p>
				<div class="group-team-name-2" id="match-name-<?= $match['match_id']?>-2"><?= $match['team2_name']?></div>
			</td>
            <td class="input-match matchrow-2-<?= $match['match_id']?> <?= $class_col_2?>">
                <input <?= $no_complete || $match_completed ? "disabled='disabled'" : ""?> type="number" min="0" max="20" maxlength="1" id="input-goals-2-<?= $match['match_id']?>" match_id="<?= $match['match_id']?>" class="form-control input-goals" value="<?= isset($matches_completed[$match['match_id']]['team2_goals']) ? $matches_completed[$match['match_id']]['team2_goals'] : ""?>" name="match[<?= $match['match_id']?>][team2]">
            </td>
        </tr>
		<!--
        <tr class="stats-info" style="background:none">
        	<td colspan="2" class="hidden-xs"></td>
           	<?
            if($match_ended)
			{
				$display = "";
				if($matches_completed[$match['match_id']]['result_match'])
				{
					$display = '<span class="badge" style="background-color: #16994F">R</span>';	
				}
				else
				{
					if($matches_completed[$match['match_id']]['exact_result_match'])
					{
						$display = '<span class="badge" style="background-color: #16bb4F">RE</span>';	
					}
					else
					{
						$display = '<span class="glyphicon glyphicon-remove-sign" style="color: #D43C30; font-size:18px"></span>';	
					}
				}
				
				
				?>
				<td colspan="5" class="bet-col" style="border-right: 0px;"> <?= $display?></td>
				<?		
			}
			else
			{
				//NO BETS
				/*
				?>
				<td colspan="2" class="bet-col" title="<?= lang("Gana")?> <?= $match['team1_name']?>"><?= $bets[0] ? "%".$bets[0]: "-"?></td>
                <td class="bet-col" title="<?= lang("Empate")?>"><?= $bets[1] ? "%".$bets[1]: "-"?></td>
                <td colspan="2" class="bet-col" title="<?= lang("Gana")?> <?= $match['team2_name']?>"><?= $bets[2] ? "%".$bets[2]: "-"?></td>
				<?
				*/				
			}
			?>
            
        </tr>
		-->
        <?
		}
		?>
        </table>
        </div>
        <div class="col-md-4 col-sm-4 hidden-xs  matches-stats-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-results" data-toggle="tab"><?= lang("Resultados")?></a></li>
                <li><a href="#tab-positions" data-toggle="tab"><?= lang("Posiciones")?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-results"><? include(dirname(__FILE__)."/zone_results.php")?></div>
                <div class="tab-pane" id="tab-positions"><? include(dirname(__FILE__)."/zone_positions.php")?></div>
            </div>
			
        </div>
        </form>        
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>