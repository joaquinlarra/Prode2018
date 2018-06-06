<? include(dirname(__FILE__)."/common/header.php")?>
<div id="section-header" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><><?= lang("Jugadores")?> :
                    <?
                    if($total_players <= $total_player_slots)
                    {
                        ?><span style="color:limegreen"><?= $total_players?>/<?= $total_player_slots?></span> Total</h1></div><?
                    }
                    else
                    {
                        ?><span style="color:red"><?= $total_players?>/<?= $total_player_slots?></span> Total</h1></div><?
                    }
                    ?>
        </div>
    </div>
</div>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
                <div id="page-message"></div>
                <table id="positions-table" class="table pull-left table-hover table-responsive table-condensed full-width">
                	<tr>
						<th><?= lang("Nombre")?></th>
                        <th><?= lang("Email")?></th>
                        <th style="text-align:right"># <?= ucfirst(strtolower_es(lang("Pronosticos")))?></th>
                        <th style="text-align:right"><?= lang("Fecha de registro")?></th>
                        <th style="text-align:right"><?= lang("Acciones")?></th>
                    </tr>
                    <?
					if($error)
					{
						?><tr class="no-results"><td colspan="4"><h3 align="center"><?= $error?></h3></td></tr><?
					}
					else
					{
                    	$i = $offset;
						foreach($players as $player)
						{
							$i++;
							?>
							<tr class="<?= $player['user_id'] && ($player['user_id'] == $marked_user_id) ? "user-found" : ""?>">
                                <td><?= $player['fullname']?></td>
                                <td><?= $player['email'] ?></td>
                                <td align="right"><?= $player['total_prognostics']?></td>
                                <td align="right"><?= $player['date_joined']?></td>
                                <td align="right"><button class="glyphicon glyphicon-trash delete-player" email="<?= $player['email'] ?>" id="delete-<?= $player['user_id']?>" player-code="<?= $player['player_code']?>"></button></td>
                            </tr>
							<?
						}
					}
					?>
                    
                </table>
                <div align="center"><?= $pagination?></div>
			</div>
		</div>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>