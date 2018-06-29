<? 
	include(dirname(__FILE__)."/common/header.php");
	$prev_date = "";
	$colspan = 7;
?>
<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <h1 class="pull-left"><?= lang("Pronosticos")?></h1>
            </div>
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
    <div class="col-md-12">
        <h3 class="page-title"><?= lang("complete-bets")?><br><small><?= lang("penalties-rule")?></small></h3>
    </div>
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
        <div class="col-md-12" style="padding: 0px;">
            <div class="panel panel-primary finals-panel">
                <div class="panel-body">
                    <form action="<?= $link_url?>home/validate_matches_form/" method="post" enctype="multipart/form-data" id="prognostics-form">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-8vos">
                        <h2><?= lang("8vos de final")?></h2>
                        <table class="table pull-left zone-table table-responsive table-condensed full-width">
                    <?
                    $phase = "8";
                    include(dirname(__FILE__)."/common/finals_col.php");
                    ?>
                    </table>
                    <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  col-4tos">
                        <h2><?= lang("4tos de final")?></h2>
                        <table class="table pull-left zone-table table-responsive table-condensed full-width">
                    <?
                    $phase = "4";
                    include(dirname(__FILE__)."/common/finals_col.php");
                    ?>
                    </table>
                    <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  col-semi">
                        <h2><?= lang("Semifinal")?></h2>
                        <table class="table pull-left zone-table table-responsive table-condensed full-width">
                    <?
                    $phase = "semi";
                    include(dirname(__FILE__)."/common/finals_col.php");
                    ?>
                    </table>
                    <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-finals">
                        <h2><?= lang("Final")?></h2>
                        <table class="table pull-left zone-table table-responsive table-condensed full-width finals-table">
                        <?
                        $phase = "final";
                        include(dirname(__FILE__)."/common/finals_col.php");
                
                        ?>
                        </table>
                        <h2><?= lang("3er y 4to puesto")?></h2>
                        <table class="table pull-left zone-table table-responsive table-condensed full-width col3y4-table">
                        <?
                        $phase = "3y4";
                        include(dirname(__FILE__)."/common/finals_col.php");
                
                        ?>
                        </table>
                        <div class="clearfix"></div>
                    </div> 
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<? include(dirname(__FILE__)."/common/footer.php")?>