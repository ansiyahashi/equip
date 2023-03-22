<div class="modal fade category_modal" tabindex="-1" id="category_modal" role="dialog" aria-labelledby="title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form  id="category_form" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">{{ __('Add Category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">{{ __('Name') }}:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">{{ __('Name in Arabic') }}:</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar">
                            </div>
                        </div>

                        <div class="custom-separator"></div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputtext14" class="ul-form__label">{{ __('Description') }}:</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail15"
                                    class="ul-form__label">{{ __('Description in Arabic') }}:</label>
                                <div class="input-right-icon">
                                    <input type="text" class="form-control" id="description_ar" name="description_ar">
                                    <input type="hidden" class="form-control" id="cat_id" name="cat_id" value="">
                                </div>
                            </div>
                        </div>

                        <div class="custom-separator"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" id="saveBtn" class="btn btn-primary">{{ __('Save changes') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>
@section('page-js')
<script>
  
     //Submit add model
     $("#category_form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            console.log(formData);
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('category.store') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response.code);
                    if (response.code == 200) {
                        swal_success();
                        
                    }
                },
                error: function(response) {

                }

            });

        });
          // Delete Blog
          function del_cat(id) {
            var url = 'category';
            remove(id, url);
        }

</script>
@endsection
