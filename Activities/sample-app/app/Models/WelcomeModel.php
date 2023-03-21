<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeModel extends Model
{
    use HasFactory;

    public $name = 'Student';
    public $course = 'COMPSCI 482';

    // The folowing methods retrieve name and course from the WelcomeModel class
    public function getName()
    {
        return $this->name;
    }

    public function getCourse()
    {
        return $this->course;
    }
}
