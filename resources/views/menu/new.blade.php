@extends('layouts.mini',[
'activePage' => 'new-menu',
'titlePage' => __('Menu Baru'),
])
@section('topscripts')

@endsection

@section('content')
<h4 class="card-title">Textual inputs</h4>
<p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
    textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
<form method="POST">
    @csrf
<div class="form-group row">
    <label for="name" class="col-md-2 col-form-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" type="text" id="name" name="name" required>
        <div class="invalid-feedback">
            Please provide a menu name.
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="parent" class="col-md-2 col-form-label">Parent</label>
    <div class="col-md-10">
        <input class="form-control" type="text" id="parent_menu" name="parent_menu">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="type">
            <option value="">Select menu type..</option>
            <option>menu-title</option>
            <option>menu-item</option>
            <option>menu-child</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="icon" class="col-md-2 col-form-label">Icon</label>
    <div class="col-md-10">
        <input class="form-control" type="text" id="icon" name="icon">
    </div>
</div>
<div class="form-group row">
    <label for="link" class="col-md-2 col-form-label">Link</label>
    <div class="col-md-10">
        <input class="form-control" type="text" id="link" name="link">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">BootClass</label>
    <div class="col-md-10">
        <select class="form-control" id="bootclass" name="bootclass">
            <option value="">Select bootclass level...</option>
            <option value="has-arrow waves-effect">With Down Arrow</option>
            <option value="waves-effect">Without Down Arrow</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="menu_order" class="col-md-2 col-form-label">Menu Order</label>
    <div class="col-md-10">
        @php
        use App\Menu;
        @endphp

        <input class="form-control" type="number" id="menu_order" name="menu_order" value="{{Menu::max('menu_order') +1}}" required>
        <div class="invalid-feedback">
            Please provide a menu order.
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Access</label>
    <div class="col-md-10">
        <select class="form-control" id="access" name="access">
            <option value="">Select access level...</option>
            <option>All</option>
            <option>Admin</option>
            <option>Manager</option>
            <option>Supervisor</option>
            <option>Staff</option>
            <option>User</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <input class="form-control btn btn-primary btn-block" type="submit" value="Add Menu" id="btn_menu" name="btn_menu">
    </div>
</div>
</form>

@endsection

@section('bottomscripts')
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection
