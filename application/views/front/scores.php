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
                        <?
						echo $players[0]['username'] ? "<th>".lang("Nombre")."</th>" : "";
						echo $players[0]['department'] ? "<th>".lang("Departamento")."</th>" : "";
						echo $this->company_model->branch_league ? "<th>".$this->company_model->branch_name."</th>" : "";
						?>
                        <th style="text-align:right"><?= lang("Puntos")?></th><th title="<?= lang("Resultados Adivinados")?>" style="text-align:right">R<br><span class='glyphicon glyphicon-info-sign'></span></th><th  style="text-align:right" title="<?= lang("Resultados Exactos Adivinados")?>">RE<br><span class='glyphicon glyphicon-info-sign'></span></th>
                        <?
						echo $this->company_model->qualys ? " <th  style='text-align:right' title='".lang("Pre Clasificados")."'>".lang("pre-qualy-label")."<br><span class='glyphicon glyphicon-info-sign'></span></th>" : "";
						echo $this->company_model->winners ? " <th style='text-align:right' title='".lang("Ganadores del torneo")."'>".lang("winners-label")."<br><span class='glyphicon glyphicon-info-sign'></span></th>" : "";
                        echo $this->company_model->badges ? " <th>".lang("Badges")."</th>" : "";
						?>
                       
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
							$badges = $player['badges'] ? explode("|",$player['badges']) : "";
							
							?>
							<tr class="<?= $player['user_id'] && ($player['user_id'] == $marked_user_id) ? "user-found" : ""?>">
                            	<td class="scores-position"><?= $i ?>°</td>
                                <?
                                echo $player['username'] ? "<td>".$player['username']."</td>" : "";
								echo $player['department'] ? "<td>".$player['department']."</td>" : "";
								echo $this->company_model->branch_league ? "<td>".$player['branch']."</td>" : "";
								?>
                                <td align="right"><b style="font-size:17px"><?= (int)$player['points']?></b></td>
                                <td align="right"><?= (int)$player['results']?></td>
                                <td align="right"><?= (int)$player['exact_results']?></td>
                                <?
                                if($this->company_model->qualys)
								{
									?><td align="right"><?= (int)$player['qualy_points']?></td><?	
								}
								if($this->company_model->winners)
								{
									?><td align="right"><?= (int)$player['winner_points']?></td><?	
								}
                                if($this->company_model->badges)
								{
								?>
                                    <td>
                                    <?
                                    if(is_array($badges))
                                    {
                                        $show_badge = array();
                                        foreach($badges as $badge)
                                        {
                                            $badge = explode("/",$badge);
                                            $show_badge[$badge[0]] += $badge[1];
                                        }
										
										foreach($show_badge as $badge_id => $total)
										{
											if($badges_icons[$badge_id]['icon'] && $total)
											{
											?>
												<div class="pull-left score-badges">
													<img class="media-object" src="<?= base_url()?>assets_fe/img/badges/32x32/<?= $badges_icons[$badge_id]['icon']?>" title="<?= $badges_icons[$badge_id]['name']?>" />
													<?
													if($total > 1)
													{
														?><span class="badge badge-success pull-right"><?= $total?></span><?
													}?>
												</div>
											<?
											}
										}
										?><span class="badge pull-right"><?= $player['badges_points'] > 0 ? "+".$player['badges_points'] : $player['badges_points'] ?></span><?
									}?>
                                    </td>
								<?	
								}
								?>
                                
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