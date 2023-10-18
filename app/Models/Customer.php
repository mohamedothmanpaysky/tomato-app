<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'status', 'created_at', 'updated_at'];
}
