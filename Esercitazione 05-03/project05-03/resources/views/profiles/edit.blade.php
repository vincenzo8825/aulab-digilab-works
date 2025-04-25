
<x-layout>
    <div class="container">
        <h1>Modifica Profilo</h1>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $profile->address) }}">
            </div>

            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}">
            </div>

            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
                @if($profile->avatar)
                    <img src="{{ Storage::url($profile->avatar) }}" alt="Avatar" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Salva modifiche</button>
        </form>
    </div>
</x-layout>
