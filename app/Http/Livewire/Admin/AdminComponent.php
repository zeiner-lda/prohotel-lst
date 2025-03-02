<?php

namespace App\Http\Livewire\Admin;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use \App\Models\{Company, User};
use Livewire\Component;

class AdminComponent extends Component
{

    use LivewireAlert;
    public $users , $hotels;

    public function mount () {
        $this->users = new User();
        $this->hotels = new Company();
    }
    public function render()
    {
        return view('livewire.admin.admin-component',[
            "hotelCounter" => $this->getHotelsCounter( $this->hotels),
            "userCounter" => $this->getUserCounter($this->users)
        ])->layout('layouts.admin.app');
    }

    public function getUserCounter (User $users) {
        try {
         return  $users->query()->where("profile", '<>', 'guest')->count();
        } catch (\Throwable $th) {
        $this->alert('error', 'ERRO', [
                'toast' => false,
                'position'=> 'center',
                'showConfirmButton'=> true,
                'confirmButtonText' => 'OK',
                'timer' => 300000,
                'allowOutsideClick' => false,
                'text' => 'Ocorreu o seguinte erro: '.$ex->getMessage()
            ]);
        }
    }

    public function getHotelsCounter (Company $hotels) {
        try {
            return $hotels->query()->count();
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position'=> 'center',
                'showConfirmButton'=> true,
                'confirmButtonText' => 'OK',
                'timer' => 300000,
                'allowOutsideClick' => false,
                'text' => 'Ocorreu o seguinte erro: '.$ex->getMessage()
                ]);
        }
    }
}
