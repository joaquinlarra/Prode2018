<? 
    $zone = "";
?>

	<div class="row">
       
	<?
    foreach($team_positions as $team)
    {
        if($zone != $team['zone'])
        {
            if($zone != '')
            {
                echo '</table></div>'; 
            }
            $zone = $team['zone'];
            $zone_title = explode(" ",$zone);
            
            ?>
            <div class="col-md-12 col-sm-12">
            <table class="table pull-left team-positions-table table-responsive table-condensed full-width">
              <tr>
                <th colspan="6"><h5><?= lang($zone_title[0])." ".$zone_title[1]?></h5></th>
              </tr>
              <tr id="table-header"><td><?= lang("Equipo")?></td><td><?= lang("PJ")?></td><td><?= lang("PG")?></td><td><?= lang("PE")?></td><td><?= lang("PP")?></td><td><?= lang("Pts")?></td></tr>
		<?	
        }
        ?>
        	<tr><td> <img src="<?= $team['team_flag']?>" width="20px"> <?= $team['name']?></td><td><?= (int)$team['pj']?></td><td><?= (int)$team['pg']?></td><td><?= (int)$team['pe']?></td><td><?= (int)$team['pp']?></td><td><?= (int)$team['pts']?></td></tr>
        <?
	}
		?>
        </table>
        </div>    
    </div>

