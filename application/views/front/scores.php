<? include(dirname(__FILE__)."/common/header.php")?>
<? include(dirname(__FILE__)."/common/scores_list.php")?>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
                <?
                if($league_type=='general')
				{
				?>
                <form action="<?= $link_url?>posiciones/buscar/0/0" method="post">
                	<div class="row">
                        <div class="col-md-10 col-sm-8 col-xs-7">
                            <input type="text" name="name" id="name" placeholder="<?= lang("Buscá por nombre")?>" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-5">
                            <input type="submit" class="btn btn-primary btn-block" value="<?= lang("Buscar")?>">
                        </div>
                    </div>
                </form>
                <?
				}
				?>
                <table id="positions-table" class="table pull-left table-hover table-responsive table-condensed full-width">
                	<tr>
                    	<th><?= lang("Puesto")?></th>
						<th><?= lang("Nombre")?></th>
                        <th style="text-align:right"><?= lang("Puntos")?></th><th title="<?= lang("Resultados Adivinados")?>" style="text-align:right">R<br><span class='glyphicon glyphicon-info-sign'></span></th><th  style="text-align:right" title="<?= lang("Resultados Exactos Adivinados")?>"><?= lang('RE')?><br><span class='glyphicon glyphicon-info-sign'></span></th>

                    </tr>
                    <?
					if($error)
					{
						?><tr class="no-results"><td colspan="15"><h3 align="center"><?= $error?></h3></td></tr><?	
					}
					else
					{
                    	$i = $offset;
						foreach($players as $player)
						{
							$i++;
							?>
							<tr class="<?= $player['user_id'] && ($player['user_id'] == $marked_user_id) ? "user-found" : ""?>">
                            	<td class="scores-position"><?= $i ?>°</td>
                                <?

                                $yellow_card = $player['badges'] == 'yellow_card' ? "<img src='".$link_url."assets_fe/img/yellow-card.png' title='Yellow card (-5 pts)' width='25px'>" : "";
                                echo $player['username'] ? "<td>".$player['username']." ".$yellow_card."</td>" : "";
								?>
                                <td align="right"><b style="font-size:17px"><?= (int)$player['points']?></b></td>
                                <td align="right"><?= (int)$player['results']?></td>
                                <td align="right"><?= (int)$player['exact_results']?></td>
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