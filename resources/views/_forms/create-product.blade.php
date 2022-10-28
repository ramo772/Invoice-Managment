<x-input label="Product Title" class='form-control form-control-xlg' name="name" />
<x-input label="Product Price" class='form-control form-control-xlg' name="price" />
<x-input  class='form-control form-control-xlg' name="user_id" value="{{ Auth::user()->id }}"
    hidden />
