<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert(
            'insert into products
        (name, quantity, value, description)
        values (?,?,?,?)',
            array(
                'Refrigerator',
                2,
                5900.00,
                'Side by Side with ice on door'
            )
        );
        DB::insert(
            'insert into products
        (name, quantity, value, description)
        values (?,?,?,?)',
            array(
                'Stove',
                5,
                950.00,
                'Automatic panel and eletric stove'
            )
        );
        DB::insert(
            'insert into products
        (name, quantity, value, description)
        values (?,?,?,?)',
            array(
                'Microwave',
                1,
                1520.00,
                'Send SMS when finish heating up'
            )
        );
    }
}
