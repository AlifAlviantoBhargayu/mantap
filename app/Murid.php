<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
    protected $fillable = ['nama_lengkap', 'nama_orangtua', 'kelas', 'asal_sekolah', 'jenis_kelamin', 'agama', 'alamat', 'bunda_id', 'avatar', 'user_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }

    public function report()
    {
        return $this->belongsToMany(Report::class)->withPivot(['hasil'])->withTimestamps();
    }

    public function report2()
    {
        return $this->belongsToMany(Report2::class)->withPivot(['hasil2'])->withTimestamps();
    }

    public function report3()
    {
        return $this->belongsToMany(Report3::class)->withPivot(['hasil3'])->withTimestamps();
    }

    public function report4()
    {
        return $this->belongsToMany(Report4::class)->withPivot(['hasil4'])->withTimestamps();
    }

    public function report5()
    {
        return $this->belongsToMany(Report5::class)->withPivot(['hasil5'])->withTimestamps();
    }

    public function report6()
    {
        return $this->belongsToMany(Report6::class)->withPivot(['hasil6'])->withTimestamps();
    }

    public function report7()
    {
        return $this->belongsToMany(Report7::class)->withPivot(['hasil7'])->withTimestamps();
    }

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }

    public function bunda()
    {
        return $this->belongsTo(Bunda::class);
    }


    public function rataRataHasil()
    {

        $total = 0;
        $hitung = 0;

        if ($this->report->isNotEmpty()) {
            foreach ($this->report as $report) {
                $total += $report->pivot->hasil;
                $hitung++;
            }
        }

        if ($this->report2->isNotEmpty()) {
            foreach ($this->report2 as $report2) {
                $total += $report2->pivot->hasil2;
                $hitung++;
            }
        }
        if ($this->report3->isNotEmpty()) {
            foreach ($this->report3 as $report3) {
                $total += $report3->pivot->hasil3;
                $hitung++;
            }
        }
        if ($this->report4->isNotEmpty()) {
            foreach ($this->report4 as $report4) {
                $total += $report4->pivot->hasil4;
                $hitung++;
            }
        }
        if ($this->report5->isNotEmpty()) {
            foreach ($this->report5 as $report5) {
                $total += $report5->pivot->hasil5;
                $hitung++;
            }
        }
        if ($this->report6->isNotEmpty()) {
            foreach ($this->report6 as $report6) {
                $total += $report6->pivot->hasil6;
                $hitung++;
            }
        }
        if ($this->report7->isNotEmpty()) {
            foreach ($this->report7 as $report7) {
                $total += $report7->pivot->hasil7;
                $hitung++;
            }
        }
        return $total != 0 ? round($total / $hitung) : $total;
}


}
