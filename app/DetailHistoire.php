<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_detail_histoire
 * @property int $id_ref_histoire
 * @property string $contenue
 * @property int $numero_page
 * @property RefHistoire $refHistoire
 * @property Sauvegarde[] $sauvegardes
 */
class DetailHistoire extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detail_histoire';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_detail_histoire';

    /**
     * @var array
     */
    protected $fillable = ['id_ref_histoire', 'contenue', 'numero_page'];

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
    public function sauvegardes()
    {
        return $this->hasMany('App\Sauvegarde', 'id_detail_histoire', 'id_detail_histoire');
    }
}
