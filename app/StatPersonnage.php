<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_stat_personnage
 * @property int $id_ref_stat
 * @property int $id_personnage
 * @property int $valeur
 * @property Personnage $personnage
 * @property RefStat $refStat
 */
class StatPersonnage extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'stat_personnage';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_stat_personnage';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_ref_stat', 'id_personnage', 'valeur'];

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
    public function refStat()
    {
        return $this->belongsTo('App\RefStat', 'id_ref_stat', 'id_ref_stat');
    }
}
