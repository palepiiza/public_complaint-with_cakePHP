<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;


/**
 * Petuga Entity
 *
 * @property int $id_petugas
 * @property string $nik
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $telp
 * @property string $level
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Petuga extends Entity
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
        'nik' => true,
        'nama' => true,
        'username' => true,
        'password' => true,
        'telp' => true,
        'level' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
