<div>
    {{-- The best athlete wants his opponent at his best. --}}

    @if($selectedConversation)

  
   <form wire:submit.prevent='sendMessage' action="">
     <div class="chatbox_footer">
           <div class="custom_form_group">
            <input wire:model='body' type="text" class="control" placeholder="Écrire votre message ">
            <button type="submit" class="submit">
                Send
            </button>
        </div>
        </div>
    </form>
    @endif

</div>
