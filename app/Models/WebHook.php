<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class WebHook
 * @package App\Models
 * @version October 12, 2020, 2:21 pm UTC
 *
 */
class WebHook extends Model
{

    public $table = 'webhook';
    



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_wh' => 'integer',
        'store_id' => 'integer',
        'event' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
