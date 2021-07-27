<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use App\Models\fixture;

class Welcomecontroller extends Controller
{
    public function index()
    {
        return view('welcome');
    } 


    public function userData()
    {

       $allData = Http::get('http://103.36.103.60/report/data?username=testJD');
       $result = $allData->json();

       //dd($result);

      

       foreach ($result['response'] as $key => $value) {
       	dd($value);
       		foreach ($value['fixture'] as $key => $data) {

       			dd($data);
       			/*$data = new fixture();
       			 $data['referee'] = $valueall->referee;
       			 $data['timezone'] = $valueall->timezone;
       			 $data['date'] = $valueall->date;
       			 $data['timestamp'] = $valueall->timestamp;

                $data->save();*/
       		}

       		


       	 
       }




       
    }
}
