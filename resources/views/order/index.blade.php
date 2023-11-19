@extends('layouts.app')


@section('content')

<div class="row justify-content-center mt-5">
    <div class="card col-md-10 ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">کد سفارش</th>
                    <th scope="col">مبلغ</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تاریخ خرید</th>
                    <th scope="col">عملیات</th>
                </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)
                <tr>
                    <th scope="row"></th>
                    <td>}</td>

                    <td>پرداخت شده</td>
                    @else
                    <td>پرداخت نشده</td>
                   @endif
                   <td></td>
                    <td colspan=4 >

                        <a class="btn btn-primary btn-sm" href="">پرداخت</a>
                        @endif
                        <a class="btn btn-primary btn-sm" href="">دانلود فاکتور</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
