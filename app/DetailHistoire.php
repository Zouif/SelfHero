<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_detail_histoire
 * @property int $id_histoire
 * @property string $contenue
 * @property Histoire $histoire
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
    protected $fillable = ['id_histoire', 'contenue'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function histoire()
    {
        return $this->belongsTo('App\Histoire', 'id_histoire', 'id_histoire');
    }
}
