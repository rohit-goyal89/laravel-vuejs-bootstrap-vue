<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'address', 'phone','primary_name', 'primary_email', 'primary_phone','secondary_name', 'secondary_email', 'secondary_phone','other_name', 'other_email', 'other_phone', 'user_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_name' => 'string',
        'address' => 'text',
        'phone' => 'string',
        'primary_name' => 'string',
        'primary_email' => 'string',
        'primary_phone' => 'string',
        'secondary_name' => 'string',
        'secondary_email' => 'string',
        'secondary_phone' => 'string',
        'other_name' => 'string',
        'other_email' => 'string',
        'other_phone' => 'string'

    ];

    /**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id', 'user');
	}
}
