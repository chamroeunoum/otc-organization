<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => 11,
                'title' => 'រដ្ឋធម្មនុញ្ញនៃ ព្រះរាជាណាចក្រកម្ពុជា',
                'description' => '<p>រដ្ឋធម្មនុញ្ញនៃ ព្រះរាជាណាចក្រកម្ពុជា</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:22:59',
                'updated_at' => '2017-08-10 01:22:59',
            ),
            1 => 
            array (
                'id' => 25,
                'title' => 'ច្បាប់ស្ដីពី តំបន់ការពារធម្មជាតិ',
                'description' => '<p>ច្បាប់ស្ដីពី តំបន់ការពារធម្មជាតិ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:36:26',
                'updated_at' => '2017-08-10 01:36:26',
            ),
            2 => 
            array (
                'id' => 26,
                'title' => 'ច្បាប់ស្ដីពី ជលផល',
                'description' => '<p>ច្បាប់ស្ដីពី ជលផល</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:37:08',
                'updated_at' => '2017-08-10 01:37:08',
            ),
            3 => 
            array (
                'id' => 2,
                'title' => 'ក្រមនិតិវិធីរដ្ឋប្បវេណី',
                'description' => '<p>២០០៧</p>',
                'color' => '#0b7cde',
                'cover' => '',
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => '',
                'created_at' => '2015-06-14 00:00:00',
                'updated_at' => '2024-06-10 11:16:01',
            ),
            4 => 
            array (
                'id' => 3,
                'title' => 'ក្រមព្រហ្មទណ្ឌ',
                'description' => '<p>២០១៧</p>',
                'color' => '#0b7cde',
                'cover' => '',
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => '',
                'created_at' => '2015-06-15 00:00:00',
                'updated_at' => '2024-06-10 12:16:13',
            ),
            5 => 
            array (
                'id' => 4,
                'title' => 'ក្រមនិតិវិធីព្រហ្មទណ្ឌ',
                'description' => '<p>២០១៧</p>',
                'color' => '#0b7cde',
                'cover' => '',
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => '',
                'created_at' => '2015-06-15 00:00:00',
                'updated_at' => '2024-06-10 12:16:17',
            ),
            6 => 
            array (
                'id' => 5,
                'title' => 'ច្បាប់ស្ដីពីការងារ',
                'description' => NULL,
                'color' => '#ffffff',
                'cover' => '',
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => '',
                'created_at' => '2017-07-01 05:59:44',
                'updated_at' => '2024-06-10 12:40:59',
            ),
            7 => 
            array (
                'id' => 6,
                'title' => 'ច្បាប់ភូមិបាល',
                'description' => '<p>ច្បាប់ភូមិបាល</p>',
                'color' => '#000000',
                'cover' => '',
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 00:53:48',
                'updated_at' => '2024-06-10 12:41:02',
            ),
            8 => 
            array (
                'id' => 7,
                'title' => 'ច្បាប់ស្ដីពី រដ្ឋបាលឃុំសង្កាត់',
                'description' => '<p>ច្បាប់ស្ដីពី រដ្ឋបាលឃុំសង្កាត់</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:13:20',
                'updated_at' => '2024-06-10 12:41:04',
            ),
            9 => 
            array (
                'id' => 8,
                'title' => 'អនុក្រឹត្យស្ដីពី អត្តសញ្ញាណប័ណ្ណសញ្ជាតិខ្មែរ',
                'description' => '<p>អនុក្រឹត្យស្ដីពី អត្តសញ្ញាណប័ណ្ណសញ្ជាតិខ្មែរ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:19:14',
                'updated_at' => '2024-06-10 12:41:07',
            ),
            10 => 
            array (
                'id' => 9,
                'title' => 'អនុក្រឹត្យ ស្ដីពី ការគ្រប់គ្រងសហគមន៍ព្រៃឈើ',
                'description' => '<p>អនុក្រឹត្យ ស្ដីពី ការគ្រប់គ្រងសហគមន៍ព្រៃឈើ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:20:39',
                'updated_at' => '2024-06-10 12:41:11',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'ច្បាប់ស្ដីពី សហគ្រាសពាណិជ្ជកម្ម',
                'description' => '<p>ច្បាប់ស្ដីពី សហគ្រាសពាណិជ្ជកម្ម</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:25:52',
                'updated_at' => '2024-06-10 12:41:21',
            ),
            12 => 
            array (
                'id' => 10,
                'title' => 'សទ្ទានុក្រម រដ្ឋប្បវេណី',
                'description' => '<p>សទ្ទានុក្រម រដ្ឋប្បវេណី</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:21:26',
                'updated_at' => '2024-06-10 12:41:18',
            ),
            13 => 
            array (
                'id' => 13,
                'title' => 'ច្បាប់ស្ដីពី ព្រៃឈើ',
                'description' => NULL,
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:26:07',
                'updated_at' => '2024-06-10 12:41:24',
            ),
            14 => 
            array (
                'id' => 14,
                'title' => 'ច្បាប់ស្ដីពី សិទ្ធិអ្នកនិពន្ធ និង សិទ្ធិប្រហាក់ប្រហែល',
                'description' => '<p>ច្បាប់ស្ដីពី សិទ្ធិអ្នកនិពន្ធ និង សិទ្ធិប្រហាក់ប្រហែល</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:27:00',
                'updated_at' => '2024-06-10 12:41:27',
            ),
            15 => 
            array (
                'id' => 22,
                'title' => 'ច្បាប់ស្ដីពី ការទប់ស្កាត់អំពើហិង្សាក្នុងគ្រួសារ',
                'description' => '<p>ច្បាប់ស្ដីពី ការទប់ស្កាត់អំពើហិង្សាក្នុងគ្រួសារ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:33:31',
                'updated_at' => '2024-06-10 12:43:00',
            ),
            16 => 
            array (
                'id' => 24,
                'title' => 'ច្បាប់ស្ដីពី អគ្គីសនីកម្ពុជា',
                'description' => '<p>ច្បាប់ស្ដីពី អគ្គីសនីកម្ពុជា</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:35:59',
                'updated_at' => '2024-06-10 12:42:52',
            ),
            17 => 
            array (
                'id' => 21,
                'title' => 'ច្បាប់ស្ដីពី ប្រកាសនីយត្រតក្កកម្ម វិញ្ញាបនបត្រម៉ូដែលមានប្រយោជន៍ និង គំនូរឧស្សាហកម្ម',
                'description' => '<p>ច្បាប់ស្ដីពី ប្រកាសនីយត្រតក្កកម្ម វិញ្ញាបនបត្រម៉ូដែលមានប្រយោជន៍ និង គំនូរឧស្សាហកម្ម</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:32:59',
                'updated_at' => '2024-06-10 12:43:03',
            ),
            18 => 
            array (
                'id' => 20,
                'title' => 'ច្បាប់ស្ដីពី នីតិវិធីរឿងក្ដីរដ្ឋប្បវេណីដែលមិនមែនជាបណ្ដឹង',
                'description' => '<p>ច្បាប់ស្ដីពី នីតិវិធីរឿងក្ដីរដ្ឋប្បវេណីដែលមិនមែនជាបណ្ដឹង</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:31:33',
                'updated_at' => '2024-06-10 12:43:06',
            ),
            19 => 
            array (
                'id' => 19,
                'title' => 'ច្បាប់ស្ដីពី ការប្រឆាំងការសម្អាតប្រាក់ និង ហិរញ្ញប្បទានភេរវកម្ម',
                'description' => '<p>ច្បាប់ស្ដីពី ការប្រឆាំងការសម្អាតប្រាក់ និង ហិរញ្ញប្បទានភេរវកម្ម</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:30:37',
                'updated_at' => '2024-06-10 12:43:10',
            ),
            20 => 
            array (
                'id' => 18,
                'title' => 'ច្បាប់ស្ដីពី ការគ្រប់គ្រង និង ការធ្វើអាជីវកម្មធនធានរ៉ែ',
                'description' => '<p>ច្បាប់ស្ដីពី ការគ្រប់គ្រង និង ការធ្វើអាជីវកម្មធនធានរ៉ែ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:29:51',
                'updated_at' => '2024-06-10 12:43:14',
            ),
            21 => 
            array (
                'id' => 17,
                'title' => 'ច្បាប់ស្ដីពី នីតិវិធីបណ្ដឹងទាក់ទងនឹងឋានៈបុគ្គល',
                'description' => '<p>ច្បាប់ស្ដីពី នីតិវិធីបណ្ដឹងទាក់ទងនឹងឋានៈបុគ្គល</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:29:17',
                'updated_at' => '2024-06-10 12:43:17',
            ),
            22 => 
            array (
                'id' => 16,
                'title' => 'ច្បាប់ស្ដីពី ចរាចរណ៍ផ្លូវគោក',
                'description' => '<p>ច្បាប់ស្ដីពី ចរាចរណ៍ផ្លូវគោក</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:28:15',
                'updated_at' => '2024-06-10 12:43:20',
            ),
            23 => 
            array (
                'id' => 15,
                'title' => 'ច្បាប់ស្ដីពី វិនិយោគ នៃព្រះរាជាណាចក្រកម្ពុជា',
                'description' => '<p>ច្បាប់ស្ដីពី វិនិយោគ នៃព្រះរាជាណាចក្រកម្ពុជា</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:27:52',
                'updated_at' => '2024-06-10 12:43:24',
            ),
            24 => 
            array (
                'id' => 27,
                'title' => 'ច្បាប់ស្ដីពី ការគ្រប់គ្រងធនធានទឹក នៅក្នុងព្រះរាជាណាចក្រកម្ពុជា',
                'description' => '<p>ច្បាប់ស្ដីពី ការគ្រប់គ្រងធនធានទឹក នៅក្នុងព្រះរាជាណាចក្រកម្ពុជា</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:37:47',
                'updated_at' => '2017-08-10 01:37:47',
            ),
            25 => 
            array (
                'id' => 28,
                'title' => 'ច្បាប់ស្ដីពី សមាគម និង អង្គការមិនមែន រដ្ឋាភិបាល',
                'description' => '<p>ច្បាប់ស្ដីពី សមាគម និង អង្គការមិនមែន រដ្ឋាភិបាល</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:43:59',
                'updated_at' => '2017-08-10 01:43:59',
            ),
            26 => 
            array (
                'id' => 29,
                'title' => 'ប្រកាស អន្ថរក្រសួង ស្ដីពី ការកំណត់ភារកិច្ចរបស់តុលាការ និង គណៈកម្មការសុរិយោដី រដ្ឋមន្ត្រីក្រសួង រៀបចំដែនដី នគរូបនីយកម្ម និងសំណង់',
                'description' => '<p>ប្រកាស អន្ថរក្រសួង ស្ដីពី ការកំណត់ភារកិច្ចរបស់តុលាការ និង គណៈកម្មការសុរិយោដី រដ្ឋមន្ត្រីក្រសួង រៀបចំដែនដី នគរូបនីយកម្ម និងសំណង់</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:46:32',
                'updated_at' => '2017-08-10 01:46:32',
            ),
            27 => 
            array (
                'id' => 30,
                'title' => 'អនុក្រឹត្យ ស្ដីពី ការគ្រប់គ្រងដីរបស់រដ្ឋ',
                'description' => '<p>អនុក្រឹត្យ ស្ដីពី ការគ្រប់គ្រងដីរបស់រដ្ឋ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 0,
                'active' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:47:32',
                'updated_at' => '2017-08-10 01:47:32',
            ),
            28 => 
            array (
                'id' => 32,
                'title' => 'ការផ្ដល់ការអនុញ្ញាតិបំពេញប្រតិបត្តិការលើវិស័យបច្ចេកវិទ្យាគមនាគមន៍និងព័តមាន',
                'description' => '<p>អនុក្រឹត្យស្ដីអំពី</p>

<p>ការផ្ដល់ការអនុញ្ញាតិបំពេញប្រតិបត្តិការលើវិស័យបច្ចេកវិទ្យាគមនាគមន៍និងព័តមាន</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-17 01:46:44',
                'updated_at' => '2024-06-10 12:42:36',
            ),
            29 => 
            array (
                'id' => 31,
                'title' => 'ច្បាប់ស្ដីពី ការប្រឆាំងអំពីពុករលួយ',
                'description' => '<p>ច្បាប់ស្ដីពី ការប្រឆាំងអំពីពុករលួយ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-14 00:24:27',
                'updated_at' => '2024-06-10 12:42:39',
            ),
            30 => 
            array (
                'id' => 23,
                'title' => 'ច្បាប់ស្ដីពី ការបង្ក្រាបអំពីជួញដូរមនុស្ស និង អំពីធ្វើអាជីវកម្មផ្លូវភេទ',
                'description' => '<p>ច្បាប់ស្ដីពី ការបង្ក្រាបអំពីជួញដូរមនុស្ស និង អំពីធ្វើអាជីវកម្មផ្លូវភេទ</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-10 01:34:36',
                'updated_at' => '2024-06-10 12:42:55',
            ),
            31 => 
            array (
                'id' => 34,
                'title' => 'ច្បាប់ ស្ដីពី ការប្រឆាំងនឹងភេរវកម្ម',
                'description' => '<p>ច្បាប់ ស្ដីពី ការប្រឆាំងនឹងភេរវកម្ម</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-20 14:56:12',
                'updated_at' => '2024-06-10 11:13:58',
            ),
            32 => 
            array (
                'id' => 1,
                'title' => 'ក្រមរដ្ឋប្បវេណី',
                'description' => 'ក្រមរដ្ឋប្បវេណី នៅឆ្នាំ ២០០៧',
                'color' => '#4a09b5',
                'cover' => 'uploads/book_covers/13cff0e070d2d9a2250662eeeb83d589.jpg',
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => '{"2":"uploads\\/book\\/pdf\\/747058127909a72f764292faefb4287c.pdf"}',
                'created_at' => '2015-06-13 00:00:00',
                'updated_at' => '2024-06-10 11:55:12',
            ),
            33 => 
            array (
                'id' => 33,
                'title' => 'អនុក្រឹត្យ ស្ដីពី ការគ្រប់គ្រងព្រៃសម្បទាន',
                'description' => '<p>អនុក្រឹត្យ ស្ដីពី ការគ្រប់គ្រងព្រៃសម្បទាន</p>',
                'color' => '#000000',
                'cover' => NULL,
                'complete' => 1,
                'active' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'pdf' => NULL,
                'created_at' => '2017-08-19 00:39:58',
                'updated_at' => '2024-06-10 12:42:32',
            ),
        ));
        
        
    }
}