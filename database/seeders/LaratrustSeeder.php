<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateLaratrustTables();

        $config = Config::get('laratrust_seeder.roles_structure');

        if ($config === null) {
            $this->command->error("The configuration has not been published. Did you run `php artisan vendor:publish --tag=\"laratrust-seeder\"`");
            $this->command->line('');
            return false;
        }

        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = \App\Models\Role::firstOrCreate([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \App\Models\Permission::firstOrCreate([
                        'name' => $module . '-' . $permissionValue,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            if (Config::get('laratrust_seeder.create_users')) {
                $this->command->info("Creating '{$key}' user");
                // Create default user for each role
                $user = \App\Models\User::create([
                    'name' => ucwords(str_replace('_', ' ', $key)),
                    'email' => $key.'@app.com',
                    'password' => bcrypt('password')
                ]);
                $user->attachRole($role);
            }

        }



            DB::table('branches')->insert(
            [
            'brCode' => '01',
            'BrName' => 'CJVAB'
              ] ); 

            DB::table('branches')->insert(
            [
                'brCode' => '02',
                'BrName' => 'LIPA'
              ] ); 
            
            DB::table('branches')->insert(
            [
                'brCode' => '03',
                'BrName' => 'MDAAB'
              ] ); 

            DB::table('branches')->insert(
            [
                'brCode' => '04',
                'BrName' => 'MBEAB'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '05',
                'BrName' => 'AFC'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '06',
                'BrName' => 'EAAB'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '07',
                'BrName' => 'ABAB'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '08',
                'BrName' => 'BAB'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '09',
                'BrName' => 'HEAD OFFICE'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '10',
                'BrName' => 'FORT BONI'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '11',
                'BrName' => 'GHQ'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '20',
                'BrName' => 'TANAY'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '22',
                'BrName' => 'LEGAZPI'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '23',
                'BrName' => 'PILI'
              ] ); 
            DB::table('branches')->insert(
            [
                'brCode' => '34',
                'BrName' => 'TRECE MARTIREZ'
            ]); 
            DB::table('branches')->insert(
            [
                'brCode' => '41',
                'BrName' => 'CEBU'
            ]); 
            DB::table('branches')->insert(
            [
                'brCode' => '42',
                'BrName' => 'ILOILO'
            ]);

            DB::table('branches')->insert(
            [
                'brCode' => '44',
                'BrName' => 'BACOLOD'
            ]);

            DB::table('branches')->insert(
            [
                'brCode' => '45',
                'BrName' => 'TACLOBAN'
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '46',
                'BrName' => 'CATBALOGAN'
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '53',
                'BrName' => 'TARLAC'
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '55',
                'BrName' => 'FORT MAGSAYSAY'
            ]);

            DB::table('branches')->insert(
            [
                'brCode' => '57',
                'BrName' => 'ROSALES',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '61',
                'BrName' => 'GENSAN',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '62',
                'BrName' => 'DAVAO',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '63',
                'BrName' => 'COTABATO',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '64',
                'BrName' => 'CDO',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '65',
                'BrName' => 'PAGADIAN',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '68',
                'BrName' => 'BUTUAN',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '69',
                'BrName' => 'TAGUM',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '82',
                'BrName' => 'SAN ANTONIO',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '5B',
                'BrName' => 'GAMU',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '5J',
                'BrName' => 'SFLU',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '6B',
                'BrName' => 'MALAYBALAY',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '6D',
                'BrName' => 'CALARIAN',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '6J',
                'BrName' => 'ILIGAN',
            ]);
            DB::table('branches')->insert(
            [
                'brCode' => '66',
                'BrName' => 'DIPOLOG',
            ]);
      
    

    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return  void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();

        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();

        if (Config::get('laratrust_seeder.truncate_tables')) {
            DB::table('roles')->delete();
            DB::table('permissions')->delete();
            
            if (Config::get('laratrust_seeder.create_users')) {
                $usersTable = (new \App\Models\User)->getTable();
                DB::table($usersTable)->truncate();
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
