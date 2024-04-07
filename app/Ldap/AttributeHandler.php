<?php

namespace App\Ldap;

use App\Models\User as DatabaseUser;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;

class AttributeHandler
{
    public function handle(LdapUser $ldap, DatabaseUser $database)
    {
        if(empty($database->name)||$database->name==''){
            $database->name = $ldap->getFirstAttribute('cn');
        }
        if(!empty($ldap->getFirstAttribute('mail'))){
            $database->email = $ldap->getFirstAttribute('mail');
        }
    }
}
