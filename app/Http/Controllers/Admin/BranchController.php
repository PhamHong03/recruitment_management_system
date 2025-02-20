<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\CreateFormRequest;
use App\Http\Services\Branch\BranchService;
use App\Models\Branch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    protected $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function create() {
        return view('admin.branches.add',[
            'title' => 'Thêm chi nhánh mới',
            'branchs' => $this->branchService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){
        
        $this->branchService->create($request);
        
        return redirect()->back();
    }

    public function index(){

        $branches = $this->branchService->getAll();

        return view('admin.branches.list', [
            'title' => "Danh sách chi nhánh",
            'branches' => $branches
        ]);
    }

    public function destroy(Request $request): JsonResponse {

        $result = $this->branchService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công chi nhánh'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function show(Branch $branch){
        $positionParts = explode(', ', $branch->branch_position);
        $ward = $positionParts[0] ?? ''; 
        $district = $positionParts[1] ?? ''; 
        $city = $positionParts[2] ?? ''; 

        return view('admin.branches.edit', [
            'title' => "Chỉnh sửa chi nhánh: " . $branch->branch_name,
            'branch' => $branch,  
            'city' => $city,
            'district' => $district,
            'ward' => $ward
        ]);
    }

    public function update(Branch $branch, Request  $request){

        $this->branchService->update($request, $branch);

        return redirect('admin/branch/list');
    }
}
