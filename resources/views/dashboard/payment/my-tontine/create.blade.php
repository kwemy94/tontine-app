<form method="POST" action="{{ route('tontine.store') }}" class="modal fade" id="basicModal" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Dévenir membre d'une tontine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="cycle" class="form-label">Tontine</label>
                        <select class="form-select required" id="cycle" name="cycle_id" aria-label="Default select example">
                            <option selected="" disabled>Choisir la tontine</option>
                            @foreach ($tontines as $tontine)
                            <option value="{{ $tontine->id }}">{{ $tontine->intitule }}</option>
                            @endforeach
                        </select>
                    </div>
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
