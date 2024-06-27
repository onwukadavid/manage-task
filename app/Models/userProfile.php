<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class userProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function setDateOfBirthAttribute($dob)
    // {
    //     $dateOfBirth = new DateTime($dob);
    //     return $this->attribute['date_of_birth'] = $dateOfBirth;
    // }
}
