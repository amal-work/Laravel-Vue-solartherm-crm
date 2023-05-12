<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//      Seed settings
        $this->call(SettingsSeeder::class);
        
//      Seed database
        DB::table('permissions')->insert([
            [
                'name' => 'view-leads',
                'display_name' => 'View leads',
                'description' => 'View leads',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'view-settings',
                'display_name' => 'View settings',
                'description' => 'View settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'view-users',
                'display_name' => 'View users',
                'description' => 'View users',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'view-logs',
                'display_name' => 'View logs',
                'description' => 'View logs',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Administrator',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'telcan',
                'display_name' => 'Telcan',
                'description' => 'Telcan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'warehouse',
                'display_name' => 'Warehouse',
                'description' => 'Warehouse',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'first_name' => 'SolarTherm',
                'last_name' => 'Admin',
                'email' => 'admin@solarthermuk.co.uk',
                'password' => bcrypt('admin')
            ]
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('addresses')->insert([
            [
                'address_1' => '2-4 Howard Chase',
                'address_2' => '2-4 Howard Chase',
                'address_3' => '2-4 Howard Chase',
                'town' => 'Town',
                'county' => 'Country',
                'postcode' => 'SS14 3BE',
            ]
        ]);

        DB::table('lead_sources')->insert([
            [
                'name' => 'Manual Input',
                'product' => 'Solar Panel',
                'site' => 'solarthermuk.co.uk',
            ]
        ]);

        DB::table('leads')->insert([
            [
                'source_id' => 1,
                'name' => 'Test',
                'phone' => '01632 960740',
                'email' => 'test@test.com',
                'postcode' => 'SS14 3BE',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        DB::table('saps')->insert([
            [
                'lead_id' => 1,
                'appointment_at' => date('Y-m-d H:i:s'),
                'status' => '',
                'product' => 'solar-pv'
            ]
        ]);

        DB::table('orders')->insert([
            [
                'lead_id' => 1,
                'status' => 'new',
                'notes' => '',
                'sap_id' =>1
            ]
        ]);

    }
}

