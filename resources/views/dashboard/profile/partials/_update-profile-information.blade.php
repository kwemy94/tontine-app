<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')
    <div class="">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label"> Nom d'utilisateur</label>
                        <input type="text" id="name" value="{{ $user->name }}" class="form-control profil"
                            name="name" />
                    </div>
                    <div class="mb-3" id="payment_current">
                        <label for="email" class="form-label ">Email</label>
                        <input type="email" id="email" value="{{ $user->email }}" class="form-control profil"
                            name="email" />
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
