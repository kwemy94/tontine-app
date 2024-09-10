<form method="POST" action="{{ route('lancer-tirage') }}" class="modal fade" id="formTirage" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Création d'un tirage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col mb-3">
                        <label for="tontine_id" class="form-label"> </label>
                        <select class="form-select required" id="tontine_id" name="tontine_id"
                            aria-label="Default select example">
                            <option selected="" disabled>Sélectionner la tontine</option>
                            @foreach ($tontines as $tontine)
                                <option value="{{ $tontine->id }}">{{ $tontine->name_tontine }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="lancerTire" class="btn btn-primary">Lancer le tirage</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    //sCript pour lancer le tirage
    document.getElementById('lancerTire').addEventListener('click', function() {
        fetch('/lancer-tirage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    tontine_id: document.querySelector('select[name="tontine_id"]').value
                })
            })
            .then(response => response.json())
            .then(data => {
                //Traiter la réponse du controlleur
                alert('Votre numéro de tirage est : ' + data.numero_tirage);
            })
            .catch(error => {
                console.error('Une erreur s\'est produite : ', error);
            });


    })
    // document.addEventListener('DOMContentLoaded', function() {
    //     const form = document.querySelector('#basicModal');
    //     form.addEventListener('submit', function(event) {
    //         event.preventDefault();
    //         fetch('/lancer-tirage',{
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type':'application/json',
    //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //             },
    //             body: JSON.stringify
    //             ({
    //                 tontine_id: document.querySelector('#tontine_id').value
    //             })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             //Afficher le numéro de tirage dans la popup
    //             alert('Votre numéro de tirage est : ' +data.numero_tirage);
    //         })
    //         .catch(error => {
    //             console.error('Une erreur s\'est produite : ', error);
    //         });

    //     });
    // });
</script>
