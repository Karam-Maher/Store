
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{$category->description}}</textarea>
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" @checked($category->status=='active')>
                <label class="form-check-label">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="inactive" @checked($category->status=='inactive')>
                <label class="form-check-label">
                    Inactive
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @if($category->image)
        <img src=" {{ asset('storage/' . $category->image)}}" alt="" height="60px">
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{$button_label ?? 'Save'}}</button>
    </div>
