<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class YpCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('yp_categories')->delete();
        
        \DB::table('yp_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Accountants  -  General',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:15',
                'updated_at' => '2022-12-21 09:39:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Accounting Classes & Training',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:19',
                'updated_at' => '2022-12-21 09:39:19',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Acupuncture Practitioners',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:20',
                'updated_at' => '2022-12-21 09:39:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Adhesives & Glues',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:21',
                'updated_at' => '2022-12-21 09:39:21',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Advertising - Equipment, Materials & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:21',
                'updated_at' => '2022-12-21 09:39:21',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Advertising - Internet',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:23',
                'updated_at' => '2022-12-21 09:39:23',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Advertising Agencies & Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:25',
                'updated_at' => '2022-12-21 09:39:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Aerial Photography Services & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:34',
                'updated_at' => '2022-12-21 09:39:34',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Agricultural - NGOs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:35',
                'updated_at' => '2022-12-21 09:39:35',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Agricultural Consultants & Development',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:36',
                'updated_at' => '2022-12-21 09:39:36',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Agricultural Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:40',
                'updated_at' => '2022-12-21 09:39:40',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Agricultural Seeding & Spraying',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:44',
                'updated_at' => '2022-12-21 09:39:44',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Aid Organizations - International',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:46',
                'updated_at' => '2022-12-21 09:39:46',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Aid Organizations - Local',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:39:57',
                'updated_at' => '2022-12-21 09:39:57',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Air Cleaning, Purifying Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:23',
                'updated_at' => '2022-12-21 09:40:23',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Air Conditioning - Supplies & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:24',
                'updated_at' => '2022-12-21 09:40:24',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Aircraft Charter & Rental Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:34',
                'updated_at' => '2022-12-21 09:40:34',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Airline Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:34',
                'updated_at' => '2022-12-21 09:40:34',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Airport Ground Equipment & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:36',
                'updated_at' => '2022-12-21 09:40:36',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Airport Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:37',
                'updated_at' => '2022-12-21 09:40:37',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Alarm Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:37',
                'updated_at' => '2022-12-21 09:40:37',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Alcohol Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:39',
                'updated_at' => '2022-12-21 09:40:39',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Aluminium Works',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:39',
                'updated_at' => '2022-12-21 09:40:39',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Ambulance Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:42',
                'updated_at' => '2022-12-21 09:40:42',
            ),
            24 => 
            array (
                'id' => 25,
            'name' => 'Animation Schools (3D)',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:42',
                'updated_at' => '2022-12-21 09:40:42',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Anti Radiation Products & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:43',
                'updated_at' => '2022-12-21 09:40:43',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Antique Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:43',
                'updated_at' => '2022-12-21 09:40:43',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Apartment Rental Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:44',
                'updated_at' => '2022-12-21 09:40:44',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Aquariums - Sales & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:53',
                'updated_at' => '2022-12-21 09:40:53',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Architectural - Design, Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:40:53',
                'updated_at' => '2022-12-21 09:40:53',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Aromatherapy',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:07',
                'updated_at' => '2022-12-21 09:41:07',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Art Galleries',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:08',
                'updated_at' => '2022-12-21 09:41:08',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Art Schools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:11',
                'updated_at' => '2022-12-21 09:41:11',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Artificial Jewelry - Retails',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:11',
                'updated_at' => '2022-12-21 09:41:11',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Artificial Limbs - Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:12',
                'updated_at' => '2022-12-21 09:41:12',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Artists - Commercial',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:13',
                'updated_at' => '2022-12-21 09:41:13',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Artists - Fine Arts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:14',
                'updated_at' => '2022-12-21 09:41:14',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Asbestos',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:15',
                'updated_at' => '2022-12-21 09:41:15',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Asian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:15',
                'updated_at' => '2022-12-21 09:41:15',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Asphalt',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:22',
                'updated_at' => '2022-12-21 09:41:22',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Associations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:22',
                'updated_at' => '2022-12-21 09:41:22',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Auctioneers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:33',
                'updated_at' => '2022-12-21 09:41:33',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Audio - Visual Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:33',
                'updated_at' => '2022-12-21 09:41:33',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Audit Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:34',
                'updated_at' => '2022-12-21 09:41:34',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Automatic Door & Gate Openers / Operators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:36',
                'updated_at' => '2022-12-21 09:41:36',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Automation Equipment & Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:37',
                'updated_at' => '2022-12-21 09:41:37',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Automobile Glass Coating',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:38',
                'updated_at' => '2022-12-21 09:41:38',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Automotive Maintenance Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:39',
                'updated_at' => '2022-12-21 09:41:39',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Aviation - Civil Authority',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:39',
                'updated_at' => '2022-12-21 09:41:39',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Aviation Schools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:40',
                'updated_at' => '2022-12-21 09:41:40',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Awning & Canopies - Sales & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:40',
                'updated_at' => '2022-12-21 09:41:40',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Baby Foods - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:41',
                'updated_at' => '2022-12-21 09:41:41',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Baby Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:41:42',
                'updated_at' => '2022-12-21 09:41:42',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Bags & Suitcases - Retailers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:46:48',
                'updated_at' => '2022-12-21 09:46:48',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Bags - Plastic & Transparent',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:46:54',
                'updated_at' => '2022-12-21 09:46:54',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Bakeries & Cakes',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:46:55',
                'updated_at' => '2022-12-21 09:46:55',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Balloon Rides',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:47:03',
                'updated_at' => '2022-12-21 09:47:03',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Balloons',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:47:04',
                'updated_at' => '2022-12-21 09:47:04',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Balm & Medicated Oil Products - Manufacturers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:47:04',
                'updated_at' => '2022-12-21 09:47:04',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Banking Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:47:05',
                'updated_at' => '2022-12-21 09:47:05',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Banks & Finance',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:47:06',
                'updated_at' => '2022-12-21 09:47:06',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Banquet Catering',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:47:56',
                'updated_at' => '2022-12-21 09:47:56',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Bars & Pubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:48:02',
                'updated_at' => '2022-12-21 09:48:02',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Bathroom Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:24',
                'updated_at' => '2022-12-21 09:53:24',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Batteries - Electronic Appliances',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:27',
                'updated_at' => '2022-12-21 09:53:27',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Battery Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:27',
                'updated_at' => '2022-12-21 09:53:27',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'BBQ Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:31',
                'updated_at' => '2022-12-21 09:53:31',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Bearings',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:48',
                'updated_at' => '2022-12-21 09:53:48',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Beauty Salon Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:49',
                'updated_at' => '2022-12-21 09:53:49',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Beauty Salons',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:53:51',
                'updated_at' => '2022-12-21 09:53:51',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Beauty Schools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:17',
                'updated_at' => '2022-12-21 09:54:17',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Beer - Breweries Manufacturers & Distributors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:19',
                'updated_at' => '2022-12-21 09:54:19',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Beer Gardens',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:21',
                'updated_at' => '2022-12-21 09:54:21',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Beverages Wholesalers, Distributors & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:22',
                'updated_at' => '2022-12-21 09:54:22',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Bicycles - Supplies, Spare Parts & Repair',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:27',
                'updated_at' => '2022-12-21 09:54:27',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Billboards - Design & Advertising',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:28',
                'updated_at' => '2022-12-21 09:54:28',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Billiard Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:35',
                'updated_at' => '2022-12-21 09:54:35',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Binoculars & Magnifying Glass',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:36',
                'updated_at' => '2022-12-21 09:54:36',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Bird Nests',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:36',
                'updated_at' => '2022-12-21 09:54:36',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Blacksmiths',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:37',
                'updated_at' => '2022-12-21 09:54:37',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Blood Banks & Centres',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:38',
                'updated_at' => '2022-12-21 09:54:38',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Boat & Ship - Dealers, Equipment & Repair',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:38',
                'updated_at' => '2022-12-21 09:54:38',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Boat Excursions - Rental',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:39',
                'updated_at' => '2022-12-21 09:54:39',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Boat Transportation - Rental',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:40',
                'updated_at' => '2022-12-21 09:54:40',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Boiler Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:42',
                'updated_at' => '2022-12-21 09:54:42',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Bolts & Nuts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:42',
                'updated_at' => '2022-12-21 09:54:42',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Bottles - Wholesales & Manufactures',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:43',
                'updated_at' => '2022-12-21 09:54:43',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Boutique Hotels & Resorts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:54:43',
                'updated_at' => '2022-12-21 09:54:43',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Bowling',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:59:53',
                'updated_at' => '2022-12-21 09:59:53',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Boxing Clubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:59:54',
                'updated_at' => '2022-12-21 09:59:54',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Bricks & Clay - Supplies & Manufacturing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:59:54',
                'updated_at' => '2022-12-21 09:59:54',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Buffet',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 09:59:57',
                'updated_at' => '2022-12-21 09:59:57',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Bulldozer',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:00:01',
                'updated_at' => '2022-12-21 10:00:01',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Burgers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:00:02',
                'updated_at' => '2022-12-21 10:00:02',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Business & Invitation Cards - Printing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:00:03',
                'updated_at' => '2022-12-21 10:00:03',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Business Centres',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:10',
                'updated_at' => '2022-12-21 10:05:10',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Business Consultants - Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:11',
                'updated_at' => '2022-12-21 10:05:11',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Cable Television',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:20',
                'updated_at' => '2022-12-21 10:05:20',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Cafés & Coffee Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:21',
                'updated_at' => '2022-12-21 10:05:21',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Call Center',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:45',
                'updated_at' => '2022-12-21 10:05:45',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Cambodian Embassies, Representatives & Consulates',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:46',
                'updated_at' => '2022-12-21 10:05:46',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Cameras - Retail',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:47',
                'updated_at' => '2022-12-21 10:05:47',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Car & Automobile - Garage Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:05:49',
                'updated_at' => '2022-12-21 10:05:49',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Car & Automobile - Sales',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:00',
                'updated_at' => '2022-12-21 10:06:00',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Car & Automobile - Spare Parts & Accessories',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:08',
                'updated_at' => '2022-12-21 10:06:08',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Car & Motorbike - Rental',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:20',
                'updated_at' => '2022-12-21 10:06:20',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Car Washing & Polishing Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:25',
                'updated_at' => '2022-12-21 10:06:25',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Cargo - Transit',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:28',
                'updated_at' => '2022-12-21 10:06:28',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Carpenters',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:30',
                'updated_at' => '2022-12-21 10:06:30',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Carpets & Rugs - Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:31',
                'updated_at' => '2022-12-21 10:06:31',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Cart Manufacturers & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:32',
                'updated_at' => '2022-12-21 10:06:32',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Casinos',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:33',
                'updated_at' => '2022-12-21 10:06:33',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Cassava & Wheat Processing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:35',
                'updated_at' => '2022-12-21 10:06:35',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'CCTV - Closed Circuit Television',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:35',
                'updated_at' => '2022-12-21 10:06:35',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'CD - Compact Discs, Audio, VCD, DVD, Software, Shopping',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:38',
                'updated_at' => '2022-12-21 10:06:38',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Ceilings',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:41',
                'updated_at' => '2022-12-21 10:06:41',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Cement Suppliers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:42',
                'updated_at' => '2022-12-21 10:06:42',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Chemicals',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:43',
                'updated_at' => '2022-12-21 10:06:43',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Child Care Centres',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:45',
                'updated_at' => '2022-12-21 10:06:45',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Chinese Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:06:46',
                'updated_at' => '2022-12-21 10:06:46',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Churches & Religious Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:11:55',
                'updated_at' => '2022-12-21 10:11:55',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Cigarettes & Tobacco - Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:11:57',
                'updated_at' => '2022-12-21 10:11:57',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Cigars, Cigarettes & Tobacco - Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:11:57',
                'updated_at' => '2022-12-21 10:11:57',
            ),
            123 => 
            array (
                'id' => 124,
            'name' => 'Cinemas & Movie Centres (MTVs)',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:11:58',
                'updated_at' => '2022-12-21 10:11:58',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Clay Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:11:59',
                'updated_at' => '2022-12-21 10:11:59',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Cleaning Compounds - Liquid Detergents',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:12:00',
                'updated_at' => '2022-12-21 10:12:00',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Cleaning Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:12:02',
                'updated_at' => '2022-12-21 10:12:02',
            ),
            127 => 
            array (
                'id' => 128,
            'name' => 'Clinics (International) - Medical & General Practitioners',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:12:03',
                'updated_at' => '2022-12-21 10:12:03',
            ),
            128 => 
            array (
                'id' => 129,
            'name' => 'Clinics (Local) - Medical & General Practitioners',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:17:06',
                'updated_at' => '2022-12-21 10:17:06',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Cloth - Wholesalers & Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:17:20',
                'updated_at' => '2022-12-21 10:17:20',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Clothes Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:22:21',
                'updated_at' => '2022-12-21 10:22:21',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Coal - Wholesales & Retails',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:21',
                'updated_at' => '2022-12-21 10:23:21',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Coffee & Tea Equipment Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:22',
                'updated_at' => '2022-12-21 10:23:22',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Coffee & Tea Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:24',
                'updated_at' => '2022-12-21 10:23:24',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Coffins',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:27',
                'updated_at' => '2022-12-21 10:23:27',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Cold Rooms - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:27',
                'updated_at' => '2022-12-21 10:23:27',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Commercial Spot - Radio & Television',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:28',
                'updated_at' => '2022-12-21 10:23:28',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Communications - Consultants & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:31',
                'updated_at' => '2022-12-21 10:23:31',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Compactor',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:32',
                'updated_at' => '2022-12-21 10:23:32',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Company Registration Agents',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:32',
                'updated_at' => '2022-12-21 10:23:32',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Compressors - Air & Gas',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:34',
                'updated_at' => '2022-12-21 10:23:34',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Computer Networking & Security',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:35',
                'updated_at' => '2022-12-21 10:23:35',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Computer Programming Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:42',
                'updated_at' => '2022-12-21 10:23:42',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Computer Schools & Training',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:44',
                'updated_at' => '2022-12-21 10:23:44',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Computers & Equipment - Dealers, Maintenance & Consultancy',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:23:48',
                'updated_at' => '2022-12-21 10:23:48',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Computers - Software',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:05',
                'updated_at' => '2022-12-21 10:24:05',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Computers - Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:09',
                'updated_at' => '2022-12-21 10:24:09',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Concert Organizers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:15',
                'updated_at' => '2022-12-21 10:24:15',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Concrete',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:15',
                'updated_at' => '2022-12-21 10:24:15',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Condominiums & Boreys',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:19',
                'updated_at' => '2022-12-21 10:24:19',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Condoms',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:26',
                'updated_at' => '2022-12-21 10:24:26',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Confectionery & Candy - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:27',
                'updated_at' => '2022-12-21 10:24:27',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Conference Rooms & Organizers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:28',
                'updated_at' => '2022-12-21 10:24:28',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Construction - Contractors, Consultants & Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:24:30',
                'updated_at' => '2022-12-21 10:24:30',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Construction Equipment & Materials',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:25:09',
                'updated_at' => '2022-12-21 10:25:09',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Consumer Goods Wholesale & Distribution',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:02',
                'updated_at' => '2022-12-21 10:26:02',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Container Depot',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:04',
                'updated_at' => '2022-12-21 10:26:04',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Contractors - Piling',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:05',
                'updated_at' => '2022-12-21 10:26:05',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Contractors - Renovation',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:08',
                'updated_at' => '2022-12-21 10:26:08',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Contractors\' Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:09',
                'updated_at' => '2022-12-21 10:26:09',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Conveyor Equipment & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:10',
                'updated_at' => '2022-12-21 10:26:10',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Cookers & Kitchen Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:11',
                'updated_at' => '2022-12-21 10:26:11',
            ),
            162 => 
            array (
                'id' => 163,
            'name' => 'Cookies & Crackers (Biscuits)',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:17',
                'updated_at' => '2022-12-21 10:26:17',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Cooking School',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:19',
                'updated_at' => '2022-12-21 10:26:19',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Cooling Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:20',
                'updated_at' => '2022-12-21 10:26:20',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Cosmetic & Plastic Surgery',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:20',
                'updated_at' => '2022-12-21 10:26:20',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Cosmetics & Personal Care',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:22',
                'updated_at' => '2022-12-21 10:26:22',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Counselling Services - Psychologists & Psychiatrists',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:43',
                'updated_at' => '2022-12-21 10:26:43',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Courier Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:44',
                'updated_at' => '2022-12-21 10:26:44',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Cranes - Sales, Rental & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:49',
                'updated_at' => '2022-12-21 10:26:49',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Creperies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:50',
                'updated_at' => '2022-12-21 10:26:50',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Crocodiles Farming & Processing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:50',
                'updated_at' => '2022-12-21 10:26:50',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Cultural Organisations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:51',
                'updated_at' => '2022-12-21 10:26:51',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Curtains & Carpets - Interior Decoration',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:52',
                'updated_at' => '2022-12-21 10:26:52',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Customs House Brokers - Customs Clearance',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:26:57',
                'updated_at' => '2022-12-21 10:26:57',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Dairy Products - Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:27:01',
                'updated_at' => '2022-12-21 10:27:01',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Dancing Instruction',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:27:01',
                'updated_at' => '2022-12-21 10:27:01',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Dehumidifying Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:27:02',
                'updated_at' => '2022-12-21 10:27:02',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Delivery Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:27:03',
                'updated_at' => '2022-12-21 10:27:03',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Demining - Consultants, Equipment & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:27:03',
                'updated_at' => '2022-12-21 10:27:03',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Demolition Contractors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:27:05',
                'updated_at' => '2022-12-21 10:27:05',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Dental Clinics & Practitioners',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:06',
                'updated_at' => '2022-12-21 10:32:06',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Dermatologists',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:28',
                'updated_at' => '2022-12-21 10:32:28',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Development Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:30',
                'updated_at' => '2022-12-21 10:32:30',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Diabetes Specialist',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:32',
                'updated_at' => '2022-12-21 10:32:32',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Diamond - Wholesales & Retails',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:33',
                'updated_at' => '2022-12-21 10:32:33',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Diaries & Notebooks  - Wholesaler & Manufacturer',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:34',
                'updated_at' => '2022-12-21 10:32:34',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Digital Marketing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:35',
                'updated_at' => '2022-12-21 10:32:35',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Directories & Guides',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:36',
                'updated_at' => '2022-12-21 10:32:36',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Directory Assistance Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:37',
                'updated_at' => '2022-12-21 10:32:37',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Diving Instruction & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:37',
                'updated_at' => '2022-12-21 10:32:37',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Doors & Windows - Workshops & Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:38',
                'updated_at' => '2022-12-21 10:32:38',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Drainage Contractors & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:49',
                'updated_at' => '2022-12-21 10:32:49',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Dried & Smoked Fish Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:50',
                'updated_at' => '2022-12-21 10:32:50',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Drilling Rig Truck',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:51',
                'updated_at' => '2022-12-21 10:32:51',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Drink Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:32:51',
                'updated_at' => '2022-12-21 10:32:51',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Driving Schools & Instructors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:06',
                'updated_at' => '2022-12-21 10:38:06',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Drug Addict Information & Treatment Center',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:08',
                'updated_at' => '2022-12-21 10:38:08',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Duty Free Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:09',
                'updated_at' => '2022-12-21 10:38:09',
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'E-Commerce',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:10',
                'updated_at' => '2022-12-21 10:38:10',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Economic Analysis & Research',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:13',
                'updated_at' => '2022-12-21 10:38:13',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Editorial Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:14',
                'updated_at' => '2022-12-21 10:38:14',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Electric Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:38:15',
                'updated_at' => '2022-12-21 10:38:15',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Electric Household Appliances - Retail & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:43:31',
                'updated_at' => '2022-12-21 10:43:31',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Electric Panel Builders',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:48:35',
                'updated_at' => '2022-12-21 10:48:35',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Electric Poles',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:48:37',
                'updated_at' => '2022-12-21 10:48:37',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Electrical Works',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:48:37',
                'updated_at' => '2022-12-21 10:48:37',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Electricity Supplies - Power Plants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:48:42',
                'updated_at' => '2022-12-21 10:48:42',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Electronic Products - Retail & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:48:43',
                'updated_at' => '2022-12-21 10:48:43',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Elevators & Escalators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:48:58',
                'updated_at' => '2022-12-21 10:48:58',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Embassies, Consulates, Diplomatic Missions',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:00',
                'updated_at' => '2022-12-21 10:49:00',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Embroidery Machines',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:01',
                'updated_at' => '2022-12-21 10:49:01',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Embroidery Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:02',
                'updated_at' => '2022-12-21 10:49:02',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Emergency - Medical',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:03',
                'updated_at' => '2022-12-21 10:49:03',
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Employment Agencies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:04',
                'updated_at' => '2022-12-21 10:49:04',
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Engineering - Contractors & Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:11',
                'updated_at' => '2022-12-21 10:49:11',
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Engineering Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:22',
                'updated_at' => '2022-12-21 10:49:22',
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Engineers - Civil, Marine, etc',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:24',
                'updated_at' => '2022-12-21 10:49:24',
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Environmental Organizations & Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:26',
                'updated_at' => '2022-12-21 10:49:26',
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Evacuation & Repatriation - Medical',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:27',
                'updated_at' => '2022-12-21 10:49:27',
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Event Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:49:28',
                'updated_at' => '2022-12-21 10:49:28',
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Exhibitions & Conventions - Venues & Organizers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:54:33',
                'updated_at' => '2022-12-21 10:54:33',
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Exporters',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:54:34',
                'updated_at' => '2022-12-21 10:54:34',
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Family Planning Information & Service Centers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:08',
                'updated_at' => '2022-12-21 10:55:08',
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'Farms & Agro-businesses',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:09',
                'updated_at' => '2022-12-21 10:55:09',
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'Fast Food',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:13',
                'updated_at' => '2022-12-21 10:55:13',
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'Fence Materials',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:17',
                'updated_at' => '2022-12-21 10:55:17',
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Fencing Sports',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:18',
                'updated_at' => '2022-12-21 10:55:18',
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Feng Shui',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:18',
                'updated_at' => '2022-12-21 10:55:18',
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Fertilizers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:19',
                'updated_at' => '2022-12-21 10:55:19',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Fiberglass Materials',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:22',
                'updated_at' => '2022-12-21 10:55:22',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Filipino Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:23',
                'updated_at' => '2022-12-21 10:55:23',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Fingerprinting Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:23',
                'updated_at' => '2022-12-21 10:55:23',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Fireworks',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:25',
                'updated_at' => '2022-12-21 10:55:25',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Fish Farming, Processing & Fishery',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:25',
                'updated_at' => '2022-12-21 10:55:25',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Fishing Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:26',
                'updated_at' => '2022-12-21 10:55:26',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Fitness Centres',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:27',
                'updated_at' => '2022-12-21 10:55:27',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Flavors & Fragrant',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:31',
                'updated_at' => '2022-12-21 10:55:31',
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'Floor Materials - Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:32',
                'updated_at' => '2022-12-21 10:55:32',
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Flour - Mills, Manufacturers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:33',
                'updated_at' => '2022-12-21 10:55:33',
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Flower Vases & Pots - Wholesalers & Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:34',
                'updated_at' => '2022-12-21 10:55:34',
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Flowers & Plants - Delivery, Retail & Wholesale',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:35',
                'updated_at' => '2022-12-21 10:55:35',
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Food Chemicals',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:44',
                'updated_at' => '2022-12-21 10:55:44',
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Food Delivery & Menus',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:44',
                'updated_at' => '2022-12-21 10:55:44',
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'Food Products, Processing & Suppliers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:49',
                'updated_at' => '2022-12-21 10:55:49',
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Football & Volleyball - Fields & Clubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:55:59',
                'updated_at' => '2022-12-21 10:55:59',
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'Footwear & Accessories - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:01',
                'updated_at' => '2022-12-21 10:56:01',
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'Footwear - Retailers & Custom Made',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:05',
                'updated_at' => '2022-12-21 10:56:05',
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'Footwear Materials & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:11',
                'updated_at' => '2022-12-21 10:56:11',
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'Forestry - Consultants & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:11',
                'updated_at' => '2022-12-21 10:56:11',
            ),
            250 => 
            array (
                'id' => 251,
                'name' => 'Fork Lift & Truck Lift - Dealers & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:12',
                'updated_at' => '2022-12-21 10:56:12',
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'Foundations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:14',
                'updated_at' => '2022-12-21 10:56:14',
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'Frames - Retail & Customised',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:14',
                'updated_at' => '2022-12-21 10:56:14',
            ),
            253 => 
            array (
                'id' => 254,
                'name' => 'Freight Forwarding, Cargo, Transport',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:16',
                'updated_at' => '2022-12-21 10:56:16',
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'French Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:35',
                'updated_at' => '2022-12-21 10:56:35',
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'Fruit Juices - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:39',
                'updated_at' => '2022-12-21 10:56:39',
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'Fruits - Retailers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:41',
                'updated_at' => '2022-12-21 10:56:41',
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'Fuel & Oil Filters',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:43',
                'updated_at' => '2022-12-21 10:56:43',
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'Funeral Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:44',
                'updated_at' => '2022-12-21 10:56:44',
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'Furniture',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:56:44',
                'updated_at' => '2022-12-21 10:56:44',
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'Furniture - Manufacturers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:03',
                'updated_at' => '2022-12-21 10:57:03',
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'Galvanized Services - Jewelry',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:08',
                'updated_at' => '2022-12-21 10:57:08',
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'Game & Video Game - Entertainment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:08',
                'updated_at' => '2022-12-21 10:57:08',
            ),
            263 => 
            array (
                'id' => 264,
                'name' => 'Garment & Textiles - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:10',
                'updated_at' => '2022-12-21 10:57:10',
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'Garment - Industrial Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:33',
                'updated_at' => '2022-12-21 10:57:33',
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'Gas Appliances & Bottled Gas Refill & Delivery',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:34',
                'updated_at' => '2022-12-21 10:57:34',
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'Gasoline Service Stations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:40',
                'updated_at' => '2022-12-21 10:57:40',
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'Generators - Supplies, Rental, Spare Parts & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:44',
                'updated_at' => '2022-12-21 10:57:44',
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'Geographical Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:49',
                'updated_at' => '2022-12-21 10:57:49',
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'German Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:50',
                'updated_at' => '2022-12-21 10:57:50',
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'Glass - Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:50',
                'updated_at' => '2022-12-21 10:57:50',
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'Glass Cutting & Workshops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:51',
                'updated_at' => '2022-12-21 10:57:51',
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'Glassware - Retailers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:57:59',
                'updated_at' => '2022-12-21 10:57:59',
            ),
            273 => 
            array (
                'id' => 274,
                'name' => 'Glassware Decorators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:00',
                'updated_at' => '2022-12-21 10:58:00',
            ),
            274 => 
            array (
                'id' => 275,
                'name' => 'Go-Karting',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:01',
                'updated_at' => '2022-12-21 10:58:01',
            ),
            275 => 
            array (
                'id' => 276,
                'name' => 'Golf Clubs & Driving Ranges',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:02',
                'updated_at' => '2022-12-21 10:58:02',
            ),
            276 => 
            array (
                'id' => 277,
                'name' => 'Golf Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:04',
                'updated_at' => '2022-12-21 10:58:04',
            ),
            277 => 
            array (
                'id' => 278,
                'name' => 'Greek Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:04',
                'updated_at' => '2022-12-21 10:58:04',
            ),
            278 => 
            array (
                'id' => 279,
                'name' => 'Green Tea & Bubble Tea',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:05',
                'updated_at' => '2022-12-21 10:58:05',
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'Grinding Machines & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:11',
                'updated_at' => '2022-12-21 10:58:11',
            ),
            280 => 
            array (
                'id' => 281,
                'name' => 'Guesthouses',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:58:12',
                'updated_at' => '2022-12-21 10:58:12',
            ),
            281 => 
            array (
                'id' => 282,
                'name' => 'Gynaecologists',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:00',
                'updated_at' => '2022-12-21 10:59:00',
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'Gypsum Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:01',
                'updated_at' => '2022-12-21 10:59:01',
            ),
            283 => 
            array (
                'id' => 284,
                'name' => 'Halal Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:04',
                'updated_at' => '2022-12-21 10:59:04',
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'Hammock Leisure',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:05',
                'updated_at' => '2022-12-21 10:59:05',
            ),
            285 => 
            array (
                'id' => 286,
                'name' => 'Handicrafts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:06',
                'updated_at' => '2022-12-21 10:59:06',
            ),
            286 => 
            array (
                'id' => 287,
                'name' => 'Hardware - MFRS',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:11',
                'updated_at' => '2022-12-21 10:59:11',
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'Hardware Stores',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:11',
                'updated_at' => '2022-12-21 10:59:11',
            ),
            288 => 
            array (
                'id' => 289,
                'name' => 'Health Care Products & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:12',
                'updated_at' => '2022-12-21 10:59:12',
            ),
            289 => 
            array (
                'id' => 290,
                'name' => 'Health Education Centres',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:19',
                'updated_at' => '2022-12-21 10:59:19',
            ),
            290 => 
            array (
                'id' => 291,
                'name' => 'Heavy Equipment Services & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:21',
                'updated_at' => '2022-12-21 10:59:21',
            ),
            291 => 
            array (
                'id' => 292,
                'name' => 'Helmets - Retailers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:24',
                'updated_at' => '2022-12-21 10:59:24',
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'Home Textile Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:25',
                'updated_at' => '2022-12-21 10:59:25',
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'Horseback Riding Instruction & Rental',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:25',
                'updated_at' => '2022-12-21 10:59:25',
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'Hoses - Industrial',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:26',
                'updated_at' => '2022-12-21 10:59:26',
            ),
            295 => 
            array (
                'id' => 296,
                'name' => 'Hospitals - Private',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:27',
                'updated_at' => '2022-12-21 10:59:27',
            ),
            296 => 
            array (
                'id' => 297,
                'name' => 'Hospitals - Public',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:29',
                'updated_at' => '2022-12-21 10:59:29',
            ),
            297 => 
            array (
                'id' => 298,
                'name' => 'Hotel & Motel Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:32',
                'updated_at' => '2022-12-21 10:59:32',
            ),
            298 => 
            array (
                'id' => 299,
                'name' => 'Hotels',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 10:59:34',
                'updated_at' => '2022-12-21 10:59:34',
            ),
            299 => 
            array (
                'id' => 300,
                'name' => 'Housewares & Household Products - Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:13',
                'updated_at' => '2022-12-21 11:00:13',
            ),
            300 => 
            array (
                'id' => 301,
                'name' => 'Hydraulic Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:14',
                'updated_at' => '2022-12-21 11:00:14',
            ),
            301 => 
            array (
                'id' => 302,
                'name' => 'Hydropower & Hydrology',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:15',
                'updated_at' => '2022-12-21 11:00:15',
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'Ice Cream',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:15',
                'updated_at' => '2022-12-21 11:00:15',
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'Ice Cream Parlours',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:19',
                'updated_at' => '2022-12-21 11:00:19',
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'Ice Making & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:21',
                'updated_at' => '2022-12-21 11:00:21',
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'Identification Services & Cards',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:22',
                'updated_at' => '2022-12-21 11:00:22',
            ),
            306 => 
            array (
                'id' => 307,
                'name' => 'Immigration & Naturalization Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:23',
                'updated_at' => '2022-12-21 11:00:23',
            ),
            307 => 
            array (
                'id' => 308,
                'name' => 'Importers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:23',
                'updated_at' => '2022-12-21 11:00:23',
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'Indian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:50',
                'updated_at' => '2022-12-21 11:00:50',
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'Indonesian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:52',
                'updated_at' => '2022-12-21 11:00:52',
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'Industrial Equipment Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:53',
                'updated_at' => '2022-12-21 11:00:53',
            ),
            311 => 
            array (
                'id' => 312,
                'name' => 'Industrial Parks',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:55',
                'updated_at' => '2022-12-21 11:00:55',
            ),
            312 => 
            array (
                'id' => 313,
                'name' => 'Information Technology Consultant & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:00:56',
                'updated_at' => '2022-12-21 11:00:56',
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'Inspection, Testing & Evaluation Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:01:04',
                'updated_at' => '2022-12-21 11:01:04',
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'Insulation Contractors & Materials',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:01:05',
                'updated_at' => '2022-12-21 11:01:05',
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'Insulation Materials - Electric',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:01:05',
                'updated_at' => '2022-12-21 11:01:05',
            ),
            316 => 
            array (
                'id' => 317,
                'name' => 'Insurance Companies, Brokers & Agents',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:01:06',
                'updated_at' => '2022-12-21 11:01:06',
            ),
            317 => 
            array (
                'id' => 318,
                'name' => 'Interior & Exterior Decorator, Designer Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:01:09',
                'updated_at' => '2022-12-21 11:01:09',
            ),
            318 => 
            array (
                'id' => 319,
                'name' => 'Internet Café',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:30',
                'updated_at' => '2022-12-21 11:06:30',
            ),
            319 => 
            array (
                'id' => 320,
            'name' => 'Internet Service Providers (ISPs)',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:33',
                'updated_at' => '2022-12-21 11:06:33',
            ),
            320 => 
            array (
                'id' => 321,
                'name' => 'Inventory Control Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:38',
                'updated_at' => '2022-12-21 11:06:38',
            ),
            321 => 
            array (
                'id' => 322,
                'name' => 'Investment Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:39',
                'updated_at' => '2022-12-21 11:06:39',
            ),
            322 => 
            array (
                'id' => 323,
                'name' => 'Investment Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:45',
                'updated_at' => '2022-12-21 11:06:45',
            ),
            323 => 
            array (
                'id' => 324,
                'name' => 'Iron Works',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:48',
                'updated_at' => '2022-12-21 11:06:48',
            ),
            324 => 
            array (
                'id' => 325,
                'name' => 'Irrigation Equipment, Systems & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:49',
                'updated_at' => '2022-12-21 11:06:49',
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'Italian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:50',
                'updated_at' => '2022-12-21 11:06:50',
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'Japanese Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:52',
                'updated_at' => '2022-12-21 11:06:52',
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'Jatropha Plantations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:58',
                'updated_at' => '2022-12-21 11:06:58',
            ),
            328 => 
            array (
                'id' => 329,
                'name' => 'Jewelry, Gold & Silver - Retailers, Brokers, Designers, etc.',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:06:59',
                'updated_at' => '2022-12-21 11:06:59',
            ),
            329 => 
            array (
                'id' => 330,
                'name' => 'Karaoke Clubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:07:11',
                'updated_at' => '2022-12-21 11:07:11',
            ),
            330 => 
            array (
                'id' => 331,
                'name' => 'Karaoke Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:07:15',
                'updated_at' => '2022-12-21 11:07:15',
            ),
            331 => 
            array (
                'id' => 332,
                'name' => 'Kerosene',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:07:17',
                'updated_at' => '2022-12-21 11:07:17',
            ),
            332 => 
            array (
                'id' => 333,
            'name' => 'Khmer Cake (Num Khmer)',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:07:18',
                'updated_at' => '2022-12-21 11:07:18',
            ),
            333 => 
            array (
                'id' => 334,
                'name' => 'Khmer Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:07:19',
                'updated_at' => '2022-12-21 11:07:19',
            ),
            334 => 
            array (
                'id' => 335,
                'name' => 'Kindergartens',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:15',
                'updated_at' => '2022-12-21 11:08:15',
            ),
            335 => 
            array (
                'id' => 336,
                'name' => 'Knives - Manufacturers & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:28',
                'updated_at' => '2022-12-21 11:08:28',
            ),
            336 => 
            array (
                'id' => 337,
                'name' => 'Korean Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:29',
                'updated_at' => '2022-12-21 11:08:29',
            ),
            337 => 
            array (
                'id' => 338,
                'name' => 'Laboratories - Medical',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:32',
                'updated_at' => '2022-12-21 11:08:32',
            ),
            338 => 
            array (
                'id' => 339,
                'name' => 'Laboratory Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:34',
                'updated_at' => '2022-12-21 11:08:34',
            ),
            339 => 
            array (
                'id' => 340,
                'name' => 'Labour Contractors - Employment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:35',
                'updated_at' => '2022-12-21 11:08:35',
            ),
            340 => 
            array (
                'id' => 341,
                'name' => 'Labour Organisations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:36',
                'updated_at' => '2022-12-21 11:08:36',
            ),
            341 => 
            array (
                'id' => 342,
                'name' => 'Ladder Manufacturers & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:36',
                'updated_at' => '2022-12-21 11:08:36',
            ),
            342 => 
            array (
                'id' => 343,
                'name' => 'Land Surveyors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:37',
                'updated_at' => '2022-12-21 11:08:37',
            ),
            343 => 
            array (
                'id' => 344,
                'name' => 'Landscape Gardens & Maintenance Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:38',
                'updated_at' => '2022-12-21 11:08:38',
            ),
            344 => 
            array (
                'id' => 345,
                'name' => 'Lathe Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:44',
                'updated_at' => '2022-12-21 11:08:44',
            ),
            345 => 
            array (
                'id' => 346,
                'name' => 'Laundry & Dry Cleaners',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:46',
                'updated_at' => '2022-12-21 11:08:46',
            ),
            346 => 
            array (
                'id' => 347,
                'name' => 'Lawn Mower Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:51',
                'updated_at' => '2022-12-21 11:08:51',
            ),
            347 => 
            array (
                'id' => 348,
                'name' => 'Leather Goods',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:52',
                'updated_at' => '2022-12-21 11:08:52',
            ),
            348 => 
            array (
                'id' => 349,
                'name' => 'Lebanese Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:53',
                'updated_at' => '2022-12-21 11:08:53',
            ),
            349 => 
            array (
                'id' => 350,
                'name' => 'Legal Advisers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:08:53',
                'updated_at' => '2022-12-21 11:08:53',
            ),
            350 => 
            array (
                'id' => 351,
                'name' => 'Lenses - Optical',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:01',
                'updated_at' => '2022-12-21 11:09:01',
            ),
            351 => 
            array (
                'id' => 352,
                'name' => 'Libraries',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:04',
                'updated_at' => '2022-12-21 11:09:04',
            ),
            352 => 
            array (
                'id' => 353,
                'name' => 'Lighting Fixtures & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:05',
                'updated_at' => '2022-12-21 11:09:05',
            ),
            353 => 
            array (
                'id' => 354,
                'name' => 'Lightning Protection Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:09',
                'updated_at' => '2022-12-21 11:09:09',
            ),
            354 => 
            array (
                'id' => 355,
                'name' => 'Limousine Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:11',
                'updated_at' => '2022-12-21 11:09:11',
            ),
            355 => 
            array (
                'id' => 356,
                'name' => 'Lingerie & Underwears - Wholesales & Retails',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:12',
                'updated_at' => '2022-12-21 11:09:12',
            ),
            356 => 
            array (
                'id' => 357,
                'name' => 'Loan Brokerage',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:12',
                'updated_at' => '2022-12-21 11:09:12',
            ),
            357 => 
            array (
                'id' => 358,
                'name' => 'Locks & Locksmiths',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:14',
                'updated_at' => '2022-12-21 11:09:14',
            ),
            358 => 
            array (
                'id' => 359,
                'name' => 'Logging Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:16',
                'updated_at' => '2022-12-21 11:09:16',
            ),
            359 => 
            array (
                'id' => 360,
                'name' => 'Logistics Support',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:17',
                'updated_at' => '2022-12-21 11:09:17',
            ),
            360 => 
            array (
                'id' => 361,
                'name' => 'Lottery Ticket Agents & Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:25',
                'updated_at' => '2022-12-21 11:09:25',
            ),
            361 => 
            array (
                'id' => 362,
                'name' => 'LPG Engineering Contractors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:26',
                'updated_at' => '2022-12-21 11:09:26',
            ),
            362 => 
            array (
                'id' => 363,
                'name' => 'Lubricants & Oils',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:27',
                'updated_at' => '2022-12-21 11:09:27',
            ),
            363 => 
            array (
                'id' => 364,
                'name' => 'Machinery  & Machine Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:32',
                'updated_at' => '2022-12-21 11:09:32',
            ),
            364 => 
            array (
                'id' => 365,
                'name' => 'Machinery Parts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:37',
                'updated_at' => '2022-12-21 11:09:37',
            ),
            365 => 
            array (
                'id' => 366,
                'name' => 'Magazines & Periodicals - Publishers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:40',
                'updated_at' => '2022-12-21 11:09:40',
            ),
            366 => 
            array (
                'id' => 367,
                'name' => 'Magicians & Circus',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:42',
                'updated_at' => '2022-12-21 11:09:42',
            ),
            367 => 
            array (
                'id' => 368,
                'name' => 'Maintenance - General, Building, Electrical, Plumbing, Cleaning, etc.',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:43',
                'updated_at' => '2022-12-21 11:09:43',
            ),
            368 => 
            array (
                'id' => 369,
                'name' => 'Malaysian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:50',
                'updated_at' => '2022-12-21 11:09:50',
            ),
            369 => 
            array (
                'id' => 370,
                'name' => 'Management Training',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:51',
                'updated_at' => '2022-12-21 11:09:51',
            ),
            370 => 
            array (
                'id' => 371,
                'name' => 'Mannequin Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:52',
                'updated_at' => '2022-12-21 11:09:52',
            ),
            371 => 
            array (
                'id' => 372,
                'name' => 'Maps & Mapping',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:53',
                'updated_at' => '2022-12-21 11:09:53',
            ),
            372 => 
            array (
                'id' => 373,
                'name' => 'Marbles & Granites',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:54',
                'updated_at' => '2022-12-21 11:09:54',
            ),
            373 => 
            array (
                'id' => 374,
                'name' => 'Marine Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:56',
                'updated_at' => '2022-12-21 11:09:56',
            ),
            374 => 
            array (
                'id' => 375,
                'name' => 'Marine Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:56',
                'updated_at' => '2022-12-21 11:09:56',
            ),
            375 => 
            array (
                'id' => 376,
                'name' => 'Marketing Consultants, Research, Analysis & Intelligence',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:09:57',
                'updated_at' => '2022-12-21 11:09:57',
            ),
            376 => 
            array (
                'id' => 377,
                'name' => 'Markets - Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:01',
                'updated_at' => '2022-12-21 11:10:01',
            ),
            377 => 
            array (
                'id' => 378,
                'name' => 'Marking & Coding Equipment Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:03',
                'updated_at' => '2022-12-21 11:10:03',
            ),
            378 => 
            array (
                'id' => 379,
                'name' => 'Mask Dealers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:03',
                'updated_at' => '2022-12-21 11:10:03',
            ),
            379 => 
            array (
                'id' => 380,
                'name' => 'Massage Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:04',
                'updated_at' => '2022-12-21 11:10:04',
            ),
            380 => 
            array (
                'id' => 381,
                'name' => 'Massages',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:05',
                'updated_at' => '2022-12-21 11:10:05',
            ),
            381 => 
            array (
                'id' => 382,
                'name' => 'Matches',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:19',
                'updated_at' => '2022-12-21 11:10:19',
            ),
            382 => 
            array (
                'id' => 383,
                'name' => 'Material Handling Equipment - Sales & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:20',
                'updated_at' => '2022-12-21 11:10:20',
            ),
            383 => 
            array (
                'id' => 384,
                'name' => 'Maternity',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:20',
                'updated_at' => '2022-12-21 11:10:20',
            ),
            384 => 
            array (
                'id' => 385,
                'name' => 'Mattresses - Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:23',
                'updated_at' => '2022-12-21 11:10:23',
            ),
            385 => 
            array (
                'id' => 386,
                'name' => 'Measuring Machines & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:27',
                'updated_at' => '2022-12-21 11:10:27',
            ),
            386 => 
            array (
                'id' => 387,
                'name' => 'Meat Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:28',
                'updated_at' => '2022-12-21 11:10:28',
            ),
            387 => 
            array (
                'id' => 388,
                'name' => 'Mechanical Contractors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:30',
                'updated_at' => '2022-12-21 11:10:30',
            ),
            388 => 
            array (
                'id' => 389,
                'name' => 'Mediation Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:31',
                'updated_at' => '2022-12-21 11:10:31',
            ),
            389 => 
            array (
                'id' => 390,
                'name' => 'Medical Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:31',
                'updated_at' => '2022-12-21 11:10:31',
            ),
            390 => 
            array (
                'id' => 391,
                'name' => 'Meditation, Yoga & Energy Healing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:36',
                'updated_at' => '2022-12-21 11:10:36',
            ),
            391 => 
            array (
                'id' => 392,
                'name' => 'Mediterranean Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:37',
                'updated_at' => '2022-12-21 11:10:37',
            ),
            392 => 
            array (
                'id' => 393,
                'name' => 'Metal Products & Works',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:38',
                'updated_at' => '2022-12-21 11:10:38',
            ),
            393 => 
            array (
                'id' => 394,
                'name' => 'Mexican Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:47',
                'updated_at' => '2022-12-21 11:10:47',
            ),
            394 => 
            array (
                'id' => 395,
                'name' => 'Midnight Snack',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:48',
                'updated_at' => '2022-12-21 11:10:48',
            ),
            395 => 
            array (
                'id' => 396,
                'name' => 'Milk & Milk Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:48',
                'updated_at' => '2022-12-21 11:10:48',
            ),
            396 => 
            array (
                'id' => 397,
                'name' => 'Mineral Exploration',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:50',
                'updated_at' => '2022-12-21 11:10:50',
            ),
            397 => 
            array (
                'id' => 398,
                'name' => 'Mining Quarrying Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:51',
                'updated_at' => '2022-12-21 11:10:51',
            ),
            398 => 
            array (
                'id' => 399,
                'name' => 'Ministries & Governmental Entities',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:10:52',
                'updated_at' => '2022-12-21 11:10:52',
            ),
            399 => 
            array (
                'id' => 400,
                'name' => 'Mirrors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:11:18',
                'updated_at' => '2022-12-21 11:11:18',
            ),
            400 => 
            array (
                'id' => 401,
            'name' => 'Mobile (Cellular) Telephone Services & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:11:19',
                'updated_at' => '2022-12-21 11:11:19',
            ),
            401 => 
            array (
                'id' => 402,
                'name' => 'Mobile Accessories & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:11:55',
                'updated_at' => '2022-12-21 11:11:55',
            ),
            402 => 
            array (
                'id' => 403,
                'name' => 'Mobile Entertainment & Installation',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:11:57',
                'updated_at' => '2022-12-21 11:11:57',
            ),
            403 => 
            array (
                'id' => 404,
                'name' => 'Modelling Agencies & Schools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:11:59',
                'updated_at' => '2022-12-21 11:11:59',
            ),
            404 => 
            array (
                'id' => 405,
                'name' => 'Money Exchange',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:00',
                'updated_at' => '2022-12-21 11:12:00',
            ),
            405 => 
            array (
                'id' => 406,
                'name' => 'Mosques',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:06',
                'updated_at' => '2022-12-21 11:12:06',
            ),
            406 => 
            array (
                'id' => 407,
                'name' => 'Motorcycles - Repairing & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:07',
                'updated_at' => '2022-12-21 11:12:07',
            ),
            407 => 
            array (
                'id' => 408,
                'name' => 'Motorcycles - Sales',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:10',
                'updated_at' => '2022-12-21 11:12:10',
            ),
            408 => 
            array (
                'id' => 409,
                'name' => 'Motorcycles - Spare Parts & Accessories',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:17',
                'updated_at' => '2022-12-21 11:12:17',
            ),
            409 => 
            array (
                'id' => 410,
                'name' => 'Motorcycles - Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:22',
                'updated_at' => '2022-12-21 11:12:22',
            ),
            410 => 
            array (
                'id' => 411,
                'name' => 'Mould Manufacturers & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:24',
                'updated_at' => '2022-12-21 11:12:24',
            ),
            411 => 
            array (
                'id' => 412,
                'name' => 'Movers & Storage Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:24',
                'updated_at' => '2022-12-21 11:12:24',
            ),
            412 => 
            array (
                'id' => 413,
                'name' => 'Museum',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:26',
                'updated_at' => '2022-12-21 11:12:26',
            ),
            413 => 
            array (
                'id' => 414,
                'name' => 'Music Band Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:26',
                'updated_at' => '2022-12-21 11:12:26',
            ),
            414 => 
            array (
                'id' => 415,
                'name' => 'Music Instruction',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:28',
                'updated_at' => '2022-12-21 11:12:28',
            ),
            415 => 
            array (
                'id' => 416,
                'name' => 'Musical Instruments & Music Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:29',
                'updated_at' => '2022-12-21 11:12:29',
            ),
            416 => 
            array (
                'id' => 417,
                'name' => 'Myanmar Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:30',
                'updated_at' => '2022-12-21 11:12:30',
            ),
            417 => 
            array (
                'id' => 418,
                'name' => 'Neon Signs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:31',
                'updated_at' => '2022-12-21 11:12:31',
            ),
            418 => 
            array (
                'id' => 419,
                'name' => 'Nepalese Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:32',
                'updated_at' => '2022-12-21 11:12:32',
            ),
            419 => 
            array (
                'id' => 420,
                'name' => 'News Agencies, Bureaus & Information Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:32',
                'updated_at' => '2022-12-21 11:12:32',
            ),
            420 => 
            array (
                'id' => 421,
                'name' => 'Newspapers & Periodicals - Publishers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:33',
                'updated_at' => '2022-12-21 11:12:33',
            ),
            421 => 
            array (
                'id' => 422,
                'name' => 'Newspapers, Magazines & Books Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:35',
                'updated_at' => '2022-12-21 11:12:35',
            ),
            422 => 
            array (
                'id' => 423,
                'name' => 'Night Clubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:38',
                'updated_at' => '2022-12-21 11:12:38',
            ),
            423 => 
            array (
                'id' => 424,
                'name' => 'Occupational Safety & Health',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:41',
                'updated_at' => '2022-12-21 11:12:41',
            ),
            424 => 
            array (
                'id' => 425,
                'name' => 'Office Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:41',
                'updated_at' => '2022-12-21 11:12:41',
            ),
            425 => 
            array (
                'id' => 426,
                'name' => 'Office Furniture',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:44',
                'updated_at' => '2022-12-21 11:12:44',
            ),
            426 => 
            array (
                'id' => 427,
                'name' => 'Office Rental Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:47',
                'updated_at' => '2022-12-21 11:12:47',
            ),
            427 => 
            array (
                'id' => 428,
                'name' => 'Oil Exploration - Consultation & Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:49',
                'updated_at' => '2022-12-21 11:12:49',
            ),
            428 => 
            array (
                'id' => 429,
                'name' => 'Online Entertainment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:49',
                'updated_at' => '2022-12-21 11:12:49',
            ),
            429 => 
            array (
                'id' => 430,
                'name' => 'Ophthalmologists',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:50',
                'updated_at' => '2022-12-21 11:12:50',
            ),
            430 => 
            array (
                'id' => 431,
                'name' => 'Opticians & Optical Goods',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:52',
                'updated_at' => '2022-12-21 11:12:52',
            ),
            431 => 
            array (
                'id' => 432,
                'name' => 'Organic Food',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:57',
                'updated_at' => '2022-12-21 11:12:57',
            ),
            432 => 
            array (
                'id' => 433,
                'name' => 'Orphanages',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:12:59',
                'updated_at' => '2022-12-21 11:12:59',
            ),
            433 => 
            array (
                'id' => 434,
                'name' => 'Outsourcing Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:00',
                'updated_at' => '2022-12-21 11:13:00',
            ),
            434 => 
            array (
                'id' => 435,
                'name' => 'Overseas Education Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:01',
                'updated_at' => '2022-12-21 11:13:01',
            ),
            435 => 
            array (
                'id' => 436,
                'name' => 'Oxygen',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:03',
                'updated_at' => '2022-12-21 11:13:03',
            ),
            436 => 
            array (
                'id' => 437,
                'name' => 'Packaging - Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:04',
                'updated_at' => '2022-12-21 11:13:04',
            ),
            437 => 
            array (
                'id' => 438,
                'name' => 'Packaging, Box Supplies & Manufacturing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:05',
                'updated_at' => '2022-12-21 11:13:05',
            ),
            438 => 
            array (
                'id' => 439,
                'name' => 'Packing Machines',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:07',
                'updated_at' => '2022-12-21 11:13:07',
            ),
            439 => 
            array (
                'id' => 440,
                'name' => 'Pagodas',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:08',
                'updated_at' => '2022-12-21 11:13:08',
            ),
            440 => 
            array (
                'id' => 441,
                'name' => 'Paint - Automobile',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:09',
                'updated_at' => '2022-12-21 11:13:09',
            ),
            441 => 
            array (
                'id' => 442,
                'name' => 'Paint - Dealers & Contractors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:11',
                'updated_at' => '2022-12-21 11:13:11',
            ),
            442 => 
            array (
                'id' => 443,
                'name' => 'Paintball & Laser Sports',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:16',
                'updated_at' => '2022-12-21 11:13:16',
            ),
            443 => 
            array (
                'id' => 444,
                'name' => 'Painter Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:16',
                'updated_at' => '2022-12-21 11:13:16',
            ),
            444 => 
            array (
                'id' => 445,
                'name' => 'Pakistani Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:17',
                'updated_at' => '2022-12-21 11:13:17',
            ),
            445 => 
            array (
                'id' => 446,
                'name' => 'Pallets',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:17',
                'updated_at' => '2022-12-21 11:13:17',
            ),
            446 => 
            array (
                'id' => 447,
                'name' => 'Paper Distributors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:18',
                'updated_at' => '2022-12-21 11:13:18',
            ),
            447 => 
            array (
                'id' => 448,
                'name' => 'Parachute Schools & Instruction',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:20',
                'updated_at' => '2022-12-21 11:13:20',
            ),
            448 => 
            array (
                'id' => 449,
                'name' => 'Parasols & Umbrellas',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:20',
                'updated_at' => '2022-12-21 11:13:20',
            ),
            449 => 
            array (
                'id' => 450,
                'name' => 'Parking Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:21',
                'updated_at' => '2022-12-21 11:13:21',
            ),
            450 => 
            array (
                'id' => 451,
                'name' => 'Party Organizers - Ceremony Arrangements, etc.',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:22',
                'updated_at' => '2022-12-21 11:13:22',
            ),
            451 => 
            array (
                'id' => 452,
                'name' => 'Patent Registration Agents',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:23',
                'updated_at' => '2022-12-21 11:13:23',
            ),
            452 => 
            array (
                'id' => 453,
                'name' => 'Pawnbrokers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:24',
                'updated_at' => '2022-12-21 11:13:24',
            ),
            453 => 
            array (
                'id' => 454,
                'name' => 'Pediatricians',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:27',
                'updated_at' => '2022-12-21 11:13:27',
            ),
            454 => 
            array (
                'id' => 455,
                'name' => 'Pens - Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:28',
                'updated_at' => '2022-12-21 11:13:28',
            ),
            455 => 
            array (
                'id' => 456,
                'name' => 'Perfumes - Shopping',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:29',
                'updated_at' => '2022-12-21 11:13:29',
            ),
            456 => 
            array (
                'id' => 457,
                'name' => 'Pest Control Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:31',
                'updated_at' => '2022-12-21 11:13:31',
            ),
            457 => 
            array (
                'id' => 458,
                'name' => 'Pest Control Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:32',
                'updated_at' => '2022-12-21 11:13:32',
            ),
            458 => 
            array (
                'id' => 459,
                'name' => 'Pet & Animal Food',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:36',
                'updated_at' => '2022-12-21 11:13:36',
            ),
            459 => 
            array (
                'id' => 460,
                'name' => 'Pet Grooming & Washing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:38',
                'updated_at' => '2022-12-21 11:13:38',
            ),
            460 => 
            array (
                'id' => 461,
                'name' => 'Petroleum Companies & Distributors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:39',
                'updated_at' => '2022-12-21 11:13:39',
            ),
            461 => 
            array (
                'id' => 462,
                'name' => 'Petroleum Equipment & Spare Parts Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:42',
                'updated_at' => '2022-12-21 11:13:42',
            ),
            462 => 
            array (
                'id' => 463,
                'name' => 'Petroleum Tanks',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:43',
                'updated_at' => '2022-12-21 11:13:43',
            ),
            463 => 
            array (
                'id' => 464,
                'name' => 'Pharmaceutical Companies & Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:43',
                'updated_at' => '2022-12-21 11:13:43',
            ),
            464 => 
            array (
                'id' => 465,
                'name' => 'Pharmacies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:13:49',
                'updated_at' => '2022-12-21 11:13:49',
            ),
            465 => 
            array (
                'id' => 466,
                'name' => 'Phone Boxes & Phone Card Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:08',
                'updated_at' => '2022-12-21 11:14:08',
            ),
            466 => 
            array (
                'id' => 467,
                'name' => 'Photo Processing Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:10',
                'updated_at' => '2022-12-21 11:14:10',
            ),
            467 => 
            array (
                'id' => 468,
                'name' => 'Photocopying & Duplicating Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:12',
                'updated_at' => '2022-12-21 11:14:12',
            ),
            468 => 
            array (
                'id' => 469,
                'name' => 'Photocopying Machines - Retail & Servicing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:18',
                'updated_at' => '2022-12-21 11:14:18',
            ),
            469 => 
            array (
                'id' => 470,
                'name' => 'Photographers - Photo Shops & Studio Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:20',
                'updated_at' => '2022-12-21 11:14:20',
            ),
            470 => 
            array (
                'id' => 471,
                'name' => 'Photographers, Video - Wedding & Parties',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:29',
                'updated_at' => '2022-12-21 11:14:29',
            ),
            471 => 
            array (
                'id' => 472,
                'name' => 'Physicians & Surgeons',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:31',
                'updated_at' => '2022-12-21 11:14:31',
            ),
            472 => 
            array (
                'id' => 473,
                'name' => 'Physiotherapists',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:32',
                'updated_at' => '2022-12-21 11:14:32',
            ),
            473 => 
            array (
                'id' => 474,
                'name' => 'Pipes & Fittings',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:33',
                'updated_at' => '2022-12-21 11:14:33',
            ),
            474 => 
            array (
                'id' => 475,
                'name' => 'Pizzerias',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:37',
                'updated_at' => '2022-12-21 11:14:37',
            ),
            475 => 
            array (
                'id' => 476,
                'name' => 'Planning Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:41',
                'updated_at' => '2022-12-21 11:14:41',
            ),
            476 => 
            array (
                'id' => 477,
                'name' => 'Plastic Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:41',
                'updated_at' => '2022-12-21 11:14:41',
            ),
            477 => 
            array (
                'id' => 478,
                'name' => 'Playground Equipment Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:45',
                'updated_at' => '2022-12-21 11:14:45',
            ),
            478 => 
            array (
                'id' => 479,
                'name' => 'Playground Parks',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:45',
                'updated_at' => '2022-12-21 11:14:45',
            ),
            479 => 
            array (
                'id' => 480,
                'name' => 'Plotting Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:46',
                'updated_at' => '2022-12-21 11:14:46',
            ),
            480 => 
            array (
                'id' => 481,
                'name' => 'Plywood & Veneer Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:47',
                'updated_at' => '2022-12-21 11:14:47',
            ),
            481 => 
            array (
                'id' => 482,
                'name' => 'Political Parties',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:48',
                'updated_at' => '2022-12-21 11:14:48',
            ),
            482 => 
            array (
                'id' => 483,
                'name' => 'Pollution Control Equipment & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:49',
                'updated_at' => '2022-12-21 11:14:49',
            ),
            483 => 
            array (
                'id' => 484,
                'name' => 'Port Authorities & Representatives',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:49',
                'updated_at' => '2022-12-21 11:14:49',
            ),
            484 => 
            array (
                'id' => 485,
                'name' => 'Postal Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:50',
                'updated_at' => '2022-12-21 11:14:50',
            ),
            485 => 
            array (
                'id' => 486,
                'name' => 'Power Transmission Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:52',
                'updated_at' => '2022-12-21 11:14:52',
            ),
            486 => 
            array (
                'id' => 487,
                'name' => 'Primary, Secondary & High Schools - Private',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:14:52',
                'updated_at' => '2022-12-21 11:14:52',
            ),
            487 => 
            array (
                'id' => 488,
                'name' => 'Primary, Secondary & High Schools - Public',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:04',
                'updated_at' => '2022-12-21 11:15:04',
            ),
            488 => 
            array (
                'id' => 489,
                'name' => 'Printing - Commercial Offset Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:05',
                'updated_at' => '2022-12-21 11:15:05',
            ),
            489 => 
            array (
                'id' => 490,
                'name' => 'Printing Houses',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:07',
                'updated_at' => '2022-12-21 11:15:07',
            ),
            490 => 
            array (
                'id' => 491,
                'name' => 'Private Investigators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:27',
                'updated_at' => '2022-12-21 11:15:27',
            ),
            491 => 
            array (
                'id' => 492,
                'name' => 'Procurement Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:28',
                'updated_at' => '2022-12-21 11:15:28',
            ),
            492 => 
            array (
                'id' => 493,
                'name' => 'Project Management Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:28',
                'updated_at' => '2022-12-21 11:15:28',
            ),
            493 => 
            array (
                'id' => 494,
                'name' => 'Property Investment Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:30',
                'updated_at' => '2022-12-21 11:15:30',
            ),
            494 => 
            array (
                'id' => 495,
                'name' => 'Property Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:33',
                'updated_at' => '2022-12-21 11:15:33',
            ),
            495 => 
            array (
                'id' => 496,
                'name' => 'Public Emergency Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:35',
                'updated_at' => '2022-12-21 11:15:35',
            ),
            496 => 
            array (
                'id' => 497,
                'name' => 'Publishers, Graphic Designers, Prepress, etc.',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:36',
                'updated_at' => '2022-12-21 11:15:36',
            ),
            497 => 
            array (
                'id' => 498,
                'name' => 'Pumps',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:47',
                'updated_at' => '2022-12-21 11:15:47',
            ),
            498 => 
            array (
                'id' => 499,
                'name' => 'Quality Assurance Consultants & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:50',
                'updated_at' => '2022-12-21 11:15:50',
            ),
            499 => 
            array (
                'id' => 500,
                'name' => 'Quarries',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:51',
                'updated_at' => '2022-12-21 11:15:51',
            ),
        ));
        \DB::table('yp_categories')->insert(array (
            0 => 
            array (
                'id' => 501,
                'name' => 'Radio & Television Parts Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:52',
                'updated_at' => '2022-12-21 11:15:52',
            ),
            1 => 
            array (
                'id' => 502,
                'name' => 'Radio Communication Equipment & Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:52',
                'updated_at' => '2022-12-21 11:15:52',
            ),
            2 => 
            array (
                'id' => 503,
                'name' => 'Railroad Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:53',
                'updated_at' => '2022-12-21 11:15:53',
            ),
            3 => 
            array (
                'id' => 504,
                'name' => 'Real Estate Agencies & Appraisers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:15:53',
                'updated_at' => '2022-12-21 11:15:53',
            ),
            4 => 
            array (
                'id' => 505,
                'name' => 'Real Estate Development',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:25',
                'updated_at' => '2022-12-21 11:16:25',
            ),
            5 => 
            array (
                'id' => 506,
                'name' => 'Record Management',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:26',
                'updated_at' => '2022-12-21 11:16:26',
            ),
            6 => 
            array (
                'id' => 507,
                'name' => 'Recording Services - Audio',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:27',
                'updated_at' => '2022-12-21 11:16:27',
            ),
            7 => 
            array (
                'id' => 508,
                'name' => 'Recreation Center',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:28',
                'updated_at' => '2022-12-21 11:16:28',
            ),
            8 => 
            array (
                'id' => 509,
                'name' => 'Refrigerating Equipment - Commercial & Industrial',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:28',
                'updated_at' => '2022-12-21 11:16:28',
            ),
            9 => 
            array (
                'id' => 510,
                'name' => 'Refrigerators & Freezers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:29',
                'updated_at' => '2022-12-21 11:16:29',
            ),
            10 => 
            array (
                'id' => 511,
                'name' => 'Rehabilitation Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:31',
                'updated_at' => '2022-12-21 11:16:31',
            ),
            11 => 
            array (
                'id' => 512,
                'name' => 'Religious Goods',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:32',
                'updated_at' => '2022-12-21 11:16:32',
            ),
            12 => 
            array (
                'id' => 513,
                'name' => 'Resorts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:34',
                'updated_at' => '2022-12-21 11:16:34',
            ),
            13 => 
            array (
                'id' => 514,
                'name' => 'Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:16:40',
                'updated_at' => '2022-12-21 11:16:40',
            ),
            14 => 
            array (
                'id' => 515,
                'name' => 'Rice Miller Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:12',
                'updated_at' => '2022-12-21 11:20:12',
            ),
            15 => 
            array (
                'id' => 516,
                'name' => 'Rice Milling Machinery Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:14',
                'updated_at' => '2022-12-21 11:20:14',
            ),
            16 => 
            array (
                'id' => 517,
                'name' => 'Rice Seed Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:16',
                'updated_at' => '2022-12-21 11:20:16',
            ),
            17 => 
            array (
                'id' => 518,
                'name' => 'Rice Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:16',
                'updated_at' => '2022-12-21 11:20:16',
            ),
            18 => 
            array (
                'id' => 519,
                'name' => 'River Bank Protection',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:22',
                'updated_at' => '2022-12-21 11:20:22',
            ),
            19 => 
            array (
                'id' => 520,
                'name' => 'Road Building Contractors & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:23',
                'updated_at' => '2022-12-21 11:20:23',
            ),
            20 => 
            array (
                'id' => 521,
                'name' => 'Roofing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:25',
                'updated_at' => '2022-12-21 11:20:25',
            ),
            21 => 
            array (
                'id' => 522,
                'name' => 'Rubber Plantations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:27',
                'updated_at' => '2022-12-21 11:20:27',
            ),
            22 => 
            array (
                'id' => 523,
                'name' => 'Rubber Stamps',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:28',
                'updated_at' => '2022-12-21 11:20:28',
            ),
            23 => 
            array (
                'id' => 524,
                'name' => 'Rubbish Removal - Town Cleaning',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:31',
                'updated_at' => '2022-12-21 11:20:31',
            ),
            24 => 
            array (
                'id' => 525,
                'name' => 'Russian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:31',
                'updated_at' => '2022-12-21 11:20:31',
            ),
            25 => 
            array (
                'id' => 526,
                'name' => 'Safes & Vaults',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:32',
                'updated_at' => '2022-12-21 11:20:32',
            ),
            26 => 
            array (
                'id' => 527,
                'name' => 'Safety & Fire Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:33',
                'updated_at' => '2022-12-21 11:20:33',
            ),
            27 => 
            array (
                'id' => 528,
                'name' => 'Sand & Gravel - Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:37',
                'updated_at' => '2022-12-21 11:20:37',
            ),
            28 => 
            array (
                'id' => 529,
                'name' => 'Sanitary Napkin Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:38',
                'updated_at' => '2022-12-21 11:20:38',
            ),
            29 => 
            array (
                'id' => 530,
                'name' => 'Satellite & Antenna Equipment - Systems & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:39',
                'updated_at' => '2022-12-21 11:20:39',
            ),
            30 => 
            array (
                'id' => 531,
                'name' => 'Saunas, Steams & Spas',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:40',
                'updated_at' => '2022-12-21 11:20:40',
            ),
            31 => 
            array (
                'id' => 532,
                'name' => 'Scaffolding',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:53',
                'updated_at' => '2022-12-21 11:20:53',
            ),
            32 => 
            array (
                'id' => 533,
                'name' => 'Scales & Weighing Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:54',
                'updated_at' => '2022-12-21 11:20:54',
            ),
            33 => 
            array (
                'id' => 534,
                'name' => 'Schools - Languages',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:20:55',
                'updated_at' => '2022-12-21 11:20:55',
            ),
            34 => 
            array (
                'id' => 535,
                'name' => 'Scrap Metals - Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:17',
                'updated_at' => '2022-12-21 11:21:17',
            ),
            35 => 
            array (
                'id' => 536,
                'name' => 'Sculptors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:18',
                'updated_at' => '2022-12-21 11:21:18',
            ),
            36 => 
            array (
                'id' => 537,
                'name' => 'Seafood - Retailers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:22',
                'updated_at' => '2022-12-21 11:21:22',
            ),
            37 => 
            array (
                'id' => 538,
                'name' => 'Seafood Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:23',
                'updated_at' => '2022-12-21 11:21:23',
            ),
            38 => 
            array (
                'id' => 539,
                'name' => 'Seasonings',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:31',
                'updated_at' => '2022-12-21 11:21:31',
            ),
            39 => 
            array (
                'id' => 540,
                'name' => 'Secondhand Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:32',
                'updated_at' => '2022-12-21 11:21:32',
            ),
            40 => 
            array (
                'id' => 541,
                'name' => 'Secretarial Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:34',
                'updated_at' => '2022-12-21 11:21:34',
            ),
            41 => 
            array (
                'id' => 542,
                'name' => 'Security Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:34',
                'updated_at' => '2022-12-21 11:21:34',
            ),
            42 => 
            array (
                'id' => 543,
                'name' => 'Security Seals',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:43',
                'updated_at' => '2022-12-21 11:21:43',
            ),
            43 => 
            array (
                'id' => 544,
                'name' => 'Security Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:44',
                'updated_at' => '2022-12-21 11:21:44',
            ),
            44 => 
            array (
                'id' => 545,
                'name' => 'Sewerage Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:50',
                'updated_at' => '2022-12-21 11:21:50',
            ),
            45 => 
            array (
                'id' => 546,
                'name' => 'Sewing Machines - Supplies, Repair, Industrial, etc.',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:50',
                'updated_at' => '2022-12-21 11:21:50',
            ),
            46 => 
            array (
                'id' => 547,
                'name' => 'Shampoo, Soaps & Detergents - Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:53',
                'updated_at' => '2022-12-21 11:21:53',
            ),
            47 => 
            array (
                'id' => 548,
                'name' => 'Shampoo, Soaps & Detergents - Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:53',
                'updated_at' => '2022-12-21 11:21:53',
            ),
            48 => 
            array (
                'id' => 549,
                'name' => 'Shelving & Storage Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:55',
                'updated_at' => '2022-12-21 11:21:55',
            ),
            49 => 
            array (
                'id' => 550,
                'name' => 'Ship Registry',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:56',
                'updated_at' => '2022-12-21 11:21:56',
            ),
            50 => 
            array (
                'id' => 551,
                'name' => 'Shipping Line Services & Agencies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:21:56',
                'updated_at' => '2022-12-21 11:21:56',
            ),
            51 => 
            array (
                'id' => 552,
                'name' => 'Shopping Centres',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:01',
                'updated_at' => '2022-12-21 11:22:01',
            ),
            52 => 
            array (
                'id' => 553,
                'name' => 'Shutters & Blinds',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:03',
                'updated_at' => '2022-12-21 11:22:03',
            ),
            53 => 
            array (
                'id' => 554,
                'name' => 'Signs Cutting Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:04',
                'updated_at' => '2022-12-21 11:22:04',
            ),
            54 => 
            array (
                'id' => 555,
                'name' => 'Silk Screen Printing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:04',
                'updated_at' => '2022-12-21 11:22:04',
            ),
            55 => 
            array (
                'id' => 556,
                'name' => 'Silks & Embroideries - Wholesalers & Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:07',
                'updated_at' => '2022-12-21 11:22:07',
            ),
            56 => 
            array (
                'id' => 557,
                'name' => 'Silverwares',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:11',
                'updated_at' => '2022-12-21 11:22:11',
            ),
            57 => 
            array (
                'id' => 558,
                'name' => 'Singaporean Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:12',
                'updated_at' => '2022-12-21 11:22:12',
            ),
            58 => 
            array (
                'id' => 559,
                'name' => 'Ski Club',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:13',
                'updated_at' => '2022-12-21 11:22:13',
            ),
            59 => 
            array (
                'id' => 560,
                'name' => 'Snookers & Billiards',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:14',
                'updated_at' => '2022-12-21 11:22:14',
            ),
            60 => 
            array (
                'id' => 561,
                'name' => 'Software Development',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:15',
                'updated_at' => '2022-12-21 11:22:15',
            ),
            61 => 
            array (
                'id' => 562,
                'name' => 'Soil, Rock & Concrete Testing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:20',
                'updated_at' => '2022-12-21 11:22:20',
            ),
            62 => 
            array (
                'id' => 563,
                'name' => 'Solar Energy Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:21',
                'updated_at' => '2022-12-21 11:22:21',
            ),
            63 => 
            array (
                'id' => 564,
                'name' => 'Sound Equipment & Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:24',
                'updated_at' => '2022-12-21 11:22:24',
            ),
            64 => 
            array (
                'id' => 565,
                'name' => 'Soup',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:27',
                'updated_at' => '2022-12-21 11:22:27',
            ),
            65 => 
            array (
                'id' => 566,
                'name' => 'Souvenir Shops',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:32',
                'updated_at' => '2022-12-21 11:22:32',
            ),
            66 => 
            array (
                'id' => 567,
                'name' => 'Soy Bean Products',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:42',
                'updated_at' => '2022-12-21 11:22:42',
            ),
            67 => 
            array (
                'id' => 568,
                'name' => 'Spices',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:42',
                'updated_at' => '2022-12-21 11:22:42',
            ),
            68 => 
            array (
                'id' => 569,
                'name' => 'Sport Shop Retail & Wholesale',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:45',
                'updated_at' => '2022-12-21 11:22:45',
            ),
            69 => 
            array (
                'id' => 570,
                'name' => 'Squash Courts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:47',
                'updated_at' => '2022-12-21 11:22:47',
            ),
            70 => 
            array (
                'id' => 571,
                'name' => 'Sri Lankan Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:48',
                'updated_at' => '2022-12-21 11:22:48',
            ),
            71 => 
            array (
                'id' => 572,
                'name' => 'Stainless Steel',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:48',
                'updated_at' => '2022-12-21 11:22:48',
            ),
            72 => 
            array (
                'id' => 573,
                'name' => 'Stationery, Educational Stores & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:22:54',
                'updated_at' => '2022-12-21 11:22:54',
            ),
            73 => 
            array (
                'id' => 574,
                'name' => 'Steel Structural Works',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:00',
                'updated_at' => '2022-12-21 11:23:00',
            ),
            74 => 
            array (
                'id' => 575,
                'name' => 'Sticker Design & Services - Car & Motorcycle',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:04',
                'updated_at' => '2022-12-21 11:23:04',
            ),
            75 => 
            array (
                'id' => 576,
                'name' => 'Stock & Bond - Brokers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:06',
                'updated_at' => '2022-12-21 11:23:06',
            ),
            76 => 
            array (
                'id' => 577,
                'name' => 'Stock & Bond - Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:07',
                'updated_at' => '2022-12-21 11:23:07',
            ),
            77 => 
            array (
                'id' => 578,
                'name' => 'Stock & Bond - Investment Advisors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:07',
                'updated_at' => '2022-12-21 11:23:07',
            ),
            78 => 
            array (
                'id' => 579,
                'name' => 'Stock & Bond - Operators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:08',
                'updated_at' => '2022-12-21 11:23:08',
            ),
            79 => 
            array (
                'id' => 580,
                'name' => 'Stock & Bond - Underwriters',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:09',
                'updated_at' => '2022-12-21 11:23:09',
            ),
            80 => 
            array (
                'id' => 581,
                'name' => 'Stonework',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:09',
                'updated_at' => '2022-12-21 11:23:09',
            ),
            81 => 
            array (
                'id' => 582,
                'name' => 'Storage - Warehouses',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:10',
                'updated_at' => '2022-12-21 11:23:10',
            ),
            82 => 
            array (
                'id' => 583,
                'name' => 'Sugar - Manufacturers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:12',
                'updated_at' => '2022-12-21 11:23:12',
            ),
            83 => 
            array (
                'id' => 584,
                'name' => 'Supermarkets & Grocery Stores',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:13',
                'updated_at' => '2022-12-21 11:23:13',
            ),
            84 => 
            array (
                'id' => 585,
                'name' => 'Surveyors - Chartered',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:22',
                'updated_at' => '2022-12-21 11:23:22',
            ),
            85 => 
            array (
                'id' => 586,
                'name' => 'Swimming Clubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:22',
                'updated_at' => '2022-12-21 11:23:22',
            ),
            86 => 
            array (
                'id' => 587,
                'name' => 'Swimming Pool Equipment, Maintenance, Installation & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:24',
                'updated_at' => '2022-12-21 11:23:24',
            ),
            87 => 
            array (
                'id' => 588,
                'name' => 'Taekwondo & Karate-do Clubs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:26',
                'updated_at' => '2022-12-21 11:23:26',
            ),
            88 => 
            array (
                'id' => 589,
                'name' => 'Tailor Accessories',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:26',
                'updated_at' => '2022-12-21 11:23:26',
            ),
            89 => 
            array (
                'id' => 590,
                'name' => 'Tailoring Schools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:27',
                'updated_at' => '2022-12-21 11:23:27',
            ),
            90 => 
            array (
                'id' => 591,
                'name' => 'Tailors',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:28',
                'updated_at' => '2022-12-21 11:23:28',
            ),
            91 => 
            array (
                'id' => 592,
                'name' => 'Tattooing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:41',
                'updated_at' => '2022-12-21 11:23:41',
            ),
            92 => 
            array (
                'id' => 593,
                'name' => 'Tax Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:42',
                'updated_at' => '2022-12-21 11:23:42',
            ),
            93 => 
            array (
                'id' => 594,
                'name' => 'Taxi Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:47',
                'updated_at' => '2022-12-21 11:23:47',
            ),
            94 => 
            array (
                'id' => 595,
                'name' => 'Technical Schools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:50',
                'updated_at' => '2022-12-21 11:23:50',
            ),
            95 => 
            array (
                'id' => 596,
                'name' => 'Telecommunication Equipment, Supplies & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:52',
                'updated_at' => '2022-12-21 11:23:52',
            ),
            96 => 
            array (
                'id' => 597,
                'name' => 'Telecommunications Companies - Operators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:55',
                'updated_at' => '2022-12-21 11:23:55',
            ),
            97 => 
            array (
                'id' => 598,
                'name' => 'Television & Radio - Retail & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:23:58',
                'updated_at' => '2022-12-21 11:23:58',
            ),
            98 => 
            array (
                'id' => 599,
                'name' => 'Television & Radio Stations',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:01',
                'updated_at' => '2022-12-21 11:24:01',
            ),
            99 => 
            array (
                'id' => 600,
                'name' => 'Television Broadcasting Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:04',
                'updated_at' => '2022-12-21 11:24:04',
            ),
            100 => 
            array (
                'id' => 601,
                'name' => 'Tennis Courts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:05',
                'updated_at' => '2022-12-21 11:24:05',
            ),
            101 => 
            array (
                'id' => 602,
                'name' => 'Tents - Retailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:05',
                'updated_at' => '2022-12-21 11:24:05',
            ),
            102 => 
            array (
                'id' => 603,
                'name' => 'Testing Apparatus',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:06',
                'updated_at' => '2022-12-21 11:24:06',
            ),
            103 => 
            array (
                'id' => 604,
                'name' => 'Thai Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:07',
                'updated_at' => '2022-12-21 11:24:07',
            ),
            104 => 
            array (
                'id' => 605,
                'name' => 'Theatre Centers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:10',
                'updated_at' => '2022-12-21 11:24:10',
            ),
            105 => 
            array (
                'id' => 606,
                'name' => 'Ticket Agencies - Travel',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:10',
                'updated_at' => '2022-12-21 11:24:10',
            ),
            106 => 
            array (
                'id' => 607,
                'name' => 'Tiles Supplies & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:24:15',
                'updated_at' => '2022-12-21 11:24:15',
            ),
            107 => 
            array (
                'id' => 608,
                'name' => 'Time Recorders',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:15',
                'updated_at' => '2022-12-21 11:29:15',
            ),
            108 => 
            array (
                'id' => 609,
                'name' => 'Tissue - Manufacturers & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:16',
                'updated_at' => '2022-12-21 11:29:16',
            ),
            109 => 
            array (
                'id' => 610,
                'name' => 'Toners & Ink Cartridges',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:17',
                'updated_at' => '2022-12-21 11:29:17',
            ),
            110 => 
            array (
                'id' => 611,
                'name' => 'Tools',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:18',
                'updated_at' => '2022-12-21 11:29:18',
            ),
            111 => 
            array (
                'id' => 612,
                'name' => 'Toothpastes',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:21',
                'updated_at' => '2022-12-21 11:29:21',
            ),
            112 => 
            array (
                'id' => 613,
                'name' => 'Tour Operators',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:22',
                'updated_at' => '2022-12-21 11:29:22',
            ),
            113 => 
            array (
                'id' => 614,
                'name' => 'Tourist Information',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:45',
                'updated_at' => '2022-12-21 11:29:45',
            ),
            114 => 
            array (
                'id' => 615,
                'name' => 'Towels - Wholesale & Retail',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:46',
                'updated_at' => '2022-12-21 11:29:46',
            ),
            115 => 
            array (
                'id' => 616,
                'name' => 'Towing - Automobile',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:46',
                'updated_at' => '2022-12-21 11:29:46',
            ),
            116 => 
            array (
                'id' => 617,
                'name' => 'Toys - Wholesales & Retails',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:47',
                'updated_at' => '2022-12-21 11:29:47',
            ),
            117 => 
            array (
                'id' => 618,
                'name' => 'Tractor Dealers - Equipment & Parts',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:49',
                'updated_at' => '2022-12-21 11:29:49',
            ),
            118 => 
            array (
                'id' => 619,
                'name' => 'Trading Companies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:29:52',
                'updated_at' => '2022-12-21 11:29:52',
            ),
            119 => 
            array (
                'id' => 620,
                'name' => 'Traditional  Medicine',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:02',
                'updated_at' => '2022-12-21 11:30:02',
            ),
            120 => 
            array (
                'id' => 621,
                'name' => 'Traditional Khmer Music Training & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:04',
                'updated_at' => '2022-12-21 11:30:04',
            ),
            121 => 
            array (
                'id' => 622,
                'name' => 'Traffic Signs, Signals & Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:04',
                'updated_at' => '2022-12-21 11:30:04',
            ),
            122 => 
            array (
                'id' => 623,
                'name' => 'Trailers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:05',
                'updated_at' => '2022-12-21 11:30:05',
            ),
            123 => 
            array (
                'id' => 624,
                'name' => 'Training Consultants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:05',
                'updated_at' => '2022-12-21 11:30:05',
            ),
            124 => 
            array (
                'id' => 625,
                'name' => 'Training Programs',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:07',
                'updated_at' => '2022-12-21 11:30:07',
            ),
            125 => 
            array (
                'id' => 626,
                'name' => 'Transfer Service - Money',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:13',
                'updated_at' => '2022-12-21 11:30:13',
            ),
            126 => 
            array (
                'id' => 627,
                'name' => 'Translators & Interpreters',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:19',
                'updated_at' => '2022-12-21 11:30:19',
            ),
            127 => 
            array (
                'id' => 628,
                'name' => 'Transportation - Passengers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:22',
                'updated_at' => '2022-12-21 11:30:22',
            ),
            128 => 
            array (
                'id' => 629,
                'name' => 'Travel Agencies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:29',
                'updated_at' => '2022-12-21 11:30:29',
            ),
            129 => 
            array (
                'id' => 630,
                'name' => 'Travellers\' Cheques',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:52',
                'updated_at' => '2022-12-21 11:30:52',
            ),
            130 => 
            array (
                'id' => 631,
                'name' => 'Truck - Dealers & Rental Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:55',
                'updated_at' => '2022-12-21 11:30:55',
            ),
            131 => 
            array (
                'id' => 632,
                'name' => 'Tutoring Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:57',
                'updated_at' => '2022-12-21 11:30:57',
            ),
            132 => 
            array (
                'id' => 633,
                'name' => 'Typewriting Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:58',
                'updated_at' => '2022-12-21 11:30:58',
            ),
            133 => 
            array (
                'id' => 634,
                'name' => 'Tyre / Tire Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:30:59',
                'updated_at' => '2022-12-21 11:30:59',
            ),
            134 => 
            array (
                'id' => 635,
            'name' => 'Universities & Colleges (Academic)',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:06',
                'updated_at' => '2022-12-21 11:31:06',
            ),
            135 => 
            array (
                'id' => 636,
                'name' => 'Upholsterers - Cushions, Mattresses, Pillowcases & Sofas Sewing',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:09',
                'updated_at' => '2022-12-21 11:31:09',
            ),
            136 => 
            array (
                'id' => 637,
                'name' => 'Utility Billing Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:11',
                'updated_at' => '2022-12-21 11:31:11',
            ),
            137 => 
            array (
                'id' => 638,
                'name' => 'Vacuum Equipment & Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:13',
                'updated_at' => '2022-12-21 11:31:13',
            ),
            138 => 
            array (
                'id' => 639,
                'name' => 'Valves',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:13',
                'updated_at' => '2022-12-21 11:31:13',
            ),
            139 => 
            array (
                'id' => 640,
                'name' => 'Vegetables - Retailers & Wholesalers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:14',
                'updated_at' => '2022-12-21 11:31:14',
            ),
            140 => 
            array (
                'id' => 641,
                'name' => 'Vegetarian Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:15',
                'updated_at' => '2022-12-21 11:31:15',
            ),
            141 => 
            array (
                'id' => 642,
                'name' => 'Vehicle Tracking Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:17',
                'updated_at' => '2022-12-21 11:31:17',
            ),
            142 => 
            array (
                'id' => 643,
                'name' => 'Veterinarians',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:17',
                'updated_at' => '2022-12-21 11:31:17',
            ),
            143 => 
            array (
                'id' => 644,
                'name' => 'Video Equipment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:19',
                'updated_at' => '2022-12-21 11:31:19',
            ),
            144 => 
            array (
                'id' => 645,
                'name' => 'Video Production Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:20',
                'updated_at' => '2022-12-21 11:31:20',
            ),
            145 => 
            array (
                'id' => 646,
                'name' => 'Video Tapes - Wholesalers & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:23',
                'updated_at' => '2022-12-21 11:31:23',
            ),
            146 => 
            array (
                'id' => 647,
                'name' => 'Vietnamese Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:24',
                'updated_at' => '2022-12-21 11:31:24',
            ),
            147 => 
            array (
                'id' => 648,
                'name' => 'Visa Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:25',
                'updated_at' => '2022-12-21 11:31:25',
            ),
            148 => 
            array (
                'id' => 649,
                'name' => 'Wallpapers Supplies & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:30',
                'updated_at' => '2022-12-21 11:31:30',
            ),
            149 => 
            array (
                'id' => 650,
                'name' => 'Warehousing - Racking & Shelving, Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:31',
                'updated_at' => '2022-12-21 11:31:31',
            ),
            150 => 
            array (
                'id' => 651,
                'name' => 'Washing Liquid - Dealers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:32',
                'updated_at' => '2022-12-21 11:31:32',
            ),
            151 => 
            array (
                'id' => 652,
                'name' => 'Washing Machines & Dryers Equipment & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:33',
                'updated_at' => '2022-12-21 11:31:33',
            ),
            152 => 
            array (
                'id' => 653,
                'name' => 'Wastewater Treatment Systems',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:35',
                'updated_at' => '2022-12-21 11:31:35',
            ),
            153 => 
            array (
                'id' => 654,
                'name' => 'Watches & Clocks - Retail & Repair',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:36',
                'updated_at' => '2022-12-21 11:31:36',
            ),
            154 => 
            array (
                'id' => 655,
            'name' => 'Water (Bottled & Bulk) Supplies & Manufacturers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:40',
                'updated_at' => '2022-12-21 11:31:40',
            ),
            155 => 
            array (
                'id' => 656,
                'name' => 'Water Heaters & Coolers',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:44',
                'updated_at' => '2022-12-21 11:31:44',
            ),
            156 => 
            array (
                'id' => 657,
                'name' => 'Water Purification &  Filtration Equipment & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:45',
                'updated_at' => '2022-12-21 11:31:45',
            ),
            157 => 
            array (
                'id' => 658,
                'name' => 'Water Quality Control',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:48',
                'updated_at' => '2022-12-21 11:31:48',
            ),
            158 => 
            array (
                'id' => 659,
                'name' => 'Water Sports',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:49',
                'updated_at' => '2022-12-21 11:31:49',
            ),
            159 => 
            array (
                'id' => 660,
                'name' => 'Water Tanks',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:50',
                'updated_at' => '2022-12-21 11:31:50',
            ),
            160 => 
            array (
                'id' => 661,
                'name' => 'Water Well Drilling & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:51',
                'updated_at' => '2022-12-21 11:31:51',
            ),
            161 => 
            array (
                'id' => 662,
                'name' => 'Waterproofing Materials & Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:52',
                'updated_at' => '2022-12-21 11:31:52',
            ),
            162 => 
            array (
                'id' => 663,
                'name' => 'Web Design & Hosting',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:31:54',
                'updated_at' => '2022-12-21 11:31:54',
            ),
            163 => 
            array (
                'id' => 664,
                'name' => 'Wedding Banquets',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:01',
                'updated_at' => '2022-12-21 11:32:01',
            ),
            164 => 
            array (
                'id' => 665,
                'name' => 'Wedding Embellishment Arrangements',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:03',
                'updated_at' => '2022-12-21 11:32:03',
            ),
            165 => 
            array (
                'id' => 666,
                'name' => 'Welding Equipment & Supplies',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:10',
                'updated_at' => '2022-12-21 11:32:10',
            ),
            166 => 
            array (
                'id' => 667,
                'name' => 'Welding Services',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:11',
                'updated_at' => '2022-12-21 11:32:11',
            ),
            167 => 
            array (
                'id' => 668,
                'name' => 'Western & International Restaurants',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:12',
                'updated_at' => '2022-12-21 11:32:12',
            ),
            168 => 
            array (
                'id' => 669,
                'name' => 'Wines & Liquor - Wholesale & Retail',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:44',
                'updated_at' => '2022-12-21 11:32:44',
            ),
            169 => 
            array (
                'id' => 670,
                'name' => 'Wire & Cable',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:49',
                'updated_at' => '2022-12-21 11:32:49',
            ),
            170 => 
            array (
                'id' => 671,
                'name' => 'Wire Rope',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:51',
                'updated_at' => '2022-12-21 11:32:51',
            ),
            171 => 
            array (
                'id' => 672,
                'name' => 'Wood Works, Processing & Treatment',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:51',
                'updated_at' => '2022-12-21 11:32:51',
            ),
            172 => 
            array (
                'id' => 673,
                'name' => 'Wooden Wares',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:52',
                'updated_at' => '2022-12-21 11:32:52',
            ),
            173 => 
            array (
                'id' => 674,
                'name' => 'X - Ray Laboratories',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:53',
                'updated_at' => '2022-12-21 11:32:53',
            ),
            174 => 
            array (
                'id' => 675,
                'name' => 'Zoological Gardens',
                'desp' => NULL,
                'pid' => NULL,
                'created_at' => '2022-12-21 11:32:54',
                'updated_at' => '2022-12-21 11:32:54',
            ),
        ));
        
        
    }
}