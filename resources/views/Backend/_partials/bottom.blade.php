
<!-- Will include JS files when needed only -->
    @yield('extra-js')
<!-- Will include JS files when needed only -->
<!-- This is data table -->
{{Html::script('public/assets/node_modules/datatables/jquery.dataTables.min.js')}}
{{Html::script('public/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}
{{Html::script('public/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}   
<!-- Bootstrap tether Core JavaScript -->
{{Html::script('public/assets/node_modules/popper/popper.min.js')}}
{{Html::script('public/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}
<!-- slimscrollbar scrollbar JavaScript -->
{{Html::script('public/dist/js/perfect-scrollbar.jquery.min.js')}}
<!--Wave Effects -->
{{Html::script('public/dist/js/waves.js')}}
<!--Menu sidebar -->
{{Html::script('public/dist/js/sidebarmenu.js')}}
<!--stickey kit -->
{{Html::script('public/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}
<!--Custom JavaScript -->
{{Html::script('public/dist/js/custom.min.js')}}
{{Html::script('public/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}
<!-- ============================================================== -->
<!-- Data Table plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
{{Html::script('public/assets/node_modules/raphael/raphael-min.js')}}
{{Html::script('public/assets/node_modules/morrisjs/morris.min.js')}}
<!--Custom JavaScript -->
{{Html::script('public/dist/js/ecom-dashboard.js')}}
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
{{Html::script('public/assets/node_modules/switchery/dist/switchery.min.js')}}
{{Html::script('public/assets/node_modules/select2/dist/js/select2.full.min.js')}}
{{Html::script('public/assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}
{{Html::script('public/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}
{{Html::script('public/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}
{{Html::script('public/assets/node_modules/dff/dff.js')}}
{{Html::script('public/assets/node_modules/multiselect/js/jquery.multi-select.js')}}
{{Html::script('public/dist/js/pages/jquery.PrintArea.js')}}
{{Html::script('public/assets/node_modules/peity/jquery.peity.min.js')}}
{{Html::script('public/assets/node_modules/peity/jquery.peity.init.js')}}
{{Html::script('public/assets/node_modules/dropify/dist/js/dropify.min.js')}}
<!-- From Wizerd Page -->
{{Html::script('public/assets/node_modules/moment/moment.js')}}
<!-- This Page JS -->
{{Html::script('public/assets/node_modules/wizard/jquery.steps.min.js')}}
{{Html::script('public/assets/node_modules/wizard/jquery.validate.min.js')}}
<!-- {{Html::script('public/assets/node_modules/sweetalert/sweetalert.min.js')}} -->
<!-- Summernote JS -->
{{Html::script('public/assets/node_modules/summernote/dist/summernote-bs4.min.js')}}
<!-- Tinymce Editor Plugin JavaScript -->
{{Html::script('public/assets/node_modules/tinymce/tinymce.min.js')}}
<!-- ============================================================== -->
<!-- Chartist page plugins -->
<!-- ============================================================== -->
{{Html::script('public/assets/node_modules/gauge/gauge.min.js')}}
{{Html::script('public/dist/js/pages/widget-data.js')}}
<!-- Sweet-Alert  -->
<!-- {{Html::script('public/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}} -->
<!-- {{Html::script('public/assets/node_modules/sweetalert2/sweet-alert.init.js')}} -->
<!-- Notification Script-->
{{Html::script('public/assets/node_modules/toast-master/js/jquery.toast.js')}}
{{Html::script('public/dist/js/pages/toastr.js')}}
<!-- Horizontal-timeline JavaScript -->
{{Html::script('public/assets/node_modules/horizontal-timeline/js/horizontal-timeline.js')}}
<!-- bt-switch -->
{{Html::script('public/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js')}}
<script type="text/javascript">
$(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
var radioswitch = function() {
var bt = function() {
$(".radio-switch").on("switch-change", function() {
$(".radio-switch").bootstrapSwitch("toggleRadioState")
}), $(".radio-switch").on("switch-change", function() {
$(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
}), $(".radio-switch").on("switch-change", function() {
$(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
})
};
return {
init: function() {
bt()
}
}
}();
$(document).ready(function() {
radioswitch.init()
});
</script>
<!-- Script for Summer Note -->
<script>
$(function() {
$('.summernote').summernote({
height: 350, // set editor height
minHeight: null, // set minimum height of editor
maxHeight: null, // set maximum height of editor
focus: false // set focus to editable area after initializing summernote
});
$('.inline-editor').summernote({
airMode: true
});
});
window.edit = function() {
$(".click2edit").summernote()
},
window.save = function() {
$(".click2edit").summernote('destroy');
}
</script>
<!-- Script for From Upload-->
<script>
$(document).ready(function() {
// Basic
$('.dropify').dropify();
// Translated
$('.dropify-fr').dropify({
messages: {
default: 'Glissez-déposez un fichier ici ou cliquez',
replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
remove: 'Supprimer',
error: 'Désolé, le fichier trop volumineux'
}
});
// Used events
var drEvent = $('#input-file-events').dropify();
drEvent.on('dropify.beforeClear', function(event, element) {
return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
});
drEvent.on('dropify.afterClear', function(event, element) {
alert('File deleted');
});
drEvent.on('dropify.errors', function(event, element) {
console.log('Has Errors');
});
var drDestroy = $('#input-file-to-destroy').dropify();
drDestroy = drDestroy.data('dropify')
$('#toggleDropify').on('click', function(e) {
e.preventDefault();
if (drDestroy.isDropified()) {
drDestroy.destroy();
} else {
drDestroy.init();
}
})
});
</script>
<!-- Script for Data Table -->
<!-- Script for Select2 start -->
<script>
	$(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
</script>
<!-- Script for Select2 End  -->

<script>
var table = $('#example').DataTable({
"columnDefs": [{
"visible": false,
"targets": 2
}],
"order": [
[2, 'asc']
],
"displayLength": 25,
"drawCallback": function (settings) {
var api = this.api();
var rows = api.rows({
page: 'current'
}).nodes();
var last = null;
api.column(2, {
page: 'current'
}).data().each(function (group, i) {
if (last !== group) {
$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
last = group;
}
});
}
});
// Order by the grouping
$('#example tbody').on('click', 'tr.group', function () {
var currentOrder = table.order()[0];
if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
table.order([2, 'desc']).draw();
} else {
table.order([2, 'asc']).draw();
}
});
// responsive table
$('#config-table').DataTable({
responsive: true
});
$('#example23').DataTable({
dom: 'Bfrtip',
responsive: true,
buttons: [
'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary btn-sm');
});
</script>
<!-- script for product order page-->
<script>
$(document).ready(function() {
$('#myTable').DataTable({
    
responsive: true 
});
$(document).ready(function() {
var table = $('#example').DataTable({
"columnDefs": [{
"visible": false,
"targets": 2
}],
"order": [
[2, 'asc']
],
"displayLength": 25,
"drawCallback": function(settings) {
var api = this.api();
var rows = api.rows({
page: 'current'
}).nodes();
var last = null;
api.column(2, {
page: 'current'
}).data().each(function(group, i) {
if (last !== group) {
$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
last = group;
}
});
}
});


// Order by the grouping
$('#example tbody').on('click', 'tr.group', function() {
var currentOrder = table.order()[0];
if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
table.order([2, 'desc']).draw();
} else {
table.order([2, 'asc']).draw();
}
});
});
});
</script>
<!-- script for Invoice page-->
<script>
$(document).ready(function() {
$("#print").click(function() {
var mode = 'iframe'; //popup
var close = mode == "popup";
var options = {
mode: mode,
popClose: close
};
$("div.printableArea").printArea(options);
});
});
</script>
<!-- Boot Strap Form page Script -->
<script>
$(function () {
// Switchery
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
$('.js-switch').each(function () {
new Switchery($(this)[0], $(this).data());
});
// For select 2
$(".select2").select2();
$('.selectpicker').selectpicker();
//Bootstrap-TouchSpin
$(".vertical-spin").TouchSpin({
verticalbuttons: true
});
var vspinTrue = $(".vertical-spin").TouchSpin({
verticalbuttons: true
});
if (vspinTrue) {
$('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
}
$("input[name='tch1']").TouchSpin({
min: 0,
max: 100,
step: 0.1,
decimals: 2,
boostat: 5,
maxboostedstep: 10,
postfix: '%'
});
$("input[name='tch2']").TouchSpin({
min: -1000000000,
max: 1000000000,
stepinterval: 50,
maxboostedstep: 10000000,
prefix: '$'
});
$("input[name='tch3']").TouchSpin();
$("input[name='tch3_22']").TouchSpin({
initval: 40
});
$("input[name='tch5']").TouchSpin({
prefix: "pre",
postfix: "post"
});
// For multiselect
$('#pre-selected-options').multiSelect();
$('#optgroup').multiSelect({
selectableOptgroup: true
});
$('#public-methods').multiSelect();
$('#select-all').click(function () {
$('#public-methods').multiSelect('select_all');
return false;
});
$('#deselect-all').click(function () {
$('#public-methods').multiSelect('deselect_all');
return false;
});
$('#refresh').on('click', function () {
$('#public-methods').multiSelect('refresh');
return false;
});
$('#add-option').on('click', function () {
$('#public-methods').multiSelect('addOption', {
value: 42,
text: 'test 42',
index: 0
});
return false;
});
$(".ajax").select2({
ajax: {
url: "https://api.github.com/search/repositories",
dataType: 'json',
delay: 250,
data: function (params) {
return {
q: params.term, // search term
page: params.page
};
},
processResults: function (data, params) {
// parse the results into the format expected by Select2
// since we are using custom formatting functions we do not need to
// alter the remote JSON data, except to indicate that infinite
// scrolling can be used
params.page = params.page || 1;
return {
results: data.items,
pagination: {
more: (params.page * 30) < data.total_count
}
};
},
cache: true
},
escapeMarkup: function (markup) {
return markup;
}, // let our custom formatter work
minimumInputLength: 1,
//templateResult: formatRepo, // omitted for brevity, see the source of this page
//templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
});
});
</script>
<!-- From Wizerd Script-->
<script>
// //Custom design form example
// $(".tab-wizard").steps({
// headerTag: "h6",
// bodyTag: "section",
// transitionEffect: "fade",
// titleTemplate: '<span class="step">#index#</span> #title#',
// labels: {
// finish: "Submit"
// },
// // onFinished: function (event, currentIndex) {
// // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
// // }
// });

// $(".step").on('click',function(){
// $("#myForm").submit();
// });


var form = $(".validation-wizard").show();
$(".validation-wizard").steps({
headerTag: "h6",
bodyTag: "section",
transitionEffect: "fade",
titleTemplate: '<span class="step">#index#</span> #title#',
labels: {
finish: "Submit"
},
onStepChanging: function (event, currentIndex, newIndex) {
return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
},
onFinishing: function (event, currentIndex) {
return form.validate().settings.ignore = ":disabled", form.valid()
},
onFinished: function (event, currentIndex) {
// swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
$("#myForm").submit();
 }
}), $(".validation-wizard").validate({
ignore: "input[type=hidden]",
errorClass: "text-danger",
successClass: "text-success",
highlight: function (element, errorClass) {
$(element).removeClass(errorClass)
},
unhighlight: function (element, errorClass) {
$(element).removeClass(errorClass)
},
errorPlacement: function (error, element) {
error.insertAfter(element)
},
rules: {
email: {
email: !0
}
}
})
</script>
<!-- Tinymac Editor Script-->
<script>
$(document).ready(function() {
if ($("#mymce").length > 0) {
tinymce.init({
selector: "textarea#mymce",
theme: "modern",
height: 300,
plugins: [
"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
"save table contextmenu directionality emoticons template paste textcolor"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
});
}
});
</script>
@include('sweetalert::alert')

</body>
</html>