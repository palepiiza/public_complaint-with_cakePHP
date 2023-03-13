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
            <?= $this->Html->link(__('Edit Petuga'), ['action' => 'edit', $petuga->id_petugas], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Petuga'), ['action' => 'delete', $petuga->id_petugas], ['confirm' => __('Are you sure you want to delete # {0}?', $petuga->id_petugas), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Petugas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Petuga'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="petugas view content">
            <h3><?= h($petuga->id_petugas) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nik') ?></th>
                    <td><?= h($petuga->nik) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nama') ?></th>
                    <td><?= h($petuga->nama) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($petuga->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telp') ?></th>
                    <td><?= h($petuga->telp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= h($petuga->level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Petugas') ?></th>
                    <td><?= $this->Number->format($petuga->id_petugas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($petuga->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($petuga->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
