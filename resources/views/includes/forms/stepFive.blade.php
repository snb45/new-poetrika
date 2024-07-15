<form action="{{route('send_inquire')}}" method="post" class="">
    @csrf
    <div class="row col-lg-12">
        <h4>Finish-UP your personal details and be ready for adventure</h4>
        <br><br>
        <div class="col-lg-6">
            <input type="hidden" required  value="6" name="steps" class="form-control" />
            <input type="hidden" name="tempId" value="{{encrypt($temp->id)}}">
            <input type="text" disabled placeholder="Enter Your Full Name" name="name" value="{{$temp->name}}" size="40" class="form-control" />
        </div>

        <div class="col-lg-6">
            <input type="email" disabled name="" placeholder="Enter Your Email" value="{{$temp->email}}" size="40" class="form-control" />
        </div>

        <div class="col-lg-6 pt-3">
            <select id="country" name="country" class="form-control">
                <option value="">Select a country</option>
            </select>
        </div>

        <div class="col-lg-6 pt-3">
            <input type="tel" required name="phone" placeholder="Enter Your Phone" value="{{ $temp->phone }}" size="40" class="form-control" oninput="validatePhoneNumber(this)" />
        </div>

        <div class="col-lg-12 pt-3">
            <textarea rows="10" cols="93" name="message" placeholder="Any Extra or special message please write here">{{ $temp->message }}</textarea>
        </div>

    </div>
    <p>
    @if($temp->steps > 1)
        <a href="{{route('back',encrypt($temp->id))}}" class="btn btn-secondary">Back</a>
    @endif
    <input type="submit" value="Submit your Inquiry" class="btn btn-primary btn-sm" />
    </p>
</form>
