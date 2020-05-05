<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class GithubAuth extends Model
{
    protected $table = "github_user";

    public function register($name)
    {
        $this->name = $name;
        $this->save();
        return '登録完了';
    }
}
