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



    public static function hiring_round($hiring_rounds, $char = '') {
        $html = '';
        foreach($hiring_rounds as $key => $hiring_round) {
            $html .= '
                <tr>

                    <td>'.$hiring_round->id.'</td>
                    <td>'. $char.$hiring_round->hiring_round_name.'</td>
                    <td>'. $char.$hiring_round->start_date.'</td>
                    <td>'. $char.$hiring_round->end_date.'</td>
                    <td>'. $char.$hiring_round->status.'</td>
                    <td>'. $char.$hiring_round->description.'</td>
                    <td>' .self::active( $hiring_round->active).'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/hiring-round/edit/'. $hiring_round->id.' " >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                        <a class="btn btn-danger btn-sm" href ="#" onclick="deleteBranch(event, '.$hiring_round->id.',  \'/admin/hiring-round/destroy\')" >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
            ';
            unset($hiring_rounds[$key]);        
        }
        return $html;
    }

    public static function open_position($open_positions, $char = '') {
        $html = '';
        foreach($open_positions as $key => $open_position) {
            $html .= '
                <tr>

                    <td>'.$open_position->id.'</td>
                    <td>'. $char.$open_position->open_position_name.'</td>
                    <td>'. $char.$open_position->open_position_requirements.'</td>
                    <td>'. $char.$open_position->open_position_description.'</td>
                    <td>'. $char.$open_position->branch->branch_name.'</td>
                    <td>'. $char.$open_position->hiringRound->hiring_round_name.'</td>
                    <td>' .self::active( $open_position->active).'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/open-position/edit/'. $open_position->id.' " >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                        <a class="btn btn-danger btn-sm" href ="#" onclick="removeRow('.$open_position->id.',  \'/admin/open-position/destroy\')" >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
            ';
            unset($open_positions[$key]);        
        }
        return $html;        
    }
}

