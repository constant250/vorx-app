<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Enums\RoleTypeEnum;
use App\Models\RoleSetupTemplate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BaseSeeder extends Seeder
{
    public function run()
    {
        /**
         * Setup Worth account
         */
        $account = new Account();
        $account->company_name = 'vorx.io';
        $account->save();

        $account = new Account();
        $account->company_name = 'worth.io';
        $account->save();

        


        /**
         * Setup Role Templates
         */
        $this->call(RoleSetupTemplateSeeder::class);

        $role_setup = RoleSetupTemplate::whereRoleId(RoleTypeEnum::ADMINISTRATOR())->first();

        /**
         * Setup User
         */
        foreach ($this->initDefaultUsers() as $default_user) {
            $user = new User;
            $user->name = $default_user['name'];
            $user->email = $default_user['email'];
            $user->password = Hash::make('password');
            $user->role_id = RoleTypeEnum::ADMINISTRATOR;
            $user->account_id = 1;
            $user->save();
        }

        
        /**
         * Setup Faker Course
         */
        $this->call(CourseSeeder::class);
    }

    protected function initDefaultUsers()
    {
        return [
            [
                'name' => 'Root User',
                'email' => 'root@vorx.io'
            ],
            [
                'name' => 'Jim Claro',
                'email' => 'jim@worth.io',
            ],
            [
                'name' => 'Xy Joaquin',
                'email' => 'xy@vorx.io',
            ],
            [
                'name' => 'Jayr Mendoza',
                'email' => 'jayr@vorx.io',
            ],
        ];
    }
}
