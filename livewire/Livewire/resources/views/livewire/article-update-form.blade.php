<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$article->id}}">
       modifica
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$article->title}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="article_update">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input wire:model="title" type="text" class="form-control" id="title"
                                aria-describedby="emailHelp">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sottotitolo</label>
                            <input wire:model="subtitle" type="text" class="form-control" id="subtitle">
                            @error('subtitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <textarea wire:model="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                        <button wire:click="delete({{ $article->id }})" class="btn btn-danger">Elimina</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
