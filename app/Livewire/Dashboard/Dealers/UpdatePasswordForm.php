<?php

namespace App\Livewire\Dashboard\Dealers;

use App\Models\Dealer;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdatePasswordForm extends Component
{

    public $dealer = null;
    public $password;
    public $password_confirmation;

    // --------------------------------
    // Mounting
    // --------------------------------
    #[On('setDealer')]
    public function setDealer($dealer)
    {
        $this->dealer = Dealer::find($dealer['id']);
    }

    // --------------------------------
    // Actions
    // --------------------------------
    public function save()
    {
        $this->validate([
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required_with:password|same:password',
        ]);

        // Save data
        $this->dealer->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
        $this->dispatch('closeUpdatePasswordOffcanvas');
        $this->dispatch('reloadDealers');
        $this->dispatch('success', 'Password updated successfully');
    }
    public function render()
    {
        return view('livewire.dashboard.dealers.update-password-form');
    }
}
