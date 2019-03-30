<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_histoire
 * @property int $id_ref_histoire
 * @property RefHistoire $refHistoire
 * @property DetailHistoire[] $detailHistoires
 * @property Sauvegarde[] $sauvegardes
 */
class Histoire extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'histoire';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_histoire';

    /**
     * @var array
     */
    protected $fillable = ['id_ref_histoire'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function refHistoire()
    {
        return $this->belongsTo('App\RefHistoire', 'id_ref_histoire', 'id_ref_histoire');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailHistoires()
    {
        return $this->hasMany('App\DetailHistoire', 'id_histoire', 'id_histoire');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sauvegardes()
    {
        return $this->hasMany('App\Sauvegarde', 'id_histoire', 'id_histoire');
    }
}
