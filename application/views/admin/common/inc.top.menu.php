<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
      
        <?
        $buttons = $this->config->item('general');
        foreach($buttons[$this->uri->segment(1)]['sections'] as $section_id => $section)
        {
        if($section['admin_only'] && !$this->bitauth->is_admin()) continue;
		$top_menu_actions = $this->config->item('modules');
		$top_menu_actions = $top_menu_actions[$section_id]['top_menu_actions'];
        ?>
        
        <li class="main-navbar-li dropdown">
          <a href="#" <?= $active ? "class='active'" : ""?> class="dropdown-toggle" data-toggle="dropdown"><?= $section['name']?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <?
		  foreach($top_menu_actions as $action => $attrs)
		  {
		  ?>
            <li><a href="<?=$attrs['url']?>"><?=$attrs['label']?></a></li>
          <? 
		  }
		  ?>
          </ul>
        </li>
        <?	
        }
        ?>
      </ul>

        <div class="btn-group pull-right">
        	<button type="button" class="btn btn-link"><span class="glyphicon glyphicon-user"></span> <?= $this->bitauth->username?></button>
          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#user/details/<?= $this->bitauth->user_id?>" class="ajax-links-top-menu">Mi cuenta</a></li>
            <li><a href="#user/edit_password/<?= $this->bitauth->user_id?>" class="ajax-links-top-menu">Modificar password</a></li>
            <li class="divider"></li>
            <li><a href="<?=base_url()?>admin/user/logout"><i class="icon-share"></i> Logout</a></li>
        </ul>
        </div>
      
    </div>
  </div>
</div>

