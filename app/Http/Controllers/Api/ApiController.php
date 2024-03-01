<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\event;
use App\Models\tag;
use App\Models\User;

class ApiController extends Controller
{
    public function getEvents() {

        $event = event :: all();

        return response()->json([
            'status' => 'success',
            'events' => $event
        ]);
    }

    public function singleEvent($id) {

        $event = event :: find($id);

        return response()->json($event);
        
    }

}
