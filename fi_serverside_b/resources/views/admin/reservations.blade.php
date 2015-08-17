@extends('layouts.page')
@section('content')
    <hr class="hr-extended">

    <!-- for logged in user only - begin -->
    <div id="reservation_management">
        <h1>Reservation management</h1>
        <form action="#">
            <fieldset>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 30%">
                            <col style="width: 10%">
                            <col style="width: 30%">
                            <col style="width: 10%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th rowspan="2">Day</th>
                            <th rowspan="2">Seating</th>
                            <th rowspan="2">Booking No.</th>
                            <th rowspan="2">Guests</th>
                            <th rowspan="2">Status</th>
                            <th colspan="4">Action</th>
                        </tr>
                        <tr>
                            <th>Confirm</th>
                            <th>Decline</th>
                            <th>Waitlist</th>
                            <th>Reschedule</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <td>C{{ $request->competitionDay->id }}</td>
                            <td>{{ $request->seating->module->name }} {{ $request->seating->start_time }} - {{ $request->seating->end_time }}</td>
                            <td>{{ $request->request->id }}</td>
                            <td>{{ $request->name }} {{ $request->country }}</td>
                            <td>
                                @if ($request->status == 1)
                                    Confirmed
                                @elseif ($request->status == 2)
                                    Requested
                                @elseif ($request->status == 3)
                                    Waitlisted
                                @elseif ($request->status == 4)
                                    Declined
                                @endif
                            </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <button class="btn btn-default" type="submit" name="create-guest-list">Create guest list</button>
            <button class="btn btn-default" type="submit" name="send-emails">Send emails</button>
            <button class="btn btn-primary" type="submit" name="save-confirmations">Save changes</button>
        </form>
    </div>
    <!-- for logged in user only - end -->
@endsection