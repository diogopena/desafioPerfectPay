<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-sm">
                <h1 class="display-10">Relatório de vendas</h1>
            </div>
            <a class="btn btn-primary m-1" href="{{ route('sale.create') }}" role="button" >Inserir venda</a>
        </div>
    </div>
    
    <div class="container">
    <form>
        <div class="form-row">
            <div class="col">
                <select id="id" class="form-control">
                    <option selected value="">Cliente</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}} ID:{{$customer->id}}</option>
                    @endforeach
                </select>
            </div>
           
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend"></div>
                <div class="input-group-text">DE</div>
                <input type="text" class="form-control" id="time1">
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend"></div>
                <div class="input-group-text">ATÉ</div>
                <input type="text" class="form-control" id="time2">
            </div>
        </div>
        
        <div class="col">
            <button class="btn btn-primary" type="submit">Procurar</button>
        </div>
        </div>
        
        
    </form>   
    </div>
    
    <div class="container">
    <table class="table table-striped" >
        <tr>
            <H3>Resultado de Vendas</H3>
        </tr>
        <thead>
            <tr>
            <th scope="col">Status</th>
            <th scope="col">Quantidade de Vendas</th>
            <th scope="col">Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Vendas</th>
                <td>{{$qtyvendido ?? ''}}</td>
                <td>R$ {{$valorvendido ?? ''}}</td>
            </tr>
            <tr>
                <th scope="row">Devoluções</th>
                <td>{{$qtydevolvido ?? ''}}</td>
                <td>R$ {{$valordevolvido ?? ''}}</td>
            </tr>
            <tr>
                <th scope="row">Cancelamentos</th>
                <td>{{$qtycancelado ?? ''}}</td>
                <td>R$ {{$valorcancelado ?? ''}}</td>
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
            <th scope="col">Quantidade de Produtos</th>
            <th scope="col">Data</th>
            <th scope="col">Valor da Venda</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
                <th scope="row">{{$sale->product->name}}</th>
                <td>{{$sale->qty}}</td>
                <td>{{$sale->updated_at}}</td>
                <td>{{$sale->sale_amount}}</td>
                <td>{{$sale->status}}</td>
                
                <td>
                
                <a class="btn btn-warning btm-lg text-white" href="{{ route('sale.edit',[$sale->id]) }}" role="button" aria-pressed="true">
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