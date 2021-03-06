<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =['user_id',
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'job'
    ];


    protected $dates = ['birthdate'];



    public function showGender($gender)
    {

        return $gender == 1 ? 'Male' : 'Female';

    }

    public function fullName()
    {


        return $this->first_name . ' - ' . $this->last_name;


    }

    public function user()
    {

        return $this->belongsTo('App\User');

    }


    public function test2()
    {
        return 2;

    public function test1()
    {
        return 1;

    }
}