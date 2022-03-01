<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $student;

    public function newStudent()
    {
        $this->student          = new Student();
        $this->student->name    = 'jahid';
        $this->student->email   = 'jahid@gmail.com';
        $this->student->mobile  = '124555';
        $this->student->save();
    }

    public static function getAllStudent()
    {
        return [
            0 => [
                'id' => 1,
                'name' => 'jahid',
                'email' => 'jahid@gmail.com',
                'phone' => '3210',
                'image' => ''
            ],

            1 => [
                'id' => 1,
                'name' => 'salahuddin',
                'email' => 'salahuddin@gmail.com',
                'phone' => '0123456',
                'image' => '',
            ],
        ];
    }
}
