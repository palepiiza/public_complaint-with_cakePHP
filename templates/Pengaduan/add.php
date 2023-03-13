<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pengaduan $pengaduan
 * @var \Cake\Collection\CollectionInterface|string[] $petugas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pengaduan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pengaduan form content">
            <?= $this->Form->create($pengaduan) ?>
            <fieldset>
                <legend><?= __('Add Pengaduan') ?></legend>
                <?php
                    echo $this->Form->control('tgl_pengaduan');
                    echo $this->Form->control('isi_laporan');
                    echo $this->Form->control('foto');
                    echo $this->Form->control('status');
                    echo $this->Form->control('petugas_id', ['options' => $petugas, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
