<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HiringRound\HiringRoundRequest;
use App\Http\Services\HiringRound\HiringRoundService;
use App\Models\HiringRound;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

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

    public function destroy(Request $request): JsonResponse{
        $result = $this->hiringRoundService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công đợt ứng tuyển'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
    public function show(HiringRound $hiring_round){
        return view('admin.hiring_rounds.edit', [
            'title' => "Chỉnh sửa đợt ứng tuyển: " . $hiring_round->hiring_round_name,
            'hiring_round' => $hiring_round,  
        ]);
    }

    public function update(HiringRound $hiring_round, Request  $request){

        $this->hiringRoundService->update($request, $hiring_round);

        return redirect('admin/hiring-round/list');
    }
}
