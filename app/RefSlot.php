<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ref_slot
 * @property string $nom
 * @property Equipement[] $equipements
 */
class RefSlot extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ref_slot';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ref_slot';

    /**
     * @var array
     */
    protected $fillable = ['nom'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipements()
    {
        return $this->hasMany('App\Equipement', 'id_ref_slot', 'id_ref_slot');
    }
}
