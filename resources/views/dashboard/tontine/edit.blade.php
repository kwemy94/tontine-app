<form method="POST" action="{{ route('tontine.update', $tontine->id) }}" class="modal fade" id="basicModal_edit"
    tabindex="-1" aria-hidden="true">
    @csrf
    @method('PUT')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Editer la tontine {{ $tontine->name_tontine }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name_tontine" class="form-label">NOM DE LA TONTINE </label>
                        <input type="text" id="name_tontine" class="form-control required" name="name_tontine"
                            value="{{ $tontine->name_tontine }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="cycle" class="form-label">Cycle</label>
                        <select class="form-select required" id="cycle" name="cycle_id"
                            aria-label="Default select example">
                            <option selected="" disabled>Définir le cycle</option>
                            @foreach ($cycles as $cycle)
                                <option value="{{ $cycle->id }}"
                                    {{ $cycle->id == $tontine->cycle_id ? 'selected' : '' }}>{{ $cycle->intitule }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="start_datee" class="form-label">DATE DE DEBUT</label>
                        <input type="date" id="start_datee" value="{{ $tontine->start_date }}" name="start_date"
                            class="form-control required" />
                    </div>
                    <div class="col mb-0">
                        <label for="end_datee" class="form-label">DATE DE FIN</label>
                        <input type="date" id="end_datee" value="{{ $tontine->end_date }}" name="end_date"
                            class="form-control required" />
                    </div>
                </div>
                <div class="row " id="errorDatee" style="display: none">
                    <p style="color: red">
                        La date de fin doit être supérieur à la date de début
                    </p>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="amount_tontine" class="form-label">MONTANT DE LA TONTINE </label>
                        <input type="number" id="amount_tontine" value="{{ $tontine->amount_tontine }}"
                            name="amount_tontine" class="form-control required" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="saveTontineEdit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#saveTontineEdit').click((e) => {
        e.preventDefault();
        console.log('set');
        let startD = $('#start_datee').val();
        let endD = $('#end_datee').val();
        if (!ControlRequiredFields($('#basicModal_edit .required'))) {
            return 0;
        }
        if (new Date(endD) <= new Date(startD)) {
            $('#errorDatee').css({
                'display': 'block'
            })
            return 0;
        }
        $('#errorDate').css({
            'display': 'none'
        })

        $('#basicModal_edit').submit();
    })
</script>
