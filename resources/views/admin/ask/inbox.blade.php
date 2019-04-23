@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>
            <div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">
                <h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-envelope-alt"></i>
                    پیام های دریافتی
                </h3>
                <a class="btn btn-success btn-xs" href="{{route('ask.create')}}"
                   style="height: 26px;margin: 23px 16px 0 0;">
                    <i class="icon-mail-forward"></i> ارسال پیام
                </a>
                <form style="margin: 17px 677px 0 0">
                    <input class="form-control" style="width: 188px;display: unset" type="text" name="from_email"
                           placeholder="جستجو بر اساس ایمیل فرستنده">
                    <input type="submit" value="جستجو" class="btn btn-success btn-sm">
                </form>
            </div>
        </header>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-list"></i> کد</th>
                <th><i class="icon-tag"></i> فرستنده</th>
                <th><i class="icon-bookmark"></i> موضوع</th>
                <th><i class="icon-calendar"></i> تاریخ</th>
                <th><i class="icon-comment-alt"></i> جزئیات تیکت</th>
                <th><i class="icon-trash"></i> حذف</th>

            </tr>
            </thead>
            <tbody>
            @foreach($asks as $ask)
                <tr>
                    <td style="background-color: <?php if ($ask->status != 'نخوانده') echo '#d0ffc2a8'; else echo '#ffdaa5'; ?>">{{$ask->id}}</td>
                    <?php $from = Illuminate\Foundation\Auth\User::where('id', $ask->from)->first(); ?>
                    <td>{{$from->email}}</td>
                    <td>{{$ask->subject}}</td>
                    <td>{{ Verta::instance($ask->created_at)->format('Y/n/j') }}</td>
                    <td>
                        <a href="{{route('ask.reply',['id'=>$ask->id])}}" class="btn btn-info btn-xs"> جزئیات تیکت </a>
                    </td>
                    <td>
                        <a href="{{route('ask.destroy',['ask'=>$ask->id])}}" class="btn btn-danger btn-xs"> حذف</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($x == 0)
            <div class="alert alert-danger" style="margin-top: 10px;">
                موردی یافت نشد
            </div>
        @endif

    </section>
    <div class="text-center">
        {{$asks->links()}}
    </div>
@endsection