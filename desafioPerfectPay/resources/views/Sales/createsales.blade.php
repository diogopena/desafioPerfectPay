<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>
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
    
        <form method="POST" action="{{route('sale.store')}}" class="form-horizontal form-validade">
            {{csrf_field()}}
            <div class="form-group">
                <label >Produto da Venda: </label>
                <select multiple class="form-control" id="product_id" name="product_id" type="text" >
                    @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >Cliente da Venda: </label>
                <select multiple class="form-control" id="customer_id" name="customer_id" type="text">
                    @foreach ($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row">
                <div class="col">
                    <label >Quantidade: </label>
                    <input id="qty" name="qty" type="text" class="form-control" value="{{old("qty")}}">
                </div>
                <div class="col">
                    <label >Desconto: </label>
                    <input id="discount" name="discount" type="text" class="form-control" value="{{old("discount")}}">
                </div>
            </div>
            <div class="form-group">
                <label >Status da Venda: </label>
                <select multiple class="form-control" id="status" name="status" type="text" value="{{old("status")}}">
                    <option>Vendido </option>
                    <option>Cancelada</option>
                    <option>Devolvida</option>
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary">Gravar!</button>
        </form>
        
    </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

</html>