<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_objet
 * @property int $id_inventaire
 * @property int $id_ref_objet
 * @property int $nombre
 * @property Inventaire $inventaire
 * @property RefObjet $refObjet
 */
class Objet extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'objet';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_objet';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_inventaire', 'id_ref_objet', 'nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventaire()
    {
        return $this->belongsTo('App\Inventaire', 'id_inventaire', 'id_inventaire');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function refObjet()
    {
        return $this->belongsTo('App\RefObjet', 'id_ref_objet', 'id_ref_objet');
    }
}
