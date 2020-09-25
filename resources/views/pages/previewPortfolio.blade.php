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
<iframe src="/portfolio/{{Auth::user()->sysId}}" frameborder="0" style="width: 100% !important; min-height: 700px; max-height: 800px; "></iframe>
</div>

<div class="preview-end">
    <p>End of preview</p>
</div>
<div class="flex actions">
    <div class="save"><a href="/portfolio/subscribe" class="btn btn-primary">Save</a></div>
    <div class="edit"><a href="/portfolio/edit" class="btn btn-success">Edit</a></div>
</div>
    
@endsection