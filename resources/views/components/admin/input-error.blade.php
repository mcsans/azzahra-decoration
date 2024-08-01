@props(['for' => null, 'message' => ''])

@error($for)
    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
@enderror
