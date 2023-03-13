<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PetugasFixture
 */
class PetugasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_petugas' => 1,
                'nik' => '',
                'nama' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit a',
                'password' => 'Lorem ipsum dolor sit amet',
                'telp' => 'Lorem ipsum',
                'level' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-03-13 13:49:21',
                'modified' => '2023-03-13 13:49:21',
            ],
        ];
        parent::init();
    }
}
