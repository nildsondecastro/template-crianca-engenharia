<div class="form-group">
    <label>Link Remoto</label>
    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{old('link') ?? ($model->link ?? '')}}">
    @error('link')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>