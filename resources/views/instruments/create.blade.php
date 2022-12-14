@extends('layouts.app') @section('content') @include('errors')
<div class="container">
    <form action="{{ route('instruments.store') }}" method="POST"> @csrf
        <input type="text" name="model" placeholder="Model">
        <input type="text" name="brand" placeholder="Brand">
        <input type="number" name="quantity" placeholder="Quantity">
        <select name="category_id">
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category->id ?>">
                    <?php echo $category->name ?>
                </option>
            <?php } ?>
        </select>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection
