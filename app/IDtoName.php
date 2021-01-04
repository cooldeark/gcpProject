<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class IDtoName extends Model
{
    public function getDataTableSizeList(){
        $getsizeList=DB::connection('mysql_ssp')->table('ssp_size')->get()->toArray();
        $sizeList=array();
        foreach($getsizeList as $index=>$value){
            if ($value->width == 1 && $value->height == 1) {
               $sizeList[$value->id]= "Pre-Roll(VAST)";
            } else if ($value->width == 2 && $value->height == 2) {
               $sizeList[$value->id]= "PRELOAD";
            } else if ($value->width == 3 && $value->height == 3) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.Native');
            } else if ($value->width == 4 && $value->height == 4) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.FullScreen');
            } else if ($value->width == 5 && $value->height == 5) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.FloatingProducts');
            } else if ($value->width == 6 && $value->height == 6) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.ReelVideo');
            } else if ($value->width == 7 && $value->height == 7) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.DOOH');
            } else if ($value->width == 8 && $value->height == 8) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.AnimatedCover');
            } else if ($value->width == 9 && $value->height == 9) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.RotatingVideo');           
            } else if ($value->width == 10 && $value->height == 10) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.VideoMarquee');
            } else if ($value->width == 15 && $value->height == 15) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.innerMarquee');
            } else if ($value->width == 17 && $value->height == 17) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.3DEffect');
            } else if ($value->width == 18 && $value->height == 18) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.Flip');
            } else if ($value->width == 301 && $value->height == 251) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.portableVideo300250');
            } else if ($value->width == 971 && $value->height == 251) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.portableVideo970250');
            } else if ($value->width == 321 && $value->height == 481) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.FloatingVideoAd');
            } else if ($value->width == 302 && $value->height == 252) {
               $sizeList[$value->id]= __('Report.DropDownSizeName.maglev2');
            } else if ($value->width == 150 && $value->height == 150) {
                $sizeList[$value->id]=__('Report.DropDownSizeName.maglev');
            }else if ($value->width == 100 && $value->height == 100) {
               $sizeList[0]=$value->width.'x'.$value->height.'Banner';//這個是解如果有人size_id 是0
           }else{
            $sizeList[$value->id]=$value->width.'x'.$value->height.'Banner';
            }
        }

        return $sizeList;
    }
}
