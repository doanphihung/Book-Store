@extends('pages.layout.master')
@section('title', 'Bill')
@section('content')
    <section id="cart_items" style="margin-bottom: 70px">
        <div class="container">
            <div class="step-one">
                <h2 class="heading">Payment</h2>
            </div>
            @if($order->payment)
                <div class="register-req">
                    @if($order->payment->method === 'ATM')
                        <p>Thanh toán bằng ATM</p>
                    @elseif($order->payment->method === 'Direct bank transfer')
                        <p>Chuyển khoản trực tiếp</p>
                    @else
                        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ sớm liên lạc với bạn</p>
                    @endif
                </div>
            @else
                <div class="register-req">
                    <p>Cảm ơn bạn đã đặt hàng.</p>
                </div>
            @endif
            <div class="review-payment">
                <h2>Order-bill</h2>
            </div>
            <table>
                <thead style="border: 1px solid black">
                <tr>
                    <th colspan="5" style="text-align: center">Hóa đơn</th>
                </tr>
                </thead>

                <tbody style="border: 1px solid black">
                <tr>
                    <td colspan="5">- Tên khách hàng: {{$order->display_name}}</td>
                </tr>
                <tr>
                    <td colspan="5">- Số điện thoại: {{$order->phone}}</td>
                </tr>
                <tr>
                    <td colspan="5">- Địa chỉ: {{$order->address}}</td>

                <tr>
                    <td colspan="5">- Phương thức thanh toán: @if($order->payment){{$order->payment->method}}@endif</td>
                </tr>
                <tr>
                    <td colspan="5">- Note:@if($order->note){{$order->note}}@endif</td>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Giá trị</th>
                </tr>
                @foreach($order->books as $key => $book)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$book->name}}</td>
                        <td style="text-align: left">x{{$book->pivot->quantity}}</td>
                        <td>${{$book->pivot->each_price}}</td>
                        <td>${{$book->pivot->total_price}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        -------------------------------------------------------------------------------------------
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Tổng cộng:</td>
                    <td>${{$order->total_money}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Discount:</td>
                    @if($order->discount)
                        <td>-${{$order->discount}}</td>
                    @else
                        <td>-$0</td>
                    @endif
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2  "><b>Thành tiền:</b></td>
                    <td><b>${{$order->total_money - $order->discount}}</b></td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
