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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method='POST' action="{{route('search')}}">
        @csrf
        @method('POST')
        <div class="form-row">
            <div class="col">
                <select id="id" name="id" class="form-control">
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
                <input type="text" class="form-control" id="DE" name="DE" placeholder="Formato dd-mm-YYYY">
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend"></div>
                <div class="input-group-text">ATÉ</div>
                <input type="text" class="form-control" id="ATE" name="ATE" placeholder="Formato dd-mm-YYYY">
            </div>
        </div>
        
        <div class="col">
            <button class="btn btn-primary" type="submit">Procurar</button>
        </div>
        </div>
        
        
    </form>   
    </div>
    


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
@push('scripts')
@endpush  
</body>

</html>