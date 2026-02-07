document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');
    
    if (toggle) {
        toggle.addEventListener('click', () => {
            menu?.classList.toggle('hidden');
            iconOpen?.classList.toggle('hidden');
            iconClose?.classList.toggle('hidden');
        });
    }

    // Image preview untuk addArticle dan editArticle
    const imageInput = document.getElementById('cover-image-input');
    if (imageInput) {
        imageInput.addEventListener('change', function() {
            previewImage(this);
        });
    }
});

function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const removeBtn = document.getElementById('remove-image');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
            removeBtn.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const input = document.getElementById('cover-image-input');
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const removeBtn = document.getElementById('remove-image');
    
    input.value = '';
    preview.src = '#';
    preview.classList.add('hidden');
    placeholder.classList.remove('hidden');
    removeBtn.classList.add('hidden');
}

// tinymce.init({
//     selector: '#content',
//     height: 400,
//     menubar: false,
//     plugins: 'lists link image code preview',
//     toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | preview code',
// });

// Tunggu TinyMCE library sudah load sebelum initialize
function initTinyMCE() {
    if (typeof tinymce === 'undefined') {
        // Coba lagi 100ms kemudian
        setTimeout(initTinyMCE, 100);
        return;
    }
    
    tinymce.init({
        selector: '#tiny-mce',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        uploadcare_public_key: '95dee27c0531b69f1e2d',
    });
}

// Initialize TinyMCE
initTinyMCE();


