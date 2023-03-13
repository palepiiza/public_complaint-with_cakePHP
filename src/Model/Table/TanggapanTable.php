<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tanggapan Model
 *
 * @property \App\Model\Table\PengaduanTable&\Cake\ORM\Association\BelongsTo $Pengaduan
 * @property \App\Model\Table\PetugasTable&\Cake\ORM\Association\BelongsTo $Petugas
 *
 * @method \App\Model\Entity\Tanggapan newEmptyEntity()
 * @method \App\Model\Entity\Tanggapan newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tanggapan findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tanggapan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tanggapan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TanggapanTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tanggapan');
        $this->setDisplayField('id_tanggapan');
        $this->setPrimaryKey('id_tanggapan');

        $this->belongsTo('Pengaduan', [
            'foreignKey' => 'pengaduan_id',
        ]);
        $this->belongsTo('Petugas', [
            'foreignKey' => 'petugas_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('pengaduan_id')
            ->allowEmptyString('pengaduan_id');

        $validator
            ->scalar('isi_tanggapan')
            ->requirePresence('isi_tanggapan', 'create')
            ->notEmptyString('isi_tanggapan');

        $validator
            ->date('tgl_tanggapan')
            ->requirePresence('tgl_tanggapan', 'create')
            ->notEmptyDate('tgl_tanggapan');

        $validator
            ->integer('petugas_id')
            ->allowEmptyString('petugas_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('pengaduan_id', 'Pengaduan'), ['errorField' => 'pengaduan_id']);
        $rules->add($rules->existsIn('petugas_id', 'Petugas'), ['errorField' => 'petugas_id']);

        return $rules;
    }
}
