<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Store;
use Illuminate\Contracts\Auth\Authenticatable;

class Person extends Model implements Authenticatable
{
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

    protected $primaryKey = 'person_id';

    protected $guarded = ['person_id'];

    protected $fillable = [
        'name', 'email', 'contact', 'password'
    ];

    //
    public function log_to_store()
    {
        return $this->belongsToMany('App\Store', 'person_store', 'person_id', 'store_id')
            ->withPivot(['created_at']);
    }

    public function store_owned()
    {
        return $this->hasMany('App\Store', 'store_id');
    }
}
