<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreatePasswordForm extends Form
{
    #[Validate('required|min:8|confirmed')]
    public string $password;

    #[Validate('required')]
    public string $password_confirmation;

    public function save()
    {
        $user = Auth::user();

        $user->fill(['password' => Hash::make($this->password)]);

        $user->save();

        return redirect()->route('dashboard');
    }
}
