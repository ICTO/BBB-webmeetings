<?php namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $dates = ['deleted_at'];

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
}
