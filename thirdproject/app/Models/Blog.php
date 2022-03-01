<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $blog;

    public function newBlog()
    {
        $this->blog = new Blog();
        $this->blog->save();
    }
    public static function getAllBlog()
    {
        return [];
    }
}
