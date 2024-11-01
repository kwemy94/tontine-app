<form method="POST" action="{{ route('tontine.store') }}">
    @csrf
    <div class="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Création d'une tontine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3 form-floating">
                        <input type="text" id="name_tontine" class="form-control required" name="name_tontine"
                        placeholder="Entrez le nom de la tontine" />
                        <label for="name_tontine">NOM DE LA TONTINE </label>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
                
                <button type="submit" id="saveTontine" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</form>
