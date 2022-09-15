<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            ['id' => 1002, 'last_name' => 'Murphy', 'first_name' => 'Diane', 'extension' => 'x5800', 'email' => 'dmurphy@classicmodelcars.com', 'office_id' => '1', 'reports_to' => NULL, 'job_title' => 'President'],
            ['id' => 1056, 'last_name' => 'Patterson', 'first_name' => 'Mary', 'extension' => 'x4611', 'email' => 'mpatterso@classicmodelcars.com', 'office_id' => '1', 'reports_to' => 1002, 'job_title' => 'VP Sales'],
            ['id' => 1076, 'last_name' => 'Firrelli', 'first_name' => 'Jeff', 'extension' => 'x9273', 'email' => 'jfirrelli@classicmodelcars.com', 'office_id' => '1', 'reports_to' => 1002, 'job_title' => 'VP Marketing'],
            ['id' => 1088, 'last_name' => 'Patterson', 'first_name' => 'William', 'extension' => 'x4871', 'email' => 'wpatterson@classicmodelcars.com', 'office_id' => '6', 'reports_to' => 1056, 'job_title' => 'Sales Manager (APAC)'],
            ['id' => 1102, 'last_name' => 'Bondur', 'first_name' => 'Gerard', 'extension' => 'x5408', 'email' => 'gbondur@classicmodelcars.com', 'office_id' => '4', 'reports_to' => 1056, 'job_title' => 'Sale Manager (EMEA)'],
            ['id' => 1143, 'last_name' => 'Bow', 'first_name' => 'Anthony', 'extension' => 'x5428', 'email' => 'abow@classicmodelcars.com', 'office_id' => '1', 'reports_to' => 1056, 'job_title' => 'Sales Manager (NA)'],
            ['id' => 1165, 'last_name' => 'Jennings', 'first_name' => 'Leslie', 'extension' => 'x3291', 'email' => 'ljennings@classicmodelcars.com', 'office_id' => '1', 'reports_to' => 1143, 'job_title' => 'Sales Rep'],
            ['id' => 1166, 'last_name' => 'Thompson', 'first_name' => 'Leslie', 'extension' => 'x4065', 'email' => 'lthompson@classicmodelcars.com', 'office_id' => '1', 'reports_to' => 1143, 'job_title' => 'Sales Rep'],
            ['id' => 1188, 'last_name' => 'Firrelli', 'first_name' => 'Julie', 'extension' => 'x2173', 'email' => 'jfirrelli@classicmodelcars.com', 'office_id' => '2', 'reports_to' => 1143, 'job_title' => 'Sales Rep'],
            ['id' => 1216, 'last_name' => 'Patterson', 'first_name' => 'Steve', 'extension' => 'x4334', 'email' => 'spatterson@classicmodelcars.com', 'office_id' => '2', 'reports_to' => 1143, 'job_title' => 'Sales Rep'],
            ['id' => 1286, 'last_name' => 'Tseng', 'first_name' => 'Foon Yue', 'extension' => 'x2248', 'email' => 'ftseng@classicmodelcars.com', 'office_id' => '2', 'reports_to' => 1143, 'job_title' => 'Sales Rep'],
            ['id' => 1323, 'last_name' => 'Vanauf', 'first_name' => 'George', 'extension' => 'x4102', 'email' => 'gvanauf@classicmodelcars.com', 'office_id' => '3', 'reports_to' => 1143, 'job_title' => 'Sales Rep'],
            ['id' => 1337, 'last_name' => 'Bondur', 'first_name' => 'Loui', 'extension' => 'x6493', 'email' => 'lbondur@classicmodelcars.com', 'office_id' => '4', 'reports_to' => 1102, 'job_title' => 'Sales Rep'],
            ['id' => 1370, 'last_name' => 'Hernandez', 'first_name' => 'Gerard', 'extension' => 'x2028', 'email' => 'ghernande@classicmodelcars.com', 'office_id' => '4', 'reports_to' => 1102, 'job_title' => 'Sales Rep'],
            ['id' => 1401, 'last_name' => 'Castillo', 'first_name' => 'Pamela', 'extension' => 'x2759', 'email' => 'pcastillo@classicmodelcars.com', 'office_id' => '4', 'reports_to' => 1102, 'job_title' => 'Sales Rep'],
            ['id' => 1501, 'last_name' => 'Bott', 'first_name' => 'Larry', 'extension' => 'x2311', 'email' => 'lbott@classicmodelcars.com', 'office_id' => '7', 'reports_to' => 1102, 'job_title' => 'Sales Rep'],
            ['id' => 1504, 'last_name' => 'Jones', 'first_name' => 'Barry', 'extension' => 'x102', 'email' => 'bjones@classicmodelcars.com', 'office_id' => '7', 'reports_to' => 1102, 'job_title' => 'Sales Rep'],
            ['id' => 1611, 'last_name' => 'Fixter', 'first_name' => 'Andy', 'extension' => 'x101', 'email' => 'afixter@classicmodelcars.com', 'office_id' => '6', 'reports_to' => 1088, 'job_title' => 'Sales Rep'],
            ['id' => 1612, 'last_name' => 'Marsh', 'first_name' => 'Peter', 'extension' => 'x102', 'email' => 'pmarsh@classicmodelcars.com', 'office_id' => '6', 'reports_to' => 1088, 'job_title' => 'Sales Rep'],
            ['id' => 1619, 'last_name' => 'King', 'first_name' => 'Tom', 'extension' => 'x103', 'email' => 'tking@classicmodelcars.com', 'office_id' => '6', 'reports_to' => 1088, 'job_title' => 'Sales Rep'],        
            ['id' => 1621, 'last_name' => 'Nishi', 'first_name' => 'Mami', 'extension' => 'x101', 'email' => 'mnishi@classicmodelcars.com', 'office_id' => '5', 'reports_to' => 1056, 'job_title' => 'Sales Rep'],
            ['id' => 1625, 'last_name' => 'Kato', 'first_name' => 'Yoshimi', 'extension' => 'x102', 'email' => 'ykato@classicmodelcars.com', 'office_id' => '5', 'reports_to' => 1621, 'job_title' => 'Sales Rep'],
            ['id' => 1702, 'last_name' => 'Gerard', 'first_name' => 'Martin', 'extension' => 'x2312', 'email' => 'mgerard@classicmodelcars.com', 'office_id' => '4', 'reports_to' => 1102, 'job_title' => 'Sales Rep'],
        ];

        Employee::insert($employees);
    }
}
