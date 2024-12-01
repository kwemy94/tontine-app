<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('put')
    <div class="">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="current_password" class="form-label"> Mot de passe actuel</label>
                        <input type="password" id="current_password" value="" autocomplete="new-password"
                            class="form-control profil" name="current_password" />
                    </div>
                    <div class="mb-3" id="payment_current">
                        <label for="password" class="form-label ">Mot de passe</label>
                        <input type="password" id="password" value="" autocomplete="new-password"
                            class="form-control profil" name="password" />
                    </div>
                    <div class="mb-3" id="payment_current">
                        <label for="password_confirmation" class="form-label ">Confirmer le mot de passe</label>
                        <input type="password" id="password_confirmation" value="" autocomplete="new-password"
                            class="form-control profil" name="password_confirmation" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success mb-4" id="saveAvatar">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Enregistrer</span>
                </button>
            </div>
        </div>
    </div>
</form>
