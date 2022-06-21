<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalculoIva extends Component
{
    public $tickets, $iva, $total;

    public function render()
    {
        return view('livewire.calculo-iva');
    }

    public function updatingTickets($tickets)
    {
        $this->tickets = $tickets;
        $this->iva = $tickets * 0.16;
        $this->total = $tickets + $this->iva;
    }

}
