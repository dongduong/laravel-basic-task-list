<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', $metaTitle)</title>
    <meta name="description" content="@yield('meta_description', $metaDescription )"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="{{ asset('vendor/avored-default/css/app.css') }}" rel="stylesheet">  
    @stack('styles')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(), ]); ?>
    </script>
</head>

<body>
    <script src="{{ asset('/vendor/avored-default/js/app.js') }}"></script>

    @include("layouts.partials.top")
    @include("layouts.partials.header")
    @include("layouts.partials.navigation")

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session()->has('errorNotificationText'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <strong>Error!</strong> {{ session()->get('errorNotificationText') }}
                </div>
                @endif

                @if(session()->has('notificationText'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <strong>Success!</strong> {{ session()->get('notificationText') }}
                </div>
                @endif
            </div>
        </div> 
        @yield('content')
    </div>

    @include('layouts.partials.footer')
    @stack('scripts')    
</body>
</html>
