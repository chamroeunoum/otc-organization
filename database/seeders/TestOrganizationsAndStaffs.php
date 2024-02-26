<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestOrganizationsAndStaffs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backendMember = \App\Models\Role::where(['name' => 'backend', 'guard_name' => 'api' , 'tag' => 'core_service'])->first();
        // dd( $backendMember );
        $organizationModel = new \App\Models\Regulator\Tag\Organization();
        $organization = \App\Models\Regulator\Tag\Organization::where('model', get_class( $organizationModel ) )->first();

        $positionModel = new \App\Models\Regulator\Tag\Position();
        $position = \App\Models\Regulator\Tag\Position::where('model', get_class( $positionModel ) )->first();

        // Position        
        // 490 => "នាយករដ្ឋមន្ត្រី"
        // 491 => "ឧបនាយករដ្ឋមន្ត្រី"
        // 492 => "ទេសរដ្ឋមន្ត្រី"
        // 493 => "រដ្ឋមន្ត្រី"
        // 494 => "រដ្ឋលេខាធិការ"
        // 495 => "អនុរដ្ឋលេខាធិការ"
        // 496 => "អគ្គនាយក"
        // 497 => "អគ្គនាយករង"
        // 498 => "ប្រធាននាយកដ្ឋាន"
        // 499 => "អនុប្រធាននាយកដ្ឋាន"
        // 500 => "ប្រធានការិយាល័យ"
        // 501 => "អនុប្រធានការិយាល័យ"
        // 502 => "មន្ត្រី"
        // 503 => "មន្ត្រីហាត់ការ"

        echo "CREATED MINISTER..." . PHP_EOL ;
        // Ministry
        $officeOfCouncil = $organization->where('id',164)->first() ;
        // dd( $officeOfCouncil->childNodes->pluck('name','id') );
        $account = \App\Models\User::create([
            'firstname' => 'រដ្ឋមន្ត្រី' ,
            'lastname' => $officeOfCouncil->name ,
            'email' => 'dpminister'.$officeOfCouncil->id.'@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => '010517515' ,
            'username' => 'general'.$officeOfCouncil->id
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $account->firstname , 
            'lastname' => $account->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $account->phone , 
            'email' => $account->email
        ]);
        $account->people_id = $people->id ;
        $account->save();
        $account->assignRole( $backendMember );
        // Set user as a staff of an organization
        $account->organizations()->sync( [$officeOfCouncil->id]  );
        // Set user as a leader of an organization
        $account->organizationLeader()->sync( [$officeOfCouncil->id]  );
        // Set the position of a user
        $account->positions()->sync( [ 491 ] );
        


        // General Department
        foreach( $officeOfCouncil->childNodes->pluck('name','id') AS $gid => $gname ){
            echo "CREATED GENERAL DEPARTMENT..." . PHP_EOL ;
            $account = \App\Models\User::create([
                'firstname' => 'អគ្គនាយក' ,
                'lastname' => $gname ,
                'email' => 'general'.$gid.'@gmail.com' ,
                'active' => 1 ,
                'password' => bcrypt('1234567890+1') ,
                'phone' => '010517515' ,
                'username' => 'general'.$gid
            ]);
            
            $people = \App\Models\People\People::create([
                'firstname' => $account->firstname , 
                'lastname' => $account->lastname , 
                'gender' => 0 , // Male
                'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
                'mobile_phone' => $account->phone , 
                'email' => $account->email
            ]);
            $account->people_id = $people->id ;
            $account->save();
            $account->assignRole( $backendMember );
            $account->organizations()->sync( [$gid]  );
            // Set user as a leader of an organization
            $account->organizationLeader()->sync( [$gid]  );
            $account->positions()->sync( [ 496 ] );

            // Department
            foreach( $organization->find( $gid )->childNodes->pluck('name','id') AS $did => $dname ){
                echo "CREATED DEPARTMENT..." . PHP_EOL ;
                $account = \App\Models\User::create([
                    'firstname' => 'ប្រធាន' ,
                    'lastname' => $dname ,
                    'email' => 'department'.$did.'@gmail.com' ,
                    'active' => 1 ,
                    'password' => bcrypt('1234567890+1') ,
                    'phone' => '010517515' ,
                    'username' => 'department'.$did
                ]);
                
                $people = \App\Models\People\People::create([
                    'firstname' => $account->firstname , 
                    'lastname' => $account->lastname , 
                    'gender' => 0 , // Male
                    'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
                    'mobile_phone' => $account->phone , 
                    'email' => $account->email
                ]);
                $account->people_id = $people->id ;
                $account->save();
                $account->assignRole( $backendMember );
                $account->organizations()->sync( [$did]  );
                // Set user as a leader of an organization
                $account->organizationLeader()->sync( [$did]  );
                $account->positions()->sync( [ 498 ] );

                // Office 
                // foreach( $organization->find( $did )->childNodes->pluck('name','id') AS $oid => $oname ){
                //     echo "CREATED OFFICE..." . PHP_EOL ;
                //     $account = \App\Models\User::create([
                //         'firstname' => 'ប្រធានការិយាល័យ' ,
                //         'lastname' => $oname ,
                //         'email' => 'office'.$did.'@gmail.com' ,
                //         'active' => 1 ,
                //         'password' => bcrypt('1234567890+1') ,
                //         'phone' => '010517515' ,
                //         'username' => 'office'.$did
                //     ]);
                    
                //     $people = \App\Models\People\People::create([
                //         'firstname' => $account->firstname , 
                //         'lastname' => $account->lastname , 
                //         'gender' => 0 , // Male
                //         'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
                //         'mobile_phone' => $account->phone , 
                //         'email' => $account->email
                //     ]);
                //     $account->people_id = $people->id ;
                //     $account->save();
                //     $account->assignRole( $backendMember );
                //     $account->organizations()->sync( [$oid]  );
                //     $account->positions()->sync( [$position->find( 500 )->id ] );
                    for( $i = 1 ; $i <= 20 ; $i++ ){
                        echo "CREATED STAFF..." . PHP_EOL ;
                        $account = \App\Models\User::create([
                            'firstname' => 'មន្ត្រី' ,
                            'lastname' => $dname ,
                            'email' => 'officer'.$i.'@gmail.com' ,
                            'active' => 1 ,
                            'password' => bcrypt('1234567890+1') ,
                            'phone' => '010517515' ,
                            'username' => 'office'.$i
                        ]);
                        
                        $people = \App\Models\People\People::create([
                            'firstname' => $account->firstname , 
                            'lastname' => $account->lastname , 
                            'gender' => 0 , // Male
                            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
                            'mobile_phone' => $account->phone , 
                            'email' => $account->email
                        ]);
                        $account->people_id = $people->id ;
                        $account->save();
                        $account->assignRole( $backendMember );
                        $account->organizations()->sync( [$did]  );
                        $account->positions()->sync( [ 502 ] );
                    }
                // }
            }
        }
    }
}
