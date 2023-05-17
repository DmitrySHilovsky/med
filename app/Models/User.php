<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use HasFactory;

  protected $fillable = [
    "Lastname",
    "Name",
    "Surename",
    "Email",
    "Phone",
    "CIty",
    "Job",
    "Post",
    "Hash",
    "IsCheck",
    "Number_hall",
  ];

  public $timestamps = false;
}
