<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\OpenPosition\OpenPositionService;
use App\Http\Requests\OpenPosition\OpenPositionRequest;
use App\Models\OpenPosition;
use App\Models\Branch;
use App\Models\HiringRound;


class OpenPositionController extends Controller
{
    protected $openPositionService;

    public function __construct(OpenPositionService $openPositionService) {
        $this->openPositionService = $openPositionService;
    }


    public function create(){
        $branches = Branch::all(); 
        $hiringRounds = HiringRound::all(); 
    
        return view('admin.open_positions.add', [
            'title' => 'Tạo vị trí mới',
            'branches' => $branches,
            'hiringRounds' => $hiringRounds
        ]);
    }
    

    public function store(OpenPositionRequest $request) {
        $this->openPositionService->create($request);
        return redirect()->back();
    }

    public function index(){
        $openPosition = $this->openPositionService->getAll();

        return view('admin.open_positions.list', [
            'title' => 'Danh sách các vị trí tuyển dụng',
            'open_positions' => $openPosition
        ]);
    }

    public function destroy(Request $request): JsonResponse{
        $result = $this->openPositionService->destroy($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa vị trí thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }  
    public function show(OpenPosition $open_position){
        $branches = Branch::all();
        $hiringRounds = HiringRound::all();

        // dd($open_position);
        
        return view('admin.open_positions.edit', [
            'title' => 'Chỉnh sửa vị trí tuyển dụng',
            'open_position' => $open_position,
            'branches' => $branches,
            'hiringRounds' => $hiringRounds
        ]);
    }
    

    public function update(OpenPosition $open_position, Request $request){
        $this->openPositionService->update($request, $open_position);

        return redirect('admin/open-position/list');
    }

}
