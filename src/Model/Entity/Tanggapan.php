<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tanggapan Entity
 *
 * @property int $id_tanggapan
 * @property int|null $pengaduan_id
 * @property string $isi_tanggapan
 * @property \Cake\I18n\FrozenDate $tgl_tanggapan
 * @property int|null $petugas_id
 *
 * @property \App\Model\Entity\Pengaduan $pengaduan
 * @property \App\Model\Entity\Petuga $petuga
 */
class Tanggapan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'pengaduan_id' => true,
        'isi_tanggapan' => true,
        'tgl_tanggapan' => true,
        'petugas_id' => true,
        'pengaduan' => true,
        'petuga' => true,
    ];
}
