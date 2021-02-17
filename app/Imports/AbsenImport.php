<?php

namespace App\Imports;

use App\Absen;
use App\AbsensiGaji;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $carbon = Carbon::now();
        // $cal = $carbon->daysInMonth;
        $con = AbsensiGaji::select('id')->where('nip', $row[0]);
        $raw = Absen::whereHas('data', function ($query) use ($con)
        {
            $query->whereIn('absensi_gaji_id', $con);
        })->where('month', $carbon->monthName);
        $result = $raw->get();
        $i = 0;
        $m = 0;
        $s = 0;
        $p = 0;
        $c = 0;
        $o = 0;
        $l = 0;
        foreach ($result as $item) {
            $i++;
            $absen = Absen::where('id', $item->id)
            ->update([
                'data' => $row[$i]
            ]);
            AbsensiGaji::where('id', $item->absensi_gaji_id)
                ->update([
                    'TotalHari' => $carbon->daysInMonth
                ]);
            if ($row[$i] == 'M') {
                $m++;
                AbsensiGaji::where('id', $item->absensi_gaji_id)->update([
                    'jmlMasuk' => $m
                ]);
            } elseif($row[$i] == 'S') {
                $s++;
                AbsensiGaji::where('id', $item->absensi_gaji_id)->update([
                    'jmlSakit' => $s
                ]);
            } elseif($row[$i] == 'I') {
                $p++;
                AbsensiGaji::where('id', $item->absensi_gaji_id)->update([
                    'jmlIzin' => $p
                ]);
            } elseif($row[$i] == 'C') {
                $c++;
                AbsensiGaji::where('id', $item->absensi_gaji_id)->update([
                    'jmlCuti' => $c
                ]);
            } elseif($row[$i] == 'O') {
                $o++;
                AbsensiGaji::where('id', $item->absensi_gaji_id)->update([
                    'jmlLembur' => $o
                ]);
            } elseif($row[$i] == 'L') {
                $l++;
                AbsensiGaji::where('id', $item->absensi_gaji_id)->update([
                    'jmlLibur' => $l
                ]);
            }
            
            if ($i == $carbon->daysInMonth) {
                break;
            }
        }
        // $absen = AbsensiGaji::all();
        // foreach ($data as $val) {
        //     $M = Absen::where([
        //         ['absensi_gaji_id', $val->id],
        //         ['data', 'M']
        //     ])->count();
        //     $S = Absen::where([
        //         ['absensi_gaji_id', $val->id],
        //         ['data', 'S']
        //     ])->count();
        //     $I = Absen::where([
        //         ['absensi_gaji_id', $val->id],
        //         ['data', 'I']
        //     ])->count();
        //     $C = Absen::where([
        //         ['absensi_gaji_id', $val->id],
        //         ['data', 'C']
        //     ])->count();
        //     $O = Absen::where([
        //         ['absensi_gaji_id', $val->id],
        //         ['data', 'O']
        //     ])->count();
        //     $L = Absen::where([
        //         ['absensi_gaji_id', $val->id],
        //         ['data', 'L']
        //     ])->count();

        //     AbsensiGaji::where('id', $val->id)
        //         ->update([

        //         ])
        // }
    }
}
