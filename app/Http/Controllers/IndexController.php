<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function getWords($id){
        $WORDS= \DB::table('WORDS')->where('ID_SECTION', $id)->orderBy('ID_WORD','asc')->get();
        return response()->json($WORDS);
    }
    public function getTexts($id){
        $TEXTS = \DB::table('TEXTS')->where('ID_WORD', $id)->orderBy('ID_TEXT','asc')->get();
        return response()->json($TEXTS);
    }
    public function getText($id){
//        print_r($id);
        $TEXT = \DB::table('TEXTS')->where('ID_TEXT',$id)->first();
//        print_r($TEXT);
        $COLLECTOR = \DB::table('COLLECTOR')->where('ID_COLLECTOR', $TEXT->ID_COLLECTOR)->first();
        $CONTRACTOR = \DB::table('CONTRACTORS')->where('ID_CONTRACTOR', $TEXT->ID_CONTRACTOR)->first();
        $LOCATIONS = \DB::table('LOCATIONS')->where('ID_LOCATION', $TEXT->ID_LOCATION)->first();
        $WORDS = \DB::table('WORDS')->where('ID_WORD', $TEXT->ID_WORD)->first();
        $VILLAGE = \DB::table('VILLAGE')->where('ID_VILLAGE', $TEXT->ID_VILLAGE)->first();
        $COUNTRY = \DB::table('COUNTRY')->where('ID_COUNTRY', $VILLAGE->ID_COUNTRY)->first();
        $AREA = \DB::table('AREA')->where('ID_AREA', $COUNTRY->ID_AREA)->first();

        $VILLAGE2 = \DB::table('VILLAGE')->where('ID_VILLAGE', $CONTRACTOR->ID_VILLAGE)->first();
        $COUNTRY2 = \DB::table('COUNTRY')->where('ID_COUNTRY', $VILLAGE->ID_COUNTRY)->first();
        $AREA2 = \DB::table('AREA')->where('ID_AREA', $COUNTRY->ID_AREA)->first();


        return response()->json([
            'TEXT'=>$TEXT,
            'COLLECTOR'=>$COLLECTOR,
            'CONTRACTORS'=>$CONTRACTOR,
            'LOCATIONS'=>$LOCATIONS,
            'WORDS'=>$WORDS,
            'VILLAGE'=>$VILLAGE,
            'COUNTRY'=>$COUNTRY,
            'AREA'=>$AREA,
            'VILLAGE2'=>$VILLAGE,
            'COUNTRY2'=>$COUNTRY,
            'AREA2'=>$AREA,
        ]);
    }

    public function index(){

        $SECTIONS= \DB::table('SECTIONS')->orderBy('ID_SECTION','asc')->get();
//        dd($SECTIONS);

        return view('home', ['SECTIONS'=> $SECTIONS]);
    }
}
