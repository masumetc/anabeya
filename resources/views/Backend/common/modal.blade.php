<script>
  function loadModal(url){
    var baseUrl = '<?php echo URL::to(''); ?>';
    //console.log(baseUrl);
    var mainUrl = $("#body-content").load(baseUrl + '/' + url);
    //console.log(mainUrl);
  }

  function loadModalEdit(url,id){
    var baseUrl = '<?php echo URL::to(''); ?>';
    //console.log(baseUrl);
    var mainUrl = $("#body-content").load(baseUrl + "/" + url + "/" + id);
    //console.log(mainUrl);
  }
</script>
<!-- sample modal content -->
<div id="modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 600px;">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      
      <!-- //Message from Ajax request// -->
      <div class="box-body box-modal-message" style="display: none;">
        <div class="alert alert-success alert-dismissible messageBodySuccess" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <span></span>
        </div>
        <div class="alert alert-warning alert-dismissible messageBodyError" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <span></span>
        </div>
      </div>
      <div class="modal-body" id="body-content">
        Loading <img src="{{url('public/assets/icons/loader.gif')}}" title="loading">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn waves-effect waves-light btn-rounded btn-light pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary pull-right btn-submit-action">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- //image modal -->


