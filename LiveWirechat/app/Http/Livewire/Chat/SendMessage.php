<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $body;

    protected $listeners= ['updateSendMessage'];

    public function updateSendMessage(Conversation $conversation, User $receiver){
     //   dd($conversation,$receiver);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;

    }

    public function sendMessage(){
        if($this->body == null) {
            return null;
        }

        $createMessage= Message::create([
            'conversation_id' => $this->selectedConversation->id ,
            'sender_id' => auth()->id() ,
            'sreceiver_id' => $this->receiverInstance->id ,
            'sbody' => $this->body ,

        ]);

        $this->selectedConversation->last_time_message = $createMessage->created_at; 
        $this->selectedConversation->save(); 

        $this->emitTo('chat.chatbox', 'pushMessage' ,$createMessage->id);
        //refresh the conversation 
        $this->emitTo('chat.chat-list' , 'refresh');
        $this->reset('body');
      //  dd($this->body);



    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
