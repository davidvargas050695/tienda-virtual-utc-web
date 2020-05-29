<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Repatirdor UTC</title>
  <!-- Favicon -->
  <link href="{{asset('form/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('form/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('form/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('form/assets/css/argon.css?v=1.0.1')}}" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="{{asset('form/assets/css/docs.min.css')}}" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="#">
              <img src="{{asset('assets/img/utc.png')}}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
              <div class="navbar-collapse-header">
                <div class="row">
                  <div class="col-6 collapse-brand">
                    <a href="../index.html">
                      <img src="{{asset('assets/img/utc.png')}}">
                    </a>
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                  UTC Tienda Virtual

          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-white pb-2">
                <div class="text-muted text-center mb-2">
                  <h5>Formulario de solicitud para repartidores</h5>
                </div>
              </div>
              <div class="card-body ">
                {!! Form::open(['url' => 'store-deliveryman','files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Datos del solicitante</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                  </div>
                                  {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombres']) !!}


                                </div>
                            </div>
                            @error('name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                  </div>

                                  {!! Form::text('last_name', null, ['class'=>'form-control','placeholder'=>'Apellidos']) !!}
                                </div>
                              </div>
                              @error('last_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                  </div>
                                  {!! Form::text('ci', null, ['class'=>'form-control','placeholder'=>'Documento de identificación']) !!}
                                </div>
                              </div>
                              @error('ci')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                                  </div>
                                  {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>'Dirección']) !!}
                                </div>
                              </div>
                              @error('address')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                  </div>
                                  {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>'Télefono']) !!}
                                </div>
                              </div>
                              @error('phone')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Correo electrónico']) !!}
                                </div>
                              </div>
                              @error('email')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <h6>Datos del vehículo</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-bus-front-12"></i></span>
                                  </div>

                                  {!! Form::text('vehicle_make', null, ['class'=>'form-control','placeholder'=>'Marca del vehículo']) !!}
                                </div>
                              </div>
                              @error('vehicle_make')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}.
                                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-bus-front-12"></i></span>
                                  </div>

                                  {!! Form::text('vehicle_type', null, ['class'=>'form-control','placeholder'=>'Tipo de vehículo']) !!}
                                </div>
                              </div>
                              @error('vehicle_type')
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  {{ $message }}.
                              </div>
              @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-bus-front-12"></i></span>
                                  </div>
                                  {!! Form::text('vehicle_plate', null, ['class'=>'form-control','placeholder'=>'Placa del vehículo']) !!}
                                </div>
                              </div>
                              @error('vehicle_plate')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}.
                                </div>
                             @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-bus-front-12"></i></span>
                                  </div>

                                  {!! Form::text('vehicle_year', null, ['class'=>'form-control','placeholder'=>'Año del vehículo']) !!}
                                </div>
                              </div>
                              @error('vehicle_year')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}.
                                </div>
                             @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-muted" for="">Describe brevemente tu vehículo</label>
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                                  </div>
                                  {!! Form::textarea('vehicle_description',null, ['class'=>'form-control']) !!}

                                </div>
                              </div>
                              @error('vehicle_description')
                                <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                                    {{ $message }}.
                                </div>
                             @enderror
                        </div>

                    </div>

                  <div class="text-muted font-italic">
                    <small>
                        <span class="text-success font-weight-700">¡Importante!</span>
                        Para continuar con el proceso de registro nuestros operadores se comunicarán contigo en una periodo de 72 horas para verificar la información proporcionada.

                    </small>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Crear cuenta</button>
                  </div>
                  {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer class="footer">
    <div class="container">
      <div class="row row-grid align-items-center mb-5">
        <div class="col-lg-7">
          <h3 class="text-primary font-weight-light mb-2">¡Unete y forma parte de esta iniciativa!</h3>
          <h4 class="mb-0 font-weight-light">Encuentra mas información del servicio de ventas y entregas online UTC en nuestras redes sociales.</h4>
        </div>
        <div class="col-lg-5 text-lg-center btn-wrapper">
          <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-twitter"></i>
          </a>
          <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
            <i class="fa fa-facebook-square"></i>
          </a>
          <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-dribbble"></i>
          </a>
          <a target="_blank" href="https://github.com/creativetimofficial" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Star on Github">
            <i class="fa fa-github"></i>
          </a>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; 2018
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="{{asset('form/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('form/assets/vendor/popper/popper.min.js')}}"></script>
  <script src="{{asset('form/assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('form/assets/vendor/headroom/headroom.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('form/assets/js/argon.js?v=1.0.1')}}"></script>
</body>

</html>
