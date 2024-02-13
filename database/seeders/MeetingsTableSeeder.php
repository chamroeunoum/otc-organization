<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MeetingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meetings')->delete();
        
        \DB::table('meetings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'objective' => 'សេចក្ដីព្រាងច្បាប់ស្ដីអំពីការដឹកជញ្ជូនតាមផ្លូវទឹកនិងកំពង់ផែ',
                'date' => '2023-12-05',
                'start' => '08:30',
                'end' => '12:00',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០៧៧ ៨៧៨ ៦៩៦ , ០១២ ៨១៨ ៨៤៨',
                'pid' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 09:55:17',
                'updated_at' => '2024-01-31 09:55:58',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'objective' => 'សេចក្ដីព្រាងច្បាប់ស្ដីអំពីការដឹកជញ្ជូនតាមផ្លូវទឹកនិងកំពង់ផែ',
                'date' => '2023-12-05',
                'start' => '15:0',
                'end' => '17:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០៧៧ ៨៧៨ ៦៩៦ , ០១២ ៨១៨ ៨៤៨',
                'pid' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:15:09',
                'updated_at' => '2024-01-31 10:21:04',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'objective' => 'កិច្ចប្រជុំផ្ទៃក្នុងទីស្ដីការគណៈរដ្ឋមន្ត្រី ក្រោមអធិបតីភាពដ៏ខ្ពង់ខ្ពស់របស់ឯកឧត្ដម វង្សី វិស្សុត',
                'date' => '2023-12-08',
                'start' => '9:0',
                'end' => '12:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០៩៩ ៨៨៣ ៤៥៦ , ០១២ ៩៥៩ ៦០៩ , ០៧៧ ៨០៣ ៣៨៨',
                'pid' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 561,
                'created_at' => '2024-01-31 10:35:29',
                'updated_at' => '2024-01-31 10:36:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 9,
                'objective' => 'ពិនិត្យ និងពិភាក្សាលើ សេចក្ដីព្រាងច្បាប់ស្ដីពីប្រព័ន្ទទឹកកខ្វក់',
                'date' => '2023-12-22',
                'start' => '15:0',
                'end' => '17:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០១៧ ៣០០ ២០០ , ០១២ ៨១៨ ៨៤៨ , ០៧៧ ៧៨៧  ៦៩៦',
                'pid' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:54:57',
                'updated_at' => '2024-01-31 10:55:10',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'objective' => 'ពិនិត្យ និងពិភាក្សាលើ សេចក្ដីព្រាងច្បាប់ស្ដីពីប្រព័ន្ទទឹកកខ្វក់',
                'date' => '2023-12-22',
                'start' => '8:30',
                'end' => '12:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០១៧ ៣០០ ២០០ , ០១២ ៨១៨ ៨៤៨ , ០៧៧ ៧៨៧  ៦៩៦',
                'pid' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:54:34',
                'updated_at' => '2024-01-31 10:55:06',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'objective' => 'ពិនិត្យ និងពិភាក្សាលើ សេចក្ដីព្រាងច្បាប់ស្ដីពីប្រព័ន្ទទឹកកខ្វក់',
                'date' => '2023-12-21',
                'start' => '15:0',
                'end' => '17:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០១៧ ៣០០ ២០០ , ០១២ ៨១៨ ៨៤៨ , ០៧៧ ៧៨៧  ៦៩៦',
                'pid' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:51:56',
                'updated_at' => '2024-01-31 10:52:08',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 6,
                'objective' => 'ពិនិត្យ និងពិភាក្សាលើ សេចក្ដីព្រាងច្បាប់ស្ដីពីប្រព័ន្ទទឹកកខ្វក់',
                'date' => '2023-12-21',
                'start' => '08:30',
                'end' => '12:00',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០១៧ ៣០០ ២០០ , ០១២ ៨១៨ ៨៤៨ , ០៧៧ ៧៨៧  ៦៩៦',
                'pid' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:50:01',
                'updated_at' => '2024-01-31 10:50:01',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 4,
                'objective' => 'ពិនិត្យ និងពិភាក្សាលើ សេចក្ដីព្រាងច្បាប់ស្ដីពីប្រព័ន្ធទឹកកខ្វក់',
                'date' => '2023-12-12',
                'start' => '15:0',
                'end' => '17:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០១៧ ៣០០ ២០០ , ០១២ ៨១៨ ៨៤៨ , ០៧៧ ៨៧៨ ៦៩៦',
                'pid' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:25:24',
                'updated_at' => '2024-01-31 14:00:51',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 3,
                'objective' => 'ពិនិត្យ និងពិភាក្សាលើ សេចក្ដីព្រាងច្បាប់ស្ដីពីប្រព័ន្ធទឹកកខ្វក់',
                'date' => '2023-12-12',
                'start' => '8:30',
                'end' => '12:0',
                'actual_start' => NULL,
                'actual_end' => NULL,
                'status' => 16,
                'seichdey_preeng' => NULL,
                'reports' => NULL,
                'other_documents' => NULL,
                'contact_info' => '០១៧ ៣០០ ២០០ , ០១២ ៨១៨ ៨៤៨ , ០៧៧ ៨៧៨ ៦៩៦',
                'pid' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'type_id' => 553,
                'created_at' => '2024-01-31 10:23:35',
                'updated_at' => '2024-01-31 14:00:57',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}