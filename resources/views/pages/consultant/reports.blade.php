@extends('layouts.consultantpages')

@section('content')
    <div class="content">
        <div class="side-nav">
            @include('inc.consultantSidenav')
        </div>
        <div class="main">
            <div class="jobs-analytics row" style="margin: 0 !important;">
                <div class="col-sm-12 col-md-4">
                    <div class="sq">
                        <div class="sq-cont">
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    Jobs I am handling
                </div>
                <div class="col-sm-12 col-md-4">
                    Jobs I have completed
                </div>
            </div>
        </div>
    </div>
@endsection