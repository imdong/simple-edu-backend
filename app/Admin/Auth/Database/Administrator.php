<?php

namespace App\Admin\Auth\Database;

class Administrator extends \Encore\Admin\Auth\Database\Administrator
{
    /**
     * If visible for roles.
     *
     * @param array $roles
     *
     * @return bool
     */
    public function visible(array $roles = []): bool
    {
        if (empty($roles)) {
            return true;
        }

        $roles = array_column($roles, 'slug');

        return $this->inRoles($roles);
    }
}