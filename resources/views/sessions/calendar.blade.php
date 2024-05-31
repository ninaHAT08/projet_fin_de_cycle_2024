@section('content')
<div class="container">
    <h1>Calendrier des Sessions</h1>
    <div id="calendar"></div>
</div>
@endsection

@section('scripts')
@vite(['resources/js/app.js', 'resources/js/calendar.js'])
@endsection

