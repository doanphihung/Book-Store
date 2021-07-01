@extends('pages.layout.master')
@section('title', 'Cart')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image" colspan="2">Item</td>
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
                            </td>
                            <td class="cart_price">
                                <p>${{$headBook['bookInfo']->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a style="text-decoration: none" class="cart_quantity_up" href="javascript:" data-id = "{{$headBook['bookInfo']->id}}"> + </a>
                                    <input id="value-quantity-{{$headBook['bookInfo']->id}}" disabled class="cart_quantity_input" type="text" name="quantity"
                                           value="{{$headBook['quantity']}}" autocomplete="off" size="2">
                                    <a  style="text-decoration: none" class="cart_quantity_down" href="javascript:" data-id = "{{$headBook['bookInfo']->id}}"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" id="total-headBook-{{$headBook['bookInfo']->id}}">${{$headBook['price']}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-id="{{$headBook['bookInfo']->id}}" href="javascript:"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                @else
                    <th class="text-danger" style="text-align: center" colspan="5">No item!</th>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Total items <span id="total-quantity-cart">@if(isset($totalQuantity)){{$totalQuantity}}@else 0 @endif</span></li>
                        <li>Total money <span id="total-price-cart">@if(isset($totalPrice)){{$totalPrice}}@else $0 @endif</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{route('cart.details')}}">Update</a>
                    <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
