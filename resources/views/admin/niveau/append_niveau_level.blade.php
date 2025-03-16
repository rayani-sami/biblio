<div class="row mb-3">
    <label for="parent_id">select Niveau level</label>
     <select name="parent_id" id="parent_id" class="form-control" style="color:#008000;">
    <option value="0"
    @if(isset($niveau ['parent_id'] ) && $niveau ['parent_id']==0)
     selected="" @endif> Main niveau</option>
    @if(!empty($getNiveaux))
    @foreach($getNiveaux as $parentniveau)
    <option value="{{ $parentniveau ['id'] }}"  @if(isset($niveau ['parent_id'] ) &&
     $niveau ['parent_id']== $parentniveau ['id']) selected="" @endif>{{ $parentniveau ['niveau_name'] }}</option>
    @if(!empty($parentniveau ['subNiveau']))


            @foreach($parentniveau['subNiveau'] as $subniveau)
      <option value="{{ $subniveau ['id'] }}"  @if(isset($subniveau ['parent_id'] ) && $subniveau ['parent_id']== $subniveau ['id'] ) selected="" @endif>&nbsp;&raquo;&nbsp;{{ $subniveau ['niveau_name'] }}</option>

            @endforeach

              @endif
           @endforeach
         @endif
     </select>
</div>
