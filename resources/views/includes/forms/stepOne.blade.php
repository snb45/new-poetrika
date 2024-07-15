<form action="{{route('send_inquire')}}" method="post" class="">
    @csrf
    <div class="row col-lg-12">
        <h4>Let start Planning your adventure?</h4>
        <br><br>
        <div class="col-lg-6">
            <input type="hidden" required  value="2" name="steps" class="form-control" />
            <input type="hidden" name="tempId" value="{{encrypt($temp->id)}}">
            <input type="text" required placeholder="Enter Your Full Name" name="name" value="{{$temp->name}}" size="40" class="form-control" />
        </div>

        <div class="col-lg-6">
            <input type="email" required name="email" placeholder="Enter Your Email" value="{{$temp->email}}" size="40" class="form-control" />
        </div>
    </div>
    <p><br>
        <input type="submit" value="Next" class="wpcf7-form-control wpcf7-submit" />
    </p>
</form>
