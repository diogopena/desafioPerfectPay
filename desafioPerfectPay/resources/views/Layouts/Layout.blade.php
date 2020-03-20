<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="{{ asset('/img/favicon.png') }}" rel="icon" type="image/png"/>
        <link href="{{ asset('/font/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/argon.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">
        
        @stack('scripts')
        <title>Desafio PerfectPay</title>
        
        <nav class="navbar navbar-btn navbar-dark bg-dark">
            <!-- Navbar content -->

        <form class="form-inline">
            <a class="btn btn-secondary mr-sm-2" href="index" role="button">Início</a>
            <a class="btn btn-secondary mr-sm-2" href="{{ route('product.index') }}" role="button">Produtos</a>
            <a class="btn btn-secondary mr-sm-2" href="{{ route('customer.index') }}" role="button">Clientes</a> 
            <a class="btn btn-secondary mr-sm-2" href="{{ route('sale.index') }}" role="button">Vendas</a>    
        </form>

            
            
        </nav>
</head>
