 <div class="modal fade" id="emdadUploader" tabindex="-1" role="dialog" aria-labelledby="emdadUploaderLabel"
     aria-hidden="true" style="left: -130px !important;">
     <div class="modal-dialog" role="document">
         <div class="modal-content" style="width:800px !important;">
            <div class="file_holder"></div>
             <div class="modal-header">
                 <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active show" id="select_file" data-toggle="pill" href="#pills-home"
                             role="tab" aria-controls="pills-home" aria-selected="true">Select File</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                             role="tab" aria-controls="pills-profile" aria-selected="false">Upload New</a>
                     </li>

                 </ul>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="tab-content ul-tab__content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                         <div class="col-md-12 row" id="emd-upload-files"></div>

                     </div>
                     <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                         <form  action="{{ route('upload_file') }}" method="POST" class="dropzone dropzone-area dz-clickable" id="file-remove-thumbnail-upload">
                             <div class="dz-default dz-message" id="drag-drop-area"><span>Drop files here to upload</span></div>
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                         </form>
                     </div>

                 </div>
             </div>
             <div class="modal-footer">
                <input type="hidden" class="ref_id">
                <input type="hidden" class="upload_url">
                 <button type="button" class="btn btn-secondary"  id="prev_img">Prev</button>
                 <button type="button" class="btn btn-primary"   id="next_img">Next</button>
                 
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" id="add_files" class="btn btn-primary">Save changes</button>
             </div>
         </div>
     </div>
 </div>

 
