<? 
	include(dirname(__FILE__)."/common/header.php");
	$prev_date = "";
	$colspan = 7;
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
<div class="container main-content finals-container">
	<div class="row paralax">
    <h3 class="page-title"><?= lang("complete-bets")?><br><small><?= lang("penalties-rule")?></small></h3>
	<?
	if($saved)
	{
		?>
		<div class="col-md-12">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $message?>
		</div>
		</div>
		<?	
	}
	?>
        <div class="panel panel-primary finals-panel">
            <div class="panel-body">
                <form action="<?= $link_url?>home/validate_matches_form/" method="post" enctype="multipart/form-data" id="prognostics-form">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-8vos">
                    <h2><?= lang("8vos de final")?></h2>
                    <table class="table pull-left zone-table table-responsive table-condensed full-width">
                <?
                $phase = "8";
                include(dirname(__FILE__)."/common/finals_col.php");
                ?>
                </table>
                <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12  col-4tos">
                    <h2><?= lang("4tos de final")?></h2>
                    <table class="table pull-left zone-table table-responsive table-condensed full-width">
                <?
                $phase = "4";
                include(dirname(__FILE__)."/common/finals_col.php");
                ?>
                </table>
                <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12  col-semi">
                    <h2><?= lang("Semifinal")?></h2>
                    <table class="table pull-left zone-table table-responsive table-condensed full-width">
                <?
                $phase = "semi";
                include(dirname(__FILE__)."/common/finals_col.php");
                ?>
                </table>
                <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-finals">
                    <h2><?= lang("Final")?></h2>
                    <table class="table pull-left zone-table table-responsive table-condensed full-width finals-table">
                    <?
                    $phase = "final";
                    include(dirname(__FILE__)."/common/finals_col.php");
            
                    ?>
                    </table>
                    <h2>3er y 4to puesto</h2>
                     <table class="table pull-left zone-table table-responsive table-condensed full-width">
                    <?
                    $phase = "3y4";
                    include(dirname(__FILE__)."/common/finals_col.php");
            
                    ?>
                    </table>
                    <div class="clearfix"></div>
                </div> 
                <?
                if($section == "bet_completed")
                {
                    ?><div class="clearfix"></div>
                    <a href="<?= $link_url?>pronosticos" class="btn btn-primary btn-lg btn-block"><?= lang("editar")?></a><?	
                }
                else
                {
                    ?>
                    <div class="clearfix"></div>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="submit-btn"><?= lang("Guardar")?></button><?
                }
                ?>
                </form>
    		</div>
        </div>
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>