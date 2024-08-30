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
                        <label for="tontine_id" class="form-label"> MA TONTINE</label>
                        <select class="form-select required" id="tontine_id" name="tontine_id"
                            aria-label="Default select example">
                            <option selected="" disabled>Sélectionner la tontine</option>
                            @foreach ($myTontines as $tontine)
                                <option value="{{ $tontine->id }}">{{ $tontine->tontine->name_tontine }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="payment_amount" class="form-label">MONTANT</label>
                        <input type="number" id="payment_amount" class="form-control required" name="payment_amount"/>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col mb-3">
                        <label for="period" class="form-label">PERIODE</label>
                        <input type="date" id="period" class="form-control required" name="period"/>
                    </div> --}}
                    {{-- @if ($myTontines->cycle->intitule === 'Mensuel') --}}
                        {{-- <label for="period">CHOISIR UN MOIS</label>
                        <select name="period" id="period">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select> --}}
                        <div class="mb-3 row">
                            <label for="html5-month-input" class="col-md-2 col-form-label">CHOISIR UN MOIS</label>
                            <div class="col-md-10">
                              <input class="form-control" type="month" value="2021-06" id="html5-month-input">
                            </div>
                          </div>

                    @elseif ($myTontines->cycle->intitule === 'Hebdomadaire')
                        <label for="period">CHOISIR LE NUMERO DE SEMAINE</label>
                        <select name="period" id="period">
                            @for ($i = $myTontines->start_date->weekOfYear; $i <= $myTontines->end_date->weekOfYear; $i++)
                                <option value="{{ $i }}">{{ $i }} Semaine</option>
                            @endfor
                        </select>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" id="paymentSubmit" class="btn btn-primary">Effectuer</button>
                </div>

            </div>
</form>

