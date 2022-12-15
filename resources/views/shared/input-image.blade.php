
<script>  
    function readURL(input) {
    if (input.files && input.files[0]) {
    
       var reader = new FileReader();
    
       reader.onload = function(e) {
       $('.image-upload-wrap').hide();
    
       $('.file-upload-image').attr('src', e.target.result);
       $('.file-upload-content').show();
    
       $('.image-title').html(input.files[0].name);
       };
    
       reader.readAsDataURL(input.files[0]);
    
    } else {
       removeUpload();
    }
    }
    
    function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
           $('.image-upload-wrap').addClass('image-dropping');
       });
       $('.image-upload-wrap').bind('dragleave', function () {
           $('.image-upload-wrap').removeClass('image-dropping');
    });
    </script>
    
    <style>
    .file-upload-content {
    display: none;
    text-align: center;
    }
    
    .file-upload-input {
    position: absolute;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    outline: none;
    opacity: 0;
    cursor: pointer;
    }
    
    .image-upload-wrap {
    margin-top: 10px;
    outline: 2px solid #eee;
    position: relative;
    }
    
    .image-title-wrap {
    padding: 0;
    color: #222;
    }
    
    .drag-text {
    text-align: center;
    background-color: #fafbfe;
    }
    
    .drag-text h3 {
    font-weight: 400;
    color: #6c757d;
    padding: 110px 20px;
    font-size: 16px;
    }
    
    .file-upload-image {
    max-height: 100%;
    max-width: 100%;
    margin: auto;
    /* padding: 20px; */
    }
    
    .remove-image {
    width: 100%;
    margin: 0;
    color: #222;
    background: #cd4535;
    border: none;
    padding: 0;
    border-radius: 4px;
    border-bottom: 4px solid #b02818;
    transition: all .2s ease;
    outline: none;
    font-weight: 400;
    }
    
    .remove-image:hover {
    background: #c13b2a;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
    }
    
    .remove-image:active {
    border: 0;
    transition: all .2s ease;
    }
    </style>