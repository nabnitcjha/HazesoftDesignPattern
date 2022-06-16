<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
         $user = User::where('email','admin@hazesoft.com')->first();
         if(!$user){
             $user = new User();
         }
         $user->name = 'Hazesoft';
         $user->email = 'admin@hazesoft.com';
         $user->password = bcrypt('hazesoft@admin123');
         $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
         $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
         $user->save();
    }
}
