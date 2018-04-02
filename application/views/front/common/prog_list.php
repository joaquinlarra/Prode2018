<ul class="nav navbar-nav navbar-left">
    <?
    if($this->company_model->qualys)
	{
	?>
    <li><a <? if($phase == 'qualys'){?>class="active"<? } ?> href="<?=$link_url?>pronostico-qualys"><?= lang("Pre-clasificados")?></a></li>
    <?
	}
	?>
    <li><a <? if($phase == 'initial'){?>class="active"<? } ?> href="<?=$link_url?>pronostico-fase-inicial"><?= lang("Fase inicial")?></a></li>
    <li><a  <? if($phase == 'final'){?>class="active"<? } ?> href="<?=$link_url?>pronostico-fase-final"><?= lang("Fase final")?></a></li>
	<?
    if($this->company_model->winners)
	{
	?>
    <li><a <? if($phase == 'starter'){?>class="active"<? } ?> href="<?=$link_url?>pronostico-ganadores"><?= lang("Ganadores")?></a></li>
    <?
	}
	?>
</ul>