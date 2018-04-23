<? 
	$zone = "Grupo A";
?>

	<div class="row">
        <div class="col-md-12">
        <table class="table pull-lefts table-responsive team-positions-table table-condensed full-width">
          <tr>
          	<th colspan="6"><?= $zone?></th>
          </tr>
          <tr id="table-header"><td><?= lang("Equipo")?></td><td>PJ</td><td>PG</td><td>PE</td><td>PP</td><td>Pts</td></tr>
	<?
    foreach($team_positions as $team)
    {
        if($zone != $team['zone'])
        {
            $zone = $team['zone'];
			?>
            </table>
            </div>
            <div class="col-md-12 col-sm-12">
            <table class="table pull-left team-positions-table table-responsive table-condensed full-width">
              <tr>
                <th colspan="6"><?= $zone?></th>
              </tr>
              <tr id="table-header"><td>Equipo</td><td>PJ</td><td>PG</td><td>PE</td><td>PP</td><td>Pts</td></tr>
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

