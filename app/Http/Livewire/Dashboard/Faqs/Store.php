<?php

namespace App\Http\Livewire\Dashboard\Faqs;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $question;
    public $answer;
  
    protected $rules = [
        'question' => 'required|string',
        'answer' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // $this->authorize('create faqs');

        $validatedData = $this->validate();

        Faq::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.faqs.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.faqs.store');
    }
}
