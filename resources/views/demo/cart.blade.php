@extends('layouts.app')

@section('content')

    <div class="row container-fluid">
        <div class="col-sm-8 offset-2">
            @if (Session::has('cart'))
                <h4 class="panel-heading">Your Active Cart</h4>
                <div class="row panel-body">
                    <table class="table table-responsive table-hover">
                        <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>REMOVE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product['product']->product}}</td>
                                <td>{{$product['price']}}</td>
                                <td>{{$product['quantity']}}</td>

                                <td>
                                    <form action="{{route('remove.cart', $product['product']->product)}}" method="POST">
                                        {{csrf_field()}}
                                        <button title="Remove from cart" type="submit" class=" btn btn-danger">
                                            <i class="fa fa-trash ml-1"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <form class="soofa" action="{{route('qubeans.checkout')}}" method="POST">
                            @csrf
                            <input type="text" name="amount" value="{{1}}" hidden />
                            <input type="text" name="reference" value="Laravel Demo" hidden />
                            <input type="text" name="tid" value="" hidden />
                            <input id="ww" type="button" class="qbn-submit btn btn-sm btn-success" value="Checkout" />
                        </form>
                    </div>

                    @else
                        <h3 class="text-centre">You have not added items to the cart yet</h3>
                    @endif


                </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script id="qbn" src="https://checkout.soofapay.com/v1/soofa.min.js" type="text/javascript" data-till="5002"></script>
@endsection