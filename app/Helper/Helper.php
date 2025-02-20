<?php


namespace App\Helper;

use App\Models\Branch;
use Illuminate\Support\Str;
use NumberFormatter;

class Helper {
    public static function branch($branches, $char = '') {
        $html = '';
        foreach($branches as $key => $branch) {
            $html .= '
                <tr>

                    <td>'.$branch->id.'</td>
                    <td>'. $char.$branch->branch_name.'</td>
                    <td>'. $char.$branch->branch_position.'</td>
                    <td>'. $char.$branch->slug.'</td>
                    <td>' .self::active( $branch->active).'</td>
                    <td>'.$branch->updated_at.'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/branch/edit/'. $branch->id.' " >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                        <a class="btn btn-danger btn-sm" href ="#" onclick="deleteBranch(event, '.$branch->id.',  \'/admin/branch/destroy\')" >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
            ';
            unset($branches[$key]);

            // $html .= self::branch($branchs, $branchs->id, $char. '|--' );
        
        }
        return $html;
    }

    public static function active($active = 0) :string
    {
        return $active == 0 ? '<span class = "btn btn-danger btn-xs">NO</span>' : '<span class = "btn btn-success btn-xs">YES</span>';
    }
}


// <a class="btn btn-danger btn-sm" href ="#" onclick="removeRow('.$branch->id.',  \'/admin/branches/destroy\')" >
// <i class="fa-solid fa-trash"></i>
// </a>