<? 
	$zone = "Grupo A";
?>

	<div class="row">
        <div class="col-md-12">
        <table class="table pull-left team-results-table table-responsive table-condensed full-width">
          <tr>
          	<th colspan="5"  class="results-header"><?= $zone?></th>
          </tr>
	<?
    foreach($matches_zone as $match)
    {
        if($zone != $match['zone'])
        {
            $zone = $match['zone'];
			?>
            </table>
            </div>
            <div class="col-md-12 col-sm-12">
            <table class="table pull-left team-results-table table-responsive table-condensed full-width">
              <tr>
                <th colspan="5" class="results-header"><?= $zone?></th>
              </tr>
		<?	
        }
        ?>
        <tr id="matchrow-<?= $match['match_id']?>" match-code="<?= $match_code?>" class="matchrow" zone="<?= $zone?>" matchname="<?= $match['team1_abbr_name']?> vs <?= $match['team2_abbr_name']?>">
            <td class="input-match matchrow-1-<?= $match['match_id']?> <?= $class_col_1?>">
           		<input disabled="disabled" type="text" maxlength="1" class="form-control input-goals" value="<?=   $match['result'] != '-2' ? $match['team1_goals'] : ""?>">

            </td>
            <td class="teamname team1 matchrow-1-<?= $match['match_id']?> <?= $class_col_1?>">
                <p class="hidden-xs"><img src="<?= $match['team1_flag']?>" title="<?= $match['team1_name']?>"  width="20px" class="img-rounded team1-flag"> <?= strtoupper($match['team1_abbr_name'])?></p>
                <small class="visible-xs"><img src="<?= $match['team1_flag']?>" title="<?= $match['team1_name']?>"  width="20px" class="img-rounded team1-flag" style="width:28px"><br><?= strtoupper($match['team1_abbr_name'])?></small>
            </td>
            <td class="teamname team2 matchrow-2-<?= $match['match_id']?> <?= $class_col_2?>">
                <p class="hidden-xs"><?= strtoupper($match['team2_abbr_name'])?> <img  width="20px" title="<?= $match['team2_name']?>" src="<?= $match['team2_flag']?>" class="img-rounded team1-flag"></p>
                <small class="visible-xs"><img src="<?= $match['team2_flag']?>"  width="20px" title="<?= $match['team2_name']?>" class="img-rounded team1-flag" style="width:28px"><br><?= strtoupper($match['team2_abbr_name'])?></small>
            </td>
            <td class="input-match matchrow-2-<?= $match['match_id']?> <?= $class_col_2?>">
                <input disabled="disabled" type="text" maxlength="1" class="form-control input-goals" value="<?=  $match['result'] != '-2' ? $match['team2_goals'] : ""?>">
            </td>
        </tr>
        <?
		}
		?>
        </table>
    </div>    
</div>

