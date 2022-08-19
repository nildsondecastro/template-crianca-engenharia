<div class="form-group">
    <label>Imagem</label>
    <input readonly type="file" class="form-control @error('path_img') is-invalid @enderror" name="path_img" value="{{old('path_img') ?? ($model->path_img ?? '')}}">
    @error('path_img')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>