@extends('layouts.default')

@section('content')
    <p>ユーザーID：{{ $user->getId() }}</p>
    <p>ユーザー名：{{ $user->getName() }}</p>
@endsection
