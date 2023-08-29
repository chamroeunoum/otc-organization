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
            'firstname' => $chamroeunoum->firstname , 
            'lastname' => $chamroeunoum->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $puthireach->phone , 
            'email' => $puthireach->email
        ]);
        $puthireach->people_id = $people->id ;
        $puthireach->save();

        /**
         * Create role for the user
         */
        $super = \App\Models\Role::create(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $administrator = \App\Models\Role::create(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $backendMember = \App\Models\Role::create(['name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service']);

        $client = \App\Models\Role::create(['name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp']);


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
                'pid' => 0
            ]
        ]);
        $documentTypeTag = \DB::table('tags')->where('model','App\Models\Document\Tag\Type')->where('pid',0)->first();
    
        \DB::table('tags')->insert( [
            [
                'name' => 'ព្រះរាជក្រម' ,
                'desp' => 'ព្រះរាជក្រម' ,
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'ព្រះរាជក្រឹត្យ.បក' ,
                'desp' => 'ព្រះរាជក្រឹត្យ.បក',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'អនុក្រឹត្យ.បក' ,
                'desp' => 'អនុក្រឹត្យ.បក',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'ព្រះរាជក្រឹត្យ.តត' ,
                'desp' => 'ព្រះរាជក្រឹត្យ.តត',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'អនុក្រឹត្យ.តត' ,
                'desp' => 'អនុក្រឹត្យ.តត',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'សជណ' ,
                'desp' => 'សជណ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'សេចក្ដីសម្រេច' ,
                'desp' => 'សេចក្ដីសម្រេច',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'សារាចរ និង សារាចរណែនាំ' ,
                'desp' => 'សារាចរ និង សារាចរណែនាំ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'ប្រកាស' ,
                'desp' => 'ប្រកាស',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'គោលនយោបាយជាតិ' ,
                'desp' => 'គោលនយោបាយជាតិ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'ផែនការយុទ្ធសាស្ត្រ' ,
                'desp' => 'ផែនការយុទ្ធសាស្ត្រ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'បទបញ្ជារាជរដ្ឋាភិបាល' ,
                'desp' => 'បទបញ្ជារាជរដ្ឋាភិបាល',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'ផែនការសកម្មភាពក្រសួងនានា' ,
                'desp' => 'ផែនការសកម្មភាពក្រសួងនានា',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'ផែនការសកម្មភាពក្រសួងនានា' ,
                'desp' => 'ផែនការសកម្មភាពក្រសួងនានា',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'របាយការណ៍ប្រចាំថ្ងៃ' ,
                'desp' => 'របាយការណ៍ប្រចាំថ្ងៃ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'របាយការណ៍ប្រចាំខែ' ,
                'desp' => 'របាយការណ៍ប្រចាំខែ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
            ],
            [
                'name' => 'របាយការណ៍ការប្រចាំឆ្នាំ' ,
                'desp' => 'របាយការណ៍ការប្រចាំឆ្នាំ',
                'model' => '' ,
                'pid' => $documentTypeTag->id
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
                'pid' => 0
            ]
        ]);
        $documentSignatureTag = \DB::table('tags')->where('model','App\Models\Document\Tag\Signature')->where('pid',0)->first();
    
        \DB::table('tags')->insert( [
            [
                'name' => 'ហ៊ុន សែន' ,
                'desp' => 'ហ៊ុន សែន' ,
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ជា ស៊ីម' ,
                'desp' => 'ជា ស៊ីម',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ហេង សំរិន' ,
                'desp' => 'ហេង សំរិន',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'សាយ ឈុំ' ,
                'desp' => 'សាយ ឈុំ',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ត្រាំ អ៊ីវតឹក' ,
                'desp' => 'ត្រាំ អ៊ីវតឹក',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ជា សុផារ៉ា' ,
                'desp' => 'ជា សុផារ៉ា',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ស៊ុន ចាន់ថុល' ,
                'desp' => 'ស៊ុន ចាន់ថុល',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ជា វ៉ាន់ដេត' ,
                'desp' => 'ជា វ៉ាន់ដេត',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'សាយ សំអាល់' ,
                'desp' => 'សាយ សំអាល់',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ទៀ បាញ់' ,
                'desp' => 'ទៀ បាញ់',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ស ខេង' ,
                'desp' => 'ស ខេង',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
            ],
            [
                'name' => 'ម៉ែន សំអន' ,
                'desp' => 'ម៉ែន សំអន',
                'model' => '' ,
                'pid' => $documentSignatureTag->id
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
                'model' => 'App\Models\Document\Tag\Ministry' ,
                'pid' => 0
            ]
        ]);
        $documentMinistryTag = \DB::table('tags')->where('model','App\Models\Document\Tag\Ministry')->where('pid',0)->first();
    
        \DB::table('tags')->insert( [
            [
                'name' => 'ទីស្ដីការគណៈរដ្ឋមន្ត្រី' ,
                'desp' => 'ទីស្ដីការគណៈរដ្ឋមន្ត្រី' ,
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងមហាផ្ទៃ' ,
                'desp' => 'ក្រសួងមហាផ្ទៃ',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងការពារជាតិ' ,
                'desp' => 'ក្រសួងការពារជាតិ',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងរៀបចំដែនដី និងនគររូបនីយកម្ម' ,
                'desp' => 'ក្រសួងរៀបចំដែនដី និងនគររូបនីយកម្ម',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងសាធារណៈការ និងដឹកជញ្ជូន' ,
                'desp' => 'ក្រសួងសាធារណៈការ និងដឹកជញ្ជូន',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងបរិស្ថាន' ,
                'desp' => 'ក្រសួងបរិស្ថាន',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ' ,
                'desp' => 'ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងប្រៃសនីយ៍ និងគមនាគមន៍' ,
                'desp' => 'ក្រសួងប្រៃសនីយ៍ និងគមនាគមន៍',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងផែនការ' ,
                'desp' => 'ក្រសួងផែនការ',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួង រ៉ែ និងថាមពល' ,
                'desp' => 'ក្រសួង រ៉ែ និងថាមពល',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងឧស្សាហកម្ម សប្បកម្ម និងនិវានុវឌ្ឍន៍' ,
                'desp' => 'ក្រសួងឧស្សាហកម្ម សប្បកម្ម និងនិវានុវឌ្ឍន៍',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ],
            [
                'name' => 'ក្រសួងធនធានទឺក និងឧតុនិយម' ,
                'desp' => 'ក្រសួងធនធានទឺក និងឧតុនិយម',
                'model' => '' ,
                'pid' => $documentMinistryTag->id
            ]
        ] ); 
        $documentMinistries = [] ;
        // Add documents to folder
        for( $i=0; $i<=100 ; $i++ ){
            // Create folder & Assign to the owner
            $documentMinistries[] = [
                'document_id' => rand(1, 1000 ),
                'ministry_id' => rand(32,44)
            ];
        }
        \DB::table('document_ministries')->insert( $documentMinistries );

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
        
        // $this->call(DocumentsTableSeeder::class);
    }
}
