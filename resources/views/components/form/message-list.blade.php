@props(['messages', 'user'])

@if (count($messages) > 0)
    @foreach ($messages as $message)
        <div class="row {{ $message->from_user == $user ? ' justify-content-end reply-end ' : ' justify-content-start reply-start ' }} mb-4">
            <div class="col-auto">
                <div class="card shadow-none">
                    <div class="card-body py-2 px-3">
                        <p class="mb-1">
                            {{ $message->chat_message }}
                        </p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-end mt-2">
                    <small>{{ (date('Y-m-d') == date('Y-m-d', strtotime($message->created_at))) ? date('h:ia', strtotime($message->created_at)) : date('Y-m-d H:i:s', strtotime($message->created_at)) }}</small>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="row text-center mt-5 mb-5" id="notMessageFoundDiv">
        <div class="col-12">
            <div class="card shadow-none">
                <div class="card-body py-2 px-3">
                    <p class="mb-1">
                        No messages found.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
