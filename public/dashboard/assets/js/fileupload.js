
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

const dropzones = [];
Dropzone.autoDiscover = false;
var submitButton = document.querySelector("#save");
var form_url = $('#propertyForm').attr('action');
    
    // Disable AutoDiscover
    $('.dropzone').each(function(i, el){
      const name = $(el).attr('id')
      console.log(name);
      var myDropzone = new Dropzone(el, {
        url: form_url,
        method: "POST",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 20,
        maxFiles: 20,
        addRemoveLinks: true,
        maxFilesize: 5, // 2MB
        paramName: name,
        dictDefaultMessage: "Drop your files here!",
      });
      
      dropzones.push(myDropzone)
    });

    

    submitButton.addEventListener("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      let form = new FormData($('#propertyForm')[0]);
      dropzones.forEach(dropzone => {
        let  { paramName }  = dropzone.options
        dropzone.files.forEach((file, i) => {
          form.append(paramName + '[' + i + ']', file)
        });
      });
      $(document).ajaxStart(function(){
        window.scrollTo({ top: 0, behavior: 'smooth' });
        $(".success_loading").css("display", "block");
        $('#save').css('display','none');
      });
      $(document).ajaxComplete(function(){
        $('#save').css('display','block');
        $(".success_loading").css("display", "none");
      });
      $.ajax({
        url:form_url,
        method: 'POST',
        data: form,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.code == 200) {
            $(".erros_div").css("display", "none");
            window.location.replace(response.url);
          }else{
            $.each(response.errors,function(index,value){
              window.scrollTo({ top: 0, behavior: 'smooth' });
              $(".erros_div").css("display", "block");
              $(".erros_div").text(value);  
            })
          }
        }
      });
  });