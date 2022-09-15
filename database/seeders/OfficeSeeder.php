<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'id' => '1', 
                'city' => 'San Francisco', 
                'phone' => '+1 650 219 4782', 
                'address_line_1' => '100 Market Street', 
                'address_line_2' => 'Suite 300', 
                'state' =>  'CA', 
                'country' => 'USA', 
                'postal_code' => '94080',
                'territory' => 'NA'
            ],
            [
                'id' => '2', 
                'city' => 'Boston', 
                'phone' => '+1 215 837 0825', 
                'address_line_1' => '1550 Court Place', 
                'address_line_2' => 'Suite 102', 
                'state' =>  'MA', 
                'country' => 'USA', 
                'postal_code' => '02107',
                'territory' => 'NA'
            ],
            [
                'id' => '3', 
                'city' => 'NYC', 
                'phone' => '+1 212 555 3000', 
                'address_line_1' => '523 East 53rd Street', 
                'address_line_2' => 'apt. 5A', 
                'state' =>  'NY', 
                'country' => 'USA', 
                'postal_code' => '10022',
                'territory' => 'NA'
            ],
            [
                'id' => '4', 
                'city' => 'Paris', 
                'phone' => '+33 14 723 4404', 
                'address_line_1' => '43 Rue Jouffroy Dabbans', 
                'address_line_2' => NULL, 
                'state' =>  NULL, 
                'country' => 'France', 
                'postal_code' => '75017',
                'territory' => 'EMEA'
            ],
            [
                'id' => '5', 
                'city' => 'Tokyo', 
                'phone' => '+81 33 224 5000', 
                'address_line_1' => '4-1 Kioicho', 
                'address_line_2' => NULL, 
                'state' =>  'Chiyoda-Ku', 
                'country' => 'Japan', 
                'postal_code' => '102-8578',
                'territory' => 'Japan'
            ],
            [
                'id' => '6', 
                'city' => 'Sydney', 
                'phone' => '+61 2 9264 2451', 
                'address_line_1' => '5-11 Wentworth Avenue', 
                'address_line_2' => 'Floor #2', 
                'state' =>  NULL, 
                'country' => 'Australia',
                'postal_code' => 'NSW 2010',
                'territory' => 'NSW'
            ],
            [
                'id' => '7', 
                'city' => 'London', 
                'phone' => '+44 20 7877 2041', 
                'address_line_1' => '25 Old Broad Street', 
                'address_line_2' => 'Level 7', 
                'state' =>  NULL, 
                'country' => 'UK', 
                'postal_code' => 'EC2N 1HN',
                'territory' => 'EMEA'
            ],
        ];

        Office::insert($offices);
    }
}
