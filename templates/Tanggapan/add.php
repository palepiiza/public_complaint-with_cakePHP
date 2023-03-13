<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tanggapan $tanggapan
 * @var \Cake\Collection\CollectionInterface|string[] $pengaduan
 * @var \Cake\Collection\CollectionInterface|string[] $petugas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tanggapan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tanggapan form content">
            <?= $this->Form->create($tanggapan) ?>
            <fieldset>
                <legend><?= __('Add Tanggapan') ?></legend>
                <?php
                    echo $this->Form->control('pengaduan_id', ['options' => $pengaduan, 'empty' => true]);
                    echo $this->Form->control('isi_tanggapan');
                    echo $this->Form->control('tgl_tanggapan');
                    echo $this->Form->control('petugas_id', ['options' => $petugas, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
