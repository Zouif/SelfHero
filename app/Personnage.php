<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_personnage
 * @property int $id_inventaire
 * @property int $id_sauvegarde
 * @property string $nom_personnage
 * @property Inventaire $inventaire
 * @property Sauvegarde $sauvegarde
 * @property Equipement[] $equipements
 * @property StatPersonnage[] $statPersonnages
 */
class Personnage extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personnage';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_personnage';

    /**
     * @var array
     */
    protected $fillable = ['id_inventaire', 'id_sauvegarde', 'nom_personnage'];

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//     */
//    public function inventaire()
//    {
//        return $this->belongsTo('App\Inventaire', 'id_inventaire', 'id_inventaire');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sauvegarde()
    {
        return $this->belongsTo('App\Sauvegarde', 'id_sauvegarde', 'id_sauvegarde');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipements()
    {
        return $this->hasMany('App\Equipement', 'id_personnage', 'id_personnage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inventaire()
    {
        return $this->hasOne('App\Inventaire', 'id_personnage', 'id_personnage');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function sauvegarde()
//    {
//        return $this->hasOne('App\Sauvegarde', 'id_personnage', 'id_personnage');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statPersonnages()
    {
        return $this->hasMany('App\StatPersonnage', 'id_personnage', 'id_personnage');
    }
}
