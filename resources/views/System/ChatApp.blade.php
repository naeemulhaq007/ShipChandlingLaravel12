@extends('layouts.app')

@section('title', 'User-Rights')

@section('content_header')
@stop

@section('content')
<section class="card">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-sm-3 mb-4 mb-md-0">
                <h5 class="font-weight-bold mb-3 text-center text-lg-start">Recent Chat</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($LastChats as $index => $chatUser)
                            @if ($chatUser->latestChat)
                            @if ($chatUser->id !== auth()->user()->UserID)

                                <li class="p-2 chat-item  border-bottom" data-userid="{{$chatUser->id}}" >
                                    <a href="#!" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">{{ $chatUser->full_name }}</p>
                                            @if ($chatUser->latestChat) <p class="small text-muted">{{ Str::limit($chatUser->latestChat->message, 30, '...') }}</p> @else <p class="small text-muted">No messages yet.</p> @endif
                                        </div>
                                        </div>
                                        <div class="pt-1">
                                            @if ($chatUser->latestChat) <p class="small text-muted mb-1">{{ $chatUser->latestChat->created_at->diffForHumans() }}</p> @else <p class="small text-muted mb-1">No messages yet.</p> @endif
                                            <span class="badge bg-danger float-end">1</span>
                                        </div>
                                    </a>
                                </li>
                            @endif

                            @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


<!-- Hidden input to store recipient user ID -->
<input type="hidden" name="recipientUserId" id="recipientUserId">

<!-- Right-side tab -->
<div class="col-sm-6 Chat-pannel d-flex  flex-column mb-3" >
    <ul class="list-unstyled">
        @foreach($Chats as $chatUser)


            <div class="message-container" style="{{ $loop->first ? '' : 'display: none;' }}">
                @foreach($chatUser->chats()->orderBy('created_at')->get() as $chat)

                @if ($chat->sender_user_id == $chat->chat_user_id)
                <li class="d-flex justify-content-between mb-4 Messageq" data-message="{{$chat->chat_user_id}}">
                            <!-- Show sender's message on the right -->
                            <div class="card w-100">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">{{ $chat->sender->nickname }}</p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{ $chat->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        {{ $chat->message }}
                                    </p>
                                </div>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                            </li>
                        @elseif($chat->chat_user_id ==  $chatUser->id )
                <li class="d-flex justify-content-between mb-4 Messageq" data-message="{{$chat->chat_user_id}}">

                            <!-- Show recipient's message on the left -->
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                            <div class="card w-100">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">{{ $chat->sender->nickname }}</p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{ $chat->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        {{ $chat->message }}
                                    </p>
                                </div>
                            </div>

                            <!-- Show sender's details for the recipient's message -->
                            {{-- <div class="sender-details">
                                <p class="fw-bold mb-0">{{ $chat->sender->full_name }}</p>
                                <p class="text-muted small mb-0">{{ $chat->sender->status }}</p>
                                <!-- Add more sender details if needed -->
                            </div> --}}
                </li>
                        @endif

                @endforeach
            </div>
        @endforeach

        <!-- Add more chat messages here -->
    </ul>
    <div class="mt-auto bg-white">
        <form id="sendMessageForm" >
            <div class="form-outline ">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control" id="message" rows="4"></textarea>
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-info btn-rounded float-end" onclick="sendMessage()">Send</button>
            </div>
        </form>
      </div>
    {{-- <div class="bg-white mb-3 align-self-baseline">

    </div> --}}
</div>
<div class="col-sm-3 mb-4 mb-md-0">
    <h5 class="font-weight-bold mb-3 text-center text-lg-start">All User</h5>
    <div class="card">
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($AllUser as $index => $chatUser)
                    <li class="p-2 chat-item  border-bottom" data-userid="{{$chatUser->id}}" >
                        <a href="#!" class="d-flex justify-content-between">
                            <div class="d-flex flex-row">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                            <div class="mt-1 p-1">
                                <p class="fw-bold mb-0">{{ $chatUser->full_name }}</p>
                            </div>
                            </div>

                        </a>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
</div>
        </div>
    </div>
</section>
@stop

@section('css')
<style>
    .active {
        background-color: #eee;
    }
    .Chat-pannel{
        height: 700px;
        overflow-y: auto;
    }
</style>
@stop

@section('js')
<script>
     function sendMessage() {
        var message = $('#message').val();
        var recipientUserId = $('#recipientUserId').val(); // Replace with the actual recipient user ID

        // Perform a simple validation (you may want to improve this)
        if (!message) {
            alert('Please enter a message.');
            return;
        }
        // Send an AJAX request to the server
        $.ajax({
            type: 'POST',
            url: '/send-message', // Replace with the actual route
            data: {
                message: message,
                recipientUserId: recipientUserId,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                // Handle success, e.g., clear the input field
                $('#message').val('');
                reloadChat();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    function reloadChat() {
            // Replace this with your logic to reload or update the chat content
            location.reload(); // This triggers a full page reload
            // Alternatively, you can use AJAX to update the chat content without a full page reload
            // Example: $.get('/get-chat-content', function(data) { /* Update chat content */ });
        }
    $(document).ready(function () {
        var buttons = $('.chat-item');
        var tabs = $('.list-unstyled > .d-flex');
        var messages = $('.message-container');
        var messagesq = $('.Messageq');
        var recipientUserIdInput = $('#recipientUserId');

        buttons.each(function (index) {
            $(this).on('click', function () {
                // Remove the "active" class from all buttons and tabs
                buttons.removeClass('active');
                tabs.removeClass('active');
                messages.hide(); // Hide all messages
                messagesq.hide(); // Hide all messages
                // Remove a class
                $('.Messageq').removeClass('d-flex');

                // messagesq.attr('hidden', 'true'); // Hide all messages

                // Add the "active" class to the clicked button and corresponding tab
                $(this).addClass('active');
                tabs.eq(index).addClass('active');

                 // Set recipient user ID based on the clicked chat item
                 var recipientUserId = $(this).data('userid');
                 var messageid = messagesq.data('message')
                 var Currentuserid = {{auth()->user()->UserID}};
                 console.log('mesid'+messageid);
                 console.log('rec'+recipientUserId);
                 console.log('cu'+Currentuserid);
                 if (messageid == recipientUserId || messageid == Currentuserid) {
                    alert('yes');
                    messagesq.eq(index).show();
                    messagesq.addClass('d-flex');

                 }
                recipientUserIdInput.val(recipientUserId);


                // Show messages for the selected user
                messages.eq(index).show();
            });
        });
    });
</script>
@stop
