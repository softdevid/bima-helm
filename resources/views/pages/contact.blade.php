@extends('layouts.main')
@section('content')
    <div class="content">
        <main class="container">
            <div class="talk-title-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-lg-6 col-xl-9">
                                <h1 class="judul-talk">Let's Talk</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <article>
                            <div class="talk-content">
                                <div class="col-12">
                                    <div class="row" style="margin-left: -15px;margin-right: -15px;">
                                        <div class="col-lg-5 stack1" style="padding-left: 15px; padding-right: 15px;">
                                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 text-center">
                                                        <span class="fa-stack" style="vertical-align: top; font-size: 40px">
                                                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                                                            <i class="fa-solid fa-phone fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-8 text-md-start text-center">
                                                        <div class="card-body">
                                                            <h5 class="card-title">+62 857-2806-0268</h5>
                                                            <p class="card-text">Phone number of Company</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 text-center">
                                                        <span class="fa-stack" style="vertical-align: top; font-size: 40px">
                                                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                                                            <i class="fa-solid fa-location-dot fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-8 text-md-start text-center">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Kalikabong, Kec. Kalimanah, Kab.
                                                                Purbalingga</h5>
                                                            <p class="card-text">Location of Company</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 text-center">
                                                        <span class="fa-stack" style="vertical-align: top; font-size: 40px">
                                                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                                                            <i class="fa-solid fa-envelope fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-8 text-md-start text-center">
                                                        <div class="card-body">
                                                            <h5 class="card-title">mekarlaserc@gmail.com</h5>
                                                            <p class="card-text">For technical issues and requests.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7" style="padding-left: 15px; padding-right: 15px;">
                                            <div class="p-md-5 p-3 form-talk"
                                                style="background-color: #f8f8f8;border-color: #dddddd;border-style: solid;border-width: 1px;border-radius: 2px;">
                                                <?php if(!empty(session()->getFlashdata('success'))) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?= session()->getFlashdata('success') ?>
                                                </div>
                                                <?php } ?>
                                                <?php if(!empty(session()->getFlashdata('failed'))) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?= session()->getFlashdata('failed') ?>
                                                </div>
                                                <?php } ?>
                                                <form method="POST" action="/talk/send-mail/" enctype="multipart/form-data"
                                                    class="needs-validation" novalidate>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-2">
                                                                <label for="talk-name" class="form-label">Nama</label>
                                                                <input type="text" name="nama"
                                                                    class="form-control form-control-lg" id="talk-name"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Isikan nama
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-2">
                                                                <label for="talk-email" class="form-label">Email</label>
                                                                <input type="email" name="email"
                                                                    class="form-control form-control-lg" id="talk-email"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Isikan email
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-2">
                                                                <label for="talk-subject" class="form-label">Subject</label>
                                                                <input type="text" name="subjek"
                                                                    class="form-control form-control-lg" id="talk-subject"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Isikan subjek
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="talk-message" class="form-label">Pesan
                                                                    (Optional)</label>
                                                                <textarea name="pesan" class="form-control" id="talk-message"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="kirim" class="btn btn-lg text-white"
                                                        style="padding: 8px 30px 8px 30px; background-color: #173052;">Submit</button>
                                                </form>
                                                <script type="text/javascript">
                                                    (() => {
                                                        'use strict'

                                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                        const forms = document.querySelectorAll('.needs-validation')

                                                        // Loop over them and prevent submission
                                                        Array.from(forms).forEach(form => {
                                                            form.addEventListener('submit', event => {
                                                                if (!form.checkValidity()) {
                                                                    event.preventDefault()
                                                                    event.stopPropagation()
                                                                }

                                                                form.classList.add('was-validated')
                                                            }, false)
                                                        })
                                                    })()
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reach-us">
                                <h2 class="judul-lokasi" style="font-weight: bold;margin-bottom: 20px;">Reach Us Nearby
                                </h2>
                                <div class="reach-us-place">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 d-flex justify-content-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <span class="fa-stack stack4"
                                                                style="vertical-align: top; font-size: 40px">
                                                                <i class="fa-regular fa-circle fa-stack-2x"></i>
                                                                <i class="fa-solid fa-building fa-stack-1x"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 text-md-start text-center">
                                                        <div class="card-body isi-stack4">
                                                            <h5 class="card-title">Mekar Cutting Digital Head Office</h5>
                                                            <p class="card-text">Kalikabong, Kec. Kalimanah.
                                                                <br>Purbalingga, Jawa Tengah.<br>53152
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 d-flex justify-content-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <span class="fa-stack stack5"
                                                                style="vertical-align: top; font-size: 40px">
                                                                <i class="fa-regular fa-circle fa-stack-2x"></i>
                                                                <i class="fa-solid fa-building fa-stack-1x"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 text-md-start text-center">
                                                        <div class="card-body isi-stack5">
                                                            <h5 class="card-title">Mekar Cutting Digital Head Office</h5>
                                                            <p class="card-text">Kalikabong, Kec. Kalimanah.
                                                                <br>Purwokerto, Jawa Tengah.<br>53152
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
