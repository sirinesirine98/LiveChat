<div>
    {{-- Stop trying to control. --}}

   
        <div class="chatlist_header">

            <div class="title">
                Chat
            </div>

            <div class="img_container">
                <img src="https://picsum.photos/id/237/200/300" alt="">

            </div>
        </div>


         <div class="chatlist_body">
           @if($conversations->count() > 0)
           @foreach($conversations as $conversation)
           <div class="chatlist_item" wire:click="$emit('chatUserSelected' , {{ $conversation }} , {{$this->getChatUserInstance($conversation, $name='id')}}  )">
                <div class="chatlist_img_container">
                  <img src="https://picsum.photos/id/{{$this->getChatUserInstance($conversation, $name='id')}}/200/200/300" alt="">

                </div>

                <div class="chatlist_info">
                     <div class="top_row">
                            <div class="list_username">{{ $this->getChatUserInstance($conversation, $name = 'name') }}
                            </div>
                            <span class="date">
@if($conversation->messages)
    <span class="date">
        {{ $conversation->last_time_message()?->created_at->shortAbsoluteDiffForHumans() }}
    </span>
@endif

                        </div>

                        <div class="bottom_row">

                            <div class="message_body text-truncate">

@if($conversation->messages)
    <div class="message_body text-truncate">
        {{ $conversation->messages->last()->body }}
    </div>
@endif
                        </div>

                 
                        <div class="unread_count">
                            56
                        </div>
                    </div>

                </div>

            </div>
           @endforeach
 
         
             @else
                you haven't any msg 
            @endif
           
        </div>
</div>
