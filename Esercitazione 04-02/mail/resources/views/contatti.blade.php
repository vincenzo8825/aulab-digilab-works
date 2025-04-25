<x-layout>

    <form action="{{ route('contattaci.submit') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
        @csrf

        <h2 class="mb-3 text-center">Contattaci</h2>


        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" id="name" name="name" class="form-control" placeholder="Il tuo nome" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Messaggio</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                <textarea id="message" name="message" class="form-control" rows="4" placeholder="Scrivi il tuo messaggio..." required></textarea>
            </div>
        </div>


        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="bi bi-send"></i> Invia Messaggio
            </button>
        </div>

    </form>

</x-layout>
