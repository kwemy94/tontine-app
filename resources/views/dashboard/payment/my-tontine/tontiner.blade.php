<form method="POST" action="{{ route('paiements.store') }}" class="modal fade" id="paymentForm" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Effectuer un payement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="payment_id" class="form-label"> </label>
                        <input type="hidden" id="payment_id" value="{{ $tontine->id }}" class="form-control"
                            name="tontine_id" />
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="name_tontine" class="form-label"> MA TONTINE</label>
                            <input type="text" readonly id="name_tontine" value="{{ $tontine->name_tontine }}"
                                class="form-control" name="name_tontine" />
                        </div>
                        <div class="mb-3" id="payment_current">
                            <label for="payment_val" class="form-label ">MONTANT</label>
                            <input type="text" readonly id="payment_val" value="{{ $tontine->amount_tontine }}"
                                class="form-control" name="amount_tontine " />

                        </div>
                    </div>

                    <div class="row">

                        @if ($tontine->cycle->intitule == 'Mensuel')
                            <div class="col mb-3">
                                <label for="html5-month-input" class="form-label">CHOISIR UN MOIS</label>

                                <input class="form-control" type="month" value="{{ now()->format('m-Y') }}"
                                    id="html5-month-input" name="period">

                            </div>
                        @elseif ($tontine->cycle->intitule == 'Hebdomadaire')
                            <div class="col mb-3">
                                <label for="html5-week-input" class="form-label">SEMAINE</label>

                                <input class="form-control" type="week" value="2021-W25" id="html5-week-input"
                                    name="period">

                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="mb-3" id="payment_current">
                            <label for="phone_number" class="form-label ">NUMERO DE TELEPHONE</label>
                            <input type="text" id="phone_number" class="form-control required"
                                placeholder="Entrez votre numéro de téléphone" name="phone_number" />

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Fermer
                        </button>
                        {{-- <a href="{{ route('paiements.store') }}" id="paymentSubmit" class="btn btn-primary">Effectuer</a> --}}
                        <button type="submit" id="paymentSubmit" class="btn btn-primary">Effectuer</button>
                    </div>

                </div>
            </div>
        </div>
</form>
