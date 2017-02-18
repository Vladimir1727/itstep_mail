<?php

use Illuminate\Database\Seeder;

class settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('email_send_types')->insert([['type'=>'PHP'],['type'=>'SMTP'],['type'=>'Mandrill']]);
    }
}
