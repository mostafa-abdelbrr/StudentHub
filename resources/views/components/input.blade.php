<div class="form-floating">
    <input type="@isset($input_type){{$input_type}}@else text @endisset"
           class="form-control @error(strval($name)) is-invalid @enderror" name="{{$name}}" placeholder=""
           @isset($value)
           @else
                   <?php $value = '' ?>
           @endisset
           @if(isset($input_type))
               @if($input_type=='password')
               @else
                   value="{{old(strval($name), $value)}}"
           @endif
           @else
               value="{{old(strval($name), $value)}}"
        @endif
    >
    <label for="floatingInput">{{$label}}</label>
    @error(strval($name))
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
