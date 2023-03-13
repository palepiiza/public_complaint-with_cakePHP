<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tanggapan $tanggapan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tanggapan'), ['action' => 'edit', $tanggapan->id_tanggapan], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tanggapan'), ['action' => 'delete', $tanggapan->id_tanggapan], ['confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id_tanggapan), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tanggapan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tanggapan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tanggapan view content">
            <h3><?= h($tanggapan->id_tanggapan) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pengaduan') ?></th>
                    <td><?= $tanggapan->has('pengaduan') ? $this->Html->link($tanggapan->pengaduan->id_pengaduan, ['controller' => 'Pengaduan', 'action' => 'view', $tanggapan->pengaduan->id_pengaduan]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Petuga') ?></th>
                    <td><?= $tanggapan->has('petuga') ? $this->Html->link($tanggapan->petuga->id_petugas, ['controller' => 'Petugas', 'action' => 'view', $tanggapan->petuga->id_petugas]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Tanggapan') ?></th>
                    <td><?= $this->Number->format($tanggapan->id_tanggapan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tgl Tanggapan') ?></th>
                    <td><?= h($tanggapan->tgl_tanggapan) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Isi Tanggapan') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tanggapan->isi_tanggapan)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
