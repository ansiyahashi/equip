<div class="modal fade banner_modal" tabindex="-1" id="banner_modal" role="dialog" aria-labelledby="title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="banner_form" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">{{ __('Add Banner') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">{{ __('Type') }}:</label>
                                <select class="selectpicker form-control show-tick" name="type">
                                    <option value="category">Category</option>
                                    <option value="offer">Offer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">{{ __('Banner Image') }}:</label>
                                <input type="file" class="form-control" id="image" name="file">
                                <input type="hidden" class="form-control" id="banner_id" name="banner_id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="saveBtn" class="btn btn-primary">{{ __('Save changes') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>
@section('page-js')
    <script>
        //Submit add model
        $("#banner_form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            console.log(formData);
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('banner.store') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response.code);
                    if (response.code == 200) {
                        swal_success();

                    }else if(response.code == 500)
                    {
                        swal_error('Please select an image');
                    }
                },
                error: function(response) {

                }

            });

        });
        // Delete Blog
        function del_banner(id) {
            var url = 'banner';
            remove(id, url);
        }
    </script>
@endsection
