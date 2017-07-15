<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'view_accounts',
            'add_accounts',
            'edit_accounts',
            'delete_accounts',

            'view_cutoff',
            'add_cutoff',
            'edit_cutoff',
            'delete_cutoff',

            'view_attendance',
            'add_attendance',
            'edit_attendance',
            'delete_attendance',

            'view_bankaccount',
            'add_bankaccount',
            'edit_bankaccount',
            'delete_bankaccount',

            'view_pay',
            'add_pay',
            'edit_pay',
            'delete_pay',

            'view_awards',
            'add_awards',
            'edit_awards',
            'delete_awards',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_department',
            'add_department',
            'edit_department',
            'delete_department',

            'view_designation',
            'add_designation',
            'edit_designation',
            'delete_designation',

            'view_events',
            'add_events',
            'edit_events',
            'delete_events',

            'view_holidays',
            'add_holidays',
            'edit_holidays',
            'delete_holidays',

            'view_trainingprogram',
            'add_trainingprogram',
            'edit_trainingprogram',
            'delete_trainingprogram',

            'view_training',
            'add_training',
            'edit_training',
            'delete_training',

            'view_leaves',
            'add_leaves',
            'edit_leaves',
            'delete_leaves',

            'view_leavestype',
            'add_leavestype',
            'edit_leavestype',
            'delete_leavestype',

            'view_nationality',
            'add_nationality',
            'edit_nationality',
            'delete_nationality',

            'view_absences',
            'add_absences',
            'edit_absences',
            'delete_absences'

        ];
    }
}
