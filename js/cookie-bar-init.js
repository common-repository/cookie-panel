

if( document.readyState !== 'loading' ) {
    lampCookieInitCode();
} else {
    document.addEventListener('DOMContentLoaded', function () {
        lampCookieInitCode();
    });
}