<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kassaticket extends Model
{
    protected $fillable = ['klant', 'email', 'ticket_path'];
}
