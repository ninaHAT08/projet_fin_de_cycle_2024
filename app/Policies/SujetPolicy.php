<?php

namespace App\Policies;

use App\Models\User;
use App\Models\sujets;
use Illuminate\Auth\Access\Response;

class SujetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, sujets $sujets): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, sujets $sujets): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, sujets $sujets): bool
    {
    
      
            return $user->id === $sujets->iduser;
       
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, sujets $sujets): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, sujets $sujets): bool
    {
        return true;
    }
}
