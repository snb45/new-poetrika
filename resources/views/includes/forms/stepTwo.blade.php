<?php
    $durations = \App\Models\Destination::select('days')->where('package',1)->groupBy('days')->get();
?>

<form action="{{route('send_inquire')}}" method="post" class="">
    @csrf
    <div class="row col-lg-12">
        <span>
            <input type="hidden" name="tempId" value="{{encrypt($temp->id)}}">
            <input type="hidden" name="steps" value="3">
        </span>
        <hr><br>
        <h5>When do you want to start your adventure ?</h5>
        <div class="col-lg-12">
            <input type="date" name="travelDate" required value="{{$temp->travelDate}}" size="40" class="form-control" />
        </div>
        <h5 style="padding-top: 50px">how long do you want to travel ?</h5>
        <div class="col-lg-12">
            <select class="form-control" name="duration">
                <option value="">Select Duration</option>
                @foreach($durations as $duration)
                    <option @if($temp->duration == $duration->days) selected @endif value="{{$duration->days}}">{{$duration->days}} Days & {{$duration->days-1}} Nights</option>
                @endforeach
            </select>
        </div>
    </div>
    <p>
        <hr>
        @if($temp->steps > 1)
            <a href="{{route('back',encrypt($temp->id))}}" class="btn btn-secondary">Back</a>
        @endif
        <input type="submit" value="Next" class="btn btn-primary btn-sm" />
    </p>
    <div class="wpcf7-response-output wpcf7-display-none"></div>
</form>
