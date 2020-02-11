<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Company;
use App\Tutor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Student 1',
            'email' => 'student@gmail.com',
            'password' => bcrypt(123456),
            'phone' => '081234567865',
            'address' => 'Komeng',
            'role' => 'student',
        ]);

        $userData = User::create([
            'name' => 'Company 1',
            'email' => 'company@gmail.com',
            'password' => bcrypt(123456),
            'phone' => '0812345656765',
            'address' => 'Komeng',
            'role' => 'company',
        ]);

        $companyData = Company::create([
            'user_id' => $userData->id,
            'name' => $userData->name,
            'phone' => $userData->phone,
            'address' => $userData->address
        ]);

        $tutorData = User::create([
            'name' => 'Tutor 1',
            'email' => 'tutor@gmail.com',
            'password' => bcrypt(123456),
            'phone' => '0812345671235',
            'address' => 'Komeng',
            'role' => 'tutor',
        ]);

        Tutor::create([
            'user_id' => $tutorData->id,
            'company_id' => $companyData->id,
            'description' => 'random'
        ]);
    }
}
