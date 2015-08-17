@extends('layouts.page')
@section('content')
    <!-- for guest only - begin -->
    <div id="dining_experience_descriptions">
        <div class="">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Guests in Restaurant Service</h1>
                    <p class="clearfix">Become part of the competition: be a guest in Restaurant Service competition by requesting a seat and enjoy one of the different dining experiences!</p>
                </div>
                <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-2">
                    <h1><img src="{{ asset('img/6215177259.jpg') }}" alt="cook in restaurant service" class="img-thumbnail img-responsive"></h1>
                </div>
            </div>
            <h3>Dining experience desriptions</h3>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%">
                    <col style="width: 25%">
                    <col style="width: 25%">
                    <col style="width: 25%">
                </colgroup>
                <thead>
                <tr>
                @foreach(array_column($modules, 'name') as $name)
                    <th>{{ $name }}</th>
                @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach(array_column($modules, 'description') as $description)
                        <td>{{ $description }}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach(array_column($modules, 'seating_options') as $seating_options)
                        <td>
                            Seatings of:
                            @foreach($seating_options as $seating_option)
                                {{ $seating_option }}
                                @if (end($seating_options) != $seating_option)
                                    and
                                @endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach(array_column($modules, 'seatings') as $seatings)
                        <td>
                            @foreach($seatings as $key => $seating)
                               Seating {{ $key + 1 }}: {{ $seating['start_time'] }} - {{ $seating['end_time'] }} <br>
                            @endforeach
                        </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            <form action="#">
                <a class="btn btn-primary" href="{{ url('reservation/information') }}" >Start booking</a>
            </form>
        </div>
    </div>
@endsection