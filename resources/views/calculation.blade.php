@extends('app')
@push('after-styles')
    <style>
        fieldset {
            border: 5px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;

        }

    </style>
@endpush
@section('content')
    <div class="container-all">
        <fieldset>
            <legend>Calculation</legend>
            <h3>Order total MYR5.00 has included 6% GST, what is the actual amount of GST in MYR for this
                Order?
            </h3>
            <h4><i><b> Solutions:</b></i></h4>
            <div style="padding-left: 30px;">
                <h6>
                    <p>Here, We have to find the actual amount of GST and also we have given the following :</p>
                    sales price with GST (S.P.) = MYR 5 with 6% GST <br />
                    GST = 6% <br />
                    sp with GST = Rs. 5 with 6% GST<br />
                </h6>
                <h6>
                    <p>Now, lets calculate the true sales price and let SP be x. </p>
                    SP with GST = sp + GST amount <br />
                    MYR 5 = x + GST % of sp<br />
                    MYR 5 = x + 6/100 * x<br />
                    MYR 5 = x+0.06x<br />
                    MYR 5 = 1.06x<br />
                    x = 5 / 1.06<br />
                    x= 4.7<br />
                </h6>
    
                <h6>
                    <p>Now, lets calculate actual amount of GST. </p>
                    tax amount = tax % of sp <br />
                    = 6/100 * 4.7<br />
                    = MYR 0.283 <br />
                </h6>
    
                <h6>
                    <p>Therefore, actual amount of GST is <span style="font-weight: bold;">MYR 0.283.</span> </p>
                </h6>
            </div>
        </fieldset>
        <a href="/" class="btns" style="margin-top: 10px">
            👈🏻 Back
        </a>
    </div>
@endsection
