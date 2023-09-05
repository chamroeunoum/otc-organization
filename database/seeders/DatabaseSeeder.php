<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $backendMember = \App\Models\Role::create(['name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service']);
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

        for( $i=0 ; $i<100; $i++ ){
            /**
             * Create client user for development purpose
             */
            list($firstname,$lastname) = explode(' ', fake()->name());
            $clientUser = \App\Models\User::create([
                'firstname' => $firstname ,
                'lastname' => $lastname ,
                'email' => 'client'.($i+1).'@edoc.com' ,
                'active' => 1 ,
                'password' => bcrypt('1234567890+1') ,
                'phone' => fake()->phoneNumber() ,
                'username' => strtolower($firstname.$lastname)
            ]);
            
            $clientPeople = \App\Models\People\People::create([
                'firstname' => $clientUser->firstname , 
                'lastname' => $clientUser->lastname , 
                'gender' => 0 , // Male
                'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
                'mobile_phone' => $clientUser->phone , 
                'email' => $clientUser->email
            ]);
            $clientUser->people_id = $clientPeople->id ;
            $clientUser->save();
            $clientUser->assignRole( $client );
        }

        /**
         * Create Tag Document Type 
         */
        \DB::table('tags')->insert([
            [
                'name' => 'ប្រភេទឯកសារ' ,
                'desp' => 'ប្រភេទឯកសារផ្លូវការរបស់ព្រះរាជាណាចក្រកម្ពុជា។' ,
                'model' => 'App\Models\Document\Tag\Type' ,
                'pid' => null ,
                'tpid' => null ,
                'image' => '' ,
                'record_index' => 0 
            ]
        ]);
        $documentTypeTag = \DB::table('tags')->where('model','App\Models\Document\Tag\Type')->whereNull('tpid')->orWhere('tpid',0)->first();
    
        \DB::table('tags')->insert( [
            [
                'name' => 'ព្រះរាជក្រម' ,
                'desp' => 'ព្រះរាជក្រម' ,
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 1 

            ],
            [
                'name' => 'ព្រះរាជក្រឹត្យ.បក' ,
                'desp' => 'ព្រះរាជក្រឹត្យ.បក',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 2
            ],
            [
                'name' => 'អនុក្រឹត្យ.បក' ,
                'desp' => 'អនុក្រឹត្យ.បក',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 3
            ],
            [
                'name' => 'ព្រះរាជក្រឹត្យ.តត' ,
                'desp' => 'ព្រះរាជក្រឹត្យ.តត',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 4
            ],
            [
                'name' => 'អនុក្រឹត្យ.តត' ,
                'desp' => 'អនុក្រឹត្យ.តត',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 5 
            ],
            [
                'name' => 'សជណ' ,
                'desp' => 'សជណ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 6 
            ],
            [
                'name' => 'សេចក្ដីសម្រេច' ,
                'desp' => 'សេចក្ដីសម្រេច',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 7 
            ],
            [
                'name' => 'សារាចរ និង សារាចរណែនាំ' ,
                'desp' => 'សារាចរ និង សារាចរណែនាំ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 8
            ],
            [
                'name' => 'ប្រកាស' ,
                'desp' => 'ប្រកាស',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 9 
            ],
            [
                'name' => 'គោលនយោបាយជាតិ' ,
                'desp' => 'គោលនយោបាយជាតិ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 10 
            ],
            [
                'name' => 'ផែនការយុទ្ធសាស្ត្រ' ,
                'desp' => 'ផែនការយុទ្ធសាស្ត្រ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 11 
            ],
            [
                'name' => 'បទបញ្ជារាជរដ្ឋាភិបាល' ,
                'desp' => 'បទបញ្ជារាជរដ្ឋាភិបាល',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 12 
            ],
            [
                'name' => 'ផែនការសកម្មភាពក្រសួងនានា' ,
                'desp' => 'ផែនការសកម្មភាពក្រសួងនានា',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 13
            ],
            [
                'name' => 'ផែនការសកម្មភាពក្រសួងនានា' ,
                'desp' => 'ផែនការសកម្មភាពក្រសួងនានា',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 14
            ],
            [
                'name' => 'របាយការណ៍ប្រចាំថ្ងៃ' ,
                'desp' => 'របាយការណ៍ប្រចាំថ្ងៃ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 15
            ],
            [
                'name' => 'របាយការណ៍ប្រចាំខែ' ,
                'desp' => 'របាយការណ៍ប្រចាំខែ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 16 
            ],
            [
                'name' => 'របាយការណ៍ការប្រចាំឆ្នាំ' ,
                'desp' => 'របាយការណ៍ការប្រចាំឆ្នាំ',
                'model' => '' ,
                'tpid' => $documentTypeTag->id ,
                'pid' => $documentTypeTag->id ,
                'image' => '' ,
                'record_index' => 17
            ]
        ] ); 

        $editorIds = \App\Models\User::whereHas('roles',function($query){ $query->where('name','Client'); })->inRandomOrder()->get()->pluck('id') ;
        $documentsArray = [] ;
        for( $i=0; $i<=1000 ; $i++ ){
            $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ;
            $date = $i % 2 ? \Carbon\Carbon::now()->addMonths( rand(1,10) ) : \Carbon\Carbon::now()->subMonths( rand(1,10) ) ;
            $documentsArray[] = [
                'fid' => sprintf( "%4d" , ( $i+1 ) ) ,
                'title' => fake()->title() ,
                'objective' => 'document ' . ($i+1) . ' => ' . fake()->paragraph() ,
                'document_year' => $date->format('Y-m-d') ,
                'publish' => 1 ,
                'active' => 1 ,
                'created_by' => $editorId ,
                'updated_by' => $editorId ,
                'accessibility' => 2
            ];
        }
        \DB::table('documents')->insert( $documentsArray );

        $documentTypes = [] ;
        // Add documents to folder
        for( $i=0; $i<=100 ; $i++ ){
            // Create folder & Assign to the owner
            $documentTypes[] = [
                'document_id' => rand(1, 1000 ),
                'type_id' => rand(2,18)
            ];
        }
        \DB::table('document_types')->insert( $documentTypes );
        
        /**
         * Create Tag Document Signature 
         */
        \DB::table('tags')->insert([
            [
                'name' => 'ឈ្មោះហត្ថលេខា' ,
                'desp' => 'ឈ្មោះថ្នាក់ដឹកនាំដែលបានចុះហត្ថលេខាលើឯកសារ' ,
                'model' => 'App\Models\Document\Tag\Signature' ,
                'tpid' => null ,
                'pid' => null ,
                'image' => '' ,
                'record_index' => 0 
            ]
        ]);
        $documentSignatureTag = \DB::table('tags')->where('model','App\Models\Document\Tag\Signature')->whereNull('tpid')->orWhere('tpid',0)->first();
    
        \DB::table('tags')->insert( [
            [
                'name' => 'ហ៊ុន សែន' ,
                'desp' => 'ហ៊ុន សែន' ,
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 1
            ],
            [
                'name' => 'ជា ស៊ីម' ,
                'desp' => 'ជា ស៊ីម',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' =>2
            ],
            [
                'name' => 'ហេង សំរិន' ,
                'desp' => 'ហេង សំរិន',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 3
            ],
            [
                'name' => 'សាយ ឈុំ' ,
                'desp' => 'សាយ ឈុំ',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 4
            ],
            [
                'name' => 'ត្រាំ អ៊ីវតឹក' ,
                'desp' => 'ត្រាំ អ៊ីវតឹក',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 5
            ],
            [
                'name' => 'ជា សុផារ៉ា' ,
                'desp' => 'ជា សុផារ៉ា',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 6
            ],
            [
                'name' => 'ស៊ុន ចាន់ថុល' ,
                'desp' => 'ស៊ុន ចាន់ថុល',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 7
            ],
            [
                'name' => 'ជា វ៉ាន់ដេត' ,
                'desp' => 'ជា វ៉ាន់ដេត',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 8
            ],
            [
                'name' => 'សាយ សំអាល់' ,
                'desp' => 'សាយ សំអាល់',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 9
            ],
            [
                'name' => 'ទៀ បាញ់' ,
                'desp' => 'ទៀ បាញ់',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 10
            ],
            [
                'name' => 'ស ខេង' ,
                'desp' => 'ស ខេង',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 11
            ],
            [
                'name' => 'ម៉ែន សំអន' ,
                'desp' => 'ម៉ែន សំអន',
                'model' => '' ,
                'tpid' => $documentSignatureTag->id ,
                'pid' => $documentSignatureTag->id ,
                'image' => '' ,
                'record_index' => 12
            ]
        ] ); 
        $documentSignatures = [] ;
        // Add documents to folder
        for( $i=0; $i<=100 ; $i++ ){
            // Create folder & Assign to the owner
            $documentSignatures[] = [
                'document_id' => rand(1, 1000 ),
                'signature_id' => rand(20,31)
            ];
        }
        \DB::table('document_signatures')->insert( $documentSignatures );

        /**
         * Create Tag Document Ministry 
         */
        \DB::table('tags')->insert([
            [
                'name' => 'ឈ្មោះអង្គភាព' ,
                'desp' => 'ឈ្មោះអង្គភាពរាជរដ្ឋាភិបាល និងក្រៅរដ្ឋាភិបាល' ,
                'model' => 'App\Models\Document\Tag\Organization' ,
                'tpid' => null ,
                'pid' => null ,
                'image' => '' ,
                'record_index' => 0
            ]
        ]);
        $documentOrganizationTag = \DB::table('tags')->where('model','App\Models\Document\Tag\Organization')->whereNull('tpid')->orWhere('tpid',0)->first();
    
        \DB::table('tags')->insert( [
            [
                'name' => 'ទីស្ដីការគណៈរដ្ឋមន្ត្រី' ,
                'desp' => 'ទីស្ដីការគណៈរដ្ឋមន្ត្រី' ,
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id , 
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 1
            ],
            [
                'name' => 'ក្រសួងមហាផ្ទៃ' ,
                'desp' => 'ក្រសួងមហាផ្ទៃ',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 2
            ],
            [
                'name' => 'ក្រសួងការពារជាតិ' ,
                'desp' => 'ក្រសួងការពារជាតិ',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 3
            ],
            [
                'name' => 'ក្រសួងរៀបចំដែនដី និងនគររូបនីយកម្ម' ,
                'desp' => 'ក្រសួងរៀបចំដែនដី និងនគររូបនីយកម្ម',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 4
            ],
            [
                'name' => 'ក្រសួងសាធារណៈការ និងដឹកជញ្ជូន' ,
                'desp' => 'ក្រសួងសាធារណៈការ និងដឹកជញ្ជូន',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 5
            ],
            [
                'name' => 'ក្រសួងបរិស្ថាន' ,
                'desp' => 'ក្រសួងបរិស្ថាន',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 6
            ],
            [
                'name' => 'ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ' ,
                'desp' => 'ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 7
            ],
            [
                'name' => 'ក្រសួងប្រៃសនីយ៍ និងគមនាគមន៍' ,
                'desp' => 'ក្រសួងប្រៃសនីយ៍ និងគមនាគមន៍',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 8
            ],
            [
                'name' => 'ក្រសួងផែនការ' ,
                'desp' => 'ក្រសួងផែនការ',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 9
            ],
            [
                'name' => 'ក្រសួង រ៉ែ និងថាមពល' ,
                'desp' => 'ក្រសួង រ៉ែ និងថាមពល',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 10
            ],
            [
                'name' => 'ក្រសួងឧស្សាហកម្ម សប្បកម្ម និងនិវានុវឌ្ឍន៍' ,
                'desp' => 'ក្រសួងឧស្សាហកម្ម សប្បកម្ម និងនិវានុវឌ្ឍន៍',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 11
            ],
            [
                'name' => 'ក្រសួងធនធានទឺក និងឧតុនិយម' ,
                'desp' => 'ក្រសួងធនធានទឺក និងឧតុនិយម',
                'model' => '' ,
                'tpid' => $documentOrganizationTag->id ,
                'pid' => $documentOrganizationTag->id ,
                'image' => '' ,
                'record_index' => 12
            ]
        ] ); 
        $documentOrganizations = [] ;
        // Add documents to folder
        for( $i=0; $i<=100 ; $i++ ){
            // Create folder & Assign to the owner
            $documentOrganizations[] = [
                'document_id' => rand(1, 1000 ),
                'organization_id' => rand(32,44)
            ];
        }
        \DB::table('organization_documents')->insert( $documentOrganizations );

        $foldersArray = [] ;
        $folderDocumentsArray = [] ;
        // Add documents to folder
        for( $i=0; $i<=100 ; $i++ ){
            $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ;
            // Create folder & Assign to the owner
            $foldersArray[] = [
                'name' => 'folder ' . ($i+1)  . ' => ' . fake()->name ,
                'user_id' => $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ,
                'pid' => 0 ,
                'active' => 1
            ];
            // Add documents into folder
            $folderDocumentsArray[] = [
                'folder_id' => rand(1 , 100 ) ,
                'document_id' => rand(1, 1000 )
            ];
        }
        \DB::table('folders')->insert( $foldersArray );
        \DB::table('document_folders')->insert( $folderDocumentsArray );

        $documentFavorites = [] ;
        for( $i=0; $i<=100 ; $i++ ){
            $editorId = $editorIds[ rand( 0 , count( $editorIds ) - 1 ) ] ;
            // Create folder & Assign to the owner
            $documentFavorites[] = [
                'user_id' => $editorId ,
                'document_id' => rand(1,1000)
            ];
            $documentFavorites[] = [
                'user_id' => $editorId ,
                'document_id' => rand(1,1000)
            ];
            $documentFavorites[] = [
                'user_id' => $editorId ,
                'document_id' => rand(1,1000)
            ];
        }
        \DB::table('document_favorites')->insert( $documentFavorites );

        // Create root document
        \DB::table('document_parents')->insert( [
            'name' => "ឯកសារមេ" ,
            'document_id' => rand(1,1000) ,
            'tpid' => NULL ,
            'pid' => NULL
        ] );
        $rootDocument = \DB::table('document_parents')->whereNull('pid')->whereNull('tpid')->first();
        for( $i=0; $i<100 ; $i++ ){
            // Create folder & Assign to the owner
            \DB::table('document_parents')->insert( [
                'name' => substr(fake()->paragraph(),0,20 ) ,
                'document_id' => rand(1,1000),
                'tpid' => $rootDocument->id ,
                'pid' => \DB::table('document_parents')->inRandomOrder()->first()->id
            ] );
        }

        // $this->call(DocumentsTableSeeder::class);
        // $this->call(TagsTableSeeder::class);
    }
}
