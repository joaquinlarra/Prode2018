<? include(dirname(__FILE__)."/common/header.php")?>
<? include(dirname(__FILE__)."/common/friends_list.php")?>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
                    <div class="col-md-12 col-sm-12" align="center">
                    <h2><?= lang("league-participants")?> <small><a href="<?= $link_url?>posiciones/amigos/<?= urlencode($f_league->league_id)?>/<?= urlencode($f_league->name)?>"><?= lang('ver posiciones')?></a></small></h2>
                    <br>
                    <table id="leagues-table" class="table table-responsive full-width">
                    <th align="left"><?= lang("Nombre")?></th><th style="width:30%; text-align:center" align="center">Estado</th>
					<?
					if($is_moderator && is_array($non_confirmed_users))
					{
                    	foreach($non_confirmed_users as $league_user)
						{
							?>
							<tr>
                            	<td><?= $league_user['fullname']?></td>
                                <td align="center"><div class="btn btn-success accept-league" league_id="<?= $league_user['league_id']?>" user_id="<?= $league_user['user_id']?>"><small><?= lang("Aceptar")?></small></div> <div class="btn btn-danger decline-league"  league_id="<?= $league_user['league_id']?>" user_id="<?= $league_user['user_id']?>"><small><?= lang("Rechazar")?></small></div> </td>
                            </tr>
							<?
						}
					}
					?>
                    <?
					if(is_array($confirmed_users))
					{
                    	foreach($confirmed_users as $league_user)
						{
							?>
							<tr>
                            	<td><?= $league_user['fullname']?></td>
                                <td align="center"><span class="glyphicon glyphicon-ok" style="color:#5CB85C"></span></td>
                            </tr>
							<?
						}
					}
					?>
                    </table>
					
                    </div>
			</div>
		</div>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>