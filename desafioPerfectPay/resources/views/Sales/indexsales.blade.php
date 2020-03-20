<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>

    <div class="container">
        <a class="btn btn-primary m-1" href="{{ route('sale.create') }}" role="button" >Inserir venda</a>
        <a class="btn btn-primary m-1" href="" role="button" >Editar venda</a>
    </div>
    
    <div class="container">
        <div class="dropdown m-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Clientes
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($customers as $customer)
                <a class="dropdown-item" href="{{ route('sale.show',[ $customer->id ]) }}">{{$customer->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
    
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
@push('scripts')
@endpush  
    </body>

</html>