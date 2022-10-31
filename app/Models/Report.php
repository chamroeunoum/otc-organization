<?php

namespace App\Models;

use App\Models\Document;
use App\Models\Ministry;
use DB;

class Report
{
	public static function totalDocumentBaseOnYears($type=false, $ministry=false, $year=false, $month=false){
		$where = array();
		if ($type != false) $where[] = ['documents.document_type', '=', $type];
		if ($ministry != false) $where[] = ['document_ministries.ministry_id', '=', $ministry];
		if ($year != false) $where[] = ['documents.document_year', 'like', '%' . $year . ($month != false ? '-$month%' : '%')];
		$documents = DB::table('documents')->select([DB::raw("substr(document_year, 1, 4) AS year"), DB::raw("substr(document_year, 6, 2) AS month"), DB::raw("COUNT(*) AS total")])
				->join('document_ministries', 'document_ministries.document_id', '=', 'documents.id')
				->where($where)->groupBy('year', 'month')->get();

		$arr = array();
		foreach ($documents as $document){
			if(is_numeric($document->year)){
				$arr[$document->year][$document->month] = $document->total;
			}
		}

		/* format data */
		$newarr = array();
		$grandTotal = 0;
		foreach ($arr as $key => $value){
			$total = 0;
			$subarr = array();
			for($i=1; $i<=12; $i++){
				$exist = false;
				foreach($value as $k => $v){
					if ($i == $k) {
						$subarr[$i] = $v;
						$total += $v;
						$grandTotal += $v;
						$exist = true;
						break;
					}
				}

				if(!$exist) $subarr[$i] = 0;
			}

			$doc = new \stdClass();
			$doc->items = $subarr;
			$doc->total = $total;
			$newarr[$key] = $doc;
		}

		$data = new \stdClass();
		$data->documents = $newarr;
		$data->total = $grandTotal;

		return $data;
	}


	public static function totalDocumentBaseOnTypes($type=false, $ministry=false, $year=false, $month=false){
		$where = array();
		if ($type != false) $where[] = ['documents.document_type', '=', $type];
		if ($ministry != false) $where[] = ['document_ministries.ministry_id', '=', $ministry];
		if ($year != false) $where[] = ['documents.document_year', 'like', '%' . $year . ($month != false ? '-$month%' : '%')];
		$documents = DB::table('documents')->select([DB::raw("substr(document_year, 1, 4) AS year"), 'document_type', DB::raw("COUNT(*) AS total")])
				->join('document_ministries', 'document_ministries.document_id', '=', 'documents.id')
				->where($where)->groupBy('year', 'document_type')->get();

		$arr = array();
		foreach ($documents as $document){
			if(is_numeric($document->year)){
				$arr[$document->year][$document->document_type] = $document->total;
			}
		}

		/* format data */
		$docTypes = Type::select(['id', 'name', 'format'])->where('deleted_by', '=', 0)->get();
		$newarr = array();
		$grandTotal = 0;
		foreach ($arr as $key => $value){
			$total = 0;
			$subarr = array();
			foreach($docTypes as $docType){
				$exist = false;
				foreach($value as $k => $v){
					if ($docType->id == $k) {
						$subarr[$docType->id] = $v;

						$total += $v;
						$grandTotal += $v;
						$exist = true;
						break;
					}
				}

				if(!$exist) $subarr[$docType->id] = 0;
			}

			$doc = new \stdClass();
			$doc->items = $subarr;
			$doc->total = $total;
			$newarr[$key] = $doc;
		}

		$docTypesArr = array();
		foreach($docTypes as $docType){
			$docTypesArr[$docType->id] = array(
				'name' => $docType->name,
				'format' => $docType->format
			);
		}

		$data = new \stdClass();
		$data->doctypes = $docTypesArr;
		$data->documents = $newarr;
		$data->total = $grandTotal;

		return $data;
	}

	public static function totalDocumentBaseOnMinistries($type=false, $ministry=false, $year=false, $month=false){
		if (!$year) $year = date('Y'); // current year is default
		$where = array();
		if ($type != false) $where[] = ['documents.document_type', '=', $type];
		if ($year != false) $where[] = ['documents.document_year', 'like', '%' . $year . ($month != false ? '-$month%' : '%')];
		if ($ministry != false) $where[] = ['document_ministries.ministry_id', '=', $ministry];

		$documents = DB::table('document_ministries')->select([DB::raw("substr(document_year, 1, 4) AS year"), DB::raw("substr(document_year, 6, 2) AS month"), DB::raw("COUNT(*) AS total"), DB::raw('ministries.id AS ministry_id')])
				->join('documents', 'document_ministries.document_id', '=', 'documents.id')
				->join('ministries', 'document_ministries.ministry_id', '=', 'ministries.id')->where($where)->groupBy('ministries.id', 'year', 'month')->orderBy('ministries.id')->get()->toArray();


		/* format data */
		$ministries = $ministry ? Ministry::where('id', '=', $ministry)->get()->toArray() : Ministry::all();
		$result = array();
		$grandTotal = 0;
		foreach($ministries as $minis) {
			$newarr = array();
			$total = 0;
			for($i=1; $i<=12; $i++) {
				$exist = false;
				foreach($documents as $key => $doc){
					if ($doc->ministry_id == $minis->id && $doc->month == $i){
						$newarr[$i] = $doc->total;
						$exist = true;
						$total += $doc->total;
						$grandTotal += $doc->total;
						unset($documents[$key]);
						break;
					}
				}
				if(!$exist) $newarr[$i] = 0;
			}

			$docs = new \stdClass();
			$docs->items = $newarr;
			$docs->total = $total;
			$docs->ministry_name = $minis->name;
			$result[$minis->id] = $docs;
		}

		$res = new \stdClass();
		$res->documents = $result;
		$res->total = $grandTotal;

		return $res;
	}
}