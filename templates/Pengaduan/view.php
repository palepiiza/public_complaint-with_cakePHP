<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pengaduan $pengaduan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pengaduan'), ['action' => 'edit', $pengaduan->id_pengaduan], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pengaduan'), ['action' => 'delete', $pengaduan->id_pengaduan], ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id_pengaduan), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pengaduan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pengaduan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pengaduan view content">
            <h3><?= h($pengaduan->id_pengaduan) ?></h3>
            <table>
                <tr>
                    <th><?= __('Foto') ?></th>
                    <td><?= h($pengaduan->foto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($pengaduan->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Petuga') ?></th>
                    <td><?= $pengaduan->has('petuga') ? $this->Html->link($pengaduan->petuga->id_petugas, ['controller' => 'Petugas', 'action' => 'view', $pengaduan->petuga->id_petugas]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Pengaduan') ?></th>
                    <td><?= $this->Number->format($pengaduan->id_pengaduan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tgl Pengaduan') ?></th>
                    <td><?= h($pengaduan->tgl_pengaduan) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Isi Laporan') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pengaduan->isi_laporan)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Tanggapan') ?></h4>
                <?php if (!empty($pengaduan->tanggapan)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Tanggapan') ?></th>
                            <th><?= __('Pengaduan Id') ?></th>
                            <th><?= __('Isi Tanggapan') ?></th>
                            <th><?= __('Tgl Tanggapan') ?></th>
                            <th><?= __('Petugas Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pengaduan->tanggapan as $tanggapan) : ?>
                        <tr>
                            <td><?= h($tanggapan->id_tanggapan) ?></td>
                            <td><?= h($tanggapan->pengaduan_id) ?></td>
                            <td><?= h($tanggapan->isi_tanggapan) ?></td>
                            <td><?= h($tanggapan->tgl_tanggapan) ?></td>
                            <td><?= h($tanggapan->petugas_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tanggapan', 'action' => 'view', $tanggapan->id_tanggapan]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tanggapan', 'action' => 'edit', $tanggapan->id_tanggapan]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tanggapan', 'action' => 'delete', $tanggapan->id_tanggapan], ['confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id_tanggapan)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
