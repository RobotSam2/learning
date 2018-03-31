<?php

use Illuminate\Database\Seeder;

class SetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
	    DB::table('provinces')->insert(
            [
                [ 'name'              => 'ភ្នំពេញ' ], 
                [ 'name'              => 'បន្ទាយមានជ័យ' ], 
                [ 'name'              => 'បាត់ដំបង' ], 
                [ 'name'              => 'កំពង់ចាម' ], 
                [ 'name'              => 'កំពង់ឆ្នាំង' ], 
                [ 'name'              => 'កំពង់ស្ពឺ' ], 
                [ 'name'              => 'កំពង់ធំ' ], 
                [ 'name'              => 'កំពត' ], 
                [ 'name'              => 'កណ្តាល' ], 
                [ 'name'              => 'កោះកុង' ], 
                [ 'name'              => 'កែប' ], 
                [ 'name'              => 'ក្រចេះ' ], 
                [ 'name'              => 'មណ្ឌលគីរី' ], 
                [ 'name'              => 'ឧត្តរមានជ័យ' ], 
                [ 'name'              => 'បៃលិន' ], 
                [ 'name'              => 'ព្រះសីហនុ' ], 
                [ 'name'              => 'ព្រះវិហារ' ], 
                [ 'name'              => 'ពោធិ៍សាត់' ], 
                [ 'name'              => 'ព្រៃវែង' ], 
                [ 'name'              => 'រតនគីរី' ], 
                [ 'name'              => 'សៀមរាប' ], 
                [ 'name'              => 'ស្ទឹងត្រែង' ], 
                [ 'name'              => 'ស្វាយរៀង' ], 
                [ 'name'              => 'តាកែវ' ] 

            ]);

        DB::table('sexes')->insert(
            [
                [ 'name'              => 'ប្រុស' ], 
                [ 'name'              => 'ស្រី' ]

            ]);

        DB::table('schools')->insert(
            [
                [ 'name'              => 'មជ្ឈមណ្ឌលគរុកោសល្យភូមិភាគរាជធានីភ្នំពេញ' ], 
                [ 'name'              => 'សាលាគរុកោសល្យ និងវិក្រឹតការរាជធានីភ្នំពេញ' ]

            ]);

        DB::table('majors')->insert(
            [
                [ 'name'              => 'ភាសាខ្មែរ - សីលធម៌ ពលរដ្ឋ' ], 
                [ 'name'              => 'អង់គ្លេស - ខ្មែរ' ]

            ]);

        DB::table('years')->insert(
            [
                [ 'name'              => '២០១២' ], 
                [ 'name'              => '២០១៣' ],
                [ 'name'              => '២០១៤' ],
                [ 'name'              => '២០១៥' ],
                [ 'name'              => '២០១៦' ], 
                [ 'name'              => '២០១៧' ],
                [ 'name'              => '២០១៨' ]
            ]);
	}
}
