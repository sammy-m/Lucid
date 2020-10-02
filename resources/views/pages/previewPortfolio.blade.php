@extends('layouts.clientside')

@section('content')

<h2>This is the preview of your portfolio</h2>

<div class="cta" style="width: 100%; display: flex; justify-content: space-around;">
    <div class="edit">
        <p>Need to change something?</p>

        <div class="edit-btn">
        <a href="/portfolio/edit/{{Auth::user()->sysId}}" class="btn btn-primary">Edit</a>
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
<iframe src="/portfolio/{{Auth::user()->sysId}}" frameborder="0" style="width: 100% !important; min-height: 700px; max-height: 800px; "></iframe>
</div>

<div class="preview-end" style="width: 100%; text-align: center;">
    <p style="font-size: 50pt; color: rgba(0,0,0,0.2); font-weight: 600;">End of preview</p>
</div>
<div class="flex actions" style="width: 40%; display: flex; justify-content: space-around; margin: auto;">
    <div class="save"><a href="/portfolio/subscribe" class="btn btn-primary">Save</a></div>
    <div class="edit"><a href="/portfolio/edit" class="btn btn-success">Edit</a></div>
</div>
    
@endsection