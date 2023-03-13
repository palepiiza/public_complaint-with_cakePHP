<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pengaduan> $pengaduan
 */
?>
<div class="pengaduan index content">
    <?= $this->Html->link(__('New Pengaduan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pengaduan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_pengaduan') ?></th>
                    <th><?= $this->Paginator->sort('tgl_pengaduan') ?></th>
                    <th><?= $this->Paginator->sort('foto') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('petugas_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengaduan as $pengaduan): ?>
                <tr>
                    <td><?= $this->Number->format($pengaduan->id_pengaduan) ?></td>
                    <td><?= h($pengaduan->tgl_pengaduan) ?></td>
                    <td><?= h($pengaduan->foto) ?></td>
                    <td><?= h($pengaduan->status) ?></td>
                    <td><?= $pengaduan->has('petuga') ? $this->Html->link($pengaduan->petuga->id_petugas, ['controller' => 'Petugas', 'action' => 'view', $pengaduan->petuga->id_petugas]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pengaduan->id_pengaduan]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pengaduan->id_pengaduan]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pengaduan->id_pengaduan], ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id_pengaduan)]) ?>
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
