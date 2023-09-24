<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Customer;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('payments')->insert([
                'amount' => $faker->randomFloat(2, 10, 500),
                'customer_id' => $faker->numberBetween(1, 20), // Assuming 20 customers
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }*/
        //Payment::factory()->count(10)->create();
        Customer::all()->each(function ($customer) {
            Payment::factory()->count(1)->create(['customer_id' => $customer->id]);
        });
    }
}
