<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Todo extends Model
{
    use HasFactory;

	protected $fillable = [
		'title',
		'user_id',
		'completed_at'
	];

	protected $appends = [ 'completed' ];

    protected $casts = [
            'completed_at'  => 'datetime',
			'completed'	=> 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCompletedAttribute($value)
    {

        if(!is_null($this->completed_at)) {
			return true;
		}
         return False;
    }

	public function scopeLastHour($query) {
        $fromDate = Carbon::now()->subHour(1);
        $toDate = Carbon::now();
        return $query->whereBetween('created_at', [$fromDate, $toDate]);
    }
}
