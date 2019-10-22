<?php declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'rate', 'symbol', 'name'
    ];

    protected $casts = [
        'rate' => 'float',
    ];
}
