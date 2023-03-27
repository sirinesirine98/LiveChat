<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Chatbox extends Component
{
    public $selectedConversation;
    public $receiver;
    public $messages;
    public $paginateVar;
    protected $listeners=['loadConversation'];

    public function loadConversation(Conversation $conversation, User $receriver)
    {
      // dd($conversation,$receiverId);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;


        $this->messages_count= Message::where('conversation_id' , $this->selectedConversation->id)->count();
        $this->messages= Message::where('conversation_id' , $this->selectedConversation->id)
        ->skip($this->messages_count - $this->paginateVar)
        ->take($this->paginateVar)->get();

        $this->dispatchBrowserEvent('chatSelected');

    }
    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
