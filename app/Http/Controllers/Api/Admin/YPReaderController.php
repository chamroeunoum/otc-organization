<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class YPReaderController extends Controller
{
    
    /**
     * Listing categories
     */
    public function byCategories(Request $request){
        $categories = [] ;
        for( $i = 1 ; $i <=12 ; $i++ ) {
            $xpathResult = $this->readPageWithCurl( "https://ypkhmer.com/category/subcategory/all?page=".$i , "//div[@class='row pb-2']/div[@class='col-md-6 col-12']/a[@class='section-b']" );

            foreach($xpathResult as $dlsIndex => $dl ) {
                if( $dl === null ) continue ;
                $category = [
                    'name' => str_replace([" ","\n","•"],[""],$dl->childNodes[1]->textContent ) ,
                    'url' => $dl->attributes[0]->value
                ];

                /**
                 * Read the items within each categories
                 */
                $dataItems = $this->readPageWithCurl( $dl->attributes[0]->value , "//ul[@class='pagination']/li[@class='page-item']" );
                if( $dataItems[ $dataItems->length - 2 ] == null ) continue;
                $totalPage = $dataItems[ $dataItems->length - 2 ]->textContent ;
                for($i=1; $i<=$totalPage;$i++){
                    $items = $this->readPageWithCurl( $dl->attributes[0]->value . "?page=" . $i , "//div[@class='row no-gutters mb-3 item p-0 border-red rounded']/div[@class='col-md-9 col-10']/div[@class='card-body p-0 pl-1 h-100 min-h-150']" );
                    $itemInfo = [] ;
                    foreach( $items AS $itemIndex => $item ){
                        $itemInfo['name'] = str_replace([" ","\n","•"],[""], $item->childNodes[1]->textContent ) ;
                        $itemInfo['category'] = str_replace([" ","\n","•"],[""], $item->childNodes[5]->textContent ) ;
                        $itemInfo['phone'] = explode('/',str_replace([" ","\n","•"],[""], $item->childNodes[7]->textContent ) ) ;
                        $itemInfo['address'] = explode(',',str_replace([" ","\n","•"],[""], $item->childNodes[9]->textContent ) ) ;
                    }
                    $category['childs'][] = $itemInfo ;
                }
                $categories[] = $category ;
            }
            dd( $categories );
        }
        
        // return response()->json( [
        //     'categories' => $categories
        // ] , 200);
    }

    /**
     * Listing categories items
     */
    public function byCategoriesItems(Request $request){
        
        return response()->json( [] , 200);
    }
    
    private function readPageWithCurl($url, $query){
        $data = null;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_URL, $url );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        $data = curl_exec($ch);
        curl_close($ch);

        $doc = new \DOMDocument;
        libxml_use_internal_errors(true);
        // We don't want to bother with white spaces
        $doc->preserveWhiteSpace = false;
        $doc->loadHTML($data);
        $xpath = new \DOMXPath($doc);
        return $xpath->query($query);
      }
}
