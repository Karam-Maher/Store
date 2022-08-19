<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" @class(['form-control', 'is-invalid' => $errors->has('name')])
        value="{{ old('name' , $category->name) }}">

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description"@class(['form-control', 'is-invalid' => $errors->has('description')])>
    {{ old('description', $category->description) }}</textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label>Status</label>
    <div class="">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="active" @checked(old('status', $category->status) == 'active')>
            <label class="form-check-label">
                Active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="inactive" @checked(old('status', $category->status) == 'inactive')>
            <label class="form-check-label">
                Inactive
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" @class(['form-control', 'is-invalid' => $errors->has('image')])>
    @if ($category->image)
        <img src=" {{ asset('storage/' . $category->image) }}" alt="" height="60px">
    @endif
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
</div>
