@extends('layouts.app')

@section('content')
    <div class="container-fluid">


        {{--<conntentss></conntentss>--}}
        <conntentss :data="{{$SECTIONS}}"></conntentss>



    </div>
@endsection
