<form method="POST" action="{{ route('become-member.store') }}" class="modal fade" id="basicModal" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Intégrer une tontine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        {{-- <label for="tontine" class="form-label">Tontine</label> --}}
                        <select class="form-select required" id="tontine" name="tontine_id"
                            aria-label="Default select example">
                            <option selected="" disabled>Choisir la tontine</option>
                            @foreach ($openTontines as $tontine)
                                <option value="{{ $tontine->id }}">{{ $tontine->name_tontine }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="week">Semaine</label>
                        <input type="week" name="periode" class="form-control">
                    </div> --}}
                    <div class="mb-3" id="tontine_current" hidden>
                        <label for="tontine_{{ $tontine->id }}"
                            class="form-label ">Montant</label>
                        <input type="text" readonly id="tontine_val" value=""
                            class="form-control" />
                        
                    </div>
                    @foreach ($openTontines as $tontine)
                        
                            <input type="hidden" readonly id="tontine_{{ $tontine->id }}" value="{{ $tontine->amount_tontine }}"
                                class="form-control" />
                        
                    @endforeach
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="saveTontine" class="btn btn-primary">Intégrer</button>
            </div>
        </div>
    </div>
</form>
