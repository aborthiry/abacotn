<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tienda
 * @package App\Models
 * @version September 15, 2020, 12:56 pm UTC
 *
 * @property integer $client_id
 * @property string $client_secret
 * @property integer $store_id
 * @property string $token
 * @property boolean $habilitada
 * @property string $descripcion
 */
class Tienda extends Model
{

    public $table = 'tienda';
    



    public $fillable = [
        'client_id',
        'client_secret',
        'store_id',
        'token',
        'habilitada',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'client_secret' => 'string',
        'store_id' => 'integer',
        'token' => 'string',
        'habilitada' => 'boolean',
        'descripcion' => 'string'
    ];

   

    
}
