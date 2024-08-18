<form method="POST" action="{{ route('tontine.store') }}" class="modal fade" id="basicModal" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Création d'une tontine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name_tontine" class="form-label">NOM DE LA TONTINE </label>
                        <input type="text" id="name_tontine" class="form-control required" name="name_tontine"
                            placeholder="Entrez le nom de la tontine" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="cycle" class="form-label">Cycle</label>
                        <select class="form-select required" id="cycle" name="cycle_id" aria-label="Default select example">
                            <option selected="" disabled>Choisir le cycle</option>
                            @foreach ($cycles as $cycle)
                            <option value="{{ $cycle->id }}">{{ $cycle->intitule }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="start_date" class="form-label">DATE DE DEBUT</label>
                        <input type="date" id="start_date" name="start_date" class="form-control required" />
                    </div>
                    <div class="col mb-0">
                        <label for="end_date" class="form-label">DATE DE FIN</label>
                        <input type="date" id="end_date" name="end_date" class="form-control required" />
                    </div>
                </div>
                <div class="row " id="errorDate" style="display: none">
                    <p style="color: red">
                        La date de fin doit être supérieur à la date de début
                    </p>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="amount_tontine" class="form-label">MONTANT DE LA TONTINE </label>
                        <input type="number" id="amount_tontine" name="amount_tontine" class="form-control required" />
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