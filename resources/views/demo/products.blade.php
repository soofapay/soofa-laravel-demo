@extends('layouts.app')
@section('content')

<div class="container-fluid">
    @include('layouts.nav')
   <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <img src="{{asset('images/14.jpg')}}" class="img-fluid" alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <!--Content-->
                <div class="p-4">

                    <div class="mb-3">
                        <a href="">
                            <span class="badge purple mr-1"></span>
                        </a>
                        <a href="">
                            <span class="badge blue mr-1"></span>
                        </a>
                        <a href="">
                            <span class="badge red mr-1"></span>
                        </a>
                    </div>

                    <p class="lead">
              <span class="mr-1">
              </span>
                        <span>Ksh.10</span>
                    </p>

                    <p class="lead font-weight-bold">Description</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
                        sint voluptatibus!
                        Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>

                    <form action="{{route('cart.product')}}" class="d-flex justify-content-left" method="POST">
                        <!-- Default input -->
                        {{csrf_field()}}
                        <input type="hidden" value="Smart Tv" name="added_product">
                        <input type="hidden" value="10" name="price">
                        <button class="btn btn-primary btn-md my-0 p" name="add-to-cart" >Add to cart
                            <i class="fa fa-shopping-cart ml-1"></i>
                        </button>

                    </form>

                </div>
                <!--Content-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr>

        <!--Grid row-->
        <div class="row d-flex justify-content-center wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 text-center">

                <h4 class="my-4 h4"></h4>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
                    voluptates,
                    quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <img src="{{asset('images/11.jpg')}}" class="img-fluid" alt="">
                <div class="text-center">
                <p class="lead">
              <span class="mr-1">
              </span>
                    <span>Ksh.5</span>
                </p>
                <form action="{{route('cart.product')}}" class="d-flex justify-content-center" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" value="Huawei Y9" name="added_product">
                    <input type="hidden" value="5" name="price">
                    <button class="btn btn-primary btn-md my-0 p" type="submit" name="add-to-cart">Add to cart
                        <i class="fa fa-shopping-cart ml-1"></i>
                    </button>

                </form>
                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="{{asset('images/12.jpg')}}" class="img-fluid" alt="">
                <div class="text-center">
                    <p class="lead">
              <span class="mr-1">
              </span>
                        <span>Ksh.9</span>
                    </p>
                    <form action="{{route('cart.product')}}" class="d-flex justify-content-center" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" value="ThinkPad" name="added_product">
                        <input type="hidden" value="9" name="price">
                        <button class="btn btn-primary btn-md my-0 p" type="submit" name="add-to-cart">Add to cart
                            <i class="fa fa-shopping-cart ml-1"></i>
                        </button>

                    </form>
                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="{{asset('images/13.jpg')}}" class="img-fluid" alt="">
                <div class="text-center">
                    <p class="lead">
              <span class="mr-1">
              </span>
                        <span>Ksh.7.50</span>
                    </p>
                    <form action="{{route('cart.product')}}" class="d-flex justify-content-center" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" value="Samsung s7" name="added_product">
                        <input type="hidden" value="7.50" name="price">
                        <button class="btn btn-primary btn-md my-0 p" type="submit" name="add-to-cart">Add to cart
                            <i class="fa fa-shopping-cart ml-1"></i>
                        </button>

                    </form>
                </div>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
    </div>
    </main>

 @endsection

@section('scripts')
    <script id="qbn" src="https://checkout.soofapay.com/v1/soofa.min.js" type="text/javascript" data-till="5002"></script>
@endsection