@extends('layouts.clientside')

@section('content')

<h2>This is the preview of your portfolio</h2>

<div class="cta">
    <div class="edit">
        <p>Need to change something?</p>

        <div class="edit-btn">
            <a href="#" class="btn btn-primary">Edit</a>
        </div>

    </div>
    <div class="save">
        <p>All set?</p>
        <div class="save-btn">
            <a href="#" class="btn btn-success">Save</a>
        </div>
    </div>
</div>
<div class="prevw">
<iframe src="/portfolio/{{Auth::user()->sysId}}" frameborder="0" style="width= 100% !important; "></iframe>
</div>
    
@endsection