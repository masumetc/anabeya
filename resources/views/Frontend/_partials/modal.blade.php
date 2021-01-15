<script>
  function loadModal(url){
    var baseUrl='<? echo URL::to(''); ?>';
    $(".modal-body").load(baseUrl+"/"+url);
  }

	function loadModalEdit(route, id, action){
		var baseUrl='<? echo URL::to(''); ?>';
		$("#body-content").load(baseUrl+"/"+ route +'/'+ id +'/'+ action);
	}
</script>
<!-- Normal Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
