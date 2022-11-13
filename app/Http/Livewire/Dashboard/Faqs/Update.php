<?php

namespace App\Http\Livewire\Dashboard\Faqs;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $faq;
    public $icon;

    protected $rules = [
        'faq.question' => 'required|min:2|max:100',
        'faq.answer' => 'required|min:2|max:100',
    ]; 

    public function submit()
    {
        // $this->authorize('edit faqs');

        $validatedData = $this->validate();

        $this->faq->save();
        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.faqs.index');
    }

    public function mount(Faq $faq)
    {
        $this->faq = $faq;
    }
    public function render()
    {
        return view('livewire.dashboard.faqs.update');
    }
}
