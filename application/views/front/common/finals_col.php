<?
switch($phase)
{
	case '8': 	$total_phase_matches = 8;
				break;
	case '4':	$total_phase_matches = 4;
				break;
	case 'semi':
				$total_phase_matches = 2;
				break;
	default:
				$total_phase_matches = 1;	
				break;
}

if(!is_array($matches[$phase]))
{

	for($i = 1; $i <= $total_phase_matches; $i++)
	{
		include(dirname(__FILE__)."/missing_match.php");		
	}	
}
else
{
	for($i = 1; $i <= $total_phase_matches; $i++)
	{
		if(!$matches[$phase][$i])
		{
			include(dirname(__FILE__)."/missing_match.php");	
		}
		else
		{
			$match = $matches[$phase][$i];
			$class_col_1 = "";
			$class_col_2 = "";
			$match_completed = false;
			if($matches_completed[$match['match_id']])
			{
				$match_completed = true;
			}
			$no_complete = 0;
			$no_complete = minDiff($match['date_played'],$today) < 30 ? true : false;
			$match_ended = false;
			if(($match['result'] != -2) && $no_complete)
			{
				$match_ended = true;
				$match_asserted = $matches_completed[$match['match_id']]['result'] == $match['result'] ? true: false;
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
			?>
            <input type="hidden" name="match[<?= $match['match_id']?>][matchname]" value="<?= $zone?>: <?= $match['team1_abbr_name']?> vs <?= $match['team2_abbr_name']?>">
            <tr class="stats-mobile">
                <td colspan="<?= $colspan?>">	
                <div>
                <small><?= dateFormat($match['date_played'], "d/m")?> <?= $this->session->userdata('lang') == 'MX' ? (int)(dateFormat($match['date_played'],"G")-2):dateFormat($match['date_played'],"G")?>:<?= dateFormat($match['date_played'],"i")?>hs</small>
                </div>
                </td>
            </tr>
            <tr id="matchrow-<?= $match['match_id']?>" match-code="<?= $match_code?>" class="matchrow" zone="<?= $zone?>" matchname="<?= $match['team1_abbr_name']?> vs <?= $match['team2_abbr_name']?>">
                <td class="input-match matchrow-1-<?= $match['match_id']?> <?= $class_col_1?>">
                    <input <?= $no_complete || $match_completed ? "disabled='disabled'" : ""?> type="text" maxlength="1" id="input-goals-1-<?= $match['match_id']?>" match_id="<?= $match['match_id']?>" class="form-control input-goals" value="<?= isset($matches_completed[$match['match_id']]['team1_goals']) ? $matches_completed[$match['match_id']]['team1_goals'] : ""?>" name="match[<?= $match['match_id']?>][team1]">
                </td>
                <td class="teamname team1 matchrow-1-<?= $match['match_id']?> <?= $class_col_1?>" title="<?= $match['team1_name']?>">
                    <small><img src="<?= $match['team1_flag']?>" title="<?= $match['team1_name']?>" class="img-rounded team1-flag" style="width:28px"><br><?= $match['team1_abbr_name']?></small>
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
                            ?><small><?= lang("Guardado")?></small><br><span class="btn btn-success btn-edit-match" match_id="<?= $match['match_id']?>"><?= lang("editar")?></span><?	
                        }
                        else
                        {
                            ?>-<?	
                        }
                    }
                    ?>
                </td>
                <td class="teamname team2 matchrow-2-<?= $match['match_id']?> <?= $class_col_2?>"  title="<?= $match['team2_name']?>">
                    <small><img src="<?= $match['team2_flag']?>" class="img-rounded team1-flag" title="<?= $match['team2_name']?>" style="width:28px"><br><?= $match['team2_abbr_name']?></small>
                </td>
                <td class="input-match matchrow-2-<?= $match['match_id']?> <?= $class_col_2?>">
                    <input <?= $no_complete || $match_completed ? "disabled='disabled'" : ""?> type="text" maxlength="1" id="input-goals-2-<?= $match['match_id']?>" match_id="<?= $match['match_id']?>" class="form-control input-goals" value="<?= isset($matches_completed[$match['match_id']]['team2_goals']) ? $matches_completed[$match['match_id']]['team2_goals'] : ""?>" name="match[<?= $match['match_id']?>][team2]">
                </td>
            </tr>
            <tr class="stats-info" style="background:none">
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
                    ?>
                    <td colspan="2" class="bet-col" title="<?= lang("Gana")?> <?= $match['team1_name']?>"><?= $bets[0] ? "%".$bets[0]: "-"?></td>
                    <td class="bet-col" title="<?= lang("Empate")?>"><?= $bets[1] ? "%".$bets[1]: "-"?></td>
                    <td colspan="2" class="bet-col" style="border-right:0px" title="<?= lang("Gana")?> <?= $match['team2_name']?>"><?= $bets[2] ? "%".$bets[2]: "-"?></td>
                    <?				
                }
                ?>
                
            </tr>
            <tr class="finals-separator"><td colspan="5"></td></tr>	<?
		}		
	}
}
	?>