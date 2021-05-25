<?php

namespace Database\Seeders;

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

        $user = new \App\Models\User;
        $user->svnr ="4199";
        $user->gender="1";
        $user->firstname="Kerstin";
        $user->lastname="Hochreiter";
        $user->street="Musterstrasse";
        $user->number="3";
        $user->u_plz="4122";
        $user->u_city="Traberg";
        $user->birth="1997-05-27";
        $user->phonenumber="0664563788";
        $user->email="kerstin@gmx.at";
        $user->password=bcrypt('kerstin1');
        $user->hasvaccination=true;
        $user->isadmin=true;

        //$vaccination = \App\Models\Vaccination::all()->first();
        //$user->vaccination()->associate($vaccination);

        $user->save();

        $user2 = new \App\Models\User;
        $user2->svnr ="7883";
        $user2->gender="1";
        $user2->firstname="Sarah";
        $user2->lastname="Hochreiter";
        $user2->street="Musterstrasse";
        $user2->number="4";
        $user2->u_plz="4122";
        $user2->u_city="Traberg";
        $user2->birth="1997-05-27";
        $user2->phonenumber="066452348";
        $user2->email="sarah@gmx.at";
        $user2->password=bcrypt('sarah1');
        $user2->hasvaccination=true;
        $user2->isadmin=false;

        $vaccination2 = \App\Models\Vaccination::all()->first();
        $user2->vaccination()->associate($vaccination2);

        $user2->save();


        $user3 = new \App\Models\User;
        $user3->svnr ="3902";
        $user3->gender="2";
        $user3->firstname="Selina";
        $user3->lastname="Schindlauer";
        $user3->street="Musterstrasse";
        $user3->number="4";
        $user3->u_plz="4122";
        $user3->u_city="Traberg";
        $user3->birth="1999-05-27";
        $user3->phonenumber="0664523448";
        $user3->email="selina@gmx.at";
        $user3->password=bcrypt('selina1');
        $user3->hasvaccination=false;
        $user3->isadmin=false;

        //$vaccination2 = \App\Models\Vaccination::all()->first();
        //$user2->vaccination()->associate($vaccination2);

        $user3->save();


        $user4 = new \App\Models\User;
        $user4->svnr ="3902";
        $user4->gender="2";
        $user4->firstname="Josef";
        $user4->lastname="Baumann";
        $user4->street="Musterstrasse";
        $user4->number="20";
        $user4->u_plz="4122";
        $user4->u_city="Traberg";
        $user4->birth="1998-05-27";
        $user4->phonenumber="0664523448";
        $user4->email="josef@gmx.at";
        $user4->password=bcrypt('josef1');
        $user4->hasvaccination=false;
        $user4->isadmin=false;

        //$vaccination2 = \App\Models\Vaccination::all()->first();
        //$user2->vaccination()->associate($vaccination2);

        $user4->save();


    }
}
