<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_inventaire
 * @property int $id_personnage
 * @property int $nbr_emplacement_dans_inventaire
 * @property Personnage $personnage
 * @property Objet[] $objets
 */
class Inventaire extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inventaire';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_inventaire';

    /**
     * @var array
     */
    protected $fillable = ['id_personnage', 'nbr_emplacement_dans_inventaire'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personnage()
    {
        return $this->belongsTo('App\Personnage', 'id_personnage', 'id_personnage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function objets()
    {
        return $this->hasMany('App\Objet', 'id_inventaire', 'id_inventaire');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function personnage()
//    {
//        return $this->hasOne('App\Personnage', 'id_inventaire', 'id_inventaire');
//    }
}
