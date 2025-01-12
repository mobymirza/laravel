<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;    }

    public function setUserId(string $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }


}


