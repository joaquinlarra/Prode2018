<? include(dirname(__FILE__)."/common/header.php")?>
<? include(dirname(__FILE__)."/common/friends_list.php")?>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
                    <div class="col-md-12 col-sm-12" align="center">
                    <?
                    if(!is_array($join_leagues))
					{
						echo lang("no-friends-league");	
					}
					else
					{
					?>
						<?= lang("join-league-msg")?>
                        <div id="create-league-content" style="margin-top: 15px">
                            <form action="<?= $link_url."front_user/validate_join_league"?>" method="post" enctype="multipart/form-data" id="join-league-form">
                            <div class="clearfix"></div>
                            <div id="error" class="alert alert-danger" style="display:none"></div>
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <div class="form-group" style=" text-align:left">
                                    <select name="league_id" id="league_id" class="form-control">
                                        <option value="">-- <?= lang("Lista de ligas")?> --</option>
                                        <?
                                        foreach($join_leagues as $league)
										{
											?><option value="<?= $league['league_id']?>"><?= $league['name']?> (<?= lang("Creador")?>: <?= $league['creator_name']?>)</option><?	
										}
                                        ?>
                                    </select>
                                </div>
                                <br>
                                
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="<?= lang("Unirse a la liga")?>">
                            </form>	
                        </div>
                    <?
					}
					?>
                    </div>
			</div>
		</div>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>