@extends('pages.layout.master')
@section('title', 'Bill')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Bill & Payment</li>
                </ol>
            </div><!--/breadcrums-->
            <div class="col-12">
                @if (Session::has('orderSuccess'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('orderSuccess') }}
                    </p>
                @endif
            </div>
            <div class="step-one">
                <h2 class="heading">Payment</h2>
            </div>
            <div class="checkout-options">
                @if($order->payment)
                    @if($order->payment->method === 'ATM')
                        <h3>Thông tin thanh toán bằng thẻ ATM</h3>
                        <p>Bạn chuyển khoản đến STK: 010101020010101</p>
                    @elseif($order->payment->method === 'Direct bank transfer')
                        <h3>Direct bank transfer</h3>
                        <p>Bạn chuyển khoản đến STK: 010101020010101</p>
                    @else
                        <h3>COD</h3>
                        <p>Chúng tôi sẽ sớm giao hàng cho bạn.</p>
                    @endif
                @else
                    <h3>Cảm ơn vì đã đặt hàng. Chúng tôi sẽ sớm liên lạc với bạn</h3>
                @endif
            </div>


            <div class="review-payment">
                <h2>Order-Bill</h2>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead align="">
                    <tr class="cart_menu">
                        <th class="">#</th>
                        <th class="">Tên sách</th>
                        <th class="">Số lượng</th>
                        <th class="">Đơn giá</th>
                        <th class="">Giá trị</th>
                    </tr>
                    </thead>
                    <tbody align="">
                    @foreach($order->books as $key => $book)
                        <tr>
                            <td class="cart_product">
                                <p>{{++$key}}</p>
                            </td>
                            <td class="cart_description">
                                <p>{{$book->name}}</p>
                            </td>
                            <td class="cart_price">
                                <p>x {{$book->pivot->quantity}}</p>
                            </td>
                            <td class="cart_total">
                                <p>${{$book->pivot->each_price}}</p>
                            </td>
                            <td class="cart_total">
                                <p>${{$book->pivot->total_price}}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tbody>
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>$59</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    @if($order->discount)
                                        <td>${{$order->discount}}</td>
                                    @else
                                        <td>$0</td>
                                    @endif

                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>${{$order->total_money}}</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p><b>. Customer name: {{$order->display_name}}</b></p>
                <p><b>. Phone: {{$order->phone}}</b></p>
                <p><b>. Address: {{$order->address}}</b></p>
            </div>

        </div>
    </section>

    {{--    <section id="cart_items" style="margin-bottom: 70px">--}}
    {{--        <div class="container">--}}
    {{--            <div class="step-one">--}}
    {{--                <h2 class="heading">Payment</h2>--}}
    {{--            </div>--}}
    {{--            @if($order->payment)--}}
    {{--                <div class="register-req">--}}
    {{--                    @if($order->payment->method === 'ATM')--}}
    {{--                        <p>Thanh toán bằng ATM</p>--}}
    {{--                    @elseif($order->payment->method === 'Direct bank transfer')--}}
    {{--                        <p>Chuyển khoản trực tiếp</p>--}}
    {{--                    @else--}}
    {{--                        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ sớm liên lạc với bạn</p>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            @else--}}
    {{--                <div class="register-req">--}}
    {{--                    <p>Cảm ơn bạn đã đặt hàng.</p>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--            <div class="review-payment">--}}
    {{--                <h2>Order-bill</h2>--}}
    {{--            </div>--}}
    {{--            <table>--}}
    {{--                <thead style="border: 1px solid black">--}}
    {{--                <tr>--}}
    {{--                    <th colspan="5" style="text-align: center">Hóa đơn</th>--}}
    {{--                </tr>--}}
    {{--                </thead>--}}

    {{--                <tbody style="border: 1px solid black">--}}
    {{--                <tr>--}}
    {{--                    <td colspan="5">- Tên khách hàng: {{$order->display_name}}</td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <td colspan="5">- Số điện thoại: {{$order->phone}}</td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <td colspan="5">- Địa chỉ: {{$order->address}}</td>--}}

    {{--                <tr>--}}
    {{--                    <td colspan="5">- Phương thức thanh toán: @if($order->payment){{$order->payment->method}}@endif</td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <td colspan="5">- Note:@if($order->note){{$order->note}}@endif</td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <th>#</th>--}}
    {{--                    <th>Tên sách</th>--}}
    {{--                    <th>Số lượng</th>--}}
    {{--                    <th>Đơn giá</th>--}}
    {{--                    <th>Giá trị</th>--}}
    {{--                </tr>--}}
    {{--                @foreach($order->books as $key => $book)--}}
    {{--                    <tr>--}}
    {{--                        <td>{{++$key}}</td>--}}
    {{--                        <td>{{$book->name}}</td>--}}
    {{--                        <td style="text-align: left">x{{$book->pivot->quantity}}</td>--}}
    {{--                        <td>${{$book->pivot->each_price}}</td>--}}
    {{--                        <td>${{$book->pivot->total_price}}</td>--}}
    {{--                    </tr>--}}
    {{--                @endforeach--}}
    {{--                <tr>--}}
    {{--                    <td colspan="5">--}}
    {{--                        ---------------------------------------------------------------------------------------------}}
    {{--                    </td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <td colspan="2"></td>--}}
    {{--                    <td colspan="2">Tổng cộng:</td>--}}
    {{--                    <td>${{$order->total_money}}</td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <td colspan="2"></td>--}}
    {{--                    <td colspan="2">Discount:</td>--}}
    {{--                    @if($order->discount)--}}
    {{--                        <td>-${{$order->discount}}</td>--}}
    {{--                    @else--}}
    {{--                        <td>-$0</td>--}}
    {{--                    @endif--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <td colspan="2"></td>--}}
    {{--                    <td colspan="2  "><b>Thành tiền:</b></td>--}}
    {{--                    <td><b>${{$order->total_money - $order->discount}}</b></td>--}}
    {{--                </tr>--}}
    {{--                </tbody>--}}
    {{--            </table>--}}
    {{--        </div>--}}
    {{--    </section>--}}
@endsection
