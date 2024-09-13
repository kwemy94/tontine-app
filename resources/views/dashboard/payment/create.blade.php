<form method="POST" action="{{ route('paiements.store') }}" class="modal fade" id="adhererTontine" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Effectuer un payement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col mb-3">
                        <label for="tontine_id" class="form-label"> MA TONTINE</label>
                        <select class="form-select required" id="tontine_id" name="tontine_id"
                            aria-label="Default select example">
                            <option selected="" disabled>Sélectionner la tontine</option>
                            @foreach ($myTontines as $tontine)
                                <option value="{{ $tontine->id }}">{{ $tontine->tontine->name_tontine }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="payment_current" hidden>
                        <label for="payment_val" class="form-label ">Montant</label>
                        <input type="text" readonly id="payment_val" value="" class="form-control" />

                    </div>
                    @foreach ($openTontines as $tontine)
                        <input type="hidden" readonly id="tontine_{{ $tontine->id }}"
                            value="{{ $tontine->amount_tontine }}" class="form-control" />
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" id="integrerTontine" class="btn btn-primary">Effectuer</button>
                </div>

            </div>
        </div>
    </div>
</form>
