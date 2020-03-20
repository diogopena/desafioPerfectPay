<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>

    <div class="container">
        <a class="btn btn-primary m-1" href="{{ route('sale.create') }}" role="button" >Inserir venda</a>
    </div>

    
    <div class="container">
        <div class="dropdown m-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Clientes
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($customers as $customer)
                <a class="dropdown-item" href="{{ route('sale.show',[ $customer->identification_number ]) }}">Cliente:{{$customer->name}} ID:{{$customer->identification_number}}</a>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="container">
    <table class="table table-striped" >
        <tr>
            <H3>Resultado de Vendas</H3>
        </tr>
        <thead>
            <tr>
            <th scope="col">Status</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Vendas</th>
                <td>{{$qtyvendido}}</td>
                <td>R$ {{$valorvendido}}</td>
            </tr>
            <tr>
                <th scope="row">Devoluções</th>
                <td>{{$qtydevolvido}}</td>
                <td>R$ {{$valordevolvido}}</td>
            </tr>
            <tr>
                <th scope="row">Cancelamentos</th>
                <td>{{$qtycancelado}}</td>
                <td>R$ {{$valorcancelado}}</td>
            </tr>
    </tbody>
    </table>
    </div>   
    <br>
    <div class="container-sm">
    <table class="table table-striped">
        <tr>
            <H3>Tabela de Vendas</H3>
        </tr>
        <thead>
            <tr>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Data</th>
            <th scope="col">Valor</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
                <th scope="row">{{$sale->product_id}}</th>
                <td>{{$sale->qty}}</td>
                <td>{{$sale->updated_at}}</td>
                <td>{{$sale->sale_amount}}</td>
                <td>{{$sale->status}}</td>
                
                <td>
                
                <a class="btn btn-warning btm-lg text-white" href="" role="button" aria-pressed="true">
                    <span class='d-none d-md-inline'>Editar</span>
                </a>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>

    
 
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
@push('scripts')
@endpush  
    </body>

</html>