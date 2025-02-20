<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HiringRound\HiringRoundRequest;
use App\Http\Services\HiringRound\HiringRoundService;
use Illuminate\Http\Request;

class HiringRoundController extends Controller
{
    protected $hiringRoundService;

    public function __construct(HiringRoundService $hiringRoundService )
    {
        $this->hiringRoundService = $hiringRoundService;
    }

    public function create(){
        return view('admin.hiring_rounds.add',[
            'title' => 'Thêm đợt ứng tuyển',

        ]);
    }
    public function store(HiringRoundRequest $request){
        $this->hiringRoundService->create($request);
        
        return redirect()->back();
    }


    public function index(){
        
        $hiring_rounds = $this->hiringRoundService->getAll();

        return view('admin.hiring_rounds.list', [
            'title' => "Danh sách đợt ứng tuyển",
            'hiring_rounds' => $hiring_rounds
        ]);
    }
}
