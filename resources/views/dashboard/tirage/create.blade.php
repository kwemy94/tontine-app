<form method="POST" action="{{ route('tirage.store') }}" class="modal fade" id="basicModal" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Création d'un tirage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label">L'EMAIL DE L'UTILISATEUR </label>
                        <select class="form-select required" id="email" name="email" aria-label="Default select example">
                            <option selected="" disabled>Choisir l'email d'un utilisateur</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                </div> --}}
                <div class="row">
                    <div class="mb-3">
                        <label for="name_tontine" class="form-label">NOM DE LA TONTINE</label>
                        <select class="form-select required" id="name_tontine" name="name_tontine" aria-label="Default select example">
                            <option selected="" disabled>Choisir une tontine</option>
                            {{-- @foreach ($inputs as $tontine)
                                <option value="{{ $tontine->id }}">{{ $tontine->name_tontine }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <label for="draw_number" class="form-label">NUMERO DE TIRAGE</label>
                        <input type="number" id="draw_number" name="draw_number" class="form-control required" />
                    </div>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="saveTontine" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</form>
