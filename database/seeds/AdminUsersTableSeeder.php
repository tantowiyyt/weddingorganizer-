<?php

use Illuminate\Database\Seeder;
use App\AdminUser;
class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminUser();
        $user->name = "Towi Yahya Yogas T";
        $user->email = "towiyahyayogas@gmail.com";
        $user->password = crypt("secret", "");
        $user->save(); 
    }
}
