document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');
    
    if (!toggle) return; // Jika element tidak ditemukan, stop
    
    toggle.addEventListener('click', () => {
        menu?.classList.toggle('hidden');
        iconOpen?.classList.toggle('hidden');
        iconClose?.classList.toggle('hidden');
    });

    
    
    // tinymce.init({
    //     selector: '#content',
    //     height: 400,
    //     menubar: false,
    //     plugins: 'lists link image code preview',
    //     toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | preview code',
    // });
});