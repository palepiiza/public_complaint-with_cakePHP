<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pengaduan Model
 *
 * @property \App\Model\Table\PetugasTable&\Cake\ORM\Association\BelongsTo $Petugas
 * @property \App\Model\Table\TanggapanTable&\Cake\ORM\Association\HasMany $Tanggapan
 *
 * @method \App\Model\Entity\Pengaduan newEmptyEntity()
 * @method \App\Model\Entity\Pengaduan newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pengaduan findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pengaduan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengaduan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PengaduanTable extends Table
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

        $this->setTable('pengaduan');
        $this->setDisplayField('id_pengaduan');
        $this->setPrimaryKey('id_pengaduan');

        $this->belongsTo('Petugas', [
            'foreignKey' => 'petugas_id',
        ]);
        $this->hasMany('Tanggapan', [
            'foreignKey' => 'pengaduan_id',
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
            ->date('tgl_pengaduan')
            ->requirePresence('tgl_pengaduan', 'create')
            ->notEmptyDate('tgl_pengaduan');

        $validator
            ->scalar('isi_laporan')
            ->requirePresence('isi_laporan', 'create')
            ->notEmptyString('isi_laporan');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 255)
            ->requirePresence('foto', 'create')
            ->notEmptyString('foto');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn('petugas_id', 'Petugas'), ['errorField' => 'petugas_id']);

        return $rules;
    }
}
