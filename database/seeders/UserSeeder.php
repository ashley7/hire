<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=new User();

        $user->name="Kasule Ssebata";

        $user->phone_number="0784414368";

        $user->password=Hash::make('admin123@');

        $user->user_type="admin";
        
        try {
            $user->save();
        } catch (\Throwable $th) {}
       
    }
}
