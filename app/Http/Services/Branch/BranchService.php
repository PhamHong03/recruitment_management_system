<?php
namespace App\Http\Services\Branch;

use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BranchService {

    public function getParent(){
        return Branch::where('active', 1)->get();
    }

    public function getAll(){
        return Branch::orderbyDesc('id')->paginate(15);
    }

    public function create($request){
        $position = $request->input('ward_input')  . ', '. $request->input('district_input') . ', '.$request->input('city_input');
        try{
            Branch::create([
                'branch_name' => (string)$request->input('branch_name'),
                'branch_position' => $position,
                'active' => (string)$request->input('active'),
                'slug' => Str::slug($request->input('branch_name'), '-')
            ]);
            Session::flash('success', 'Tạo chi nhánh mới thành công');
        }catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){

        $id = (int)$request->input('id');
        $branch = Branch::where('id', $id)->first();

        if($branch){
            
            return Branch::where('id', $id)->delete();
        }
        return false;
    }
    
    public function update($request, $branch){
        

        $position = $request->input('ward_input')  . ', '. $request->input('district_input') . ', '.$request->input('city_input');
        
        $branch->branch_name = (string)$request->input('branch_name');
        $branch->branch_position = $position;
        $branch->active = (string)$request->input('active');
        $branch->slug = Str::slug($request->input('branch_name'), '-');
        
        $branch->save();

        Session::flash('success', 'Cập nhật thành công chi nhánh');

        return true;

    }
}
