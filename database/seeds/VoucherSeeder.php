<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            'voucher_name'=> 'voucher1',
            'voucher_code'=> Hash::make(Str::uuid()->toString()),
            'short_code'=> 'v1',
            'value'=> '50',
            'expiry_date'=> '2021/04/29',
            'date_created'=> Carbon::now()->format('Y-m-d H:i:s'),
            'created_by'=> 'admin',
            'status' => 'valid'
        ]);
    }
}
