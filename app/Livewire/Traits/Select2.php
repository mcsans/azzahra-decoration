<?php

namespace App\Livewire\Traits;

trait Select2
{
    public function select2($model, $value)
    {
        $this->$model = $value;
    }
}
