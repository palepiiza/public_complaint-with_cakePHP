<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tanggapan> $tanggapan
 */
?>
<div class="tanggapan index content">
    <?= $this->Html->link(__('New Tanggapan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tanggapan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_tanggapan') ?></th>
                    <th><?= $this->Paginator->sort('pengaduan_id') ?></th>
                    <th><?= $this->Paginator->sort('tgl_tanggapan') ?></th>
                    <th><?= $this->Paginator->sort('petugas_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tanggapan as $tanggapan): ?>
                <tr>
                    <td><?= $this->Number->format($tanggapan->id_tanggapan) ?></td>
                    <td><?= $tanggapan->has('pengaduan') ? $this->Html->link($tanggapan->pengaduan->id_pengaduan, ['controller' => 'Pengaduan', 'action' => 'view', $tanggapan->pengaduan->id_pengaduan]) : '' ?></td>
                    <td><?= h($tanggapan->tgl_tanggapan) ?></td>
                    <td><?= $tanggapan->has('petuga') ? $this->Html->link($tanggapan->petuga->id_petugas, ['controller' => 'Petugas', 'action' => 'view', $tanggapan->petuga->id_petugas]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tanggapan->id_tanggapan]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tanggapan->id_tanggapan]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tanggapan->id_tanggapan], ['confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id_tanggapan)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
