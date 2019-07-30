<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Bouncer::allow('super_admin')->to('user.create');
        \Bouncer::allow('admin')->to('user.update');
        \Bouncer::allow('user')->to('content.create');

        $super_admin = factory(App\User::class)->create([
            'name' => 'malek',
            'email' => 'malek@kat.com',
            'password' => bcrypt('qwe123456'),
            'group_name' => 'super_admin',
            'lang'=>'ar'
        ]);
        $super_admin->assign('super_admin');

        $admin = factory(App\User::class)->create([
            'name' => 'amjed',
            'email' => 'amjed@kat.com',
            'password' => bcrypt('qwe123456'),
            'group_name' => 'admin',
            'lang'=>'en'
        ]);
        $admin->assign('admin');

        $user = factory(App\User::class)->create([
            'name' => 'rami',
            'email' => 'rami@kat.com',
            'password' => bcrypt('qwe123456'),
            'group_name' => 'user',
            'lang'=>'ar'
        ]);
        $user->assign('user');
    }
}
