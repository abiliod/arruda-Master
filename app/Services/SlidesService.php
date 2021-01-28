<?php
namespace App\Services;

use App\Models\Admin\Slide;

class SlidesService {

    /**
     * @return Slide[]|\Illuminate\Database\Eloquent\Collection
     */
    public function slides()
    {
     //   dd(Slide::all());
        return Slide::all();
    }

    /**
     * @return int
     */
    public function direcaoImagem()  {
        return rand(0,2);
    }
}

