<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Status;
use App\Models\Fixture;
use App\Models\Periods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function getData()
    {
        $response = Http::get('http://103.36.103.60/report/data?username=testJD');
        return $response->json();
    }
    public function storeData()
    {
        $data = Http::get('http://103.36.103.60/report/data?username=testJD')->json();


        foreach ($data['response'] as $row) {
            // dd($row['fixture']['periods']['first']);
            $fixture = new Fixture();
            $fixture->referee = $row['fixture']['referee'] ?? null;
            $fixture->timezone = $row['fixture']['timezone'];
            $fixture->timestamp = $row['fixture']['timestamp'];
            $fixture->date = $row['fixture']['date'];
            $fixture->save();

            $p = new Periods();
            $p->fixtures_id = $fixture->id;
            $p->first = $row['fixture']['periods']['first'] ?? null;
            $p->second = $row['fixture']['periods']['second'] ?? null;
            $p->save();
            
            $venue = new Venue();
            $venue->fixtures_id = $fixture->id;
            $venue->name = $row['fixture']['venue']['name'] ?? null;
            $venue->city = $row['fixture']['venue']['city'] ?? null;
            $venue->save();

            $status = new Status();
            $status->fixtures_id = $fixture->id;
            $status->long = $row['fixture']['status']['long'] ?? null;
            $status->short = $row['fixture']['status']['short'] ?? null;
            $status->elapsed = $row['fixture']['status']['elapsed'] ?? null;
            $status->save();
        }
    }
}
