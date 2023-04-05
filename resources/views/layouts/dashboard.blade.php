@extends('layouts.app')

@section('Titulo')

Bienvenido

@endsection


@section('contenido')
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/dash/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dash/dist/css/adminlte.min.css')}}">
</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    </li>
    </ul>
  </nav>
  

  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
        <div class="md:w-8/12 lg:w-6/12 px-5">
            <img src="{{asset('img/usuario.svg') }}" alt="Es la imagen de usuario " />
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col md:justify-center py-10 md:items-start md:py-10">
            <p class="text-gray-700 text 2xl">{{ auth()-> user()->name }}</p>
            <p class="text-gray-800 text-sm mb-3 font-bold">
              0
              <span class="font-normal">Reseñas</span>
            </p>

            <p class="text-gray-800 text-sm mb-3 font-bold">
              0
            <span class="font-normal">Seguidores</span>
            </p>

        </div>
     </div>
  </div>


<section class="container mx-auto mt-10">
  <h2 class="text-4xl font-black my-10 text-rigth"> Publicaciones </h2>
      
  @if ($reviews->count())
    
  
     <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" >
      @foreach ($reviews as $review )  
        <div>
          <a href="{{route('review.show',['review' => $review,'user'=> $user])}}">
           <img  width="250px" height="250px" src="{{ asset('uploads') . '/' . $review->imagen }}" alt="Imagen de Review  {{
            $review->titulo }}">
          </a>
        </div>
      @endforeach
    </div>

    <div class=" my-10">
      {{$reviews->links('pagination::tailwind')}}
    </div>

    @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay reseñas</p>
    @endif
    
</section>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="info ">

        <p class="text-orange-700 text 2xl text-center"> MENU
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p class="text-orange-700">
                Patrimonio Natural
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Reservas Naturales</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Areas Naturales Protegidas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p class="text-orange-700">
                Patrimonio Cultural
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Museos</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Sitios Arqueologicos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Santuario</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p class="text-orange-700">
                Lista de Municipios Registrados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../listM/municipality's" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Estado de Mexico </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="text-orange-700" >--Contactanos--</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p class="text-orange-700">
                Medios de contacto
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-orange-600">Correo Electronico</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/dash/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/dash/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dash/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/dash/dist/js/demo.js')}}"></script>
</body>
</html>


@endsection