<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_sauvegarde
 * @property int $id_personnage
 * @property int $id_user
 * @property int $id_histoire
 * @property Histoire $histoire
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
    protected $fillable = ['id_personnage', 'id_user', 'id_histoire'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function histoire()
    {
        return $this->belongsTo('App\Histoire', 'id_histoire', 'id_histoire');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//     */
//    public function personnage()
//    {
//        return $this->belongsTo('App\Personnage', 'id_personnage', 'id_personnage');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personnage()
    {
        return $this->hasOne('App\Personnage', 'id_sauvegarde', 'id_sauvegarde');
    }
}
