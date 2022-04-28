<div class="modal fade" id="modalLogin" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal"
                    aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor"
                            d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Form Log In</h4>
                </div>
                <div class="d-flex flex-column">
                    <form id="formLogin" class="form-login">
                        @csrf
                        <div class="form-group">
                            <label class="input-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan email">
                            <small id="email-error" class="text-danger "></small>
                        </div>
                        <div class="form-group">
                            <label class="input-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password">
                            <small id="password-error" class="text-danger"></small>
                        </div>
                        <button type="button" onclick="check_login()" class="btn btn-primary btn-block">Log
                            In</button>
                    </form>
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <a class="small link-underline" href="javascript:;">Lupa Password?</a>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <p>Tidak punya akun? <a href="javascript:;" onclick="register()" class="text-primary">
                        Register</a>.
                </p>
            </div>
        </div>
    </div>
</div>
