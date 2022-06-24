<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            'client',
            'document',
            'organization',
            'project',
            'task',
            'user',
            'role',
        ];

        $operations = [
            'create',
            'view-any',
            'edit-any',
            'delete-any',
        ];

        Bouncer::allow('super-admin')->to('edit-user-role');
        foreach ($classes as $class) {
            foreach ($operations as $operation) {
                $permission = $operation  . '-' . $class;
                Bouncer::allow('super-admin')->to($permission);
            }
        }

        foreach ($classes as $class) {
            if ($class != 'role') {
                foreach ($operations as $operation) {
                    $permission = $operation  . '-' . $class;
                    Bouncer::allow('admin')->to($permission);

                    if ($operation != 'delete-any') {
                        Bouncer::allow('user')->to($permission);
                    }
                }
            }
        }
    }
}
