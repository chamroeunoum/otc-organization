<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDF;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Write the dumpmy data for the application
         */

        /**
         * Create role for the user
         */
        $super = \App\Models\Role::create(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $administrator = \App\Models\Role::create(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $backendMember = \App\Models\Role::create(['name' => 'backend', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $client = \App\Models\Role::create(['name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp']);

        /**
         * Create accounts
         */
        /**
         * Create admin user for development purpose
         */
        $chamroeunoum = \App\Models\User::create([
            'firstname' => 'Chamroeun' ,
            'lastname' => 'OUM' ,
            'email' => 'chamroeunoum@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('031884Chamroeunoum') ,
            'phone' => '012557200' ,
            'username' => 'chamroeunoum'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $chamroeunoum->firstname , 
            'lastname' => $chamroeunoum->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $chamroeunoum->phone , 
            'email' => $chamroeunoum->email
        ]);
        $chamroeunoum->people_id = $people->id ;
        $chamroeunoum->save();
        $chamroeunoum->assignRole( $administrator );


        /**
         * Create client user for development purpose
         */
        $puthireach = \App\Models\User::create([
            'firstname' => 'Puthireach' ,
            'lastname' => 'KONGCHAN' ,
            'email' => 'kongchanputhireach@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => '010517515' ,
            'username' => 'kcputhireach'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $puthireach->firstname , 
            'lastname' => $puthireach->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $puthireach->phone , 
            'email' => $puthireach->email
        ]);
        $puthireach->people_id = $people->id ;
        $puthireach->save();
        $puthireach->assignRole( $backendMember );


    //     $totalUsers = 10 ;
    //     $totalFolders = 10 ;
    //     $totalRegulators = 100;

    //     for( $i=0 ; $i< $totalUsers ; $i++ ){
    //         /**
    //          * Create client user for development purpose
    //          */
    //         list($firstname,$lastname) = explode(' ', fake()->name());
    //         $clientUser = \App\Models\User::create([
    //             'firstname' => $firstname ,
    //             'lastname' => $lastname ,
    //             'email' => 'client'.($i+1).'@edoc.com' ,
    //             'active' => 1 ,
    //             'password' => bcrypt('1234567890+1') ,
    //             'phone' => fake()->phoneNumber() ,
    //             'username' => strtolower($firstname.$lastname)
    //         ]);
            
    //         $clientPeople = \App\Models\People\People::create([
    //             'firstname' => $clientUser->firstname , 
    //             'lastname' => $clientUser->lastname , 
    //             'gender' => 0 , // Male
    //             'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
    //             'mobile_phone' => $clientUser->phone , 
    //             'email' => $clientUser->email
    //         ]);
    //         $clientUser->people_id = $clientPeople->id ;
    //         $clientUser->save();
    //         $clientUser->assignRole( $client );
    //     $this->call(TagsTableSeeder::class);
    

    //     /**
    //      * Create Tag Regulator Type 
    //      */
    //     \DB::table('tags')->insert([
    //         [
    //             'name' => 'ប្រភេទឯកសារ' ,
    //             'desp' => 'ប្រភេទឯកសារផ្លូវការរបស់ព្រះរាជាណាចក្រកម្ពុជា។' ,
    //             'model' => 'App\Models\Regulator\Tag\Type' ,
    //             'pid' => null ,
    //             'tpid' => null ,
    //             'image' => '' ,
    //             'record_index' => 0 
    //         ]
    //     ]);
    //     $regulatorTypeTag = \DB::table('tags')->where('model','App\Models\Regulator\Tag\Type')->whereNull('tpid')->orWhere('tpid',0)->first();
    
    //     \DB::table('tags')->insert( [
    //         [
    //             'name' => 'ព្រះរាជក្រម' ,
    //             'desp' => 'ព្រះរាជក្រម' ,
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 1 

    //         ],
    //         [
    //             'name' => 'ព្រះរាជក្រឹត្យ.បក' ,
    //             'desp' => 'ព្រះរាជក្រឹត្យ.បក',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 2
    //         ],
    //         [
    //             'name' => 'អនុក្រឹត្យ.បក' ,
    //             'desp' => 'អនុក្រឹត្យ.បក',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 3
    //         ],
    //         [
    //             'name' => 'ព្រះរាជក្រឹត្យ.តត' ,
    //             'desp' => 'ព្រះរាជក្រឹត្យ.តត',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 4
    //         ],
    //         [
    //             'name' => 'អនុក្រឹត្យ.តត' ,
    //             'desp' => 'អនុក្រឹត្យ.តត',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 5 
    //         ],
    //         [
    //             'name' => 'សជណ' ,
    //             'desp' => 'សជណ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 6 
    //         ],
    //         [
    //             'name' => 'សេចក្ដីសម្រេច' ,
    //             'desp' => 'សេចក្ដីសម្រេច',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 7 
    //         ],
    //         [
    //             'name' => 'សារាចរ និង សារាចរណែនាំ' ,
    //             'desp' => 'សារាចរ និង សារាចរណែនាំ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 8
    //         ],
    //         [
    //             'name' => 'ប្រកាស' ,
    //             'desp' => 'ប្រកាស',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 9 
    //         ],
    //         [
    //             'name' => 'គោលនយោបាយជាតិ' ,
    //             'desp' => 'គោលនយោបាយជាតិ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 10 
    //         ],
    //         [
    //             'name' => 'ផែនការយុទ្ធសាស្ត្រ' ,
    //             'desp' => 'ផែនការយុទ្ធសាស្ត្រ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 11 
    //         ],
    //         [
    //             'name' => 'បទបញ្ជារាជរដ្ឋាភិបាល' ,
    //             'desp' => 'បទបញ្ជារាជរដ្ឋាភិបាល',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 12 
    //         ],
    //         [
    //             'name' => 'ផែនការសកម្មភាពក្រសួងនានា' ,
    //             'desp' => 'ផែនការសកម្មភាពក្រសួងនានា',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 13
    //         ],
    //         [
    //             'name' => 'ផែនការសកម្មភាពក្រសួងនានា' ,
    //             'desp' => 'ផែនការសកម្មភាពក្រសួងនានា',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 14
    //         ],
    //         [
    //             'name' => 'របាយការណ៍ប្រចាំថ្ងៃ' ,
    //             'desp' => 'របាយការណ៍ប្រចាំថ្ងៃ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 15
    //         ],
    //         [
    //             'name' => 'របាយការណ៍ប្រចាំខែ' ,
    //             'desp' => 'របាយការណ៍ប្រចាំខែ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 16 
    //         ],
    //         [
    //             'name' => 'របាយការណ៍ការប្រចាំឆ្នាំ' ,
    //             'desp' => 'របាយការណ៍ការប្រចាំឆ្នាំ',
    //             'model' => '' ,
    //             'tpid' => $regulatorTypeTag->id ,
    //             'pid' => $regulatorTypeTag->id ,
    //             'image' => '' ,
    //             'record_index' => 17
    //         ]
    //     ] ); 

    //     $editorIds = \App\Models\User::whereHas('roles',function($query){ $query->where('name','Client');     $this->call(RegulatorSignaturesTableSeeder::class);
        
    // })->inRandomOrder()->get()->pluck('id') ;
    //     $regulatorsArray = [] ;
    //     for( $i=0; $i<= $totalRegulators ; $i++ ){
    //         $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ;
    //         $date = $i % 2 ? \Carbon\Carbon::now()->addMonths( rand(1,10) ) : \Carbon\Carbon::now()->subMonths( rand(1,10) ) ;
    //         /**
    //          * Create pdf
    //          */
    //         Pdf::setOption(['dpi' => 150, 'defaultFont' => 'Siemreap-Regular']);

    //         // Load pdf from view and path data to view
    //         // Pdf::loadView('pdf.invoice', $data)

    //         // Load pdf from public path
    //         // Pdf::loadFile(public_path().'/myfile.html')

    //         // Use pdf with App container
    //         // Load custom html code as pdf
    //         PDF::loadHTML("
    //             <html>
    //                 <head>
    //                 <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    //                 <style>
    //                     .page-break {
    //                         page-break-after: always;
    //                     }
    //                 </head>
    //                 <body>
    //                     <h6>Regulator File : ' . ($i+1) . ' </h6>
    //                     <div class='page-break'></div>
    //                     <h1>ទីស្ដីការគណៈរដ្ឋមន្ត្រី</h1>
    //                     <h3>ឯកសារបទដ្ឋានគតិយុត្តិ ទី " . ($i+1) ."</h1>
    //                 </body>
    //             </html>
    //         ")
    //         // Download pdf
    //         // ->download('invoice.pdf')
    //         // Save pdf to file
    //         ->save( storage_path('data') . '/regulators/regulator' . ( $i + 1 ) . '.pdf' )
    //         // Stream pdf file
    //         // ->stream('download.pdf')
    //         ;
    //         $regulatorsArray[] = [
    //             'fid' => sprintf( "%4d" , ( $i+1 ) ) ,
    //             'title' => fake()->title() ,
    //             'objective' => 'regulator ' . ($i+1) . ' => ' . fake()->paragraph() ,
    //             'year' => $date->format('Y-m-d') ,
    //             'publish' => 1 ,
    //             'active' => 1 ,
    //             'created_by' => $editorId ,
    //             'updated_by' => $editorId ,
    //             'accessibility' => 2 ,
    //             'pdf' => 'regulators/regulator' . ( $i + 1 ) . '.pdf'
    //         ];
    //     }
    //     \DB::table('regulators')->insert( $regulatorsArray );

    //     $regulatorTypes = [] ;
    //     // Add regulators to folder
    //     for( $i=0; $i<= $totalFolders ; $i++ ){
    //         // Create folder & Assign to the owner
    //         $regulatorTypes[] = [
    //             'regulator_id' => rand(1, $totalRegulators ),
    //             'type_id' => rand(2,18)
    //         ];
    //     }
    //     \DB::table('regulator_types')->insert( $regulatorTypes );
        
    //     /**
    //      * Create Tag Regulator Signature 
    //      */
    //     \DB::table('tags')->insert([
    //         [
    //             'name' => 'ឈ្មោះហត្ថលេខា' ,
    //             'desp' => 'ឈ្មោះថ្នាក់ដឹកនាំដែលបានចុះហត្ថលេខាលើឯកសារ' ,
    //             'model' => 'App\Models\Regulator\Tag\Signature' ,
    //             'tpid' => null ,
    //             'pid' => null ,
    //             'image' => '' ,
    //             'record_index' => 0 
    //         ]
    //     ]);
    //     $regulatorSignatureTag = \DB::table('tags')->where('model','App\Models\Regulator\Tag\Signature')->whereNull('tpid')->orWhere('tpid',0)->first();
    
    //     \DB::table('tags')->insert( [
    //         [
    //             'name' => 'ហ៊ុន សែន' ,
    //             'desp' => 'ហ៊ុន សែន' ,
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 1
    //         ],
    //         [
    //             'name' => 'ជា ស៊ីម' ,
    //             'desp' => 'ជា ស៊ីម',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' =>2
    //         ],
    //         [
    //             'name' => 'ហេង សំរិន' ,
    //             'desp' => 'ហេង សំរិន',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 3
    //         ],
    //         [
    //             'name' => 'សាយ ឈុំ' ,
    //             'desp' => 'សាយ ឈុំ',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 4
    //         ],
    //         [
    //             'name' => 'ត្រាំ អ៊ីវតឹក' ,
    //             'desp' => 'ត្រាំ អ៊ីវតឹក',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 5
    //         ],
    //         [
    //             'name' => 'ជា សុផារ៉ា' ,
    //             'desp' => 'ជា សុផារ៉ា',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 6
    //         ],
    //         [
    //             'name' => 'ស៊ុន ចាន់ថុល' ,
    //             'desp' => 'ស៊ុន ចាន់ថុល',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 7
    //         ],
    //         [
    //             'name' => 'ជា វ៉ាន់ដេត' ,
    //             'desp' => 'ជា វ៉ាន់ដេត',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 8
    //         ],
    //         [
    //             'name' => 'សាយ សំអាល់' ,
    //             'desp' => 'សាយ សំអាល់',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 9
    //         ],
    //         [
    //             'name' => 'ទៀ បាញ់' ,
    //             'desp' => 'ទៀ បាញ់',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 10
    //         ],
    //         [
    //             'name' => 'ស ខេង' ,
    //             'desp' => 'ស ខេង',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 11
    //         ],
    //         [
    //             'name' => 'ម៉ែន សំអន' ,
    //             'desp' => 'ម៉ែន សំអន',
    //             'model' => '' ,
    //             'tpid' => $regulatorSignatureTag->id ,
    //             'pid' => $regulatorSignatureTag->id ,
    //             'image' => '' ,
    //             'record_index' => 12
    //         ]
    //     ] ); 
    //     $regulatorSignatures = [] ;
    //     // Add regulators to folder
    //     for( $i=0; $i<= $totalUsers ; $i++ ){
    //         // Create folder & Assign to the owner
    //         $regulatorSignatures[] = [
    //             'regulator_id' => rand(1, $totalRegulators ),
    //             'signature_id' => rand(20,31)
    //         ];
    //     }
    //     \DB::table('regulator_signatures')->insert( $regulatorSignatures );

    //     /**
    //      * Create Tag Regulator Ministry 
    //      */
    //     \DB::table('tags')->insert([
    //         [
    //             'name' => 'ឈ្មោះអង្គភាព' ,
    //             'desp' => 'ឈ្មោះអង្គភាពរាជរដ្ឋាភិបាល និងក្រៅរដ្ឋាភិបាល' ,
    //             'model' => 'App\Models\Regulator\Tag\Organization' ,
    //             'tpid' => null ,
    //             'pid' => null ,
    //             'image' => '' ,
    //             'record_index' => 0
    //         ]
    //     ]);
    //     $regulatorOrganizationTag = \DB::table('tags')->where('model','App\Models\Regulator\Tag\Organization')->whereNull('tpid')->orWhere('tpid',0)->first();
    
    //     \DB::table('tags')->insert( [
    //         [
    //             'name' => 'ទីស្ដីការគណៈរដ្ឋមន្ត្រី' ,
    //             'desp' => 'ទីស្ដីការគណៈរដ្ឋមន្ត្រី' ,
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id , 
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 1
    //         ],
    //         [
    //             'name' => 'ក្រសួងមហាផ្ទៃ' ,
    //             'desp' => 'ក្រសួងមហាផ្ទៃ',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 2
    //         ],
    //         [
    //             'name' => 'ក្រសួងការពារជាតិ' ,
    //             'desp' => 'ក្រសួងការពារជាតិ',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 3
    //         ],
    //         [
    //             'name' => 'ក្រសួងរៀបចំដែនដី និងនគររូបនីយកម្ម' ,
    //             'desp' => 'ក្រសួងរៀបចំដែនដី និងនគររូបនីយកម្ម',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 4
    //         ],
    //         [
    //             'name' => 'ក្រសួងសាធារណៈការ និងដឹកជញ្ជូន' ,
    //             'desp' => 'ក្រសួងសាធារណៈការ និងដឹកជញ្ជូន',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 5
    //         ],
    //         [
    //             'name' => 'ក្រសួងបរិស្ថាន' ,
    //             'desp' => 'ក្រសួងបរិស្ថាន',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 6
    //         ],
    //         [
    //             'name' => 'ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ' ,
    //             'desp' => 'ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 7
    //         ],
    //         [
    //             'name' => 'ក្រសួងប្រៃសនីយ៍ និងគមនាគមន៍' ,
    //             'desp' => 'ក្រសួងប្រៃសនីយ៍ និងគមនាគមន៍',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 8
    //         ],
    //         [
    //             'name' => 'ក្រសួងផែនការ' ,
    //             'desp' => 'ក្រសួងផែនការ',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 9
    //         ],
    //         [
    //             'name' => 'ក្រសួង រ៉ែ និងថាមពល' ,
    //             'desp' => 'ក្រសួង រ៉ែ និងថាមពល',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 10
    //         ],
    //         [
    //             'name' => 'ក្រសួងឧស្សាហកម្ម សប្បកម្ម និងនិវានុវឌ្ឍន៍' ,
    //             'desp' => 'ក្រសួងឧស្សាហកម្ម សប្បកម្ម និងនិវានុវឌ្ឍន៍',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 11
    //         ],
    //         [
    //             'name' => 'ក្រសួងធនធានទឺក និងឧតុនិយម' ,
    //             'desp' => 'ក្រសួងធនធានទឺក និងឧតុនិយម',
    //             'model' => '' ,
    //             'tpid' => $regulatorOrganizationTag->id ,
    //             'pid' => $regulatorOrganizationTag->id ,
    //             'image' => '' ,
    //             'record_index' => 12
    //         ]
    //     ] ); 
    //     $regulatorOrganizations = [] ;
    //     // Add regulators to folder
    //     for( $i=0; $i<= $totalUsers ; $i++ ){
    //         // Create folder & Assign to the owner
    //         $regulatorOrganizations[] = [
    //             'regulator_id' => rand(1, $totalRegulators ),
    //             'organization_id' => rand(32,44)
    //         ];
    //     }
    //     \DB::table('organization_regulators')->insert( $regulatorOrganizations );

    //     $foldersArray = [] ;
    //     $folderRegulatorsArray = [] ;
    //     // Add regulators to folder
    //     for( $i=0; $i<= $totalFolders ; $i++ ){
    //         $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ;
    //         // Create folder & Assign to the owner
    //         $foldersArray[] = [
    //             'name' => 'folder ' . ($i+1)  . ' => ' . fake()->name ,
    //             'user_id' => $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ,
    //             'pid' => 0 ,
    //             'active' => 1
    //         ];
    //         // Add regulators into folder
    //         $folderRegulatorsArray[] = [
    //             'folder_id' => rand(1 , $totalFolders ) ,
    //             'regulator_id' => rand(1, $totalRegulators )
    //         ];
    //     }
    //     \DB::table('folders')->insert( $foldersArray );
    //     \DB::table('regulator_folders')->insert( $folderRegulatorsArray );

    //     $regulatorFavorites = [] ;
    //     for( $i=0; $i<= $totalUsers ; $i++ ){
    //         $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ;
    //         // Create folder & Assign to the owner
    //         $regulatorFavorites[] = [
    //             'user_id' => $editorId ,
    //             'regulator_id' => rand(1,$totalRegulators)
    //         ];
    //         $regulatorFavorites[] = [
    //             'user_id' => $editorId ,
    //             'regulator_id' => rand(1,$totalRegulators)
    //         ];
    //         $regulatorFavorites[] = [
    //             'user_id' => $editorId ,
    //             'regulator_id' => rand(1,$totalRegulators)
    //         ];
    //     }
    //     \DB::table('regulator_favorites')->insert( $regulatorFavorites );

    //     // Create root regulator
    //     \DB::table('regulator_parents')->insert( [
    //         'name' => "ឯកសារមេ" ,
    //         'regulator_id' => rand(1,$totalRegulators) ,
    //         'tpid' => NULL ,
    //         'pid' => NULL
    //     ] );
    //     $rootRegulator = \DB::table('regulator_parents')->whereNull('pid')->whereNull('tpid')->first();
    //     for( $i=0; $i<100 ; $i++ ){
    //         // Create folder & Assign to the owner
    //         \DB::table('regulator_parents')->insert( [
    //             'name' => substr(fake()->paragraph(),0,20 ) ,
    //             'regulator_id' => rand(1,$totalRegulators),
    //             'tpid' => $rootRegulator->id ,
    //             'pid' => \DB::table('regulator_parents')->inRandomOrder()->first()->id
    //         ] );
    //     }

        $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(RegulatorsTableSeeder::class);
        $this->call(RegulatorTypesTableSeeder::class);
        $this->call(RegulatorSignaturesTableSeeder::class);
        $this->call(OrganizationRegulatorsTableSeeder::class);
        $this->call(OrganizationOwnRegulatorsTableSeeder::class);
        $this->call(OrganizationRelatedRegulatorsTableSeeder::class);
    }
}
