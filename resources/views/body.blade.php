@extends('baseview')
@section('body')

<body>
    @include('./components/non-breeze/header')
    @yield('content')
    @include('./components/non-breeze/footer')
</body>
    
@endsection