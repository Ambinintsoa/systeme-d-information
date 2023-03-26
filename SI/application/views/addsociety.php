<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.3.0-alpha1-dist/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.min.css'); ?>">

<!-- Section: Design Block -->

<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">CREATE YOUR OWN BUSINESS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <?php echo form_open_multipart('Register/validate'); ?>
                <form action="<?php echo base_url("Register/validate"); ?>" class="signin-form" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name of the society" name="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="object" name="object">
                        <label for="floatingInput">Object</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="leader" name="leader">
                        <label for="floatingInput">Leader</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="residence" name="residence">
                        <label for="floatingInput">Residence</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="address of the society" name="address">
                        <label for="floatingInput">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control rounded-3" id="floatingInput" placeholder="tel" name="tel">
                        <label for="floatingInput">Tel</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control rounded-3" id="floatingInput" placeholder="date of the creation" name="datecreation">
                        <label for="floatingInput">Date Creation</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control rounded-3" id="floatingInput" placeholder="file of the logo" name="filelogo" size="50">
                        <label for="floatingInput">Upload LOGO</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="number of the nif" name="numnif">
                        <label for="floatingInput">Numero NIF</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control rounded-3" id="floatingInput" placeholder="file of the nif" name="filenif" size="50">
                        <label for="floatingInput">Upload Document NIF</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="number of the nrcs" name="numnrcs">
                        <label for="floatingInput">Numero NRCS</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control rounded-3" id="floatingInput" placeholder="file of the nrcs" name="filenrcs" size="50">
                        <label for="floatingInput">Upload Document NRCS</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="number of the ns" name="numns">
                        <label for="floatingInput">Numero NS</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control rounded-3" id="floatingInput" placeholder="file of the ns" name="filens" size="50">
                        <label for="floatingInput">Upload Document NS</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary theme-color" type="submit">Create</button>
                </form>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Section: Design Block -->