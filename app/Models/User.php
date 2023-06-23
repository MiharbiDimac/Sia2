<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'tblauthors';
    protected $primaryKey = 'AuthorID';
    public $timestamps = false;
    // column sa table
     protected $fillable = [
        'AuthorID', 'AuthorName', 'Gender', 'Birthday'
    ];
}