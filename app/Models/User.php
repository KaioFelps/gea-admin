<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticableModel;

class User extends AuthenticableModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'pontos_gea' => 0,
        'active' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname',
        'password',
        'pontos_gea',
        'role',
        'active',
    ];

    /**
     * Overwrite some attributes
     * 
     * @var string
     */
    protected $pontos = "pontos_gea";

    public function getPontosAttribute() {
        return $this->attributes["pontos_gea"];
    }

    protected $append= ["pontos"];

    protected $hideen = ["pontos_gea"];

    // id            
    // remember_token
    // created_at
    // updated_at
}
