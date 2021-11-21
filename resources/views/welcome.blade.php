@extends('layouts.argon')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Welcome Erika!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <form method="post" action="{{url('data')}}" enctype="multipart/form-data">
    @csrf
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                
                <!-- Input Area -->
                <div class="col-lg-5 col-md-7">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Kondisi lapangan (Struktur Tanah)</h3>
                        </div>
                        <div class="card-body">
                            <!-- Card body -->
                            <div class="form-group">
                                <label class="form-control-label">Kedalaman</label>
                                <input class="form-control form-control-sm" name="kedalaman" type="number" placeholder="Kedalaman (m)">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkboxes Area -->
                <div class="col-lg-5 col-md-7">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Kondisi lapangan (Struktur Tanah)</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-control-label">Jenis Tanah (Semua Jenis Tanah)</label>
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck1" type="checkbox" name="jenisTanahTinggi" value="ya">
                                        <label class="custom-control-label" for="customCheck1">Muka air tinggi</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck2" type="checkbox" name="jenisTanahRendah" value="ya">
                                        <label class="custom-control-label" for="customCheck2">Muka air rendah</label>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="custom-radio-1" class="custom-control-input" id="customRadio5" type="radio">
                                        <label class="custom-control-label" for="customRadio5">Unchecked</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="custom-radio-1" class="custom-control-input" id="customRadio6" checked="" type="radio">
                                        <label class="custom-control-label" for="customRadio6">Checked</label>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Point Area -->
                <div class="col-lg-5 col-md-7">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Kondisi lapangan (Lokasi Proyek)</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="form-group">
                                <!-- <label class="form-control-label">Lokasi</label> -->
                                <div class="col">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="lokasi" class="custom-control-input" id="customRadio5" type="radio" value="semua">
                                        <label class="custom-control-label" for="customRadio5">Semua lokasi</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="lokasi" class="custom-control-input" id="customRadio6" type="radio" value="jauh">
                                        <label class="custom-control-label" for="customRadio6">Jauh dari medan magnet & signal radio</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkboxes Area -->
                <div class="col-lg-5 col-md-7">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Jenis Utilitas Yang Dapat Dideteksi</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck3" type="checkbox" name="jenisUtilitasTanah" value="ya">
                                        <label class="custom-control-label" for="customCheck3">Di bawah permukaan tanah</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck4" type="checkbox" name="jenisUtilitasAir" value="ya">
                                        <label class="custom-control-label" for="customCheck4">Di bawah permukaan air</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Point Area -->
                <div class="col-lg-5 col-md-7">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Sumber Daya Manusia</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="sdm" value="tanpa" class="custom-control-input" id="customRadio1" type="radio">
                                        <label class="custom-control-label" for="customRadio1">Tanpa harus tenaga ahli</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="sdm" value="harus" class="custom-control-input" id="customRadio2" type="radio">
                                        <label class="custom-control-label" for="customRadio2">Harus tenaga ahli</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </div>
    </form>
@endsection
