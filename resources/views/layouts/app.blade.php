<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sys Medico</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.css') }}">
    {{-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
                Usuários
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                Pacientes
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                Médicos
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                Agendamentos
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  {{-- <div class="container"> --}}
  <main class="container p-5">
    @yield('content')
  </main>


{{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables-bootstrap4.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<footer class="text-center bg-secondary footer">
    <section class="d-flex justify-content-center p-4">
    <p>Teste Full Stack – Mazzatech</p>
    </section>
</footer>
</body>
</html>