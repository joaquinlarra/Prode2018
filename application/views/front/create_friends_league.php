<? include(dirname(__FILE__)."/common/header.php")?>
<? include(dirname(__FILE__)."/common/friends_list.php")?>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
                    <div class="col-md-12 col-sm-12" align="center">
                    <?= lang("create-friends-list")?>
                    <div id="create-league-content" style="margin-top: 15px">
                        <form action="<?= $link_url."front_user/validate_create_league"?>" method="post" enctype="multipart/form-data" id="create-league-form">
                        <div class="clearfix"></div>
                        <div id="error" class="alert alert-danger" style="display:none"></div>
                        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div class="form-group" style=" text-align:left">
	                            <input type="text" id="name" class="form-control" name="name">
                            </div>
                            <br>
                           
                        </div>
                        	<input type="submit" class="btn btn-primary btn-block" value="<?= lang("CREAR LIGA")?>">
                        </form>	
                    </div>
                    </div>
			</div>
		</div>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>