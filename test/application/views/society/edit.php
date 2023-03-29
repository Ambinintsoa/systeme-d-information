<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.min.css'); ?>">

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    The best offer <br />
                    <span style="color: hsl(218, 81%, 75%)">for your business</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                CREATE YOUR OWN BUSINESS
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="<?php echo base_url("Register/validate"); ?>" class="signin-form" method="POST">
                            <!-- 2 column grid layout with text inputs for the name and leader -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" name="name" />
                                        <label class="form-label" for="form3Example1">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" name="leader" />
                                        <label class="form-label" for="form3Example2">Leader</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="object" />
                                <label class="form-label" for="form3Example3">Object</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example4" class="form-control" name="residence" />
                                <label class="form-label" for="form3Example4">Residence</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="address" />
                                <label class="form-label" for="form3Example3">Address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="tel" id="form3Example4" class="form-control" name="tel" />
                                <label class="form-label" for="form3Example4">Tel</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" />
                                <label class="form-label" for="form3Example3">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="password" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="date" id="form3Example4" class="form-control" name="datecreation" />
                                <label class="form-label" for="form3Example4">DATE CREATION</label>
                            </div>

                            <p class="text-center">NIF</p>
                            <input type="hidden" name="doc1" value="1" />
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example3" class="form-control" name="numnif" />
                                        <label class="form-label" for="form3Example3">NUMERO</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="file" id="form3Example4" class="form-control" name="filenif" size="50" />
                                        <label class="form-label" for="form3Example4">FILE UPLOAD</label>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">NRCS</p>
                            <input type="hidden" name="doc2" value="2" />
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example3" class="form-control" name="numnrcs" />
                                        <label class="form-label" for="form3Example3">NUMERO</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="file" id="form3Example4" class="form-control" name="filenrcs" size="50"/>
                                        <label class="form-label" for="form3Example4">FILE UPLOAD</label>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-center">NS</p>
                            <input type="hidden" name="doc3" value="3" />
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example3" class="form-control" name="numns"/>
                                        <label class="form-label" for="form3Example3">NUMERO</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="file" id="form3Example4" class="form-control" name="filens" size="50"/>
                                        <label class="form-label" for="form3Example4">FILE UPLOAD</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->