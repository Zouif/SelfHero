<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_role
 * @property string $nom
 * @property User[] $users
 */
class Role extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'role';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_role';

    /**
     * @var array
     */
    protected $fillable = ['nom'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'id_role', 'id_role');
    }
}
