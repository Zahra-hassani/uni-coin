<?php

use Livewire\Component;
use App\Models\Currency;

new class extends Component
{
    public $currencies;
    public function mount(){
        $this->currencies = Currency::all();
    }
    // delete button & Modal
    public $deleteId= null;
    public $deleteModal = false;
    public function showDeleteModal($id){
        $this->deleteId = $id;
        $this->deleteModal = true;
    }
    // Cancel Delete Modal
    public function cancelDelete(){
        $this->deleteId = null;
        $this->deleteModal = false;
    }
    // Delete action
    public function delete(){
        $currency =Currency::findOrFail($this->deleteId);
        $currency->delete();
        $this->currencies = Currency::all();
        $this->deleteModal = false;
    }
    // update button & Modal
    public $updateId= null;
    public $updateModal = false;
    public function showupdateModal($id){
        $this->updateId = $id;
        $this->updateModal = true;
    }
    // Cancel update Modal
    public function cancelupdate(){
        $this->updateId = null;
        $this->updateModal = false;
    }
    // update action
    public function update(Request $request){
        $currency =Currency::findOrFail($this->updateId);
        $currency->update([
            "name" => $request->name,
            "rate" => $request->rate
        ]);
        $this->currencies = Currency::all();
        $this->deleteModal = false;
    }
};
?>

<div class="w-full relative border bg-blue-900 border-blue-400 rounded-lg p-3">
    <table class="w-full h-full dark:text-white text-center">
        <tr class="border-b-2 dark:border-white">
            <th class="p-4">Currency Name</th>
            <th class="p-4">Rate To Afghani</th>
            @if (Auth::user()->user_type === "admin")
            <th class="p-4 col-span-2">Actions</th>
            @else
                
            @endif
        </tr>
    @foreach ($this->currencies as $currency)
        <tr class="border-b hover:bg-white/20 dark:border-white">
            <td class="p-4 flex gap-2"><img src="/images/coin.png" class="h-7 w-7" alt="">{{ $currency->name }}</td>
            <td class="p-4">{{ $currency->rate }}</td>
            {{-- @if (Auth::user()->user_type === "admin") --}}
            <td class="p-4">
                <button wire:click="showDeleteModal({{ $currency->id }})" class="px-5 cursor-pointer py-1 text-white rounded-lg bg-rose-800">Delete</button>
            </td>
            <td class="p-4">
                <button wire:click="showupdateModal({{ $currency->id }})" class="px-5 py-1 text-white rounded-lg bg-blue-500">Update</button>
            </td>
            {{-- @else --}}

            {{-- @endif --}}
        </tr>
    @endforeach
    </table>
    {{-- Delete Modal --}}
    @if ($deleteModal)
    <div class="fixed top-1/2 left-1/2 text-white -translate-1/2 flex flex-col gap-2 p-4 h-fit w-full max-w-xs bg-blue-500 rounded-lg">
        <p class="font-bold text-xl">Are You Sure?</p>
        <span class=" text-[14px]">Do you want to delete this item?</span>
        <div class="w-full flex justify-end items-center gap-2">
            <button wire:click="cancelDelete" class="px-5 py-1 rounded-lg text-black bg-stone-50">No</button>
            <button wire:click="delete" class="px-5 py-1 rounded-lg text-white bg-rose-800">Yes</button>
        </div>
    </div>
    @endif
    {{-- Update Modal --}}
    @if ($updateModal)
        <div class="fixed top-1/2 left-1/2 text-white -translate-1/2 flex flex-col gap-2 p-4 h-fit w-full max-w-xs bg-blue-500 rounded-lg">
        <p class="font-bold text-xl">Edit Currency</p>
        <form action="" method="post" class="flex w-full flex-col gap-3">
            @csrf
        <input type="text" name="name" class="px-3 py-1.5 rounded-lg focus:outline-0 border dark:border-white focus:border-blue-500 focus:border-2" placeholder="Currency Name">
        <input type="number" name="name" class="px-3 py-1.5 rounded-lg focus:outline-0 border dark:border-white focus:border-blue-500 focus:border-2" placeholder="Rate">
        <div class="w-full flex justify-end items-center gap-2">
            <button wire:click="cancelupdate" class="px-5 py-1 rounded-lg text-black bg-stone-50">Cancel</button>
            <button type="submit" class="px-5 py-1 rounded-lg text-white bg-blue-800">Update</button>
        </div>
    </form>
    </div>
    @endif
    {{-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger --}}
</div>