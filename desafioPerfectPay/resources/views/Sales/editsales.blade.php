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

    <form method="POST" action="{{route('sale.update',[$sale->id])}}" class="form-horizontal form-validade">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group">
                <label >ID do Produto: </label>
                <select disabled multiple class="form-control" id="product_id" name="product_id" type="text" value="{{old("product_id",$sale->product_id)}}">
                    @foreach ($products as $product)
                    <option>{{$product->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >ID do Cliente: </label>
                <select disabled multiple class="form-control" id="customer_id" name="customer_id" type="text" value="{{old("customer_id",$sale->customer_id)}}">
                    @foreach ($customers as $customer)
                    <option>{{$customer->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >Quantidade: </label>
                <input id="qty" name="qty" type="text" class="form-control" value="{{old("qty",$sale->qty)}}">
            </div>
            <div class="form-group">
                <label >Desconto: </label>
                <input id="discount" name="discount" type="text" class="form-control" value="{{old("discount",$sale->discount)}}">
            </div>
            <div class="form-group">
                <label >Preço vendido: </label>
                <input id="sale_amount" name="sale_amount" type="text" class="form-control" value="{{old("sale_amount",$sale->sale_amount)}}">
            </div>
            <div class="form-group">
                <label >Status da Venda: </label>
                <select multiple class="form-control" id="status" name="status" type="text" value="{{old("status"),$sale->status}}">
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