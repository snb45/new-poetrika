<style>

    div.card-body{
        padding:0px;
    }
    .custom-select{
        width:100%;
    }

    input {
        outline: 0!important;
        border-width: 0 0 2px!important;
        border-color: #d1d1cf!important;
    }
    input:focus {
        border-color: #d1d1cf!important;
        -webkit-box-shadow: none!important;
        box-shadow: none!important;
    }

    select{

        outline: 0!important;
        border-width: 0 0 2px!important;
        border-color: #d1d1cf!important;
    }

    select:focus{
        border-color: #d1d1cf!important;
        -webkit-box-shadow: none!important;
        box-shadow: none!important;
    }

</style>

<form action="{{route('send_inquire')}}" method="post" class="">
    @csrf
    <div class="row col-lg-12">
        <h4>Who will you be traveling with?</h4>
        <br><br>
        <input type="hidden" required  value="5" name="steps" class="form-control" />
        <input type="hidden" name="tempId" value="{{encrypt($temp->id)}}">

        <div class="col-lg-4">
            <label>Number Of Adults (13 Years +)</label>
            <select required class="browser-default custom-select mb-4" name="adults" id="select">
                <option value="" disabled="" selected="">Adults (13 Years +)</option>
                <option value="1">1</option>
                <option selected value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <div class="col-lg-4">
            <label>Number Of Child (4-13 Years)</label>
            <select class="browser-default custom-select mb-4" name="child" id="select">
                <option value="0" disabled="" selected="">Child (4-13 Years)</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <div class="col-lg-4">
            <label>Number Of Infant (0-4 Years)</label>
            <select class="browser-default custom-select mb-4" name="infant" id="select">
                <option value="0" disabled="" selected="">Infant (0-4 Years)</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>
    <p>
    @if($temp->steps > 1)
        <a href="{{route('back',encrypt($temp->id))}}" class="btn btn-secondary">Back</a>
    @endif
    <input type="submit" value="Next" class="btn btn-primary btn-sm" />
    </p>
</form>
