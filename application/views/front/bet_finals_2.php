<? 
	include(dirname(__FILE__)."/common/header.php");
	$prev_date = "";
	$colspan = 7;

	global $base_url;
	$base_url = base_url();
	global $matches_completed;
	$matches_completed = $user_matches;
	function get_match( $phase, $order, $team)
	{
		if(is_array($matches[$phase][$order]))
		{
			return 	"<input ".($matches[$phase][$order]['no_complete'] ? "disabled='disabled'" : "")."type='text' maxlength='1' id='input-goals-".$team."-".$matches[$phase][$order]['match_id']."' match_id='".$matches[$phase][$order]['match_id']."' class='form-control input-goals' value='".($matches_completed[$matches[$phase][$order]['match_id']]['team'.$team.'_goals'] ? $matches_completed[$matches[$phase][$order]['match_id']]['team'.$team.'_goals'] : "")."' name='".$matches[$phase][$order]['team'.$team.'_name'].">
						<img src='". $matches[$phase][$order]['team'.$team.'_flag']."' title='".$matches[$phase][$order]['team'.$team.'_name']."' class='img-rounded team1-flag'> ".$matches[$phase][$order]['team'.$team.'_abbr_name'];
		}
		else
		{
			return 	"<input disabled='disabled' type='text' maxlength='1' id='input-goals-".$team."-".$matches[$phase][$order]['match_id']."' class='form-control input-goals' > <img src='".$base_url."assets_fe/img/no-flag.png"."' title='".$matches[$phase][$order]['team'.$team.'_name']."' class='img-rounded team1-flag'>";
		}
	}
?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1 class="pull-left"><?= lang("Pronósticos")?></h1><div class="pull-right hidden-xs" style="margin-top:10px"><img src="<?= base_url()?>assets_fe/img/<?= lang("recorda")?>.png"></div></div>
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
		
        <div class="panel">
        	<div class="panel-body">
            	<div class="row" data-columns="8" style="margin:5px" id="finals-panel">
                 
                    <div class="col-md-1 col-sm-1 col-xs-4">
                    	<?
                        for($i = 1; $i <= 4; $i++)
						{?>
							<div class="clearfix"></div>
                            <div class="team team-left">
                        	<?= get_match(8,$i,1)?>
                            </div>
                            <div class="team team-left">
                                <?= get_match(8,$i,2)?>
                            </div>
						<?
                        }
						?>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-4">
                    	<?
                        for($i = 1; $i <= 2; $i++)
						{?>
							<div class="clearfix"></div>
                            <div class="team team-left">
                        	<?= get_match(4,$i,1)?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="team team-left">
                                <?= get_match(4,$i,2)?>
                            </div>
						<?
                        }
						?>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-4">
                        <div class="clearfix"></div>
                        <div class="team team-left">
                        <?= get_match('semi',1,1)?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="team team-left">
                            <?= get_match('semi',1,2)?>
                        </div>
					
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                    	<div class="clearfix"></div>
                        <h1>FINAL</h1>
                        <div class="team team-left">
                        	<?= get_match('final',1,1)?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="team team-right">
                            <?= get_match('final',1,2)?>
                        </div>
                        <div class="clearfix"></div>
                        <h1>3er y 4to Puesto</h1>
                    	<div class="team team-left">
                        	<?= get_match('3y4',1,1)?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="team team-right">
                            <?= get_match('3y4',1,2)?>
                        </div>
                    </div>
					<div class="col-md-1 col-sm-1 col-xs-4">
                        <div class="clearfix"></div>
                        <div class="team team-right">
                        <?= get_match('semi',1,1)?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="team team-right">
                            <?= get_match('semi',1,2)?>
                        </div>
					
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-4">
                    	<?
                        for($i = 1; $i <= 2; $i++)
						{?>
							<div class="clearfix"></div>
                            <div class="team team-right">
                        	<?= get_match(4,$i,1)?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="team team-right">
                                <?= get_match(4,$i,2)?>
                            </div>
						<?
                        }
						?>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-4">
                    	<?
                        for($i = 1; $i <= 4; $i++)
						{?>
							<div class="clearfix"></div>
                            <div class="team team-right">
                        	<?= get_match(8,$i,1)?>
                            </div>
                            <div class="team team-right">
                                <?= get_match(8,$i,2)?>
                            </div>
						<?
                        }
						?>
                    </div>
                </div>
            </div>
        </div>

        <img src="<?= base_url()?>assets_fe/img/fase_final.png" class="full-width">

    </div>	
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>