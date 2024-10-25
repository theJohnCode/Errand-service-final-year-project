<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>

        <button type="button" class="btn btn-success dealed-button" id="dealed-button"><span class="fas fa-check"></span></button>

    </form>
</div>

<script>
    // Dealed button click event
    document.getElementById('dealed-button').addEventListener('click', function() {
       
        let confirmation = confirm("Do you want to create a booking for this deal?");
        if (confirmation) {
            // Perform an AJAX request to create the booking
            $.ajax({
                url: "{{ route('create.booking') }}", // Route to handle booking creation
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    task_id: {{ $task_id }}, // Add the task ID here
                    user_id: {{ auth()->user()->id }} // The logged-in user
                },
                success: function(response) {
                    alert('Booking created successfully!');
                },
                error: function(error) {
                    alert('There was an error creating the booking.');
                }
            });
        }
    });
</script>
