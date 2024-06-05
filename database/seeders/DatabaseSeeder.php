<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //chèn bảng loai
        $loai_arr = ['Asus', 'Acer', 'Lenovo', 'MSI', 'HP', 'Dell', 'Apple', 'Surface', 'Masstel', 'LG', 'CHUWI', 'itel'];
        for ($i = 0; $i < count($loai_arr); $i++) {
            DB::table('categories')->insert(
                ['name' => $loai_arr[$i], 'priority' => $i, 'hidden' => 1]
            );
        };
        //chèn bảng sản phẩm và thuộc tính
        $ten2_arr = [
            'Gaming ROG Strix',
            'Nitro 5 Gaming',
            'Ideapad Gaming 3',
            'Gaming GF63 Thin',
            'Gaming G15',
            'MacBook Pro',
            'Pro 9',
            'E140',
            'E116',
            'gram 2023',
            'CoreBook',
            'LarkBook',
            'ABLE',
            'Spirit',
            'ROG Strix',
            'Vivobook',
            'Zenbook',
            'Pavilion'
        ];
        $ten3_arr = [
            'G15 G513IH',
            'AN515 45 R6EV',
            '15IHU6',
            '11SC',
            'Gaming VICTUS',
            'fa0111TX i5',
            '5511 11400H',
            'M2 2022',
            '1255U',
            'N4120',
            'N4020',
            '1360P',
            'X 8259U',
            'X N5100',
            '1S N4020',
            '1155G7',
            'G15 G513IH',
            '15 X1502ZA i5',
            '14 OLED UX3402ZA',
            '15 eg2082TU'
        ];
        $hinh_arr = [
            'product-1.jpg',
            'product-2.jpg',
            'product-3.jpg',
            'product-4.jpg',
            'product-5.jpg',
            'product-6.jpg',
            'product-7.jpg',
            'product-8.jpg',
            'product-9.jpg',
            'product-10.jpg',
            'product-11.jpg',
            'product-12.jpg',
            'product-13.jpg',
            'product-14.jpg',
            'product-15.jpg',
            'product-16.jpg',
            'product-17.jpg'
        ];
        $loaiSP_arr = DB::table('categories')->pluck('name', 'id'); /*  id là key, ten_loai là value
        1 => "Asus"
        2 => "Acer"   */
        $ram_arr = ['4GB', '8GB', '16GB', '32GB'];
        $dia_arr = ['256GB', '512GB', '1TB'];
        $mau_arr = ['Đen', 'Xám', 'Trắng', 'Bạc', 'Đỏ'];
        $cannang_arr = ['1.0', '1.2', '1.4', '1.6', '1.8', '2.0', '2.3', '2.5'];
        $cpu_arr = ['i3', 'i5', 'i7'];
        for ($i = 1; $i <= 5000; $i++) {
            $gia = mt_rand(5000000, 30000000);
            $gia_km = $gia - mt_rand(1000000, 5000000); 
            $id_loai = mt_rand(1, count($loaiSP_arr)); ///  1- 12
            $ten_loai = $loaiSP_arr[$id_loai];
            $ten_sp = $ten_loai . ' ' . Arr::random($ten2_arr) . ' ' . Arr::random($ten3_arr);
            $id = DB::table('products')->insertGetId([
                'name' =>  $ten_sp,
                'category_id' => $id_loai,
                'quantity_available' => fake()->randomNumber(1,50),
                'description' => fake()->text(500),
                'image' => Arr::random($hinh_arr),
                'price' => $gia_km,
                'hot' => (Arr::random([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]) % 3 == 0) ? 1 : 0,
                'hidden' => (Arr::random([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) % 8 == 0) ? 0 : 1,
                'view' => mt_rand(0, 1000),
                'heart' => mt_rand(0, 1000),
            ]);

            DB::table('product_specification')->insert([
                'product_id' => $id,
                'ram' => Arr::random($ram_arr),
                'cpu' => Arr::random($cpu_arr),
                'dia_cung' => Arr::random($dia_arr),
                'mau_sac' => Arr::random($mau_arr),
                'can_nang' => Arr::random($cannang_arr)
            ]);
        } //for
        // ProductSeeder::class;
    }
}
