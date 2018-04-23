<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1><?= lang("Posiciones")?></h1></div>
        </div>
    </div>
</div>
<div id="section-nav" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?= $link_url?>posiciones" <? if($league_type=='general'){?>class="active"<? } ?>><?= lang("Liga General")?></a></li>
                <?
                if($this->company_model->dept_league)
                {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle <?= $league_type == "dept" ? "active" : ""?>" href="#" data-toggle="dropdown" ><?= lang("Liga")?> por departamento <strong class="caret"></strong></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= $link_url?>posiciones/all-dept/0" class="sum-league">TODOS LOS DEPARTAMENTOS</a></li>
                        <?
                        foreach($departments as $department)
                        {
                            ?>
                            <li><a href="<?= $link_url?>posiciones/dept/<?= (int)$department['department_id']?>/<?= urlencode($department['department'])?>/0"><?= $department['department']?></a></li>
                            <?	
                        }
                        ?>
                        
                    </ul>
                </li>
                <?
                }
                if($this->company_model->branch_league)
                {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle <?= $league_type == "branch" ? "active" : ""?>" href="#" data-toggle="dropdown" ><?= lang("Liga")?> por <?= $this->company_model->branch_name ? $this->company_model->branch_name : "sucursal" ?> <strong class="caret"></strong></a>
                    <ul class="dropdown-menu" role="menu">
                        <?
                        foreach($branches as $branch)
                        {
                            ?>
                            <li><a href="<?= $link_url?>posiciones/branch/<?= (int)$branch['branch_id']?>/<?= urlencode($branch['branch'])?>/0"><?= $branch['branch']?></a></li>
                            <?	
                        }
                        ?>
                    </ul>
                </li>
                
                	<?= $this->company_model->branch_league_name ? '<li><a href="'. $link_url.'posiciones/all-branch/0">'.$this->company_model->branch_league_name.'</a></li>' : ""?>
                
				<?
                }
                if($this->company_model->friends_league && is_array($friends_league) && count($friends_league))
                {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle <?= $league_type == "friends" ? "active" : ""?>" href="#" data-toggle="dropdown" ><?= lang("Liga de amigos")?><strong class="caret"></strong></a>
                    <ul class="dropdown-menu" role="menu">
                        <?
						if(is_array($friends_league))
						{
							foreach($friends_league as $league)
							{
								?>
								<li><a href="<?= $link_url?>posiciones/amigos/<?= urlencode($league['league_id'])?>/<?= urlencode($league['league'])?>/0"><?= $league['league']?></a></li>
								<?	
							}
						}
						?>
                    </ul>
                </li>
                <?
                }
                ?>
            </ul>
            </div>
        </div>
    </div>
</div>