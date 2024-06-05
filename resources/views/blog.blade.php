@extends('layout')
@section('title', 'บทความทั้งหมด')
@section('content')
    <h2 class="text-center py-2">บทความทั้งหมด</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ชื่อบทความ</th>
                <th scope="col">เนื้อหา</th>
                <th scope="col">สถานะ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['content'] }}</td>
                    <td>
                        @if ($item['status'] == true)
                            <a href="#" class="btn btn-success">เผยแพร่</a>
                        @else
                        <a href="#" class="btn btn-warning">ฉบับร่าง</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
