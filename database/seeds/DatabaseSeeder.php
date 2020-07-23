<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
      Role::create([
        'title' => 'Admin',
        'description' => 'Will have access to everything'
      ]);

      Role::create([
          'title' => 'Cluster Head',
          'description' => 'Will be assigned a group of colleges'
      ]);

      Role::create([
          'title' => 'College Head',
          'description' => 'Will be assigned one college'
      ]);

      Role::create([
          'title' => 'Employer',
          'description' => 'Will post internships'
      ]);

      Role::create([
          'title' => 'Student',
          'description' => 'Will apply for courses and internships'
      ]);

      Role::create([
          'title' => 'College Coordinator',
          'description' => 'Will have access to performance report of their college students'
      ]);
      User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'role_id' => 5
        ]);
    }
}
