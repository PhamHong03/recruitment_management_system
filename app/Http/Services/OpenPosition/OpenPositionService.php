<?php

namespace App\Http\Services\OpenPosition;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Js;

use App\Models\OpenPosition;
class OpenPositionService{

    
    public function create($request){
        try {
            OpenPosition::create([
                'open_position_name'=> (string)$request->input('open_position_name'),
                'open_position_description'=> (string)$request->input('open_position_description'),
                'open_position_requirements'=> (string)$request->input('open_position_requirements'),
                'branch_id'=> (int)$request->input('branch_id'),
                'hiring_round_id'=> (int)$request->input('hiring_round_id'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Thêm vị trí thành công');
        }catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    // public function getAll(){
    //     return OpenPosition::with(['branch', 'hiringRound'])->where('active', 1)->get()->paginate(6);
    // }
    
    public function getAll(){
        return OpenPosition::with(['branch', 'hiringRound'])
            ->orderbyDesc('id')
            ->where('active', 1)
            ->paginate(4);
    }

    public function destroy($request){
        $id = (int)$request->input('id');
        $open_position = OpenPosition::where('id', $id)->first();

        if($open_position){

            return OpenPosition::where('id', $id)->delete();
        }
        return false;
    }

    public function update($request, $open_position){
        $open_position->fill($request->all());
        $open_position->save();

        Session::flash('success','Cập nhật vị trí thành công thành công');
    }

}