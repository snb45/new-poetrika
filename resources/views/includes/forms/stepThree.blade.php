<?php
    $packages = \App\Models\Destination::where([['package',1],['days',(int)$temp->duration]])->orderBy('days')->get();
?>

<form action="{{route('send_inquire')}}" method="post" class="">
    @csrf
    <div class="row col-lg-12">
        <span>
            <input type="hidden" name="tempId" value="{{encrypt($temp->id)}}">
            <input type="hidden" name="steps" value="4">
        </span>
        <hr><br>
        <h4>Choose your desire Package</h4>
        <p>Please click to preview a package or select the option to indicate your preference.</p>

        @if(count($packages))
            <div class="standard_wrapper">
                <div id="1567589134228149190" class="portfolio_filter_wrapper gallery classic three_cols" data-columns="3">
                    @foreach($packages as $package)
                        <div class="element grid classic3_cols animated1">
                            <div class="one_third gallery3 classic static filterable portfolio_type themeborder">
                                <a target="_blank" class="tour_image" href="{{route('viewPackage',$package->slug)}}">
                                    @if($package->getFirstMedia())
                                        <img style="height: 200px;width: 100%;object-fit: cover;" src="{{$package->getFirstMedia()->getUrl('thumb')}}" alt="{{ucwords($package->name)}}" />
                                    @else
                                        <img style="height: 200px;width: 100%;object-fit: cover;" src="{{url('public/noImage.jpeg')}}" alt="{{ucwords($package->name)}}" />
                                    @endif
                                    @if($package->type != null)
                                        <div class="tour_label">{{ucwords($package->type)}}</div>
                                    @endif
                                    <div class="tour_price ">{{$package->days}} days</div>
                                </a>
                                <div class="portfolio_info_wrapper">
                                    <a target="_blank" style="color: black;text-decoration: none" class="tour_link" href="{{route('viewPackage',$package->slug)}}">
                                        <h5 style="text-align: center">{{ucwords($package->name)}}</h5>
                                    </a>
                                    <br class="clear" />
                                    <div class="tour_attribute_wrapper" style="text-align: center">
                                        <input @if($package->id == $temp->package) checked @endif type="radio" class="checkbox-radio-block" name="package" value="{{$package->id}}"> <i>Select This Package</i>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

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
