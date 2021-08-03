<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->name = 'Mascota';
        $permission->description = 'Permisos de mascotas para administrador';
        $permission->view = 1;
        $permission->create = 1;
        $permission->edit = 1;
        $permission->delete = 1;
        $permission->user_id = 1;
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Mascota';
        $permission->description = 'Permisos de mascotas para usuario';
        $permission->view = 1;
        $permission->create = 1;
        $permission->edit = 1;
        $permission->delete = 0;
        $permission->user_id = 2;
        $permission->save();
    }
}
