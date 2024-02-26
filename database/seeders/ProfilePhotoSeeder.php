<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Fetch all the users to assign them a profile picture from generated ai
         */
        echo 'START GENERATING USER PROFILE PHOTO' . PHP_EOL;
        \App\Models\User::all()->map(function($user){
            $filename = $user->id.'-pf-tmp';
            $tempImage = tempnam(sys_get_temp_dir(), $filename);

            $imageUrl = json_decode ( $this->readPageWithCurl( 'https://100k-faces.glitch.me/random-image-url' ) );
            if( file_put_contents( $tempImage, $this->readPageWithCurl( $imageUrl->url ) ) ){
                $uniqeName = Storage::disk('public')->putFile( 'avatars/'.$user->id , new File( $tempImage ) );
                $user->avatar_url = $uniqeName ;
                $user->save();
                echo Storage::disk('public')->url( $user->avatar_url ) . PHP_EOL;
                unlink( $tempImage );
            }

            echo "GENERATED PROFILE FOR USER : " . $user->id . ' - ' . $user->lastname . ' ' . $user->firstname . PHP_EOL ;
        });
        echo 'END GENERATING USER PROFILE PHOTO' . PHP_EOL;
    }
    function readPageWithCurl($url){
        $data = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_URL, $url );
    
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    // function requestFengShui(){
    //     $data = null;
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch,CURLOPT_URL, 'http://fengshui.vi-school.com/calculate' );
    
    //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //     curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    //     $data = curl_exec($ch);
    //     curl_close($ch);
    //     dd( $data );
    // }
}
