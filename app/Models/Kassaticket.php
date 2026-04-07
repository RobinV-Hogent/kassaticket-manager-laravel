<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kassaticket extends Model
{
    // De velden die ingevuld mogen worden
    protected $fillable = ['klant', 'email', 'ticket_path'];
}
