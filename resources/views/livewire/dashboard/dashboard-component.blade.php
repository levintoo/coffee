<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form wire:submit.prevent="sendMail">
        @csrf
        <input type="text" wire:model="mail" placeholder="OTP">
        @error('mail') <span class="error text-danger">{{ $message }}</span> @enderror
        <button class="btn btn-info" type="submit">Verify</button>
    </form>
</div>
