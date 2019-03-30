<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ref_objet
 * @property string $nom
 * @property Objet[] $objets
 */
class RefObjet extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ref_objet';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ref_objet';

    /**
     * @var array
     */
    protected $fillable = ['nom'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function objets()
    {
        return $this->hasMany('App\Objet', 'id_ref_objet', 'id_ref_objet');
    }
}
