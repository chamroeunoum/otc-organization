<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\Admin\YPReaderController;

class YPReader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ypreader:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'Start reading' . PHP_EOL ;
        $categoryCounter = 0 ;
        for( $i = 1 ; $i <=12 ; $i++ ) {
            $xpathResult = YPReaderController::readPageWithCurl( "https://ypkhmer.com/category/subcategory/all?page=".$i , "//div[@class='col-md-6 col-12']/a[@class='section-b']" );
            if( $xpathResult == false ) continue;
            foreach($xpathResult as $dlsIndex => $dl ) {
                $categoryCounter++;
            //     if( $dl === null ) continue ;
                // $category = [
                //     'name' => str_replace([" ","\n","•"],[""],$dl->childNodes[1]->textContent ) ,
                //     'url' => $dl->attributes[0]->value ,
                //     'childs' => []
                // ];
                $categoryObj = \App\Models\YPCategory::where('name', str_replace([" ","\n","•"],[""],$dl->childNodes[1]->textContent ) )->first() ;
                if( $categoryObj === null ){
                    $categoryObj = \App\Models\YPCategory::create([
                        'name' => str_replace([" ","\n","•"],[""],$dl->childNodes[1]->textContent )
                    ]);
                    echo( $categoryCounter . ' : ' . $categoryObj->name . ' has been saved.' . PHP_EOL ) ;
                }

                /**
                 * Read the items within each categories
                 */
                $dataItems = YPReaderController::readPageWithCurl( $dl->attributes[0]->value , "//ul[@class='pagination']/li[@class='page-item']" );
                if( $dataItems == false ) continue;
                $totalPage = $dataItems[ $dataItems->length - 2 ] == null ? 1 : $dataItems[ $dataItems->length - 2 ]->textContent ;
                $childCounter = 0 ;
                for($i=1; $i<=$totalPage;$i++){
                    $items = YPReaderController::readPageWithCurl( $dl->attributes[0]->value . "?page=" . $i , "//div[@class='card-body p-0 pl-1 h-100 min-h-150']" );
                    if( $items == false ) continue;
                    foreach( $items AS $itemIndex => $item ){
                        $childCounter++;
                        // $category['childs'][] = [
                        //     'name' => str_replace([" ","\n","•"],[""], $item->childNodes[1]->textContent ) ,
                        //     'category' => str_replace([" ","\n","•"],[""], $item->childNodes[5]->textContent ) ,
                        //     'phone' => explode('/',str_replace([" ","\n","•"],[""], $item->childNodes[7]->textContent ) ) ,
                        //     'address' => explode(',',str_replace([" ","\n","•"],[""], $item->childNodes[9]->textContent ) )
                        // ];
                        $ypProduct = \App\Models\YPProduct::create([
                            'name' => str_replace([" ","\n","•"],[""], $item->childNodes[1]->childNodes[1]->childNodes[1]->textContent ) ,
                            'category' => $categoryObj->id ,
                            'phone' => str_replace([" ","\n","•"],[""], $item->childNodes[7]->textContent ) ,
                            'address' => str_replace([" ","\n","•"],[""], $item->childNodes[9]->textContent )
                        ]);                        
                        echo( $categoryCounter . ' : ' . $categoryObj->name . ', ' . $childCounter . ' => ' . $ypProduct->name . PHP_EOL ) ;
                    }
                }
            }
        }
        echo 'Finish reading' . PHP_EOL ;
        return Command::SUCCESS;
    }
}
