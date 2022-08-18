<div class="form-group">
    <label>Link Tutorial</label>
    <input readonly type="text" class="form-control @error('link_tutorial') is-invalid @enderror" name="link_tutorial" value="{{old('link_tutorial')  ?? ($model->link_tutorial ?? null)}}">
    @error('link_tutorial')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>