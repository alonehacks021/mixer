<?php

namespace Nahad\Foundation\Auth\Seeders;

use Illuminate\Database\Seeder;
use Nahad\Foundation\Auth\Events\UserCreated;
use Nahad\Foundation\Auth\Models\OrganizationalPost;
use Nahad\Foundation\Auth\Models\User;

class OrganizationalPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['id' => '13', 'code' => '11', 'title' => 'قرارداد وزارت كار'],
            ['id' => '2', 'code' => '20', 'title' => 'معاون ستادي'],
            ['id' => '3', 'code' => '31', 'title' => 'مدير ستادي'],
            ['id' => '4', 'code' => '32', 'title' => 'مسئول نهاد'],
            ['id' => '5', 'code' => '41', 'title' => 'رئيس اداره'],
            ['id' => '6', 'code' => '42', 'title' => 'معاون نهاد'],
            ['id' => '7', 'code' => '50', 'title' => 'كارشناس مسئول'],
            ['id' => '8', 'code' => '51', 'title' => 'مسئول اجرايي دفتر نهاد'],
            ['id' => '9', 'code' => '52', 'title' => 'مسئول هماهنگي و ارتباطات استاني'],
            ['id' => '10', 'code' => '53', 'title' => 'مسئول واحد خواهران'],
            ['id' => '11', 'code' => '60', 'title' => 'كارشناس'],
            ['id' => '14', 'code' => '65', 'title' => 'كارشناس (پست با نام)'],
            ['id' => '15', 'code' => '70', 'title' => 'كارپرداز - جمعدار اموال'],
            ['id' => '16', 'code' => '80', 'title' => 'متصدي'],
            ['id' => '17', 'code' => '81', 'title' => 'ماشين نويس - پست با نام'],
            ['id' => '18', 'code' => '90', 'title' => 'راننده'],
            ['id' => '19', 'code' => '102', 'title' => 'مشاور'],
            ['id' => '20', 'code' => '104', 'title' => 'همكار پژوهشي'],
            ['id' => '21', 'code' => '105', 'title' => 'ماشين نويس'],
            ['id' => '22', 'code' => '107', 'title' => 'محافظ'],
            ['id' => '23', 'code' => '101', 'title' => 'عامل ذيحساب'],
            ['id' => '12', 'code' => '108', 'title' => 'مسئول دفتر'],
            ['id' => '24', 'code' => '29', 'title' => 'مدير اجرايي و عامل ذيحساب'],
            ['id' => '25', 'code' => '30', 'title' => 'كاردان'],
            ['id' => '1', 'code' => '7', 'title' => 'كارشناس ارشد (پست با نام)'],
            ['id' => '26', 'code' => '14', 'title' => 'عامل ذيحساب-مركز مفاد'],
            ['id' => '27', 'code' => '33', 'title' => 'معاون مدير كل'],
            ['id' => '28', 'code' => '110', 'title' => '5(مدير گروه پژوهشي فلسفه و كلام اسلامي)'],
            ['id' => '29', 'code' => '111', 'title' => '5(مدير گروه پژوهشي مطالعات اخلاق و عرفان اسلامي)'],
            ['id' => '30', 'code' => '112', 'title' => '5(مديرگروه پژوهشي مطالعات قرآن و حديث)'],
            ['id' => '31', 'code' => '113', 'title' => '5(مدير گروه پژوهشي مطالعات علم ديني و دانشگاه اسلامي)'],
            ['id' => '32', 'code' => '114', 'title' => '5(مدير گروه پژوهشي مطالعات اقتصاد اسلامي)'],
            ['id' => '33', 'code' => '115', 'title' => '5(مدير گروه پژوهشي مطالعات سياسي و انقلاب اسلامي)'],
            ['id' => '34', 'code' => '116', 'title' => '5(مدير گروه پژوهشي مطالعات خانواده، جنسيت و زنان)'],
            ['id' => '35', 'code' => '117', 'title' => '5(مدير گروه پژوهشي مطالعات مديريت و سياست گذاري فرهنگي)'],
            ['id' => '36', 'code' => '118', 'title' => '5(مدير گروه پژوهشي مطالعات اجتماعي و مساله شناسي فرهنگي دانشگاه)'],
            ['id' => '37', 'code' => '119', 'title' => 'معاون پژوهشكده'],
            ['id' => '38', 'code' => '121', 'title' => 'كارشناس واحد خواهران'],
            ['id' => '39', 'code' => '120', 'title' => 'معاون هماهنگ كننده'],
            ['id' => '40', 'code' => '122', 'title' => 'كارشناس مسئول (پست با نام)'],
            ['id' => '41', 'code' => '124', 'title' => 'مشاور (پست با نام)'],
            ['id' => '42', 'code' => '126', 'title' => 'معاون نهاد (پست با نام)'],
            ['id' => '43', 'code' => '127', 'title' => 'مسئول اجرايي دفتر نهاد (پست با نام)'],
            ['id' => '44', 'code' => '128', 'title' => 'كارشناس خواهران (پست با نام)'],
            ['id' => '45', 'code' => '130', 'title' => 'مسئول نهاد (پست با نام)'],
            ['id' => '46', 'code' => '132', 'title' => 'مسئول نهاد (مامور)'],
        ];

        // $posts = [
        //     ['id' => '', 'code' => 7, 'title' => 'كارشناس ارشد'],
        //     ['id' => '', 'code' => 20, 'title' => 'معاون ستادی'],
        //     ['id' => '', 'code' => 31, 'title' => 'مدير ستادی'],
        //     ['id' => '', 'code' => 32, 'title' => 'مسئول نهاد'],
        //     ['id' => '', 'code' => 41, 'title' => 'رئیس اداره'],
        //     ['id' => '', 'code' => 42, 'title' => 'معاون نهاد'],
        //     ['id' => '', 'code' => 50, 'title' => 'كارشناس مسئول'],
        //     ['id' => '', 'code' => 51, 'title' => 'مسئول اجرایی دفتر نهاد'],
        //     ['id' => '', 'code' => 52, 'title' => 'مسئول هماهنگی و ارتباطات استانی'],
        //     ['id' => '', 'code' => 53, 'title' => 'مسئول واحد خواهران'],
        //     ['id' => '', 'code' => 60, 'title' => 'كارشناس'],
        //     ['id' => '', 'code' => 108, 'title' => 'سئول دفتر'],

        //     //['id' => '', 'code' => , 'title' => ''],
        // ];

        foreach($posts as $post) {
            OrganizationalPost::updateOrCreate([
                'code' => $post['code'],
            ], [
                'id' => $post['id'],
                'title' => $post['title']
            ]);
        }
    }
}
