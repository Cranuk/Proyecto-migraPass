import './bootstrap';
import ClipboardJS from 'clipboard';

// Inicializamos ClipboardJS de forma global
const clipboard = new ClipboardJS('.btn-copy');

clipboard.on('success', function(e) {
const btn = e.trigger;
    btn.classList.add('btn-copy-success');
    setTimeout(() => {
        btn.classList.remove('btn-copy-success');
    }, 2000);

    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Error al copiar:', e.action);
});