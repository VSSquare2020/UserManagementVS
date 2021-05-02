<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class UsersImport implements ToCollection,WithHeadingRow, SkipsOnError
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
       // dd($rows);
        foreach ($rows as $row) {
            if ($row['name'] && $row['clo_card_no']) {
                User::create([
                'name' => $row['name'],
                'email' => 'email',
                'password' => $row['clo_card_no'],
                'clo_card_no' => $row['clo_card_no'],
                'army_number' => $row['army_no'],
                'rank' => $row['rank'],
                'battery' => $row['bty'],

            ]);
            }
        }
    }

    public function onError(Throwable $error)
    {
        dd($error);
    }
}
