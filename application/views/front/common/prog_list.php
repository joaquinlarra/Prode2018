<div class="btn-group" role="group">
    <a class="btn btn-header <?= $phase == 'initial' ? 'active' : '' ?>" href="<?=$link_url?>pronostico-fase-inicial"><?= $phase == 'initial' ? '<i class="fas fa-futbol"></i>' : '' ?> <?= lang("Fase inicial")?></a>
    <a  class="btn btn-header <?= $phase == 'final' ? 'active' : '' ?>" href="<?=$link_url?>pronostico-fase-final"><?= $phase == 'final' ? '<i class="fas fa-futbol"></i>' : '' ?> <?= lang("Fase final")?></a>
</div>