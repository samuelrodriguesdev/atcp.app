<?php 
namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	public function role_user()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }
}