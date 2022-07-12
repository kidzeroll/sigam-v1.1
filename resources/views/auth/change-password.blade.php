<x-backend-layout>
    <x-slot name="title">Ganti Password</x-slot>
    <x-card label="Ganti Password" class="card-primary">
        <form action="{{ route('update-password') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="old_password">Password Lama</label>
                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror"
                    name="old_password" value="{{ old('old_password') }}">
                @error('old_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input id="new_password" type="password"
                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                    value="{{ old('new_password') }}">
                @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                <input id="new_password_confirmation" type="password"
                    class="form-control @error('new_password_confirmation') is-invalid @enderror"
                    name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                @error('new_password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Ganti Password
            </button>

            <a href="{{ route('dashboard') }}" class="btn btn-danger btn-block">Kembali</a>

        </form>
    </x-card>
</x-backend-layout>
