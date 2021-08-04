<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sys Medico</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.css') }}">
</head>
<body>
    <header>
    <div class="px-3 py-2 bg-info text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="{{ route('user-index') }}" class="nav-link text-white">
                Usuários
              </a>
            </li>
            <li>
              <a href="{{ route('patient-index') }}" class="nav-link text-white">
                Pacientes
              </a>
            </li>
            <li>
              <a href="{{ route('doctor-index') }}" class="nav-link text-white">
                Médicos
              </a>
            </li>
            <li>
              <a href="{{ route('schedule-index') }}" class="nav-link text-white">
                Agendamentos
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <main class="container mt-4 main-container">
    @yield('content')
  </main>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables-bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').DataTable();
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 );
} );
</script>
<footer class="text-center bg-info footer">
    <section class="d-flex justify-content-center p-4">
    <p>Teste Full Stack – Mazzatech</p>
    </section>
</footer>
</body>
</html>