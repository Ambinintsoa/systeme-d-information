<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>

    <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">LOG IN</h1>
                </div>
    
                <div class="modal-body p-5 pt-0">
                    <form action="" class="signin-form" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary theme-color" type="submit">Log In</button>
                        <small class="text-muted">By clicking Log In, you agree to the terms of use.</small>
                        <hr class="my-4">
                        <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
                        <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit">
                            <i class="fab fa-twitter" width="16" height="16"></i>
                            Log In with Twitter
                        </button>
                        <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                            <i class="fab fa-facebook" width="16" height="16"></i>
                            Log In with Facebook
                        </button>
                        <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                            <i class="fab fa-github" width="16" height="16"></i>
                            Log In with GitHub
                        </button>
    
                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" id="form2Example33" checked />
                            <label class="form-check-label" for="form2Example33">
                                Subscribe to our newsletter
                            </label>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password ?</a>
                            </div>
                        </div>
    
                        <p class="text-center">New here ? Sign up <a data-toggle="tab" href="">here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>