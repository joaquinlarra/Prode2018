<? $this->load->view("/admin/common/inc.header.php", $header_data); ?>
<? $this->load->view("/admin/common/inc.top.menu.php", $header_data); ?>
<div class="container admin-container">
	<!--<div id="top_menu_actions"></div>-->
    <div id="breadcrumb"></div>
    <div id="main_message">
        <span id="loading"></span>
        <div class="clear"></div>
        <!--<span id="notification"></span>-->
    </div>
    <div class="clearfix"></div>
	<div id="content"></div>
</div>
<? $this->load->view("/admin/common/inc.footer.php",$footer_data);?>