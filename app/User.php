<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Xavrsl\Cas\Facades\Cas;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Authenticate a user from CAS single sign on and create
     * the user if it's a new user.
     *
     * @return static
     */
    public static function findOrCreateFromCAS()
    {
        Cas::authenticate();
        $username = Cas::user();
        $userAttributes = Cas::getAttributes();
        if(!$user = static::where('name', $username)->first()) {
            $user = new static();
            $user->name = $username;
            $user->email = $userAttributes['mail'];
            $user->full_name = $userAttributes['givenname'] . ' ' . $userAttributes['surname'];

            $user->save();
        }
        return $user;
    }

    /**
     * A user can have many meetings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetings()
    {
        return $this->hasMany('App\Meetings');
    }
}
