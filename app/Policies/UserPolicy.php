<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use Illuminate\Auth\Access\Response;
use App\Models\User;

/**
 * ESTUDAR ISSO AQUI PRA FAZER ESSA PARTE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
 * 
 * https://laravel.com/docs/10.x/authorization
 */

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Mestre,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para visualizar usuários.", 403);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Mestre,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para visualizar as informações de um usuário.", 403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para criar novos usuários.", 403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Mestre,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        if ($user->id === $model->id) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para editar usuários.", 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para visualizar usuários.", 403);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para visualizar usuários.", 403);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model)
    {
        $authorized_roles = [
            RoleEnum::Gestor,
            RoleEnum::Staff,
        ];

        if (in_array($user->role, $authorized_roles)) {
            return Response::allow();
        }

        return Response::deny("Você não tem permissão para visualizar usuários.", 403);
    }
}
