@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa Danh mục</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên Danh mục</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Danh mục cha</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">-- Chọn danh mục cha --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="image">Hình ảnh (URL)</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ $category->image }}">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $category->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Hoạt động</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
