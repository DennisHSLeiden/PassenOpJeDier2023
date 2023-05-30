@extends('baseview')
@section('body')

<body>
    @include('./components/non-breeze/header')
    @include('./components/non-breeze/footer')
    @yield('content')
</body>
    
@endsection