<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    
    <body>
    
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-sm">
            <h1 class="display-10">Produtos Disponíveis</h1>
            </div>
            <a class="btn btn-primary m-1" href="{{route('product.create')}}" role="button" style="text-align:center">Inserir Produto</a>
        </div>
        @if (session('status'))
            <div class="alert alert-info">
            {{ session('status') }}
            </div>
        @endif
    </div>    

    <div class="container">
  
    <table class="table table-striped table-bordered">
        
        <thead>
            <tr>
            <th scope="col">#id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>R$ {{$product->price}}</td>
                
                <td>
                
                <a class="btn btn-warning btm-lg text-white" href="{{ route('product.edit',[ $product->id ]) }}" role="button" aria-pressed="true">
                    <span class='d-none d-md-inline'>Editar</span>
                </a>
                   
                <a class="btn btn-danger btm-lg text-white" role="button" aria-pressed="true" href="#" onclick="event.preventDefault();document.getElementById('destroy-form').submit();">
                    <span class='d-none d-md-inline'>Deletar</span>
                </a>
                <form id="destroy-form" action="{{ route('product.destroy', [ $product->id ]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
                    
                

                    
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

</body>

</html>