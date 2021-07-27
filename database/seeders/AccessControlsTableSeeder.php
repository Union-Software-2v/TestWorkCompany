<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class AccessControlsTableSeeder extends Seeder
{


    public function run()
    {
        $dev = User::where('email', 'systemadmin@gmail.com')->first();

        if (empty($dev)) {

            $data = [
                [
                    'id'=>'1',
                    'name' => 'System Admin',
                    'email' => 'systemadmin@gmail.com',
                    'user_type' => 'systemadmin',
                    'password' => bcrypt('123'),
                ],
                [
                    'id'=>'2',
                    'name' => 'Coaching 1',
                    'email' => 'coaching1@gmail.com',
                    'user_type' => 'coaching',
                    'password' => bcrypt('123'),
                ]
            ];

            User::insert($data);
        }
    }
}
