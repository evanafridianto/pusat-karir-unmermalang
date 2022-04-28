 <!-- BASIC MODAL -->
 <div id="add_categoryModal" class="modal fade" data-backdrop="static">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content bd-0 tx-14">
             <div class="modal-header pd-y-20 pd-x-25">
                 <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title-form-category">Tambah Kategori</h6>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body pd-25">
                 <form id="category_form">
                     @csrf
                     <div class="col-sm-12">
                         <div class="form-group">
                             <label for="">Nama Kategori</label>
                             <input type="hidden" name="category_id">
                             <input type="text" name="category_name" class="form-control" autofocus
                                 placeholder="Masukkan nama kategori">
                             <small class="text-danger"></small>
                         </div><!-- form-group -->
                     </div>

                     <div class="col-sm-12" id="input-slug" style="display: none">
                         <div class="form-group">
                             <label for="">Slug</label>
                             <input type="text" name="category_slug" class="form-control" placeholder="Masukkan slug">
                             <small class="text-danger"></small>
                         </div><!-- form-group -->
                     </div>

                     @if (Request::route()->getName() === 'admin.article.create' || Request::route()->getName() === 'admin.article.edit')
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <label class="form-control-label">Kategori Induk</label>
                                 <select class="form-control" name="category_type">
                                     <option value="News">Berita</option>
                                     <option value="Events">Event</option>
                                 </select>
                                 <small class="text-danger"></small>
                             </div><!-- form-group -->
                         </div><!-- form-group -->
                     @elseif(Request::route()->getName() === 'admin.vacancy.create' || Request::route()->getName() === 'admin.vacancy.edit')
                         <input type="hidden" value="Major" name="category_type">
                     @elseif(Request::route()->getName() === 'admin.employer.create' || Request::route()->getName() === 'admin.employer.edit')
                         <input type="hidden" value="Business Field" name="category_type">
                     @else
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <label class="form-control-label">Kategori Induk</label>
                                 <select class="form-control" name="category_type">
                                     <option value="News">Berita</option>
                                     <option value="Events">Event</option>
                                     <option value="Major">Jurusan/Keahlian</option>
                                     <option value="Business Field">Bidang Usaha</option>
                                 </select>
                                 <small class="text-danger"></small>
                             </div><!-- form-group -->
                         </div><!-- form-group -->
                     @endif
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-custom tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                     onclick="category_store()" id="btn-spinner2"><i
                         class="fa fa-paper-plane mg-r-10"></i>Simpan</button>
                 <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                     data-dismiss="modal">Batal</button>
             </div>
         </div>
     </div><!-- modal-dialog -->
 </div><!-- modal -->
 <script src="{{ asset('app/category/form.js') }}"></script>
