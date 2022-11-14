<?php

namespace Database\Seeders;

use App\Models\Enums\PageTypeEnum;
use App\Models\Enums\PermissionTypeEnum;
use App\Models\Enums\RoleTypeEnum;
use App\Models\RoleSetupTemplate;
use Illuminate\Database\Seeder;

class RoleSetupTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create setup
        $roles = [
            [
                'role' => RoleTypeEnum::ROOT,
                'setup_name' => 'Root',
                'setup' => [],
            ],
            [
                'role' => RoleTypeEnum::ADMINISTRATOR,
                'setup_name' => 'Administrator',
                'setup' => []
            ],
            [
                'role' => RoleTypeEnum::EDITOR,
                'setup_name' => 'Editor',
                'setup' => [],
            ],
            [
                'role' => RoleTypeEnum::AUTHOR,
                'setup_name' => 'Author',
                'setup' => [],
            ]
        ];

        foreach ($roles as $role) {
            RoleSetupTemplate::create([
                'role_id' => $role['role'],
                'setup_name' => $role['setup_name'],
                'setup' => $role['setup'],
            ]);
        }
    }
}
