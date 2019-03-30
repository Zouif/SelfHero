<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ref_stat
 * @property string $nom
 * @property StatPersonnage[] $statPersonnages
 */
class RefStat extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ref_stat';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ref_stat';

    /**
     * @var array
     */
    protected $fillable = ['nom'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statPersonnages()
    {
        return $this->hasMany('App\StatPersonnage', 'id_ref_stat', 'id_ref_stat');
    }
}
