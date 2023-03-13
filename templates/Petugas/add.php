<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Petuga $petuga
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Petugas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="petugas form content">
            <?= $this->Form->create($petuga) ?>
            <fieldset>
                <legend><?= __('Add Petuga') ?></legend>
                <?php
                    echo $this->Form->control('nik');
                    echo $this->Form->control('nama');
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('telp');
                    echo $this->Form->control('level');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
