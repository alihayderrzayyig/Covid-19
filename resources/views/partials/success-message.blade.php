@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. --}}
        {{ session('success') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
