<?php

namespace App\Ldap;

// use LdapRecord\Models\Model;

use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Models\Model;

class Users extends Model
{
    /**
     * The object classes of the LDAP model.
     *
     * @var array
     */
    public static $objectClasses = [
        // 'top',
        // 'person',
        // 'organizationalperson',
        // 'inetorgperson',

        'top',
        'person',
        'organizationalPerson',
        'user',
    ];
}
