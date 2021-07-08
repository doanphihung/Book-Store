@extends('backend.layout.master')
@section('title', 'List book')
@section('content')
    <div class="card-body"><h5 class="card-title">List order</h5>
        <div><small class="form-text text-muted">TOTAL ORDER: {{$totalOrder}} </small></div>
        <table class="mb-0 table  table-bordered  table-hover">
            <thead class="thead-dark">
            <tr>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use hashtag"></i></th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use user-circle"></i>Customer_name</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use phone-square"></i>Phone</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use truck"></i>Address</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use cube"></i> Quantity</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use money"></i>Price</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use check-square"></i> Order_date</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use eye"></i> Status</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use commenting"></i> Note</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Action</th>
            </tr>
            </thead>
            <tbody class="tbody-table-listBook">
            @forelse($orders as $key => $order)
                <tr>
                    <th scope="row" class="td-list-book">{{++$key}}</th>
                    <td class="td-list-book">{{$order->display_name}}</td>
                    <td class="td-list-book">{{$order->phone}}</td>
                    <td class="td-list-book">{{$order->address}}</td>
                    <td class="td-list-book">{{$order->total_quantity}}</td>
                    <td class="td-list-book">${{$order->total_money}}</td>
{{--                    <td class="td-list-book">{{ date('d-m-Y H:i', strtotime($order->created_at))}}</td>--}}
                    <td class="td-list-book">{{$order->created_at->toDayDateTimeString()}}</td>
                    <td class="td-list-book">{{$order->status}}</td>
                    <td class="td-list-book">{{$order->note}}</td>
                    <td class="td-list-book">
                        <div style="display: flex">
                            <a class="pe-7s-pen text-success text-active"
                               href="">Edit</a>
                            <a class="pe-7s-trash text-danger text deleteBook"
                               onclick="return confirm('Are you sure to delete?')"
                               href="">Delete</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-danger td-list-book">No data!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $orders->appends(request()->query()) }}
    </div>
@endsection
{{--@section('modal')--}}
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--         style="display: none;" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <form class="modal-content" action="{{route('book.filter')}}" method="get">--}}
{{--                @csrf--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">×</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="position-relative form-group"><label for="exampleSelect" class="">Find books by--}}
{{--                            category:</label>--}}
{{--                        <select name="select" id="" class="form-control">--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="submit" class="btn btn-primary">Choose</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
