import './bootstrap';
import ClipboardJS from 'clipboard';

// Inicializamos ClipboardJS de forma global
const clipboard = new ClipboardJS('.btn-copy');

clipboard.on('success', function(e) {
    console.log('Texto copiado:', e.text);
    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Error al copiar:', e.action);
});