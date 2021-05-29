<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

abstract class User extends Authenticate
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'cpf_cnpj',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $cpfCnpj
     */
    public function setCpfCnpjAttribute(string $cpfCnpj)
    {
        $this->attributes['cpf_cnpj'] = $this->prepareCpfOrCnpj($cpfCnpj);
    }

    /**
     * @param string $cpfCnpj
     * @return string|string[]|null
     */
    public static function prepareCpfOrCnpj(string $cpfCnpj)
    {
        return preg_replace('/[^0-9]/', '', $cpfCnpj);
    }
}
