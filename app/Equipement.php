<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_equipement
 * @property int $id_ref_slot
 * @property int $id_personnage
 * @property int $id_ref_equipement
 * @property int $valeur
 * @property Personnage $personnage
 * @property RefEquipement $refEquipement
 * @property RefSlot $refSlot
 */
class Equipement extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'equipement';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_equipement';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_ref_slot', 'id_personnage', 'id_ref_equipement', 'valeur'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personnage()
    {
        return $this->belongsTo('App\Personnage', 'id_personnage', 'id_personnage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function refEquipement()
    {
        return $this->belongsTo('App\RefEquipement', 'id_ref_equipement', 'id_ref_equipement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function refSlot()
    {
        return $this->belongsTo('App\RefSlot', 'id_ref_slot', 'id_ref_slot');
    }
}
