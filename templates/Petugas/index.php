<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Petuga> $petugas
 */
?>
<div class="petugas index content">
<?= $this->Html->link(__('logout'), ['action' => 'logout']) ?>
    <?= $this->Html->link(__('New Petuga'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Petugas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_petugas') ?></th>
                    <th><?= $this->Paginator->sort('nik') ?></th>
                    <th><?= $this->Paginator->sort('nama') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('telp') ?></th>
                    <th><?= $this->Paginator->sort('level') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($petugas as $petuga): ?>
                <tr>
                    <td><?= $this->Number->format($petuga->id_petugas) ?></td>
                    <td><?= h($petuga->nik) ?></td>
                    <td><?= h($petuga->nama) ?></td>
                    <td><?= h($petuga->username) ?></td>
                    <td><?= h($petuga->telp) ?></td>
                    <td><?= h($petuga->level) ?></td>
                    <td><?= h($petuga->created) ?></td>
                    <td><?= h($petuga->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $petuga->id_petugas]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $petuga->id_petugas]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $petuga->id_petugas], ['confirm' => __('Are you sure you want to delete # {0}?', $petuga->id_petugas)]) ?>
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
