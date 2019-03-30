<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ref_histoire
 * @property string $nom
 * @property string $auteur
 * @property float $avis
 * @property Histoire[] $histoires
 */
class RefHistoire extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ref_histoire';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ref_histoire';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'auteur', 'avis'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histoires()
    {
        return $this->hasMany('App\Histoire', 'id_ref_histoire', 'id_ref_histoire');
    }
}
