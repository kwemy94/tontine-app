<form method="POST" action="{{ route('paiements.store') }}" class="modal fade" id="paymentForm" tabindex="-1"
    aria-hidden="true" data-bs-backdrop="static">
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

                                <input class="form-control audrey" type="month" value=""
                                    id="html5-month-input" name="period" placeholder="Mois Année">

                            </div>
                        @elseif ($tontine->cycle->intitule == 'Hebdomadaire')
                            <div class="col mb-3">
                                <label for="html5-week-input" class="form-label">SEMAINE</label>

                                <input class="form-control audrey" type="week" value="2021-W25" id="html5-week-input"
                                    name="period">

                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="mb-3" id="payment_current">
                            <label for="phone_number" class="form-label ">NUMERO DE TELEPHONE</label>
                            <input type="text" id="phone_number" class="form-control audrey"
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

<script>
    window.onload = function() {
        $('#paymentSubmit').click((e) => {
                e.preventDefault();
                if (!ControlRequiredFields($('#paymentForm .audrey'))) {
                    return 0;
                }
                $('#paymentSubmit').attr('disabled', true);
                $('#paymentForm').submit();
                console.log('ds');
            })

        // const monthInput = document.getElementById('html5-month-input');

        // // Fonction pour obtenir le mois en lettres
        // function getMonthInLetters() {
        //     const monthsInLetters = [
        //         "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        //         "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
        //     ];
        //     return monthsInLetters[new Date().getMonth()];
        // }

        // Fonction pour obtenir l'année en cours
        // function getCurrentYear() {
        //     return new Date().getFullYear();
        // }

        
        // console.log('Bonsoir');
        // Récupérer l'élément input de type month
        console.log('bonjour');
        const monthInput = document.getElementById('html5-month-input');
        
        
        // Pré-remplir le champ "mois" avec le mois en lettres suivi de l'année en cours
        // monthInput.value = `${getMonthInLetters()} / ${getCurrentYear()}`;


        // Obtenir la date actuelle
        const today = new Date();

        // Extraire l'année et le mois actuels
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Ajouter un zéro devant si nécessaire

        // Formater la valeur comme YYYY-MM
        const currentMonth = `${month}-${year}`;
        
        // Définir la valeur de l'input
        monthInput.value = currentMonth;
    }
    
</script>
