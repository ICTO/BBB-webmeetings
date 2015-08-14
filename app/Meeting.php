<?php namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Meeting extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meeting';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'welcomeText',
        'moderatorAccessCode',
        'attendeeAccessCode',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * A meeting belongs to a single userg
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Query scope that limits the meetings to those for the current logged in user
     *
     * @param $query
     * @return mixed
     */
    public function scopeFromUser($query)
    {
        return $query->where('user_id', Auth::id());
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->timezone('Europe/Brussels')->format('d-M-y H:i:s T');
    }
}
