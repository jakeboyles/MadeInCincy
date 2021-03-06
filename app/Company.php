<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Nicolaslopezj\Searchable\SearchableTrait;

class Company extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SearchableTrait;


    protected $searchable = [
        'columns' => [
            'jobs.job_name' => 80,
            'people.person_name' => 80,
            'name' => 10,
            'description' => 10,
        ],
        'joins' => [
            'jobs' => ['companies.id','jobs.company_id'],
            'people' => ['companies.id','people.company_id'],
        ],
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lat', 'long', 'title', 'description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function people()
    {
        return $this->hasMany('App\Person');
    }


}
