<div class="form-group">
    <label>Arquivo</label>
    <input readonly type="file" class="form-control @error('path_file') is-invalid @enderror" name="path_file" value="{{old('path_file') ?? ($model->path_file ?? '')}}">
    @error('path_file')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>