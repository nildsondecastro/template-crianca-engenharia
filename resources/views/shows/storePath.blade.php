<div class="form-group">
    <label>Modelo PDF</label>
    <input readonly type="file" class="form-control @error('path') is-invalid @enderror" name="path" value="{{old('path') ?? ($model->path ?? '')}}">
    @error('file')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>