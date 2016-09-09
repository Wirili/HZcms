<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //
    public function children()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }
}
