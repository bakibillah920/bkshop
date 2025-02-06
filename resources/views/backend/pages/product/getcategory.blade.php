
<select class="form-control" name="category_id" id="category_id">
   <option value="0" >--Select Category--</option>
    @foreach ($categoryList as $catId=>$catname)
    <option value="{{ $catId }}" >{{$catname}}</option>
    @endforeach
</select>
                                       