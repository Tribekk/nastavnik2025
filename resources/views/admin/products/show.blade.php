@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Название компании</th><td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Название организации</th><td>{{ $product->slug }}</td>
        </tr>
        <tr>
            <th>Название проекта</th><td>{{ $product->content }}</td>
        </tr>
        <tr>
            <th>Город</th><td>{{ $product->title }}</td>
        </tr>
        </tbody>
    </table>
@endsection
