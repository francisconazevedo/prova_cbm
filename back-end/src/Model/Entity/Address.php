<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $cep
 * @property string|null $logradouro
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $localidade
 * @property string|null $uf
 * @property string|null $unidade
 * @property int|null $ibge
 * @property int|null $gia
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Address extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cep' => true,
        'logradouro' => true,
        'complemento' => true,
        'bairro' => true,
        'localidade' => true,
        'uf' => true,
        'unidade' => true,
        'ibge' => true,
        'gia' => true,
        'modified' => true,
        'created' => true
    ];
}
