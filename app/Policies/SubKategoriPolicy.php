<?php

namespace App\Policies;

use App\Models\SubKategori;
use Illuminate\Auth\Access\HandlesAuthorization;
use LdapRecord\Models\OpenLDAP\User;

class SubKategoriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SubKategori $subKategori)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SubKategori $subKategori)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SubKategori $subKategori)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SubKategori $subKategori)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SubKategori $subKategori)
    {
        //
    }
}
