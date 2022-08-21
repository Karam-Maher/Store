<div class="form-group">
    <x-form.input lable="Category Name" class="form-control-lg" role="input" name="name" :value="$category->name"
        type="type" />
</div>

<div class="form-group">

    <x-form.textarea name="name" lable="Description" :value="$category->description" />
</div>

<div class="form-group">
    <label>Status</label>
    <div>
        <x-form.radio name="status" :checked="$category->status" :options="['active'=>'Active','inactive' =>'inactive']"/>
    </div>
</div>

<div class="form-group"
    <x-form.lable id="image">Image</x-form.lable>
    <x-form.input label="Image" type="file" name="image" accept="image/*"/>
    @if ($category->image)
        <img src=" {{ asset('storage/' . $category->image) }}" alt="" height="60px">
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
</div>
