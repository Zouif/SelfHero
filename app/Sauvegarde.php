<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_sauvegarde
 * @property int $id_detail_histoire
 * @property int $id_personnage
 * @property int $id_user
 * @property DetailHistoire $detailHistoire
 * @property Personnage $personnage
 * @property User $user
 */
class Sauvegarde extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sauvegarde';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_sauvegarde';

    /**
     * @var array
     */
    protected $fillable = ['id_detail_histoire', 'id_personnage', 'id_user'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detailHistoire()
    {
        return $this->belongsTo('App\DetailHistoire', 'id_detail_histoire', 'id_detail_histoire');
    }

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
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }
}
