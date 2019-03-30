<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id_user
 * @property int $id_role
 * @property string $login
 * @property string $email
 * @property string $password
 * @property Role $role
 * @property Sauvegarde[] $sauvegardes
 */
class User  extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    public $table = 'user';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * @var array
     */
    protected $fillable = ['id_role', 'login', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role', 'id_role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sauvegardes()
    {
        return $this->hasMany('App\Sauvegarde', 'id_user', 'id_user');
    }
}
