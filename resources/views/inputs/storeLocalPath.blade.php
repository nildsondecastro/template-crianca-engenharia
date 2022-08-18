<div class="form-group">
    <label>Link Local</label>
    <input type="text" class="form-control @error('local_path') is-invalid @enderror" name="local_path" value="{{old('local_path') ?? ($model->local_path ?? '')}}">
    @error('file')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>