@extends('pages.layout.master')
@section('title', 'Checkout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-5 clearfix">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <form action="{{route('save-order')}}" method="post">
                                @csrf
                                @error('name')
                                <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                                @enderror
                                <input type="text" placeholder="Display Name" name="name"
                                       @if(old('name'))
                                       value="{{old('name')}}"
                                       @else
                                       value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                    @endif >
                                @error('phone')
                                <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                                @enderror
                                <input type="text" placeholder="Phone" name="phone"
                                       @if(old('phone'))
                                       value="{{old('phone')}}"
                                       @else
                                       value="{{\Illuminate\Support\Facades\Auth::user()->phone}}"
                                    @endif >
                                @error('address')
                                <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                                @enderror
                                <input type="text" placeholder="Address" name="address"
                                       @if(old('address'))
                                       value="{{old('address')}}"
                                       @else
                                       value="{{\Illuminate\Support\Facades\Auth::user()->address}}"
                                    @endif >
                                @error('payment_id')
                                <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                                @enderror
                                <select name ='payment_id'>
                                    <option disabled selected>-- Payment methods --</option>
                                    @forelse($payments as $key => $payment)
                                    <option value="{{$payment->id}}">{{$payment->method}}</option>
                                    @empty
                                    <option class="text-danger">No option!</option>
                                    @endforelse
                                </select>
                                @error('note')
                                <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                                @enderror
                                <textarea style="margin-top: 10px" cols="4" placeholder=" Notes about your order"
                                          name="note">@if(old('note')){{old('note')}}@endif</textarea>
                                <a class="btn btn-danger" style="margin-top: 15px" href="{{route('cart.details')}}">Cancel</a>
                                <button class="btn btn-primary" type="submit">Place Order</button>
                            </form>
                        </div>

                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                    </div>

                </div>
            </div>
            <div class="review-payment">
                <h2>Review &amp; Payment</h2>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="name">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody id="table-items">
                    @if(isset($headsBook))
                        @forelse($headsBook as $headBook)
                            <tr id="cart_delete_{{$headBook['bookInfo']->id}}">
                                <td class="cart_product">
                                    <a href=""><img class="img-cart"
                                                    src='{{asset("storage/upload_images/images_book/" . $headBook['bookInfo']->image)}}'
                                                    alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$headBook['bookInfo']->name}}</a></h4>
                                    <p>Author:
                                        @foreach($headBook['bookInfo']->authors as $author)
                                            {{$author->name}}.
                                        @endforeach
                                    </p>
                                </td>
                                <td class="cart_price">
                                    <p>$ {{$headBook['bookInfo']->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a style="text-decoration: none" class="cart_quantity_down" href="javascript:"
                                           data-id="{{$headBook['bookInfo']->id}}"> - </a>

                                        <input id="value-quantity-{{$headBook['bookInfo']->id}}" disabled
                                               class="cart_quantity_input" type="text" name="quantity"
                                               value="{{$headBook['quantity']}}" autocomplete="off" size="2">
                                        <a style="text-decoration: none" class="cart_quantity_up" href="javascript:"
                                           data-id="{{$headBook['bookInfo']->id}}"> + </a>

                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" id="total-headBook-{{$headBook['bookInfo']->id}}">
                                        $ {{$headBook['price']}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" data-id="{{$headBook['bookInfo']->id}}"
                                       href="javascript:"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    @else
                        <th class="text-danger" style="text-align: center" colspan="5">No item!</th>
                    @endif
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tbody>
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td class="total-price-cart">@if(isset($totalPrice))$ {{$totalPrice}}@else $
                                        0 @endif</td>
                                </tr>
                                <tr>
                                    <td>Total items</td>
                                    <td class="total-quantity-cart">@if(isset($totalQuantity)){{$totalQuantity}}@else
                                            0 @endif</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span id="total-price-checkout">@if(isset($totalPrice))$ {{$totalPrice}}@else
                                                $0 @endif</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@endsection
