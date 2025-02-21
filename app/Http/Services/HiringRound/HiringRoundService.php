<?php
namespace App\Http\Services\HiringRound;

use App\Models\HiringRound;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HiringRoundService {
    
    public function create($request){
        try{
            HiringRound::create([
                'hiring_round_name' => (string)$request->input('hiring_round_name'),
                'start_date' => (string)$request->input('start_date'),
                'end_date' => (string)$request->input('end_date'),
                'status' => (string)$request->input('status'),
                'description' => (string)$request->input('description'),
                'active' => (string)$request->input('active')
            ]);
            Session::flash('success', 'Tạo đợt ứng tuyển mới thành công');
        }catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll(){
        return HiringRound::where('active',1)->get();
    }

    public function destroy($request){
        $id = (int)$request->input('id');
        $hiring_round = HiringRound::where('id', $id)->first();

        if($hiring_round){
            
            return HiringRound::where('id', $id)->delete();
        }
        return false;
    }

    public function update($request, $hiring_round){
        $hiring_round->fill($request->all());
        $hiring_round->save();

        Session::flash('success', 'Cập nhật thành công đợt ứng tuyển');

        return true;

    }
}
