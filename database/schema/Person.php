<?php

namespace Database\Schema;

use Illuminate\Database\Schema\Blueprint;

abstract class Person
{
    public static function generate()
    {
        return function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf_cnpj')->nullable()->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        };
    }

}
